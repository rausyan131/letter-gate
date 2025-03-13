<?php

namespace App\Http\Controllers;
use App\Models\Devisi;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class DevisiController extends Controller
{
    public function index(Request $request){  
        $user = Auth::user();
        $title = 'Devisi';
        $search = $request->input('search');
        $devisi = Devisi::query()
            ->when($search, function ($query, $search) {
                return $query->where('nama_devisi', 'like', '%' . $search . '%')
                             ->orWhere('deskripsi', 'like', '%' . $search . '%')
                             ->orWhere('telepon', 'like', '%' . $search . '%');
            })
            ->paginate(7); 
       
        return view('devisi.index', compact('title', 'devisi', 'user'));
    }

    public function store(Request $request){
        $request->validate([
            'nama_devisi' => ['required'],
            'deskripsi' => ['required'],
            'telepon' => ['required'],
        ]);

        Devisi::create($request->all());
        return redirect()->route('devisi.index')->with('success', 'Data devisi berhasil ditambahkan');
    }

    public function edit(Devisi $devisi){
        $title = 'Edit Devisi';
        $devisi = $devisi;
        return view('devisi.edit', compact('title', 'devisi'));
    }

    public function update(Request $request, Devisi $devisi): RedirectResponse
    {
        $request->validate([
            'nama_devisi' => ['required'],
            'deskripsi' => ['required'],
            'telepon' => ['required'],
        ]);
    
        $devisi->update($request->all());
        return redirect()->route('devisi.index')->with('success', 'Jabatan Berhasil Diubah.');
    }

    public function destroy(Devisi $devisi){

        Devisi::destroy($devisi->id);
        return redirect()->route('devisi.index')->with('success','Devisi berhasil di hapus!');
    }


}
