<x-layouts.main_layout title="Cadastro">
    <x-slot:content>
        <div class="w-50 container h-100 d-flex justify-content-center align-items-center">
            <div class="bg-dark-blue p-5 w-100">
                <form {{-- action="{{ route('authenticate') }}"  --}} method="POST" autocomplete="off" enctype="multipart/form-data">

                    @csrf
                    <legend class="text-light fw-medium display-6 mb-1">Cadastro</legend>

                    <fieldset>

                        <div class="d-flex justify-content-between gap-4 my-5">
                            <div class="flex-grow-1  d-flex flex-column">
                                <div class="mb-2">
                                    <label for="title" class="text-dark-blue fs-3 fw-medium mr-2">Título</label>
                                    @error('title')
                                        <p class="text-danger d-inline">{{ $message }}</p>
                                    @enderror
                                </div>
                                <input type="text" class="bg-light-blue border-0 rounded-1 py-1 px-2 focus-ring shadow-none text-light" name="title">
                            </div>

                            <div class="d-flex flex-column">
                                <div class="mb-2">
                                    <label for="year" class="text-dark-blue fs-3 fw-medium mr-2">Ano</label>
                                    @error('year')
                                        <p class="text-danger d-inline">{{ $message }}</p>
                                    @enderror
                                </div>
                                <input type="text" class="bg-light-blue border-0 rounded-1 py-1 px-2 focus-ring shadow-none text-light" name="email">
                            </div>
                        </div>

                        <div class="mt-5 d-flex flex-column">
                            <div class="mb-2">
                                <label for="description" class="text-dark-blue fs-3 fw-medium mr-2">Descrição</label>
                                @error('description')
                                    <p class="text-danger d-inline">{{ $message }}</p>
                                @enderror
                            </div>
                            <input type="text" class="bg-light-blue border-0 rounded-1 py-1 px-2 focus-ring shadow-none text-light" name="description">
                        </div>

                        <div class="d-flex justify-content-between gap-4 my-5">
                            <div class="flex-grow-1  d-flex flex-column">
                                <div class="mb-2">
                                    <label for="link" class="text-dark-blue fs-3 fw-medium mr-2">Link</label>
                                    @error('link')
                                        <p class="text-danger d-inline">{{ $message }}</p>
                                    @enderror
                                </div>
                                <input type="url" class="bg-light-blue border-0 rounded-1 py-1 px-2 focus-ring shadow-none text-light" name="link">
                            </div>

                            <div class="d-flex flex-column">
                                <div class="mb-2">
                                    <label for="year" class="text-dark-blue fs-3 fw-medium mr-2">Ano</label>
                                    @error('year')
                                        <p class="text-danger d-inline">{{ $message }}</p>
                                    @enderror
                                </div>
                                <input type="text" class="bg-light-blue border-0 rounded-1 py-1 px-2 focus-ring shadow-none text-light" name="year">
                            </div>
                        </div>

                        <div class="mb-3">
                            <input type="file" name="image" accept=".jpg, .jpeg, .png" id="image" style="display:none;">
                            <label for="image" class="bg-white px-2 py-1 fw-medium rounded-1 cursor-pointer">Procurar capa</label>
                        </div>

                        <div class="mb-5 d-flex justify-content-between">
                            <div class="d-flex flex-column">
                                <label class="text-dark-blue fs-3 fw-medium mr-2 mb-1">Ativo</label>
                                <label class="text-light fs-5">
                                    <input type="checkbox" name="active" value="true" class="cursor-pointer outline-0 border border-primary"> Sim
                                </label>
                                <label class="text-light fs-5">
                                    <input type="checkbox" name="active" value="false" class="cursor-pointer"> Não
                                </label>
                            </div>

                            <div class="d-flex flex-column">
                                <label class="text-dark-blue fs-3 fw-medium mr-2 mb-1">Traduzido</label>
                                <label class="text-light fs-5">
                                    <input type="checkbox" name="translated" value="true" class="cursor-pointer outline-0 border border-primary"> Sim
                                </label>
                                <label class="text-light fs-5">
                                    <input type="checkbox" name="translated" value="false" class="cursor-pointer"> Não
                                </label>
                            </div>
                        </div>

                        <div class="w-full d-flex gap-3"> 
                            <a href="{{ route('panel') }}" class="btn btn-danger fw-semibold fs-5">Voltar</a>
                            <button type="submit" class="btn btn-primary fw-semibold fs-5">Cadastrar</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </x-slot:content>
</x-layouts.main_layout>