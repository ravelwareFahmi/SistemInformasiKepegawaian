@extends('layouts/klorofil')
@section('title','Halaman Pegawai')
@section('content')
<div class="main-content">
    <div class="container-fluid">
        <h3 class="page-title">Halaman Pegawai</h3>
        <div class="row">
            <div class="col-md-12">
                <!-- PANEL ADD. IMPORT, EXPORT -->
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Menu Pegawai</h3>
                        <div class="right">
                            <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                            <button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
                        </div>
                    </div>
                    <div class="panel-body" style="display: block;">
                        <form class="form-inline float-right">
                            {{-- INPUT, EXPORT, IMPORT DATA  --}}
                            <div class="col-sm-4">
                                <a href="kepegawaian/create" class="btn btn-primary btn-sm ml-4"><i class="lnr lnr-pencil">&nbsp;Input</i></a>
                                <a href="/kepegawaian/exportExcel"  class="btn btn-success btn-sm ml-2"><i class="fas fa-file-export">&nbsp;Export</i></a>
                                <a href="#" class="btn btn-success btn-sm float-left ml-2" data-toggle="modal" data-target="#importExcel"><i class="fas fa-upload">&nbsp;Import</i></a>
                            </div>
                            {{-- END INPUT, EXPORT, IMPORT DATA  --}}

                            {{-- FILTER PEGAWAI  --}}
                            <div class="col-sm-8">
                                <select class="form-control input-sm ml-5" id="filter_gender" name="filter_gender">
                                    <option value="" selected>--Jenis Kelamin--</option>
                                    <option value="Laki-laki" @if($filter_gender == 'Laki-laki') selected @endif>Laki-laki</option>
                                    <option value="Perempuan" @if($filter_gender == 'Perempuan') selected @endif>Perempuan</option>
                                </select>
                                <select class="form-control input-sm ml-2" id="filter_departement" name="filter_departement">
                                    <option value="" selected>--Departement--</option>
                                    <option value="IT"  @if($filter_departement == 'IT') selected @endif>IT</option>
                                    <option value="Office" @if($filter_departement == 'Office') selected @endif>Office</option>
                                </select>
                                <select class="form-control input-sm ml-2" id="filter_devisi" name="filter_devisi">
                                    <option value="" selected>--Devisi--</option>
                                    <option value="Programer" @if($filter_devisi == 'Programer') selected @endif>Programer</option>
                                    <option value="Desaigner" @if($filter_devisi == 'Desaigner') selected @endif>Desaigner</option>
                                    <option value="Akuntan" @if($filter_devisi == 'Akuntan') selected @endif>Akuntan</option>
                                </select>
                                 <select class="form-control input-sm ml-2" id="filter_date" name="filter_date">
                                    <option value="" selected>--Lama Bekerja--</option>
                                    <option value=5 @if($filter_date == 5) selected @endif> 5 >= tahun</option>
                                    <option value=4 @if($filter_date == 4) selected  @endif> 5 < tahun</option>
                                </select>

                                &nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-primary btn-sm my-2 my-sm-0 pl-5"><i class="fas fa-filter">&nbsp;Filter</i></button>
                            </div>
                            {{-- END FILTER PEGAWAI  --}}
                        </form>
                    </div>
                </div>
                <!-- END PANEL ADD, IMPORT, EXPORT -->
            </div>

            {{-- PANEL DATA PEGAWAI --}}
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading">
                        <a href="/kepegawaian" class="btn btn-success btn-sm ml-2 mb-5"><i class="fas fa-sync-alt"> &nbsp;Refresh Tabel</i></a>
                        <br><br>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                    <div class="panel-body">
                        <table id="myTable" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    {{-- <th>Email</th> --}}
                                    <th>Jenis Kelamin</th>
                                    <th>Departemen</th>
                                    <th>Devisi</th>
                                    <th>Tanggal Masuk</th>
                                    <th>Status</th>
                                    <th>Alamat</th>
                                    <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pegawai as $p)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $p->nik }}</td>
                                        <td>{{ $p->nama }}</td>
                                        {{-- <td>{{ $p->user->email }}</td> --}}
                                        <td>{{ $p->jenis_kelamin }}</td>
                                        <td>{{ $p->departement }}</td>
                                        <td>{{ $p->devisi }}</td>
                                        <td>{{ date('d-m-Y', strtotime($p->tgl_masuk)) }}</td>
                                        <td>{{ $p->sts }}</td>
                                        <td>{{ $p->alamat }}</td>
                                        <td>
                                            <a href="/edit/pegawai/{{ $p->id }}"><span class="label label-info"><i class="far fa-edit"></i></span></a>
                                            <a href="#" class="hapusData" pegawai-id = {{ $p->id }}><span class="label label-danger"><i class="fa fa-trash-o"></i></span></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            <!-- END PANEL PEGAWAI -->
        </div>
    </div>
</div>
@endsection

@section('konfirmDelete')
<script>
    $('.hapusData').click(function(){
        var id_pegawai = $(this).attr('pegawai-id')
        swal({
        title: "Yakin?",
        text: "Setelah dihapus, data tidak bisa dikembalikan",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {
            window.location = "/delete/pegawai/"+id_pegawai+""
        } else {
            swal("Data tidak dihapus");
        }
        });
    });
</script>
@endsection

@section('modal')
<!--MODAL UPLOAD -->
<div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
         </div>
         <div class="modal-body">
             {!! Form::open(['route'=>'pegawai.import', 'class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}
              {!! Form::file('data_pegawai') !!}
              <br>
              {{-- <p>user_id sementara isi 0 }}</p> --}}
         </div>
         <div class="modal-footer">
            <a href="/sample/pegawaiSample.xlsx" class="btn btn-success" align="left"><i class="fas fa-download"> &nbsp;Sample Pegawai</i></a>
            <button type="submit" class="btn btn-primary"><i class="fas fa-upload"> &nbsp;Submit</i></button>
            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="far fa-times-circle"> &nbsp;Close</i></button>
        </div>
        </form>
        </div>
      </div>
    </div>
@endsection

