<!-- Modal -->
<div class="modal fade" id="data_surat_create" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form name="data_surat_create">
                    @csrf
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="jenis_surat_create">
                                    Jenis Surat
                                    <small class="text-danger">*</small>
                                </label>
                                <select class="custom-select" name="jenis_surat" id="jenis_surat_create">
                                    <option value="" selected>Pilih</option>
                                    <option value="1">SURAT MASUK</option>
                                    <option value="2">SURAT KELUAR</option>
                                </select>
                            </div>
                        </div>
                       
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="nomor_surat">NO. Surat</label>
                                <input type="text" name="nomor_surat" class="form-control" id="nomor_surat_create">
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="kategori_surat_create">
                                    Kategori Surat
                                    <small class="text-danger">*</small>
                                </label>
                                <select class="custom-select" name="kategori_surat" id="kategori_surat_create">
                                    <option value="" selected>Pilih</option>
                                    <option value="1">TUGAS</option>
                                    <option value="2">REKOMENDASI</option>
                                    <option value="2">PEMBRITAHUAN</option>
                                    <option value="2">UNDANGAN</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="tgl_surat_create">
                                    Tanggal surat
                                    <small class="text-danger">*</small>
                                </label>
                                <input type="date" class="form-control" name="tgl_surat"
                                    id="tgl_surat_create">
                            </div>
                        </div>

                    </div> 

                    
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="tujuan_pengiriman">Tujuan Pengiriman</label>
                                <input type="text" name="tujuan_pengiriman" class="form-control" id="tujuan_pengiriman_create">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="perihal">Perihal</label>
                                <input type="text" name="perihal" class="form-control" id="perihal_create">
                            </div>
                        </div>
                    </div>    

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <textarea name="keterangan" class="form-control" id="keterangan_create" rows="6" style="height: auto"></textarea>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="tahun_ajaran_id">Th Ajaran</label>
                                <textarea name="tahun_ajaran_id" class="form-control" id="tahun_ajaran_id_create" rows="6" style="height: auto"></textarea>
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