<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Edukasi;

class ContentEdukasiController extends Controller
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

    //create for content edukasi
    public function createEdukasi(Request $request)
    {
        // Mendapatkan 20 edukasi secara acak
        $edukasi = Edukasi::inRandomOrder()->limit(20)->get();

        // Mengembalikan hasil dalam format JSON
        return response()->json([
            'edukasi' => $edukasi,
        ], 200);
    }
}
