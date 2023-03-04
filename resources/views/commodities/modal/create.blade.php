<!-- Modal -->
<div class="modal fade" id="commodity_create_modal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form name="commodity_create" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="item_code">
                                    Kode Barang
                                    <small class="text-danger">*</small>
                                </label>
                                <input type="text" name="item_code" class="form-control" id="item_code_create">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="school_operational_assistance_id_create">
                                    Asal Anggaran
                                    <small class="text-danger">*</small>
                                </label>
                                <select class="custom-select" name="school_operational_assistance_id"
                                    id="school_operational_assistance_id_create">
                                    <option value="" selected>Pilih</option>
                                    @foreach ($school_operational_assistances as $school_operational_assistance)
                                        <option value="{{ $school_operational_assistance->id }}">
                                            {{ $school_operational_assistance->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="name_create">
                                    Nama Barang
                                    <small class="text-danger">*</small>
                                </label>
                                <input type="text" class="form-control" name="name" id="name_create">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="brand_create">
                                    Merek
                                    <small class="text-danger">*</small>
                                </label>
                                <input type="text" class="form-control" name="brand" id="brand_create">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="date_of_purchase_create">
                                    Tanggal Pembelian
                                    <small class="text-danger">*</small>
                                </label>
                                <input type="date" class="form-control" name="date_of_purchase"
                                    id="date_of_purchase_create">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label for="material_create">
                                    Bahan
                                    <small class="text-danger">*</small>
                                </label>
                                <input type="text" class="form-control" name="material" id="material_create">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="commodity_location_id_create">
                                    Lokasi
                                    <small class="text-danger">*</small>
                                </label>
                                <select class="custom-select" name="commodity_location_id"
                                    id="commodity_location_id_create">
                                    <option value="" selected>Pilih</option>
                                    @foreach ($commodity_locations as $commodity_location)
                                        <option value="{{ $commodity_location->id }}">{{ $commodity_location->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="condition_create">
                                    Kondisi Barang
                                    <small class="text-danger">*</small>
                                </label>
                                <select class="custom-select" name="condition" id="condition_create">
                                    <option value="" selected>Pilih</option>
                                    <option value="1">Baik</option>
                                    <option value="2">Kurang Baik</option>
                                    <option value="3">Rusak Ringan</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="quantity_create">
                                    Kuantitas
                                    <small class="text-danger">*</small>
                                </label>
                                <input type="number" class="form-control" name="quantity" id="quantity_create">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="price_per_item_create">
                                    Harga Satuan
                                    <small class="text-danger">*</small>
                                </label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Rp.</span>
                                    </div>
                                    <input type="text" class="form-control currency" name="price_per_item"
                                        id="price_per_item_create">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="price_create">
                                    Harga
                                    <small class="text-danger">*</small>
                                </label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Rp.</span>
                                    </div>
                                    <input type="text" class="form-control currency" name="price" id="price_create" disabled>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="note_create">
                                    Keterangan
                                </label>
                                <textarea class="form-control" id="note_create" name="note" rows="6" style="height: auto"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class=" div col-md-6">
                            <div class="form-group">
                                <label>Foto Barang</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="upload_foto_barang"
                                        id="upload_foto_barang" accept="image/png, image/jpg, image/jpeg">
                                    <label class="custom-file-label" for="upload_foto_barang">Choose file</label>
                                </div>
                                <img id="foto-barang-preview" src="" alt="preview foto barang"
                                    style="width: 100%; margin-top: 10px" class="d-none">
                            </div>
                        </div>
                        <div class=" div col-md-6">
                            <div class="form-group">
                                <label>Foto Nota</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="upload_foto_nota"
                                        id="upload_foto_nota" accept="image/png, image/jpg, image/jpeg">
                                    <label class="custom-file-label" for="upload_foto_nota">Choose file</label>
                                </div>
                                <img id="foto-nota-preview" src="" alt="preview foto nota"
                                    style="width: 100%; margin-top: 10px" class="d-none">
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
