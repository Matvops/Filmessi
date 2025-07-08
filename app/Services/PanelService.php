<?php

namespace App\Services;

use App\Exceptions\NotFoundException;
use App\Models\Film;
use App\Repositories\CategoryRepository;
use App\Repositories\FilmRepository;
use App\Utils\Response;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

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
}