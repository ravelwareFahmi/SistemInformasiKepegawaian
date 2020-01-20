@extends('layouts/klorofil')
@section('title','Edit Pegawai')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading">
                    <h2 class="panel-title">Edit Pegawai</h2>
                </div>
                <div class="panel-body">
                    <form action="/edit/pegawai/{{ $pegawai->id }}" method="post">
                        @csrf
                        <div class="form-group">
                        <div class="form-group @error('nik') has-error @enderror">
                          <div class="form-group col-md-6">
                            <label for="text">NIK</label>
                            <input type="text" class="form-control" id="nik" name="nik" value="{{ $pegawai->nik }}" placeholder="nik anda" required minlength="16" maxlength="16">
                            <small id="nik" class="form-text text-success">required | numeric | 16 digit</small>
                            @error('nik')
                                <div class="help-block">
                                    {{ $message }}
                                </div>
                            @enderror
                          </div>
                          </div>
                          <div class="form-group col-md-6 @error('nama') has-error @enderror">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="{{ $pegawai->nama }}" placeholder="nama anda" required>
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
                                <option value="IT" @if($pegawai->departemen == 'IT') selected @endif>IT</option>
                                <option value="Office" @if($pegawai->departemen == 'Office') selected @endif>Office</option>
                            </select>
                          </div>
                          <div class="form-group col-md-3">
                            <label for="devisi">Devisi</label>
                            <select class="form-control" id="devisi" name="devisi">
                                <option value="Programer" @if($pegawai->devisi == 'Programer') selected @endif>Programer</option>
                                <option value="Akuntan" @if($pegawai->devisi == 'Akuntan') selected @endif>Akuntan</option>
                                <option value="Desaigner" @if($pegawai->devisi == 'Desaigner') selected @endif>Desaigner</option>
                            </select>
                          </div>
                          <div class="form-group col-md-6 @error('email') has-error @enderror">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="inputError" name="email"  placeholder="contoh@gmail.com" value="{{ $pegawai->user->email }}" autocomplete="off" required>
                            <small id="email" value="" class="form-text text-success">required | valid email</small>
                            @error('email')
                            <div class="help-block">
                                {{ $message }}
                            </div>
                            @enderror
                          </div>
                          <div class="form-group col-md-6">
                            <label for="tgl_masuk">Tanggal Masuk</label>
                            <input type="text" class="form-control datepicker" id="datepicker" name="tgl_masuk" data-toggle="datetimepicker" data-target=".datepicker" value="{{ $pegawai->tgl_masuk }} " required>
                        </div>
                          <div class="form-group col-md-3">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select id="jenis_kelamin" name="jenis_kelamin" class="form-control">
                                <option value="Laki-laki" @if($pegawai->jenis_kelamin == 'Laki-laki') selected @endif >Laki-laki</option>
                                <option value="Perempuan" @if($pegawai->jenis_kelamin == 'Perempuan') selected @endif >Perempuan</option>
                            </select>
                          </div>
                          <div class="form-group col-md-3">
                            <label for="sts">Status</label>
                            <select id="sts" name="sts" class="form-control">
                                <option value="Kontrak" @if($pegawai->sts == 'Kontrak') selected @endif >Kontrak</option>
                                <option value="Tetap" @if($pegawai->sts == 'Tetap') selected @endif >Tetap</option>
                            </select>
                          </div>
                          <div class="form-group col-md-12 @error('alamat') has-error @enderror">
                              <label for="alamat">Alamat</label>
                              <textarea class="form-control" id="alamat" name="alamat" rows="3" required>{{ $pegawai->alamat }}</textarea>
                              <small id="alamat" class="form-text text-success">required</small>

                              @error('alamat')
                                  <div class="help-block">
                                      {{ $message }}
                                  </div>
                              @enderror
                          </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="/kepegawaian" class="btn btn-success">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
