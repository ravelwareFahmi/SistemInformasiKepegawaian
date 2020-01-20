<?php
use App\Pegawai;
use App\User;
use Carbon\Carbon;


function countPegawaiPria(){
    $pegawaiL = Pegawai::Where('jenis_kelamin','=','Laki-laki')->get();
    $pegawaiL = count($pegawaiL);

    // $pegawai = DB::table('pegawi')->where('jenis_kelamin', '=', 'Laki-laki')->get();
    return $pegawaiL;
}

function countPegawaiWanita(){
    $pegawaiP = Pegawai::Where('jenis_kelamin','=','Perempuan')->get();
    $pegawaiP = count($pegawaiP);
    return $pegawaiP;
}

function countPegawai(){
    $pegawailAll = Pegawai::count();
    return $pegawailAll;
}

function lamaKerjaPegawai(){
    $karyawan_masuk = Auth::user()->pegawai->tgl_masuk;
    $date = Carbon::parse($karyawan_masuk);
    $now = Carbon::now();
    $diff = $date->diffInYears($now);

    return $diff . " Tahun";
}

function lastUserId(){
    $pegawai = DB::table('pegawai')->latest('created_at')->first();

    if (!empty($pegawai)) {
        $last = date('d-m-Y', strtotime($pegawai->created_at));
        } else {
        $last = 'tidak ada data';
    }
    return $last;
}
