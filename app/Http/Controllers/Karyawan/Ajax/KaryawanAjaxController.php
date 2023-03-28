<?php

namespace App\Http\Controllers\Karyawan\Ajax;


use App\Models\Staf;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KaryawanAjaxController extends Controller
{
    public function index()
    {
        //
    }

    
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $data_karyawan = new Staf();
        $data_karyawan->nm_karyawan = $request->nm_karyawan;
        $data_karyawan->tempat_tinggal = $request->tempat_tinggal;
        $data_karyawan->tanggal_lahir = $request->tanggal_lahir;
        $data_karyawan->bidang_studi = $request->bidang_studi;
        $data_karyawan->status_kepegawaian = $request->status_kepegawaian;
        $data_karyawan->id_jabatan = $request->id_jabatan;
        $data_karyawan->id_unit = $request->id_unit;
        $data_karyawan->id_kelas = $request->id_kelas;
        $data_karyawan->pendidikan_terakhir = $request->pendidikan_terakhir;
        $data_karyawan->pelatihan = $request->pelatihan;
        $data_karyawan->foto_karyawan = $request->foto_karyawan;
        $data_karyawan->save();

        return response()->json(['status' => 200, 'message' => 'Success', 'data' => $data_karyawan], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data_karyawan = Staf::findOrFail($id);

        return response()->json(['status' => 200, 'message' => 'Success', 'data' => $data_karyawan], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data_karyawan = Staf::findOrFail($id);

        return response()->json(['status' => 200, 'message' => 'Success', 'data' => $data_karyawan], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data_karyawan = Staf::findOrFail($id);
        $data_karyawan->name = $request->name;
        $data_karyawan->description = $request->description;
        $data_karyawan->save();

        return response()->json(['status' => 200, 'message' => 'Success', 'data' => $data_karyawan], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Staf::findOrFail($id)->delete();

        return response()->json(['status' => 200, 'message' => 'Success'], 200);
    }

}
