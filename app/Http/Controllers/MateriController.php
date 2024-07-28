<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreMateriRequest;
use App\Http\Requests\UpdateMateriRequest;

class MateriController extends Controller
{
    public function index(Request $request)
    {
        $materis = DB::table('materis')
            ->when($request->input('judul'), function ($query, $name) {
                return $query->where('judul', 'like', '%' . $name . '%');
            })
            ->orderBy('id', 'desc')
            ->paginate(10);;
        return view('pages.materis.index', compact('materis')); // Gunakan nama variabel yang benar
    }

    public function create()
    {
        return view('pages.materis.create');
    }

    public function store(StoreMateriRequest $request)
    {
        $data = $request->all();
        \App\Models\Materi::create($data);
        return redirect()->route('materi.index')->with('success', 'Materi Successfuly Created');
    }

    public function edit($id)
    {
        $materi = \App\Models\Materi::findOrFail($id);
        $materis = \App\Models\Materi::all(); // Jika Anda perlu daftar semua pengguna
        return view('pages.materis.edit', compact('materi', 'materis'));
    }

    public function update(UpdateMateriRequest $request, $id)
    {
        $data = $request->validated();
        $materi = \App\Models\Materi::findOrFail($id); // Fetch the user model
        $materi->update($data); // Update the user model with the validated data

        return redirect()->route('materi.index')->with('success', 'Materi successfully updated');
    }

    public function destroy($id)
    {
        $materi = \App\Models\Materi::findOrFail($id); // Fetch the user model using the ID
        $materi->delete(); // Delete the user model

        return redirect()->route('materi.index')->with('success', 'Materi successfully deleted');
    }
}
