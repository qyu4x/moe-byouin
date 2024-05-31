<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateObatRequest;
use App\Http\Requests\UpdateObatRequest;
use App\Models\Obat;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Psy\Util\Str;

class ObatController extends Controller
{

    function viewObat(): Response
    {
        return response()
            ->view('admin.dashboard.obat', [
                'title' => 'Obat | Admin'
            ]);
    }

    function viewCreate(): Response
    {
        return response()
            ->view('admin.dashboard.obat.create', [
                'title' => 'Obat | Admin'
            ]);
    }

    function create(CreateObatRequest $request): Response|RedirectResponse
    {
        $data = $request->validated();

        $obat = new Obat($data);
        $obat->save();

        return redirect('/admin/dashboard/obat', [
            'title' => 'Obat | Admin',
            'message' => 'Successfully added a new medicine'
        ]);
    }

    function getAll()
    {
        $obats = Obat::query()->orderBy('created_at')->get();

        return response()->view('admin.dashboard.obat', [
            'title' => 'Obat | Admin',
            'list_obat' => $obats
        ]);
    }

    function viewUpdate(): Response
    {
        return response()
            ->view('admin.dashboard.obat.update', [
                'title' => 'Update Obat | Admin'
            ]);
    }

    function get(string $obatId): Response|RedirectResponse
    {
        $obat = Obat::query()->find($obatId)->first();
        if (!$obat) {
            return response()
                ->view('admin.dashboard.obat.update', [
                    'title' => 'Update Obat',
                    'error' => 'Obat Not found'
                ]);
        }

        return response()
            ->view('admin.dashboard.obat.update', [
                'title' => 'Update Obat',
                'obat' => $obat
            ]);
    }


    function update(UpdateObatRequest $request, string $obatId)
    {
        $data = $request->validated();
        $obat = Obat::query()->find($obatId)->first();
        if (!$obat) {
            return response()
                ->view('admin.dashboard.obat.update', [
                    'title' => 'Update Obat',
                    'error' => 'Obat Not found'
                ]);
        }

        $obat->fill($data);
        $obat->save();

        return redirect('/admin/dashboard/obat', [
            'title' => 'Obat | Admin',
            'message' => 'Successfully update new medicine data'
        ]);
    }

    function delete(string $obatId)
    {
        $obat = Obat::query()->find($obatId)->first();
        if (!$obat) {
            return response()
                ->view('admin.dashboard.obat.update', [
                    'title' => 'Update Obat',
                    'error' => 'Obat Not found'
                ]);
        }

        $obat->delete();
        return response()->view('admin.dashboard.obat', [
            'title' => 'Obat | Admin',
            'message' => 'Successfully delete new medicine data'
        ]);
    }

}
