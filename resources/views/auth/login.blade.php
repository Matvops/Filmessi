<x-layouts.main_layout title="Login">
    <x-slot:content>
        <div class="w-50 container h-100 d-flex justify-content-center align-items-center">
            <div class="bg-dark-blue p-5 w-100">
                <form action="#" method="post" class="" autocomplete="off">
                    @csrf

                    <legend class="text-light fw-medium display-5 mb-4">Login</legend>

                    <fieldset>
                        <div class="my-5 d-flex flex-column">
                            <div class="mb-2">
                                <label for="email" class="text-dark-blue fs-3 fw-medium mr-2">Email</label>
                                @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <input type="email" class="bg-light-blue border-0 rounded-1 py-2 px-2 focus-ring shadow-none text-light" name="email">
                        </div>

                        <div class="my-5 d-flex flex-column">
                            <div class="mb-2"> 
                                <label for="password" class="text-dark-blue fs-3 fw-medium mr-2">Senha</label>
                                @error('password')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <input type="password" class="bg-light-blue border-0 outline-none rounded-1 py-2 px-2 focus-ring shadow-none text-light" name="password">
                        </div>

                        <div>
                            <div class="form-check my-5  d-flex justify-content-between align-items-center">
                                <div>
                                    <input type="checkbox" name="accept_term" id="checkbox" class="bg-dark-blue form-check-input border-primary border-2 p-2 mr-2 cursor-pointer">
                                    <label class="form-check-label text-light cursor-pointer" for="checkbox">Aceita termos de uso</label>
                                </div>
                                <a href="#" class="text-light text-opacity-75">Criar conta</a>
                            </div>
                        <div>

                        <div class="w-full"> 
                            <button type="submit" class="btn btn-primary w-100 fw-semibold fs-5">Entrar</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>

        <script>
            const checkbox = document.getElementById('checkbox');
            checkbox.addEventListener('change', function() {
                checkbox.value = this.checked ? 'true' : 'false';
            });
        </script>
    </x-slot:content>
</x-layouts.main_layout>