@extends('layouts/klorofil')
@section('title','Input Pegawai')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Input Data Pegawai</h3>
                </div>
                <div class="panel-body">
                    <form action="/kepegawaian/create" method="post">
                            @csrf
                            {{--  @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif  --}}

                            {{--  for bootstrap 3 error invalid   --}}
                                <div class="form-group col-md-6 @error('nik') has-error @enderror">
                                    <label for="nik">NIK</label>
                                    <input type="text" class="form-control" id="inputError" name="nik" value="{{ old('nik') }}" placeholder="contoh : 3212341236754563" required minlength="16" maxlength="16">
                                    <small id="nik" class="form-text text-success">required | numeric | 16 digit</small>
                                    @error('nik')
                                    <div class="help-block">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 @error('nama') has-error @enderror">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" id="inputError" name="nama" value="{{ old('nama') }}" placeholder="contoh : Hendi" required >
                                    <small id="nama" class="form-text text-success">required | minimal: 4 character</small>
                                    @error('nama')
                                    <div class="help-block">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="departement">Departemen</label>
                                    <select class="form-control" id="departement" name="departement">
                                        <option value="IT"{{(old('departement') == 'IT') ? 'selected' : '' }}>IT</option>
                                        <option value="Office"{{(old('departement') == 'Office') ? 'selected' : '' }}>Office</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="devisi">Devisi</label>
                                    <select class="form-control" id="devisi" name="devisi">
                                        <option value="Programer"{{(old('devisi') == 'Programer') ? 'selected' : '' }}>Programer</option>
                                        <option value="Akuntan"{{(old('devisi') == 'Akuntan') ? 'selected' : '' }}>Akuntan</option>
                                        <option value="Desaigner"{{(old('devisi') == 'Desaigner') ? 'selected' : '' }}>Desaigner</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6 @error('email') has-error @enderror">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="inputError" name="email"  placeholder="contoh@gmail.com" value="{{ old('email')}}" autocomplete="off" required>
                                    <small id="email" value="" class="form-text text-success">required | valid email</small>
                                    @error('email')
                                    <div class="help-block">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 @error('tgl_masuk') has-error @enderror">
                                    <label for="tgl_masuk">Tanggal Masuk</label>
                                    <input type="text" class="form-control" data-toggle="datetimepicker" id="datepicker" name="tgl_masuk"  placeholder="contoh : 2019-12-31" value="{{ old('tgl_masuk')}}" autocomplete="off" required>
                                    <small id="tgl_masuk" value="" class="form-text text-success">required | Tahun-Bulan-Tgl</small>
                                    @error('tgl_masuk')
                                    <div class="help-block">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                                        <option value="Laki-laki"{{(old('jenis_kelamin') == 'Laki-laki') ? 'selected' : '' }}>Laki-laki</option>
                                        <option value="Perempuan"{{(old('jenis_kelamin') == 'Perempuan') ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="status">Status</label>
                                    <select class="form-control" id="sts" name="sts">
                                        <option value="kontrak"{{(old('sts') == 'kontrak') ? 'selected' : '' }}>Kontrak</option>
                                        <option value="tetap"{{(old('sts') == 'tetap') ? 'selected' : '' }}>Tetap</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-12 @error('alamat') has-error @enderror">
                                    <label for="alamat">Alamat</label>
                                    <textarea class="form-control" id="alamat" placeholder="Jl. Kemang Soka Raya Blok A No.14, RT.001/RW.035, Bojong Rawalumbu, Kec. Rawalumbu, Kota Bks, Jawa Barat 17116" name="alamat" rows="4" required>{{ old('alamat') }}</textarea>
                                    <small id="alamat" class="form-text text-success">required</small>
                                    @error('alamat')
                                        <div class="help-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="modal-footer">
                                    {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button> --}}
                                    <a href="/kepegawaian" class="btn btn-primary">Kembali</a>
                                    {{-- <button type="submit" class="btn btn-primary">Simpan Data</button> --}}
                                    <input type="submit" name="submit" class="btn btn-success" value="Simpan" />
                                  </div>
                            </div>
                             </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
