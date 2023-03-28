<?php

namespace App\Http\Controllers\CommodityLocations\Ajax;

use App\Models\CommodityLocation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommodityLocationAjaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $commodity_location = new CommodityLocation();
        $commodity_location->nmgedung = $request->nmgedung;
        $commodity_location->name = $request->name;
        $commodity_location->kdr = $request->kdr;
        $commodity_location->idkaryawan = $request->idkaryawan;
        $commodity_location->description = $request->description;
        $commodity_location->save();

        return response()->json(['status' => 200, 'message' => 'Success', 'data' => $commodity_location], 200);
    }

    
    public function show($id)
    {
        $commodity_location = CommodityLocation::findOrFail($id);

        return response()->json(['status' => 200, 'message' => 'Success', 'data' => $commodity_location], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $commodity_location = CommodityLocation::findOrFail($id);

        return response()->json(['status' => 200, 'message' => 'Success', 'data' => $commodity_location], 200);
    }

   
    public function update(Request $request, $id)
    {
        $commodity_location = CommodityLocation::findOrFail($id);
        $commodity_location->nmgedung = $request->nmgedung;
        $commodity_location->name = $request->name;
        $commodity_location->kdr = $request->kdr;
        $commodity_location->idkaryawan = $request->idkaryawan;
        $commodity_location->description = $request->description;
        $commodity_location->save();

        return response()->json(['status' => 200, 'message' => 'Success', 'data' => $commodity_location], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CommodityLocation::findOrFail($id)->delete();

        return response()->json(['status' => 200, 'message' => 'Success'], 200);
    }
}
