<?php

namespace App\Services;

use App\Exceptions\NotFoundException;
use App\Models\Film;
use App\Repositories\CategoryRepository;
use App\Repositories\FilmRepository;
use App\Utils\Response;
use Carbon\Carbon;
use Exception;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class PanelService {

    private FilmRepository $filmRepository;
    private CategoryRepository $categoryRepository;

    public function __construct()
    {
        $this->filmRepository = new FilmRepository;
        $this->categoryRepository = new CategoryRepository;
    }

    public function getAllFilms(): Collection
    {
        return $this->filmRepository->getAll();
    }

    public function getAllCategories(): Collection
    {
        return $this->categoryRepository->getAll();
    }

    public function register($inputs, UploadedFile $image): Response
    {
        try {
            DB::beginTransaction();
            
            $film = new Film();
            $film->title = $inputs['title'];
            $film->description = $inputs['description'];
            $film->film_category_id = $inputs['category'];
            $film->link = $inputs['link'] ?? "";
            $film->active = filter_var($inputs['active'], FILTER_VALIDATE_BOOLEAN);
            $film->translated = filter_var($inputs['translated'], FILTER_VALIDATE_BOOLEAN);
            $film->year = $this->validateYear($inputs['year']);
            $film->image_path = $this->saveImage($image);
            $film->views = 0;
            $film->save();

            DB::commit();
            return Response::getResponse(true, 'Livro cadastrado com sucesso!');
        } catch (InvalidArgumentException $e) {
            DB::rollBack();
            return Response::getResponse(false, $e->getMessage());
        } catch (Exception $e) {
            DB::rollBack();
            return Response::getResponse(false, "Erro de cadastro");
        }
    }

    private function validateYear($yearString): int
    {
        $year = filter_var(intval($yearString), FILTER_SANITIZE_NUMBER_INT);
        $currentYear = Carbon::now()->year;

        if($year > $currentYear || $year < 1960) throw new InvalidArgumentException("Ano inválido");

        return $year;
    }

    private function saveImage(UploadedFile $file): string
    {
        $filename = $file->getFilename();
        $path = 'images/' . $filename . '.' . $file->getClientOriginalExtension();
        $file->storeAs($path);
        
        return 'storage/' . $path;
    }

    public function getFilm($token)
    {
        try {
            $id = Crypt::decrypt($token);

            $film = Film::find($id);

            if(!$film) throw new NotFoundException();

            return Response::getResponse(true, '', $film);
        } catch (NotFoundException $e) {
            return Response::getResponse(false, $e->getMessage());
        } catch(DecryptException $e) {
            DB::rollBack();
            return Response::getResponse(false, "Erro de consulta. Entre em contato com o suporte");
        } 
    }

    public function update($inputs, UploadedFile|null $image)
    {
        try {
            DB::beginTransaction();

            $id = Crypt::decrypt($inputs['id']);
            $film = $this->filmRepository->getFilmById($id);

            $this->verifyTitleExists($id, $inputs['title']);
            $this->verifyLinkExists($id, $inputs['link']);

            $film->title = $inputs['title'];
            $film->description = $inputs['description'];
            $film->film_category_id = $inputs['category'];
            $film->link = $inputs['link'] ?? "";
            $film->active = filter_var($inputs['active'], FILTER_VALIDATE_BOOLEAN);
            $film->translated = filter_var($inputs['translated'], FILTER_VALIDATE_BOOLEAN);
            $film->year = $this->validateYear($inputs['year']);
            $film->image_path = $image ? $this->saveImage($image) : $film->image_path;
            $film->views = $film->views;
            $film->save();

            DB::commit();
            return Response::getResponse(true, '');
        } catch(NotFoundException $e) {
            DB::rollBack();
            return Response::getResponse(false, $e->getMessage());
        } catch(InvalidArgumentException $e) {
            DB::rollBack();
            return Response::getResponse(false, $e->getMessage());
        }
    }

    private function verifyTitleExists($filmId, $title) {
        $films = Film::where('title', $title)->get();

        if(!$films) return;

        error_log($filmId);
        foreach($films as $film) {
            error_log(Crypt::decrypt($film['film_id']));
            if(Crypt::decrypt($film['film_id']) != $filmId) throw new InvalidArgumentException("Título em uso");
        }
    }
    
    private function verifyLinkExists($filmId, $link)
    {
        $films = Film::where('link', $link)->get();

        if(!$films) return;

        foreach($films as $film) {
            if(Crypt::decrypt($film['film_id']) != $filmId) throw new InvalidArgumentException("Link em uso");
        }
    }
}