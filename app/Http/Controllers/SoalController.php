<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreSoalRequest;
use App\Http\Requests\UpdateSoalRequest;

class SoalController extends Controller
{
    public function index(Request $request)
    {
        $soals = DB::table('soals')
            ->when($request->input('pertanyaan'), function ($query, $name) {
                return $query->where('pertanyaan', 'like', '%' . $name . '%');
            })
            ->orderBy('id', 'desc')
            ->paginate(10);;
        return view('pages.soals.index', compact('soals'));
    }

    public function create()
    {
        return view('pages.soals.create');
    }

    public function store(StoreSoalRequest $request)
    {
        $data = $request->all();
        \App\Models\Soal::create($data);
        return redirect()->route('soal.index')->with('success', 'Soal Successfuly Created');
    }

    public function edit($id)
    {
        $soal = \App\Models\Soal::findOrFail($id);
        $soals = \App\Models\Soal::all(); // Jika Anda perlu daftar semua pengguna
        return view('pages.soals.edit', compact('soal', 'soals'));
    }

    public function destroy($id)
    {
        $soal = \App\Models\Soal::findOrFail($id); // Fetch the user model using the ID
        $soal->delete(); // Delete the user model

        return redirect()->route('soal.index')->with('success', 'Soal successfully deleted');
    }

    public function update(UpdateSoalRequest $request, $id)
{
    $data = $request->validated();
    $soal = \App\Models\Soal::findOrFail($id);
    $soal->update($data);
    return redirect()->route('soal.index')->with('success', 'Soal successfully updated');
}
}

