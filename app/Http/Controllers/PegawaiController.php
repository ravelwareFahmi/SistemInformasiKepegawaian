<?php

namespace App\Http\Controllers;


use App\Exports\PegawaiExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ExcelImport;
use App\User;

// use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Pegawai;
// use Carbon\Carbon;
// use DateTime;
class PegawaiController extends Controller
{
    public function index(Request $request){
        $dn = date('Y-m-d'); //tanggal sekarang

        //
        $filter_gender = $request->filter_gender;
        $filter_departement = $request->filter_departement;
        $filter_devisi = $request->filter_devisi;
        $filter_date = $request->filter_date;

        $pegawai = Pegawai::where('id','>',0);
        if ($filter_gender || $filter_departement || $filter_devisi) {
            $pegawai = $pegawai->Where('jenis_kelamin','LIKE','%'.$request->filter_gender.'%')
            ->Where('departement','LIKE','%'.$request->filter_departement.'%')
            ->Where('devisi','LIKE','%'.$request->filter_devisi.'%');

        }
        if ($filter_date >= 5) {
            # code...
            $pegawai = $pegawai->whereRaw("TIMESTAMPDIFF(year,tgl_masuk, '$dn') >= '$request->filter_date'");
        } elseif ($filter_date < 5 && $filter_date >= 1) {
            $pegawai = $pegawai->whereRaw("TIMESTAMPDIFF(year,tgl_masuk, '$dn') < '$request->filter_date'");
        }
        $pegawai = $pegawai->get();

        return view('pegawai.index', compact('pegawai','filter_gender','filter_departement','filter_devisi','filter_date'));
    }

    public function create(){
        return view('pegawai.create');
    }

    public function store(Request $request){
        $request->validate([
            'nik' => 'required|numeric|unique:pegawai,nik',
            'nama' => 'required|string|min:4',
            'email' => 'required|email|unique:users,email',
            'departement' => 'required',
            'devisi' => 'required',
            'tgl_masuk' => 'required',
            'jenis_kelamin' => 'required',
            'sts' => 'required',
            'alamat' => 'required|min:5'
            ]);

            // insert table user
            $user = new User;
            $user->role = 'pegawai';
            $user->name = $request->nama;
            $user->email = $request->email;
            $user->password = bcrypt($request->nik);
            $user->remember_token = str_random(60);
            $user->save();

            // insert table pegawai
            $request->request->add(['user_id' => $user->id]);
            $pegawai = Pegawai::create($request->all());
            return redirect('/kepegawaian')->with('sukses', 'Data berhasil di simpan');
    }

    public function delete(Pegawai $pegawai){
        $pegawai->delete();
        return redirect('/kepegawaian')->with('sukses', 'Data berhasil di hapus');
    }

    public function edit(Pegawai $pegawai){
        return view('pegawai.edit', compact('pegawai'));
    }

    public function update(Request $request, Pegawai $pegawai){
        $request->validate([
            'nik' => "required|unique:pegawai,nik, $pegawai->id",
            'nama' => 'required|string|min:4',
            'departement' => 'required',
            'devisi' => 'required',
            'tgl_masuk' => 'required',
            'jenis_kelamin' => 'required',
            'sts' => 'required',
            'alamat' => 'required|min:5'
        ]);
        $pegawai->update($request->all());
        return redirect('/kepegawaian')->with('sukses', 'Data Berhasil di Update');
    }

    public function exportExcel()
    {

        return Excel::download(new PegawaiExport, 'data_pegawai.xlsx');
    }
    public function importExcel (Request $request)
    {
        // try {
            Excel::import(new \App\Imports\PegawaiImport, $request->file('data_pegawai'));
        // } catch (\Exception  $ex) {
            // return back()->with('fail', 'Mohon Cek File Anda');
        // }
        return redirect('/kepegawaian')->with('sukses', 'Data Berhasil di Import');
    }

    public function dataPegawai(){

        return view('pegawai/karyawan/profil');
    }
}
