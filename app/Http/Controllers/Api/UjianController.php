<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Ujian;
use App\Models\Soal;
use App\Models\UjianSoalList;
use Illuminate\Http\Request;

class UjianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    //create ujian
    public function createUjian(Request $request)
    {
        //get 20 soal kesehatan reproduksi random
        $soal_kesehatan_reproduksi = Soal::where('kategori', 'kesehatan_reproduksi')->inRandomOrder()->limit(20)->get();

        //get 20 soal kehamilan random
        $soal_kehamilan = Soal::where('kategori', 'kehamilan')->inRandomOrder()->limit(20)->get();

        //get 20 soal perubahan emosi
        $soal_perubahan_emosi = Soal::where('kategori', 'perubahan_emosi')->inRandomOrder()->limit(20)->get();

        //create ujian
        $ujian = Ujian::create([
            'user_id' => auth()->id(),
        ]);

        foreach ($soal_kesehatan_reproduksi as $soal) {
            UjianSoalList::create([
                'ujian_id' => $ujian->id,
                'soal_id' => $soal->id,
            ]);
        }

        foreach ($soal_kehamilan as $soal) {
            UjianSoalList::create([
                'ujian_id' => $ujian->id,
                'soal_id' => $soal->id,
            ]);
        }

        foreach ($soal_perubahan_emosi as $soal) {
            UjianSoalList::create([
                'ujian_id' => $ujian->id,
                'soal_id' => $soal->id,
            ]);
        }

        return response()->json([
            'message' => 'ujian berhasil dibuat',
            'data' => $ujian,
        ]);
    }

}
