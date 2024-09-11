<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index()
    {
        $data = Buku::all();
        return view('buku/index')->with('data', $data);
    }

    public function create()
    {
        $kategori = Kategori::all(); // Ambil semua kategori
        return view('buku/create', compact('kategori')); // Kirim data kategori ke view
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'tahun_terbit' => 'required|integer|digits:4', // Validasi tahun terbit harus 4 digit
            'id_kategori' => 'required|exists:kategori,id_kategori', // Validasi id_kategori
        ], [
            'judul.required' => 'Judul wajib diisi',
            'judul.string' => 'Judul harus berupa teks',
            'judul.max' => 'Judul tidak boleh melebihi 255 karakter',
            'penulis.required' => 'Penulis wajib diisi',
            'penulis.string' => 'Penulis harus berupa teks',
            'penulis.max' => 'Penulis tidak boleh melebihi 255 karakter',
            'penerbit.required' => 'Penerbit wajib diisi',
            'penerbit.string' => 'Penerbit harus berupa teks',
            'penerbit.max' => 'Penerbit tidak boleh melebihi 255 karakter',
            'tahun_terbit.required' => 'Tahun terbit wajib diisi',
            'tahun_terbit.integer' => 'Tahun terbit harus berupa angka',
            'tahun_terbit.digits' => 'Tahun terbit harus terdiri dari 4 digit',
            'id_kategori.required' => 'Kategori wajib diisi',
        ]);

        $buku = Buku::create([
            'judul' => $request->input('judul'),
            'penulis' => $request->input('penulis'),
            'penerbit' => $request->input('penerbit'),
            'tahun_terbit' => $request->input('tahun_terbit'),
            'id_kategori' => $request->input('id_kategori'),
            'deskripsi' => $request->input('deskripsi'),
        ]);

        $judul = $buku->judul; // Sesuaikan dengan nama kolom

        return redirect('/buku')->with('pesan', "Buku dengan judul '{$judul}' berhasil ditambahkan!");
    }

    public function show($id)
    {
        $data = Buku::where('id_buku', $id)->firstOrFail(); // Ganti 'id' dengan 'id_buku'
        return view('buku/show', compact('data'));
    }

    public function edit($id)
    {
        // Mengambil data buku berdasarkan id_buku
        $data = Buku::findOrFail($id);
        // Mengirim data ke view
        return view('buku/edit', compact('data'));
    }
    
    public function update(Request $request, $id)
{
    $request->validate([
        'judul' => 'required|string|max:255',
        'penulis' => 'required|string|max:255',
        'penerbit' => 'required|string|max:255',
        'tahun_terbit' => 'required|integer|digits:4',
        'deskripsi' => 'required',
        'id_kategori' => 'required|exists:kategori,id_kategori',
    ], [
        'judul.required' => 'Judul wajib diisi',
        'penulis.required' => 'Penulis wajib diisi',
        'penerbit.required' => 'Penerbit wajib diisi',
        'tahun_terbit.required' => 'Tahun terbit wajib diisi',
        'deskripsi.required' => 'Deskripsi wajib diisi',
    ]);

    $data = [
        'judul' => $request->input('judul'),
        'penulis' => $request->input('penulis'),
        'penerbit' => $request->input('penerbit'),
        'tahun_terbit' => $request->input('tahun_terbit'),
        'deskripsi' => $request->input('deskripsi'),
        'id_kategori' => $request->input('id_kategori'),
    ];

    Buku::where('id_buku', $id)->update($data);

    return redirect('/buku')->with('pesan', "Buku dengan judul '{$data['judul']}' berhasil di-edit");
}

    
    public function destroy($id)
    {
        $buku = Buku::where('id_buku', $id)->firstOrFail(); // Ganti 'id' dengan 'id_buku'

        $buku->delete();

        return redirect('/buku')->with('pesan', 'Buku ' . $buku->judul . ' berhasil dihapus');
    }
}
