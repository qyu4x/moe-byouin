<?php

namespace App\Http\Controllers;

use App\Http\Requests\DokterRegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\Poli;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class DokterController extends Controller
{
    public function login(): Response
    {
        return response()
            ->view('auth.dokter.login', [
                'title' => 'Dokter Login'
            ]);
    }

    public function doLogin(LoginRequest $request): Response | RedirectResponse
    {
        $data = $request->validated();

        $dokter = Dokter::query()->where('email', $data['email'])->first();

        if (!$dokter) {
            return response()
                ->view('auth.pasien.login', [
                    'title' => 'Dokter Login',
                    'error' => 'Email or Password is Wrong'
                ]);
        }

        if (!Hash::check($data['password'], $dokter->password)) {
            return response()
                ->view('auth.pasien.login', [
                    'title' => 'Dokter Login',
                    'error' => 'Email or Password is Wrong'
                ]);
        }

        $token = Crypt::encryptString($dokter['id'] . '.DOKTER');
        session()->put('token', $token);
        return redirect('/dokter');
    }

    public function register() : Response
    {
        $polis = Poli::query()->select(['id', 'nama_poli', 'keterangan'])->get();
        return response()
            ->view('auth.dokter.register', [
                'title' => 'Dokter Register',
                'polis' => $polis
            ]);
    }

    public function doRegister(DokterRegisterRequest $request) : Response | RedirectResponse
    {
        $data = $request->validated();

        if (!Poli::query()->find($data['poliklinik'])->get()) {
            return response()
                ->view('auth.dokter.register', [
                    'title' => 'Dokter Register',
                    'error' => 'Poliklinik not found'
                ]);
        }

        if (Dokter::query()->where('email', $data['email'])->first()) {
            return response()
                ->view('auth.dokter.register', [
                    'title' => 'Dokter Register',
                    'error' => 'Email Already Registered'
                ]);
        }

        $data['password'] = Hash::make($data['password']);

        $dokter = new Dokter($data);
        $dokter->save();

        return response()
            ->view('auth.dokter.register', [
                'title' => 'Dokter Register',
                'success' => 'Successful Registration'
            ]);
    }

    function doLogout(Request $request): Response | RedirectResponse
    {
        $request->session()->forget('token');
        return redirect('/');
    }
}
