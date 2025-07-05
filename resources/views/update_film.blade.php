<x-layouts.main_layout title="{{ $film->title }}">
    <x-slot:content>
        <div class="w-50 container h-100 d-flex justify-content-center align-items-center">
            <div class="bg-dark-blue p-5 w-100">
                <form action="{{route('update_film')}}" method="POST" autocomplete="off" enctype="multipart/form-data">

                    @csrf
                    <input type="hidden" name="id" value="{{$film->film_id}}">
                    <div class="d-flex align-items-end">
                        <legend class="text-light fw-medium display-6 mb-1">Atualizar</legend>
                        @if(session('update_error'))
                            <p class="text-danger w-100 text-end fs-5">{{session('update_error')}}</p>
                        @endif
                    </div>
                    <fieldset>

                        <div class="d-flex justify-content-between gap-4 my-5">
                            <div class="flex-grow-1 d-flex flex-column">
                                <div class="mb-2">
                                    <label for="title" class="text-dark-blue fs-3 fw-medium mr-2">Título</label>
                                    @error('title')
                                        <p class="text-danger d-inline">{{ $message }}</p>
                                    @enderror
                                </div>
                                <input type="text" class="bg-light-blue border-0 rounded-1 py-1 px-2 focus-ring shadow-none text-light" name="title" value="{{$film->title}}">
                            </div>
                            @error('category')
                                <p class="text-danger mt-5">{{ $message }}</p>
                            @enderror
                            <div class="d-flex flex-column mt-5">
                                <select name="category" id="category" class="cursor-pointer px-3 py-2 fs-6 fw-medium">
                                    @foreach($categories as $category)
                                        @if ($category->category_id == $film->film_category_id)
                                            <option value="{{$category->category_id}}" class="cursor-pointer fs-6" selected>
                                                {{$category->description}}
                                            </option>
                                        @else
                                            <option value="{{$category->category_id}}" class="cursor-pointer fs-6">
                                                {{$category->description}}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                                
                            </div>
                        </div>

                        <div class="d-flex flex-column">
                            <div class="mb-2">
                                <label for="description" class="text-dark-blue fs-3 fw-medium mr-2">Descrição</label>
                                @error('description')
                                    <p class="text-danger d-inline">{{ $message }}</p>
                                @enderror
                            </div>
                            <input type="text" class="bg-light-blue border-0 rounded-1 py-1 px-2 focus-ring shadow-none text-light" name="description" value="{{$film->description}}">
                        </div>

                        <div class="d-flex justify-content-between gap-4 my-5">
                            <div class="flex-grow-1  d-flex flex-column">
                                <div class="mb-2">
                                    <label for="link" class="text-dark-blue fs-3 fw-medium mr-2">Link</label>
                                    @error('link')
                                        <p class="text-danger d-inline">{{ $message }}</p>
                                    @enderror
                                </div>
                                <input type="url" class="bg-light-blue border-0 rounded-1 py-1 px-2 focus-ring shadow-none text-light" name="link" value="{{$film->link ?? null}}" />
                            </div>

                            <div class="d-flex flex-column">
                                <div class="mb-2">
                                    <label for="year" class="text-dark-blue fs-3 fw-medium mr-2">Ano</label>
                                    @error('year')
                                        <p class="text-danger d-inline">{{ $message }}</p>
                                    @enderror
                                </div>
                                <input type="text" class="bg-light-blue border-0 rounded-1 py-1 px-2 focus-ring shadow-none text-light" name="year" value="{{$film->year}}">
                            </div>
                        </div>

                        <div class="mb-3">
                            <input type="file" name="image" accept=".jpg, .jpeg, .png" id="image" style="display:none;">
                            <label for="image" class="bg-white px-2 py-1 fw-medium rounded-1 cursor-pointer">Procurar capa</label>
                            @error('image')
                                <p class="text-danger d-inline">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-5 d-flex justify-content-between">
                            <div class="d-flex flex-column">
                                <div>
                                    <label class="text-dark-blue fs-3 fw-medium mr-2 mb-1">Ativo</label>
                                    @error('active')
                                        <p class="text-danger d-inline">{{ $message }}</p>
                                    @enderror
                                </div>

                                @if ($film->active)
                                    <label class="text-light fs-5">
                                        <input type="checkbox" name="active" value="true" id="active-1" class="cursor-pointer outline-0 border border-primary" checked> Sim
                                    </label>
                                    <label class="text-light fs-5">
                                        <input type="checkbox" name="active" value="false" id="active-2" class="cursor-pointer"> Não
                                    </label>
                                @else
                                    <label class="text-light fs-5">
                                        <input type="checkbox" name="active" value="true" id="active-1" class="cursor-pointer outline-0 border border-primary"> Sim
                                    </label>
                                    <label class="text-light fs-5">
                                        <input type="checkbox" name="active" value="false" id="active-2" class="cursor-pointer" checked> Não
                                    </label>
                                @endif
                                
                            </div>

                            <div class="d-flex flex-column">
                                <div>
                                    <label class="text-dark-blue fs-3 fw-medium mr-2 mb-1">Traduzido</label>
                                    @error('translated')
                                        <p class="text-danger d-inline">{{ $message }}</p>
                                    @enderror
                                </div>
                                @if ($film->translated)
                                    <label class="text-light fs-5">
                                        <input type="checkbox" name="translated" value="true" id="translated-1" class="cursor-pointer outline-0 border border-primary" checked> Sim
                                    </label>
                                    <label class="text-light fs-5">
                                        <input type="checkbox" name="translated" value="false" id="translated-2" class="cursor-pointer"> Não
                                    </label>
                                @else
                                    <label class="text-light fs-5">
                                        <input type="checkbox" name="translated" value="true" id="translated-1" class="cursor-pointer outline-0 border border-primary"> Sim
                                    </label>
                                    <label class="text-light fs-5">
                                        <input type="checkbox" name="translated" value="false" id="translated-2" class="cursor-pointer" checked> Não
                                    </label>
                                @endif
                            </div>
                        </div>

                        <div class="w-full d-flex gap-3"> 
                            <a href="{{ route('panel') }}" class="btn btn-danger fw-semibold fs-5">Voltar</a>
                            <button type="submit" class="btn btn-primary fw-semibold fs-5">Atualizar</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>

        <script>
            function checkboxGroupControl(groupName) {
                const checkboxes = document.querySelectorAll(`input[name="${groupName}"]`);

                checkboxes.forEach(checkbox => {
                    checkbox.addEventListener('change', () => {
                        if (checkbox.checked) {
                            checkboxes.forEach(other => {
                                if (other !== checkbox) {
                                    other.checked = false;
                                }
                            });
                        }
                    });
                });
            }

            checkboxGroupControl("active");
            checkboxGroupControl("translated");
        </script>
    </x-slot:content>
</x-layouts.main_layout>