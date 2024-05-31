<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\Admin;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function login(): Response
    {
        return response()
            ->view('auth.admin.login', [
                'title' => 'Admin Login'
            ]);
    }

    public function doLogin(LoginRequest $request): Response | RedirectResponse
    {
        $data = $request->validated();

        $admin = Admin::query()->where('email', $data['email'])->first();

        if (!$admin) {
            return response()
                ->view('auth.admin.login', [
                    'title' => 'Admin Login',
                    'error' => 'Email or Password is Wrong'
                ]);
        }

        if (!Hash::check($data['password'], $admin->password)) {
            return response()
                ->view('auth.admin.login', [
                    'title' => 'Admin Login',
                    'error' => 'Email or Password is Wrong'
                ]);
        }

        $token = Crypt::encryptString($admin['id'] . '.ADMIN');
        session()->put('token', $token);
        return redirect('/admin');
    }

    function doLogout(Request $request): Response | RedirectResponse
    {
        $request->session()->forget('token');
        return redirect('/');
    }
}
