@extends('layouts.stisla.index', ['title' => 'Halaman Data Karyawan', 'page_heading' => 'Daftar Karyawan'])

@section('content')
<div class="card">
  <div class="row">
    <div class="col-lg-12">
      <button type="button" class="btn btn-primary float-right mt-3 mx-3" data-toggle="modal" data-target="#commodity_karyawan_modal">
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
              <th scope="col">Nama Karyawan</th>
              <th scope="col">Bidang Study</th>
              <th scope="col">Jabatan</th>
              <th scope="col">No. HP</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($data_karyawan as $karyawan)
            <tr>
              <th scope="row">{{ $loop->iteration }}</th>
              <td>{{ $karyawan->nm_karyawan }}</td>
              <td>{{ $karyawan->bidang_studi }}</td>
              <td>{{ $karyawan->id_jabatan }}</td>
              <td>{{ $karyawan->no_hp }}</td>
              <td>{{ $karyawan->created_at }}</td>
              <td class="text-center">
                <a data-id="{{ $karyawan->id }}" class="btn btn-sm btn-info text-white show_modal" data-toggle="modal" data-target="#show_karyawan">
                  <i class="fas fa-fw fa-info"></i>
                </a>
                <a data-id="{{ $karyawan->id }}" class="btn btn-sm btn-success text-white swal-edit-button" data-toggle="modal" data-target="#karyawan_edit_modal" data-placement="top" title="Ubah data">
                  <i class="fas fa-fw fa-edit"></i>
                </a>
                <a data-id="{{ $karyawan->id }}" class="btn btn-sm btn-danger text-white swal-delete-button" data-toggle="tooltip" data-placement="top" title="Hapus data">
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
@include('karyawan.modal.create')
@include('karyawan.modal.show')
@include('karyawan.modal.edit')
@endpush

@push('js')
@include('karyawan._script')
@endpush