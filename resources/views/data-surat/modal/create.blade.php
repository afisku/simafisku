<!-- Modal -->
<div class="modal fade" id="data_surat_create" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
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
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" name="name" class="form-control" id="name_create">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="jenis_surat">Jenis Surat</label>
                                <input type="text" name="jenis_surat" class="form-control" id="jenis_surat_create">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="nomor_surat">Nama</label>
                                <input type="text" name="nomor_surat" class="form-control" id="nomor_surat_create">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="kategori_surat">Nama</label>
                                <input type="text" name="kategori_surat" class="form-control" id="kategori_surat_create">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="tgl_surat">Nama</label>
                                <input type="text" name="tgl_surat" class="form-control" id="tgl_surat_create">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="tujuan_pengiriman">Nama</label>
                                <input type="text" name="tujuan_pengiriman" class="form-control" id="tujuan_pengiriman_create">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="perihal">Nama</label>
                                <input type="text" name="perihal" class="form-control" id="perihal_create">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="keterangan">Ket</label>
                                <input type="text" name="keterangan" class="form-control" id="keterangan_create">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="tahun_ajaran_id">thn ajaran</label>
                                <input type="text" name="tahun_ajaran_id" class="form-control" id="tahun_ajaran_id_create">
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="foto_surat">File Arsip</label>
                                <textarea name="foto_surat" class="form-control" id="foto_surat_create" rows="6" style="height: auto"></textarea>
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