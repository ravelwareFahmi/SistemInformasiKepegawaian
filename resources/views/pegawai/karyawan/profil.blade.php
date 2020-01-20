@extends('layouts/klorofil')
@section('title', 'Halaman Pegawai')
@section('content')


{{-- MAIN CONTENT --}}
    <div class="main-content">
        <div class="container-fluid">
            <div class="panel panel-profile">
                <div class="clearfix">
                    <!-- LEFT COLUMN -->
                    <div class="profile-left">
                        <!-- PROFILE HEADER -->
                        <div class="profile-header">
                            <div class="overlay"></div>
                            <div class="profile-main">
                                <img src="{{ asset('template/assets/img/user1.png') }}" class="img-circle" alt="Avatar">
                                <h3 class="name">{{ Auth::user()->name }}</h3>
                                <span class="online-status status-available">Available </span>
                            </div>
                            <div class="profile-stat">
                                <div class="row">
                                    <div class="col-md-4 stat-item">
                                        Lama Kerja  <span>{{ lamaKerjaPegawai() }}</span>
                                    </div>
                                    <div class="col-md-4 stat-item">
                                        Status <span>{{ Auth::user()->pegawai->sts }}</span>
                                    </div>
                                    <div class="col-md-4 stat-item">
                                        Departement <span>{{ Auth::user()->pegawai->departement }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END PROFILE HEADER -->

                    </div>
                    <!-- END LEFT COLUMN -->
                    <!-- RIGHT COLUMN -->
                    <div class="profile-right">
                        <h4 class="heading">Menu Karyawan</h4>
                        <!-- TABBED CONTENT -->
                        <div class="custom-tabs-line tabs-line-bottom left-aligned">
                            <ul class="nav" role="tablist">
                                <li class="active"><a href="#tab-bottom-left1" role="tab" data-toggle="tab">Update Your Password </a></li>
                                <li class=""><a href="#tab-bottom-left2" role="tab" data-toggle="tab">Info Karyawan <span class="badge"></span></a></li>
                            </ul>
                        </div>
                        <div class="tab-content">
                        <div class="tab-pane fade in active" id="tab-bottom-left1">
                            <form method="POST" action="{{ route('password.update') }}">
                                <ul class="list-unstyled activity-timeline">
                                    @csrf
                                    <div class="form-group @error('oldpassword') has-error @enderror">
                                        <input id="inputError" type="password" class="form-control" placeholder="Old Password" name="oldpassword" value="{{ old('oldpassword') }}" required autocomplete="oldpassword" autofocus>
                                        @error('oldpassword')
                                            <span class="help-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    {{-- <br> --}}
                                    <div class="form-group">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="new password" name="password" required autocomplete="new-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="retry password" required autocomplete="new-password">
                                    </div>
                                </ul>
                                <div class="margin-top-30 text-center"> <button type="submit" class="btn btn-primary">{{ __('Change Password') }}</button></div>
                            </form>
                        </div>
                            <div class="tab-pane fade" id="tab-bottom-left2">
                                <div class="profile-detail">
                                    {{-- <div class="profile-info"> --}}
                                        <ul class="list-unstyled list-justify">
                                            <li>NIK <span>{{ Auth::user()->pegawai->nik }}</span></li>
                                            <li>NAMA <span>{{ Auth::user()->pegawai->nama }}</span></li>
                                            <li>Devisi <span>{{ Auth::user()->pegawai->devisi }}</span></li>
                                            <li>Alamat <span>{{ Auth::user()->pegawai->alamat }}</span></li>
                                        </ul>
                                    {{-- </div> --}}
                                </div>
                            </div>
                            </div>
                        </div>
                        <!-- END TABBED CONTENT -->
                    </div>
                    <!-- END RIGHT COLUMN -->
                </div>
            </div>
        </div>
    </div>
    {{-- END MAIN CONTENT --}}
@endsection
