<?php

namespace App\Services;

use App\Models\Film;
use App\Repositories\CategoryRepository;
use App\Repositories\FilmRepository;
use App\Utils\Response;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\UploadedFile;
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
        $store = $file->storeAs($path);
        
        return 'storage/' . $path;
    }
}