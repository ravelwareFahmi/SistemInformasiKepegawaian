<?php

namespace App\Exports;

use App\Pegawai;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
// use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PegawaiExport implements FromCollection, WithMapping, WithHeadings,  ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pegawai::all();
    }

    public function map($pegawai): array
    {
            return [
                $pegawai->nik,
                $pegawai->nama,
                $pegawai->jenis_kelamin,
                $pegawai->departement,
                $pegawai->devisi,
                $pegawai->tgl_masuk,
                // Date::dateTimeToExcel($pegawai->tgl_masuk),
                $pegawai->sts,
                $pegawai->alamat,
            ];
    }

    public function headings(): array
    {
        return [
            'NIK',
            'NAMA',
            'JENIS KELAMIN',
            'DEPARTEMENT',
            'DEVISI',
            'TANGGAL MASUK',
            'STATUS',
            'ALAMAT',
        ];
    }

}
