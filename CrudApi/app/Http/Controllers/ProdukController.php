<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function create(Request $request){
        Produk::create([
            'nama' => $request->nama,
            'desc' => $request->desc,
            'gambar' => $request->gambar,
            'nama_kategori' => $request->nama_k,
            'stok' => $request->stok
        ]);
        return response()->json([
            'message' => 'sukses create data'
        ]);
    }
    public function update(Request $request, $id){
        Produk::findOrFail($id)->update([
            'nama' => $request->nama,
            'desc' => $request->desc,
            'gambar' => $request->gambar,
            'nama_kategori' => $request->nama_k,
            'stok' => $request->stok
        ]);
        return response()->json([
            'message' => 'sukses update data' 
        ]);
    }
    public function get(){
        $produk=Produk::all();
        return response()->json([
            'data_produk' => $produk
        ]);
    }
    public function delete($id){
        Produk::destroy($id);
        return response()->json([
            'message' => 'suskses delete produk'
        ]);
    }
}
