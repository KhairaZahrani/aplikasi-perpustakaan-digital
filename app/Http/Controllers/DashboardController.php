<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Ulasan;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $totalKategori = Kategori::count();
        $totalBuku = Buku::count();
        $totalUlasan = Ulasan::count();
        $totalUsers = User::count();

        return view('admin.dashboard', compact('totalKategori', 'totalBuku', 'totalUlasan', 'totalUsers'));
    }
}
