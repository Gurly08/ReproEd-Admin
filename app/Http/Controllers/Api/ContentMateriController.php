<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Materi;

class ContentMateriController extends Controller
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

    //create for content materi
    public function getMateri(Request $request)
    {
        $kategori = $request->query('kategori');

        if (!$kategori) {
            return response()->json([
                'message' => 'Kategori tidak ditemukan',
            ], 404);
        }

        // Mendapatkan 20 materi berdasarkan kategori secara acak
        $materi = Materi::where('kategori', $kategori)->inRandomOrder()->limit(20)->get();

        return response()->json([
            'materi' => $materi,
        ], 200);
    }
}
