<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UsersController extends Controller
{
    public function index(Request $request){
        $pegawai = Pegawai::all();
        $title = 'Daftar Pengguna';
        $search = $request->input('search');
        $users = User::query()
            ->when($search, function ($query, $search) {
                return $query->where('username', 'like', '%' . $search . '%')
                             ->orWhere('email', 'like', '%' . $search . '%');
            })
            ->paginate(10); 

        
        return view('users.index', compact('title', 'users' , 'pegawai'));
    }

    public function create(){
        $pegawai = Pegawai::all();
        $title = 'Tambah Pengguna';
        return view('users.create', compact('title','user','pegawai'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => ['required', 'unique:users,username'],
            'email' => ['required', 'unique:users,email'],
            'password' => ['required'],
            'role' => ['required'],
            'pegawai_id' => ['required', 'unique:users,pegawai_id']
        ],[
            'pegawai_id.unique' => 'User untuk pegawai ini sudah ada. Pilih pegawai lain :)',
            'username.unique' => 'Username ini sudah dipakai, pilih username lain :)',
            'email.unique' => 'user dengan email tersebut sudah digunakan, pilih email lain :)',
        ]);
    
      
    
        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
            'pegawai_id' => $request->pegawai_id,
        ]);
    
        return redirect()->route('users.index')->with('success', 'Pengguna berhasil ditambahkan');
    }
    
    

    public function edit(User $user) {
        $pegawai = Pegawai::all();
        $title = 'Edit Pengguna';
        return view('users.edit', compact('title', 'user','pegawai'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'username' => 'required|unique:users,username,' . $user->id,
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable',
            'role' => 'required',
            'pegawai_id' => 'required|unique:users,pegawai_id,' . $user->id, 
        ],[
            'pegawai_id.unique' => 'User untuk pegawai ini sudah ada. Pilih pegawai lain :)',
            'username.unique' => 'Username ini sudah dipakai, pilih username lain :)',
            'email.unique' => 'user dengan email tersebut sudah digunakan, pilih email lain :)',
        ]);
    
        $user->username = $request->username;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->pegawai_id = $request->pegawai_id;
    
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }
    
        $user->save();
    
        return redirect()->route('users.index')->with('success', 'Pengguna berhasil diubah');
    }

    public function destroy(User $user)
    {
    $user->delete(); 
    return redirect()->route('users.index')->with('success', 'User berhasil dihapus');
    }

    
    
    
}
