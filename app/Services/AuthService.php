<?php

namespace App\Services;

use App\Exceptions\AuthException;
use App\Mail\EmailConfirmation;
use App\Models\User;
use App\Repositories\UserRepository;
use App\Utils\Response;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
class AuthService {

    private UserRepository $userRepository;

    function __construct()
    {
        $this->userRepository = new UserRepository;
    }

    public function authenticate($request): Response
    {

        $email = $request->input('email');
        $password = $request->input('password');

        try {

            $user = $this->userRepository->getUserToAuthentication($email);

            if(!$user) 
                throw new AuthException();
            
            if(!$user->email_verified_at) 
                throw new AuthException("Verifique seu email!");

            if(!Auth::attempt(['email' => $email, 'password' => $password]))
                throw new AuthException();

            $request->session()->regenerate();
            return Response::getResponse(true, '');

        } catch (AuthException $e) {
            return Response::getResponse(false, $e->getMessage());
        }
    }

    public function logout(): void
    {
        Auth::logout();
    }

    public function register($request): Response
    {
        
        try {
            $user = new User();
            $user->email = $request->input('email');
            $user->username = $request->input('username');
            $user->password = bcrypt($request->input('password'));
            $user->active = false;
            $user->role = 'USER';
            $user->token = Str::random(64);


            $link = route('email_confirmation', ['token' => $user->token]);

            $result = Mail::to($user->email)->send(new EmailConfirmation($link, $user->username));

            if(!$result) throw new AuthException("Falha no cadastro");

            $user->save();

            return Response::getResponse(true, '', $user);
        } catch (AuthException $e) {
            return Response::getResponse(false, $e->getMessage());
        }
    }


    public function email_confirmation($token): Response
    {
        try {

            if(!$token) throw new AuthException("Token inválido!");

            $user = $this->userRepository->getUserByToken($token);

            $user->token = null;
            $user->active = true;
            $user->email_verified_at = Carbon::now();

            $user->save();

            return Response::getResponse(true, 'E-mail confirmado!');
        } catch(AuthException $e) {
            return Response::getResponse(false, $e->getMessage());
        }
    }
}
