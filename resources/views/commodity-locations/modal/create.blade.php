<!-- Modal -->
<div class="modal fade" id="commodity_location_create_modal" data-backdrop="static" data-keyboard="false" tabindex="-1"
    role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form name="commodity_location_create">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="nmgedung">Nama Gedung</label>
                                <input type="text" name="nmgedung" class="form-control" id="nmgedung_create">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="name">Nama Ruangan</label>
                                <input type="text" name="name" class="form-control" id="name_create">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="kdr">Kode Ruangan</label>
                                <input type="text" name="kdr" class="form-control" id="kdr_create">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="idkaryawan">PJ Ruangan</label>
                                <select name="idkaryawan" class="form-control" id="idkaryawan_create"
                                    style="width: 100%" data-placeholder="Pilih Karyawan">
                                    <option value=""></option>
                                    @foreach ($daftar_staf as $staf)
                                        <option value="{{ $staf->id }}">{{ $staf->nm_karyawan }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="description">Deskripsi</label>
                                <textarea name="description" class="form-control" id="description_create" rows="6" style="height: auto"></textarea>
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
