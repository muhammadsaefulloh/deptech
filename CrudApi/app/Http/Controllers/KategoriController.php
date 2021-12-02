<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function create(Request $request){
        Kategori::create([
            'nama_kategori' => $request->nama_k,
            'desc' => $request->desc
        ]);
        return response()->json([
            'message' => 'sukses create data'
        ], 201);
    }
    public function update(Request $request, $id){
        Kategori::findOrFail($id)->update([
            'nama_kategori' => $request->nama_k,
            'desc' => $request->desc
        ]);
        return response()->json([
            'message' => 'sukses update data' 
        ], 200);
    }
    public function get(){
        $kategori = Kategori::all();
        return view('kategori', compact('kategori'));
        // return response()->json(array('kategori'=>$array));
        // return response()->json([
        //     'data_kategori' => $kategori
        // ], 200);
    }
    public function delete($id){
        Kategori::destroy($id);
        return response()->json([
            'message' => 'suskses delete kategori'
        ], 200);
    }

}
