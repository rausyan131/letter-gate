<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Surat;
use App\Models\Pegawai;

class DashboardController extends Controller
{
    public function index(){

        $user = Auth::user();
        $today = Carbon::today('Asia/Jakarta'); 

        $pegawai = Auth::user()->pegawai->nip;

        $suratHariIni = Surat::whereDate('tanggal_surat', $today) 
        ->where('penerima_id', $pegawai) 
        ->get();


        $title = 'Dashboard';
        return view('dashboard',compact('title', 'user','pegawai', 'suratHariIni' , 'today'));

    }


}
