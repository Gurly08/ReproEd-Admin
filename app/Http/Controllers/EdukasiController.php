<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Edukasi;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreEdukasiRequest;
use App\Http\Requests\UpdateEdukasiRequest;

class EdukasiController extends Controller
{
    public function index(Request $request)
    {
        $edukasis = DB::table('edukasis')
            ->when($request->input('judul_edukasi'), function ($query, $name) {
                return $query->where('judul_edukasi', 'like', '%' . $name . '%');
            })
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('pages.edukasis.index', compact('edukasis'));
    }

    public function create()
    {
        return view('pages.edukasis.create');
    }

    public function store(StoreEdukasiRequest $request)
    {
        $data = $request->validated(); // Gunakan validated data dari request
        \App\Models\Edukasi::create($data);
        return redirect()->route('edukasi.index')->with('success', 'Edukasi successfully created');
    }

    public function edit($id)
    {
        $edukasi = \App\Models\Edukasi::findOrFail($id);
        $edukasis = \App\Models\Edukasi::all(); // Jika Anda perlu daftar semua pengguna
        return view('pages.edukasis.edit', compact('edukasi', 'edukasis'));
    }

    public function update(UpdateEdukasiRequest $request, $id)
    {
        $data = $request->validated();
        $edukasi = \App\Models\Edukasi::findOrFail($id); // Fetch the user model
        $edukasi->update($data); // Update the user model with the validated data

        return redirect()->route('edukasi.index')->with('success', 'Edukasi successfully updated');
    }

    public function destroy($id)
    {
        $edukasi = \App\Models\Edukasi::findOrFail($id); // Fetch the user model using the ID
        $edukasi->delete(); // Delete the user model

        return redirect()->route('edukasi.index')->with('success', 'Edukasi successfully deleted');
    }
}
