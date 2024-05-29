<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DokterRegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //return explode('.', session()->get('token'))[1] == 'ADMIN';
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => ['required', 'email', 'max:100'],
            'id_poli' => ['required'],
            'nama' => ['required', 'string'],
            'alamat' => ['required', 'string'],
            'no_hp' => ['required', 'string', 'max:15'],
            'password' => ['required', 'string', 'confirmed'],
        ];
    }
}
