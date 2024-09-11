<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{

    public function index()
    {
        $data = Kategori::all();
        return view('kategori.index',compact('data'));
    }

    public function create()
    {
        return view('kategori/create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori' => 'required|string|max:255',
        ], 
        [
            'kategori.required' => 'Kategori buku wajib diisi',
        ]);
    
        $buku =  Kategori::create([
            'kategori' => $request->input('kategori'),
        ]);

        $kategori = $buku->kategori;
    
        return redirect('/kategori')->with('pesan', "Buku dengan kategori '{$kategori}' berhasil ditambahkan!");
    }

    public function show($id)
    {
        $data = Kategori::where('id_kategori',$id)->first();
        return view('kategori/show', compact('data'));
    }

    public function edit($id)
    {
        $data = Kategori::where('id_kategori',$id)->first();
        return view('kategori/edit', compact('data'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'kategori' => 'required|string|max:255',
    ], 
    [
        'kategori.required' => 'Kategori wajib diisi',
    ]);

    $data = [
        'kategori' => $request->input('kategori'),
    ];

    $kategoriNama = $data['kategori'];

    Kategori::where('id_kategori', $id)->update($data);

    return redirect('/kategori')->with('pesan', "Kategori '{$kategoriNama}' berhasil di-edit");
}


    public function destroy($id)
    {
        $buku = Kategori::findOrFail($id);

        $buku->delete();
        
        return redirect('/kategori')->with('pesan', 'Buku dengan kategori ' . $buku->kategori . ' berhasil dihapus');
    }
}
