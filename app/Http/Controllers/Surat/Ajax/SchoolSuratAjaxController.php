<?php

namespace App\Http\Controllers\Surat\Ajax;

use App\Http\Controllers\Controller;
use App\Models\Datasurat;
use Illuminate\Http\Request;

class SchoolsuratAjaxController extends Controller
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
        
        $data_surat = new Datasurat();
        $data_surat->jenis_surat = $request->jenis_surat;
        $data_surat->nomor_surat = $request->nomor_surat;
        $data_surat->	kategori_surat = $request->	kategori_surat;
        $data_surat->tgl_surat = date_format(date_create($request->tgl_surat), "Y-m-d");
        $data_surat->tujuan_pengiriman = $request->tujuan_pengiriman;
        $data_surat->perihal = $request->perihal;
        $data_surat->keterangan = $request->keterangan;
        $data_surat->tahun_ajaran_id = $request->tahun_ajaran_id;
        $data_surat->save();

        return response()->json(['status' => 200, 'message' => 'Success', 'data' => $data_surat], 200);
    
    }

    
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
