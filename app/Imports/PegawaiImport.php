<?php

namespace App\Imports;
use App\Pegawai;
use App\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\Validator;

class PegawaiImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        // dd($collection);
        Validator::make($collection->toArray(), [
            '*.0' => 'required|unique:pegawai,nik',
            '*.1' => 'required',
            '*.2' => 'required|unique:users,email',
            '*.3' => 'required',
            '*.4' => 'required',
            '*.5' => 'required',
            '*.6' => 'required',
            '*.7' => 'required',
            '*.8' => 'required',
            '*.9' => 'required',
            '*.10' => 'required'
        ])->validate();

        foreach ($collection as $key => $row) {
            if ($key >= 1) { //row ke 1 pada excel 0 digunakan oleh heading
                $tgl_masuk = ($row[6] - 25569) * 86400;
                User::create([
                    'id' => $row[9],
                    'role' => $row[10],
                    'name' => $row[1],
                    'email' => $row[2],
                    'password' =>  bcrypt($row[0]),
                    'remember_token' => str_random(60)
                ]);
                Pegawai::create([
                    'user_id' => $row[9],
                    'nik' => $row[0],
                    'nama' => $row[1],
                    'jenis_kelamin' => $row[3],
                    'departement' => $row[4],
                    'devisi' => $row[5],
                    'tgl_masuk' => gmdate('Y-m-d',$tgl_masuk),
                    'sts' => $row[7],
                    'alamat' => $row[8]
                ]);
            }
        }
    }
}
