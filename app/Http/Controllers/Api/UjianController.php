<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Ujian;
use App\Models\Soal;
use App\Models\UjianSoalList;
use App\Http\Resources\SoalResource;
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

        //get 20 soal penyebab_kehamilan random
        $soal_penyebab_kehamilan = Soal::where('kategori', 'penyebab_kehamilan')->inRandomOrder()->limit(20)->get();

        //get 20 soal perubahan emosi random
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

        foreach ($soal_penyebab_kehamilan as $soal) {
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
            'message' => 'Ujian berhasil dibuat',
            'data' => $ujian,
        ]);
    }

    //get list soal per kategori
    public function getListSoalByKategori(Request $request)
    {
        //proses mencari ujian berdasarkan user id
        $ujian = Ujian::where('user_id', $request->user()->id)->first();
        //if ujian not found return emphty
        if (!$ujian) {
            return response()->json([
                'message' => 'Ujian tidak ditemukan',
                'data' => [],
            ], 200);
        }
        //jika sudah mendapatkan id user, lalu proses pengambilan(GET) list soal
        $ujianSoalList = UjianSoalList::where('ujian_id', $ujian->id)->get();
        //setelah pengambilan soal list sudah dapat BERDASARKAN UJIAN_ID, LANJUT mencari berdasarkan soal_id
        $ujianSoalListId = [];
        foreach ($ujianSoalList as $soal) {
            array_push($ujianSoalListId, $soal->soal_id);
        }

        //lanjut pengambil soal berdasarkan Array dari UjianSoalListId_id dimana soal itu didapatkan berdasarkan kategorinya.
        //fungsi whereIn untuk mendapatkan array id yang sudah di array_push ditahap sebelumnya.
        $soal = Soal::whereIn('id', $ujianSoalListId)->where('kategori', $request->kategori)->get();

        //jikalau berjawaban maka di return lah pesannya
        return response()->json([
            'message' => 'Berhasil Mendapatkan Soal',
            'data' => SoalResource::collection($soal),
        ]);
    }

    //jawab ujian
    public function jawabSoal(Request $request)
    {
        $validatedData = $request->validate([
            'soal_id' => 'required',
            'jawaban' => 'required',
        ]);

        $ujian = Ujian::where('user_id', $request->user()->id)->first();
        //if ujian not found return emphty
        if (!$ujian) {
            return response()->json([
                'message' => 'Ujian tidak ditemukan',
                'data' => [],
            ], 200);
        }
        $ujianSoalList = UjianSoalList::where('ujian_id', $ujian->id)
            ->where('soal_id', $validatedData['soal_id'])->first(); // Menggunakan first() bukan get()

        if (!$ujianSoalList) {
            return response()->json(['message' => 'Soal tidak ditemukan dalam ujian ini'], 404);
        }

        $soal = Soal::where('id', $validatedData['soal_id'])->first();

        // Cek jawaban
        if ($soal->kunci == $validatedData['jawaban']) {
            $ujianSoalList->jawaban = true;
        } else {
            $ujianSoalList->jawaban = false;
        }

        $ujianSoalList->save();

        return response()->json([
            'message' => 'Berhasil menyimpan jawaban',
            'jawaban' => $ujianSoalList->jawaban,
        ], 200);
    }

    //hitung nilai ujian by kategori
    public function hitungNilaiUjianBykategori (Request $request)
    {
        $kategori = $request->kategori;
        $ujian = Ujian::where('user_id', $request->user()->id)->first();
        //if ujian not found return emphty
        if (!$ujian) {
            return response()->json([
                'message' => 'Ujian tidak ditemukan',
                'data' => [],
            ], 200);
        }
        $ujianSoalList = UjianSoalList::where('ujian_id', $ujian->id)->get();
        //ujiansoallist by kategori
        $ujianSoalList = $ujianSoalList->filter(function ($value, $key) use ($kategori){
            return $value->soal->kategori == $kategori;
        });
        //hitung nilai
        $totalBenar = $ujianSoalList->where('jawaban', true)->count();
        $totalSoal = $ujianSoalList->count();
        $nilai = ($totalBenar/$totalSoal) * 100;

        $kategori_field = 'nilai_kesehatan_reproduksi';
        if ($kategori == 'penyebab_kehamilan') {
            $kategori_field = 'nilai_penyebab_kehamilan';
        } else if ($kategori == 'perubahan_emosi') {
            $kategori_field = 'nilai_perubahan_emosi';
        }

        //update nilai
        $ujian->update([
            $kategori_field => $nilai
        ]);

        return response()->json([
            'message' => 'berhasil mendapatkan nilai',
            'nilai' => $nilai
        ], 200);
    }
}
