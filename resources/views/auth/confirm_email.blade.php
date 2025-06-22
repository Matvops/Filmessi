<x-layouts.main_layout title="CONFIRME O EMAIL">
    <x-slot:content>
         <div class="w-50 container h-100 d-flex justify-content-center align-items-center">
           <div class="bg-dark-blue p-5 w-100">
                <h1>UM EMAIL DE CONFIRMAÇÃO FOI ENVIADO PARA <span class="text-danger">{{$user->email}}</span></h1>

                <div class="pt-3 mx-auto text-center">
                    <a href="{{ route('login') }}" class="btn btn-primary px-4 py-2 fs-4">VOLTAR PARA TELA DE LOGIN</a>
                </div>
           </div>
        </div>
    </x-slot:content>
</x-layouts.main_layout>