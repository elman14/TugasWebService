<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // cara 1
        // return Product::all();

        // cara 2
        $data = Category::all();
        return response()->json([
            'pesan' => 'Data Berhasil ditemukan',
            'data' => $data
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            "name"          => "required",
            "description"   => "required",
        ]);

        if ($validasi->passes()){
            $data = Category::create($request->all());
            return response()->json([
                'pesan' => 'Data Berhasil ditambahkan',
                'data' => $data
            ], 200);
        }
        return response()->json([
            'pesan' => 'Data Gagal disimpan',
            'data' => $validasi->errors()->all()
        ], 400);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($category)
    {
        // cara 1
        // return $id;
        // Cara 2
        $data = Category::where('id', $category)->first();
        if (empty($data)) {
            return response()->json([
                'pesan' => 'Data Tidak ditemukan',
                'data' => ''
            ], 404);
        }
        return response()->json([
            'pesan' => 'Data Berhasil ditemukan',
            'data' => $data
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($category)
    {
        $data = Category::where('id', $category)->first();
        if (empty($data)) {
            return response()->json([
                'pesan' => 'Data Tidak ditemukan',
                'data' => ''
            ], 404);
        }

        $data->delete();
        return response()->json([
            'pesan' => 'Data Berhasil ditemukan',
            'data' => $data
        ], 200);
    }
    }

