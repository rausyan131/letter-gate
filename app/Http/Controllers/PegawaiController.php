<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Devisi;
use App\Models\Pegawai;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PegawaiController extends Controller
{
    public function index(Request $request){

        $user = Auth::user();
        $search = $request->input('search');
        $pegawai = Pegawai::query()
            ->when($search, function ($query, $search) {
                return $query->where('nama', 'like', '%' . $search . '%')
                             ->orWhere('nip', 'like', '%' . $search . '%')
                             ->orWhere('alamat', 'like', '%' . $search . '%')
                             ->orWhere('telepon', 'like', '%' . $search . '%')
                             ->orWhere('devisi_id', 'like', '%' . $search . '%')
                             ->orWhere('status', 'like', '%' . $search . '%')
                             ->orWhere('tempat_lahir', 'like', '%' . $search . '%')
                             ->orWhere('tanggal_lahir', 'like', '%' . $search . '%');
            })
            ->paginate(5); 

        $title = 'Data Pegawai';
        return view('pegawai.index', compact('title', 'pegawai', 'user'));
    }

    public function create(){
        $title = 'Tambah data pegawai';
        $user = User::all();
        $devisi = Devisi::all();
        return view('pegawai.create',compact('title', 'user', 'devisi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nip' => ['required', 'unique:pegawai,nip'], 
            'nama' => ['required', 'string', 'max:255'],
            'alamat' => ['required', 'string', 'max:255'],
            'telepon' => ['required', 'string', 'max:255'],
            'status' => ['required'],
            'devisi_id' => ['required', 'integer'],
            'tempat_lahir' => ['required', 'string', 'max:255'],
            'tanggal_lahir' => ['required', 'date'],
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'nip.unique' => 'NIP sudah dipakai, silakan gunakan NIP lain.',
            'user_id.unique' => 'Username tersebut sudah dipakai, silakan pilih user lain.',
        ]);
    
        
        $data = $request->except('foto'); 
    
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('public/foto'); 
            $data['foto'] = basename($fotoPath); 
        }
        
        Pegawai::create($data);
    
     
        return redirect()->route('pegawai.index')->with('success', 'Data pegawai berhasil ditambahkan');
    }
    


    public function edit($nip)
    {
        $title = 'Edit data pegawai';
        $pegawai = Pegawai::where('nip', $nip)->firstOrFail(); 
        $user = User::all();
        $devisi = Devisi::all();

        return view('pegawai.edit', compact('title', 'pegawai', 'user', 'devisi'));
    }

    public function update(Request $request, $nip)
    {
        $pegawai = Pegawai::where('nip', $nip)->firstOrFail();
    
        $request->validate([
            'nip' => ['required', 'integer', 'unique:pegawai,nip,' . $pegawai->nip . ',nip'],
            'nama' => ['required', 'string', 'max:255'],
            'alamat' => ['required', 'string', 'max:255'],
            'telepon' => ['required', 'string', 'max:255'],
            'status' => ['required'],
            'devisi_id' => ['required', 'integer'],
            'tempat_lahir' => ['required', 'string', 'max:255'],
            'tanggal_lahir' => ['required', 'date'],
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
        ], [
            'nip.unique' => 'NIP sudah dipakai, silakan gunakan NIP lain.',
            'foto.image' => 'File yang diunggah harus berupa gambar.',
        ]);
    
        if ($request->hasFile('foto')) {
            if ($pegawai->foto && file_exists(public_path('storage/foto/' . $pegawai->foto))) {
                unlink(public_path('storage/foto/' . $pegawai->foto));  
            }
    
            $fotoPath = $request->file('foto')->store('foto', 'public');  
            $pegawai->foto = basename($fotoPath); 
        }
    
        $pegawai->update($request->except('foto'));  
    
        return redirect()->route('pegawai.index')->with('success', 'Data pegawai berhasil diperbarui');
    }
    
    


    public function destroy(Pegawai $pegawai)
{
    $pegawai->delete(); 
    return redirect()->route('pegawai.index')->with('success', 'Data pegawai berhasil dihapus');
}

    
}
