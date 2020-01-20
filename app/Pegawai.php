<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = 'pegawai';
    protected $fillable = ['nik','nama','jenis_kelamin','departement','devisi','tgl_masuk','sts','alamat','user_id'];

    // relasi ke tabel user

    public function user(){
        return $this->belongsTo(User::class);
    }

}

