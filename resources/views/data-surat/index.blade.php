@extends('layouts.stisla.index', ['title' => 'Halaman Surat', 'page_heading' => 'Daftar Surat Masuk dan Keluar'])

@section('content')
<div class="card">
  <div class="row">
    <div class="col-lg-12">
      <button type="button" class="btn btn-primary float-right mt-3 mx-3" data-toggle="modal" data-target="#school_surat_create_modal">
        <i class="fas fa-fw fa-plus"></i>
        Tambah Data
      </button>

    </div>
  </div>
  <div class="row px-3 py-3">
    <div class="col-lg-12">
      <div class="table-responsive">
        <table class="table table-bordered table-hover" id="datatable">

          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Tgl Surat</th>
              <th scope="col">Nomor Surat</th>
              <th scope="col">Tujuan</th>
              <th scope="col">Perihal</th>
              <th scope="col">Ket</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($data_surat as $data_surat)
            <tr>
              <th scope="row">{{ $loop->iteration }}</th>
              <td>{{ $data_surat->nomor_surat }}</td>
              <td>{{ $data_surat->tgl_surat }}</td>
              <td>{{ $data_surat->tujuan_pengiriman }}</td>
              <td>{{ $data_surat->perihal }}</td>
              <td>{{ Str::limit($data_surat->keterangan, 55, '...') }}</td>
              <td>{{ $data_surat->created_at }}</td>
              <td class="text-center">
                <a data-id="{{ $data_surat->id }}" class="btn btn-sm btn-info text-white show_modal" data-toggle="modal" data-target="#show_data_surat">
                  <i class="fas fa-fw fa-info"></i>
                </a>
                <a data-id="{{ $data_surat->id }}" class="btn btn-sm btn-success text-white swal-edit-button" data-toggle="modal" data-target="#data_surat_edit_modal" data-placement="top" title="Ubah data">
                  <i class="fas fa-fw fa-edit"></i>
                </a>
                <a data-id="{{ $data_surat->id }}" class="btn btn-sm btn-danger text-white swal-delete-button" data-toggle="tooltip" data-placement="top" title="Hapus data">
                  <i class="fas fa-fw fa-trash-alt"></i>
                </a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection

@push('modal')
@include('data-surat.modal.create')
@include('data-surat.modal.show')
@include('data-surat.modal.edit')
@endpush

@push('js')
@include('data-surat._script')
@endpush