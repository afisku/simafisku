<!-- Modal -->
<div class="modal fade" id="commodity_location_edit_modal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Ubah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form name="commodity_location_edit">
          @csrf
          <div class="row">
            <div class="col-lg-12">
              <div class="form-group">
                <label for="nmgedung">Nama Gedung</label>
                <input type="text" name="nmgedung" class="form-control" id="nmgedung_edit">
              </div>
            </div>

            <div class="col-lg-12">
              <div class="form-group">
                <label for="name">Nama Ruangan</label>
                <input type="text" name="name" class="form-control" id="name_edit">
              </div>
            </div>

            <div class="col-lg-12">
              <div class="form-group">
                <label for="kdr">Kode Ruangan</label>
                <input type="text" name="kdr" class="form-control" id="kdr_edit">
              </div>
            </div>

            <div class="col-lg-12">
              <div class="form-group">
                <label for="idkaryawan">PJ Ruangan</label>
                <input type="text" name="idkaryawan" class="form-control" id="idkaryawan_edit">
              </div>
            </div>

            <div class="col-lg-12">
              <div class="form-group">
                <label for="description">Deskripsi</label>
                <textarea name="description" class="form-control" id="description_edit" cols="30" rows="10"></textarea>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" data-id="" id="swal-update-button" class="btn btn-primary">Ubah Data</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>