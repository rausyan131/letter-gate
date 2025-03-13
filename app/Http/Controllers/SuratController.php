<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Surat;
use App\Models\Pegawai;
use App\Models\User;

class SuratController extends Controller
{
    public function index(Request $request)
{
    $user = Auth::user();
    $search = $request->input('search');
    $title = 'Daftar Surat';

    if ($user->role == 'admin') {
        $suratQuery = Surat::query();

        if ($search) {
            $suratQuery->where(function($query) use ($search) {
                $query->where('judul', 'like', "%{$search}%")
                    ->orWhere('perihal', 'like', "%{$search}%")
                    ->orWhere('nomor_surat', 'like', "%{$search}%")
                    ->orWhereHas('pengirim', function($query) use ($search) {
                        $query->where('nama', 'like', "%{$search}%");
                    })
                    ->orWhereHas('penerima', function($query) use ($search) {
                        $query->where('nama', 'like', "%{$search}%");
                    });
            });
        }

        $surat = $suratQuery->paginate(7);

    } else {
        $surat = Surat::where(function($query) use ($search, $user) {
            if ($search) {
                $query->where('judul', 'like', "%{$search}%")
                    ->orWhere('perihal', 'like', "%{$search}%")
                    ->orWhere('nomor_surat', 'like', "%{$search}%")
                    ->orWhereHas('pengirim', function($query) use ($search) {
                        $query->where('nama', 'like', "%{$search}%");
                    })
                    ->orWhereHas('penerima', function($query) use ($search) {
                        $query->where('nama', 'like', "%{$search}%");
                    });
            }

            $query->where('penerima_id', $user->pegawai->nip)
                ->orWhere('pengirim_id', $user->pegawai->nip);
        })
        ->paginate(7);
    }

    return view('surat.index', compact('title', 'surat', 'search'));
}

    

    public function show(Surat $surat)
    {
    $nama_pengirim = DB::table('pegawai')
    ->where('nip', $surat->pengirim_id)
    ->value('nama') ?? 'Tidak ada pengirim';

    $nama_penerima = DB::table('pegawai')
    ->where('nip', $surat->penerima_id)
    ->value('nama') ?? 'Tidak ada pengirim';

    $nama_devisi = DB::table('devisi')
    ->join('pegawai', 'devisi.id', '=', 'pegawai.devisi_id')
    ->where('pegawai.nip', $surat->pengirim_id)
    ->value('devisi.nama_devisi') ?? 'Tidak ada devisi';

    $title = 'Detail Surat';
    return view('surat.show', compact('title', 'surat', 'nama_devisi', 'nama_pengirim', 'nama_penerima')); 
    }

    public function create(){
        $pegawai = Pegawai::all();
        $title = 'Tambah Surat';
        return view('surat.create', compact('title', 'pegawai', 'pegawai'));

    }


    public function store(Request $request)
    {
    $request->validate([
        'pengirim_id' => 'required|exists:pegawai,nip',
        'penerima_id' => 'required|exists:pegawai,nip',
        'nomor_surat' => 'required|unique:surat',
        'judul' => 'required',
        'perihal' => 'required',
        'lampiran' => 'required',
        'isi_surat' => 'required',
        'tanggal_surat' => 'required|date',
    ]);

    Surat::create($request->all());

    return redirect()->route('surat.index')->with('success', 'Surat berhasil dikirim');
    }

    public function edit(Surat $surat)
    {
    $pegawai = Pegawai::all(); 
    $title = 'Edit Surat'; 
    return view('surat.edit', compact('title', 'surat', 'pegawai')); 
    }

    public function update(Request $request, Surat $surat)
    {
        $request->validate([
            'pengirim_id' => 'required|exists:pegawai,nip',
            'penerima_id' => 'required|exists:pegawai,nip',
            'nomor_surat' => 'required|unique:surat,nomor_surat,' . $surat->id,
            'judul' => 'required',
            'perihal' => 'required',
            'lampiran' => 'required',
            'isi_surat' => 'required',
            'tanggal_surat' => 'required|date',
        ]);
    
        $surat->update([
            'pengirim_id' => $request->pengirim_id,
            'penerima_id' => $request->penerima_id,
            'nomor_surat' => $request->nomor_surat,
            'judul' => $request->judul,
            'perihal' => $request->perihal,
            'lampiran' => $request->lampiran,
            'isi_surat' => $request->isi_surat,
            'tanggal_surat' => $request->tanggal_surat,
        ]);
    
        return redirect()->route('surat.index')->with('success', 'Surat berhasil diubah');
    }
    
    public function destroy(Surat $surat)
    {
    $surat->delete(); 
    return redirect()->route('surat.index')->with('success', 'Surat berhasil dihapus');
    }




    
}
