<?php

namespace App\Http\Controllers\Commodities\Ajax;

use App\Models\Commodity;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommodityAjaxController extends Controller
{
    public function store(Request $request)
    {
        $rules = [
            'school_operational_assistance_id' => 'required',
            'commodity_location_id' => 'required',
            'item_code' => 'required|unique:commodities,item_code',
            'name' => 'required',
            'brand' => 'required',
            'material' => 'required',
            'date_of_purchase' => 'required',
            'condition' => 'required',
            'quantity' => 'required',
            'price_per_item' => 'required',
            'upload_foto_barang' => 'image|mimes:jpeg,jpg,png|max:2048',
            'upload_foto_nota' => 'image|mimes:jpeg,jpg,png|max:2048',
        ];

        $messages = [
            'school_operational_assistance_id.required' => 'Asal Perolehan wajib dipilih!',
            'commodity_location_id.required' => 'Lokasi wajib dipilih!',
            'item_code.required' => 'Kode barang wajib diisi!',
            'item_code.unique' => 'Kode barang sudah ada!',
            'name.required' => 'Nama barang wajib diisi!',
            'brand.required' => 'Merek barang wajib diisi!',
            'material.required' => 'Bahan barang wajib diisi!',
            'date_of_purchase.required' => 'Tanggal pemberlian wajib diisi!',
            'condition.required' => 'Kondisi barang wajib dipilih!',
            'quantity.required' => 'Kuantitas wajib diisi!',
            'price_per_item.required' => 'Harga satuan wajib diisi!',
            'upload_foto_barang.image' => 'Foto barang harus berupa gambar!',
            'upload_foto_barang.mimes' => 'Foto barang harus berformat jpeg, jpg, png!',
            'upload_foto_barang.max' => 'Foto barang maksimal 2MB!',
            'upload_foto_nota.image' => 'Foto nota harus berformat jpeg, jpg, png!',
            'upload_foto_nota.mimes' => 'Foto nota harus berupa gambar!',
            'upload_foto_nota.max' => 'Foto nota maksimal 2MB!',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        $fieldsWithErrorMessagesArray = '';

        if ($validator->fails()) {
            $errMessage = $validator->messages()->all();
            foreach ($errMessage as $message) {
                $fieldsWithErrorMessagesArray .= $message . '<br>';
            }
        } else {
            $pricePerItem = rupiahKeAngka($request->price_per_item);

            $commodities = new Commodity();
            $commodities->school_operational_assistance_id = $request->school_operational_assistance_id;
            $commodities->commodity_location_id = $request->commodity_location_id;
            $commodities->item_code = $request->item_code;
            $commodities->name = $request->name;
            $commodities->brand = $request->brand;
            $commodities->material = $request->material;
            $commodities->date_of_purchase = date_format(date_create($request->date_of_purchase), "d-m-Y");
            $commodities->condition = $request->condition;
            $commodities->quantity = $request->quantity;
            $commodities->price_per_item = $pricePerItem;
            $commodities->price = $pricePerItem * $request->quantity;
            $commodities->note = $request->note;

            if ($request->file('upload_foto_barang')) {
                // upload foto barang
                $destinationPath = 'uploads/inventaris/' . \Str::slug($request->item_code);

                $file = $request->file('upload_foto_barang');
                $extension = $file->getClientOriginalExtension();
                $filename = \Str::slug($request->item_code) . '_barang.' . $extension;
                $upload = $file->move($destinationPath, $filename);

                if ($upload) {
                    $commodities->foto_barang = $destinationPath . '/' . $filename;
                }
            }

            if ($request->file('upload_foto_nota')) {
                // upload foto nota
                $destinationPath = 'uploads/inventaris/' . \Str::slug($request->item_code);

                $file = $request->file('upload_foto_nota');
                $extension = $file->getClientOriginalExtension();
                $filename = \Str::slug($request->item_code) . '_nota.' . $extension;
                $upload = $file->move($destinationPath, $filename);

                if ($upload) {
                    $commodities->foto_nota = $destinationPath . '/' . $filename;
                }
            }

            if ($commodities->save()) {
                return response()->json([
                    'status' => true, 
                    'message' => 'Berhasil tambah barang', 
                    'data' => $commodities
                ]);
            }
        }

        return response()->json([
            'status' => false,
            'message' => $fieldsWithErrorMessagesArray ?? 'Gagal tambah barang',
        ]);
    }

    public function show($id)
    {
        $commodity = Commodity::findOrFail($id);

        $data = [
            'school_operational_assistance_id' => $commodity->school_operational_assistance->name,
            'commodity_location_id' => $commodity->commodity_location->name,
            'item_code' => $commodity->item_code,
            'name' => $commodity->name,
            'brand' => $commodity->brand,
            'material' => $commodity->material,
            // $commodity->date_of_purchase
            'date_of_purchase' => $commodity->date_of_purchase,
            'condition' => $commodity->condition,
            'quantity' => $commodity->quantity,
            'price' => $commodity->indonesian_currency($commodity->price),
            'price_per_item' => $commodity->indonesian_currency($commodity->price_per_item),
            'note' => $commodity->note,
        ];

        return response()->json(['status' => 200, 'message' => 'Success', 'data' => $data], 200);
    }

    public function edit($id)
    {
        $commodity = Commodity::findOrFail($id);

        $data = [
            'school_operational_assistance_id' => $commodity->school_operational_assistance_id,
            'commodity_location_id' => $commodity->commodity_location_id,
            'item_code' => $commodity->item_code,
            'name' => $commodity->name,
            'brand' => $commodity->brand,
            'material' => $commodity->material,
            'date_of_purchase' => date_format(date_create($commodity->date_of_purchase), "Y-m-d"),
            'condition' => $commodity->condition,
            'quantity' => $commodity->quantity,
            'price' => $commodity->price,
            'price_per_item' => $commodity->price_per_item,
            'note' => $commodity->note,
        ];

        return response()->json(['status' => 200, 'message' => 'Success', 'data' => $data], 200);
    }

    public function update(Request $request, $id)
    {
        $commodities = Commodity::findOrFail($id);

        $commodities->school_operational_assistance_id = $request->school_operational_assistance_id;
        $commodities->commodity_location_id = $request->commodity_location_id;
        $commodities->item_code = $request->item_code;
        $commodities->name = $request->name;
        $commodities->brand = $request->brand;
        $commodities->material = $request->material;
        $commodities->date_of_purchase = date_format(date_create($request->date_of_purchase), "d-m-Y");
        $commodities->condition = $request->condition;
        $commodities->quantity = $request->quantity;
        $commodities->price = $request->price;
        $commodities->price_per_item = $request->price_per_item;
        $commodities->note = $request->note;
        $commodities->save();

        return response()->json(['status' => 200, 'message' => 'Success'], 200);
    }

    public function destroy($id)
    {
        Commodity::findOrFail($id)->delete();

        return response()->json(['status' => 200, 'message' => 'Success'], 200);
    }
}
