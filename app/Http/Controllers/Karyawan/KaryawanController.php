<?php

namespace App\Http\Controllers\Karyawan;

use App\Models\Staf;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function index()
    {
    $data_karyawan = Staf::orderBy('id', 'ASC')->get();

        return view('karyawan.index', compact('data_karyawan'));
    }
}
