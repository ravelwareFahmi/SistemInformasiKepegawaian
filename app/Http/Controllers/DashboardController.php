<?php

namespace App\Http\Controllers;
use App\Pegawai;
use Illuminate\Http\Request;
use DB;
class DashboardController extends Controller
{
    //
    public function index(){

        return view('dashboard.index');
    }
}
