<!-- Modal -->
<div class="modal fade" id="karyawan_modal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form name="karyawan_create">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="nm_karyawan">Nama Karyawan<small class="text-danger">*</small></label>
                                <input type="text" name="nm_karyawan" class="form-control" id="nm_karyawan_create">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="tempat_tinggal">Tempat Lahir<small class="text-danger">*</small></label>
                                <input type="text" name="tempat_tinggal" class="form-control" id="tempat_tinggal_create">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="tanggal_lahir">
                                    Tanggal Lahir
                                    <small class="text-danger">*</small>
                                </label>
                                <input type="date" class="form-control" name="tanggal_lahir"
                                    id="tanggal_lahir_create">
                            </div>
                        </div>
                    
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="bidang_studi">Bidang Studi
                                    <small class="text-danger">*</small>
                                </label>
                                <input type="text" name="bidang_studi" class="form-control" id="bidang_studi_create">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="status_kepegawaian">Status Kepegawaian
                                    <small class="text-danger">*</small>
                                </label>
                                <input type="text" name="status_kepegawaian" class="form-control" id="status_kepegawaian_create">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="id_jabatan">Jabatan
                                    <small class="text-danger">*</small>
                                </label>
                                <input type="text" name="id_jabatan" class="form-control" id="id_jabatan_create">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="id_unit">Unit Kerja
                                    <small class="text-danger">*</small>
                                </label>
                                <input type="text" name="id_unit" class="form-control" id="id_unit_create">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="id_kelas">Kelas
                                    <small class="text-danger">*</small>
                                </label>
                                <input type="text" name="id_kelas" class="form-control" id="id_kelas_create">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="pendidikan_terakhir">P-Terakhir
                                    <small class="text-danger">*</small>
                                </label>
                                <input type="text" name="pendidikan_terakhir" class="form-control" id="pendidikan_terakhir_create">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="no_hp">No. HP
                                    <small class="text-danger">*</small>
                                </label>
                                <input type="text" name="no_hp" class="form-control" id="no_hp_create">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="tgl_masuk_alfityan">TGL Masuk
                                    <small class="text-danger">*</small>
                                </label>
                                <input type="text" name="tgl_masuk_alfityan" class="form-control" id="tgl_masuk_alfityan_create">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="pelatihan">Pelatihan</label>
                                <input type="text" name="pelatihan" class="form-control" id="pelatihan_create">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="foto_karyawan">Foto Profile
                                    <small class="text-danger">*</small>
                                </label>
                                <input type="text" name="foto_karyawan" class="form-control" id="foto_karyawan_create">
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