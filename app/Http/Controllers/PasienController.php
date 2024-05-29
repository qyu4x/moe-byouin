<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\PasienRegisterRequest;
use App\Models\Admin;
use App\Models\Pasien;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class PasienController extends Controller
{
    public function login(): Response
    {
        return response()
            ->view('auth.pasien.login', [
                'title' => 'Pasien Login'
            ]);
    }

    public function doLogin(LoginRequest $request): Response | RedirectResponse
    {
        $data = $request->validated();

        $pasien = Pasien::query()->where('email', $data['email'])->first();

        if (!$pasien) {
            return response()
                ->view('auth.pasien.login', [
                    'title' => 'Pasien Login',
                    'error' => 'Email or Password is Wrong'
                ]);
        }

        if (!Hash::check($data['password'], $pasien->password)) {
            return response()
                ->view('auth.pasien.login', [
                    'title' => 'Pasien Login',
                    'error' => 'Email or Password is Wrong'
                ]);
        }

        $token = Crypt::encryptString($pasien['id'] . '.PASIEN');
        session()->put('token', $token);
        return redirect('/dashboard');
    }

    public function register() : Response
    {
        return response()
            ->view('auth.pasien.register', [
                'title' => 'Pasien Register'
            ]);
    }

    private function generateRandomRM(): string
    {
        $length = 6;
        $characters = '0123456789';
        $randomToken = '';

        for ($i = 0; $i < $length; $i++) {
            $randomToken .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $randomToken;
    }

    public function doRegister(PasienRegisterRequest $request) : Response | RedirectResponse
    {
        $data = $request->validated();

        if (Pasien::query()->where('email', $data['email'])->first()) {
            return response()
                ->view('auth.pasien.register', [
                    'title' => 'Pasien Register',
                    'error' => 'Email Already Registered'
                ]);
        }

        if (Pasien::query()->where('no_hp', $data['no_hp'])->first()) {
            return response()
                ->view('auth.pasien.register', [
                    'title' => 'Pasien Register',
                    'error' => 'Phone Number Already Registered'
                ]);
        }

        if (Pasien::query()->where('no_ktp', $data['no_ktp'])->first()) {
            return response()
                ->view('auth.pasien.register', [
                    'title' => 'Pasien Register',
                    'error' => 'Ktp Number Already Registered'
                ]);
        }

        $data['no_rm']  = $this->generateRandomRM();
        $data['password'] = Hash::make($data['password']);

        $pasien = new Pasien($data);
        $pasien->save();

        return response()
            ->view('auth.pasien.login', [
                'title' => 'Pasien Login',
                'success' => 'Successful Registration'
            ]);
    }
}
