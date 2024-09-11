<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SessionController extends Controller
{
    public function index(){
        return view('sesi/index');
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ],
        [
            'email.required' => 'Email wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::attempt($infologin)){
            return redirect('admin')->with('pesan', 'Berhasil Login');
        }else{
            return redirect('sesi')->withErrors('Username dan Password yang dimasukan tidak valid');
        }
    }

    public function register(){
        return view('sesi/register');
    }

    public function create(Request $request){
        $request->validate([
            'username' => 'required',
            'email' => 'required|email|unique:users,email',
            'alamat' => 'required',
            'password' => 'required|min:8|confirmed', // Validasi dengan confirmed
            'role' => 'required|in:Administrator,Petugas,Peminjam', // Validasi role
            'nama_lengkap' => 'required', // Validasi nama lengkap
        ],
        [
            'username.required' => 'Username wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password harus minimal 8 karakter',
            'password.confirmed' => 'Password konfirmasi tidak cocok', // Pesan validasi untuk confirmed
            'role.required' => 'Role wajib dipilih',
            'role.in' => 'Role yang dipilih tidak valid',
            'nama_lengkap.required' => 'Nama lengkap wajib diisi', // Pesan validasi untuk nama lengkap
        ]);
    
        $data = [
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hashing password saat registrasi
            'role' => $request->role, // Simpan role yang dipilih
            'nama_lengkap' => $request->nama_lengkap, // Simpan nama lengkap
            'alamat' => $request->alamat, // Simpan alamat
        ];
    
        User::create($data);
    
        return redirect('admin')->with('pesan', 'Berhasil Register');
    }
    

    function logout(){
        Auth::logout();
        return redirect('sesi')->with('pesan', 'Berhasil Logout');
    }
}
