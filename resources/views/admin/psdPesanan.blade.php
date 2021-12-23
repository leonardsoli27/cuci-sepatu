@extends('admin.layout.main')

@section('pesanan', 'active')
@section('prosedur', 'active')

@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-4">Pesanan</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Prosedur Pesanan</li>
    </ol>

    <a href="{{ url('/prosedur.tbh') }}" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Tambah
        Prosedur</a>
    <div class="row">
        <div class="col-lg">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Daftar Prosedur
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Nama Prosedur</th>
                                <th>Detail Prosedur</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($prosedur as $item)
                            <tr>
                                <td>{{ $item->nama }}</td>
                                <td><a href="#" data-bs-toggle="modal"
                                        data-bs-target="#detailProsedur{{ $item->id_prosedur }}">Detail Prosedur</a>
                                </td>
                                <td>{{ $item->status }}</td>
                                <td>
                                    <a href="/prosedur.edt/{{ $item->id_prosedur }}" class="btn btn-sm btn-warning"><i
                                            class="fas fa-edit"></i></a>
                                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#delProsedur{{ $item->id_prosedur }}"><i
                                            class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
@foreach ($prosedur as $item)
<div class="modal fade" id="delProsedur{{ $item->id_prosedur }}" tabindex="-1" aria-labelledby="delprosedurLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delprosedurLabel">Hapus Prosedur</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Ada yakin ingin menghapus data prosedur {{ $item->nama }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <a href="/prosedur.del/{{ $item->id_prosedur }}" type="button" class="btn btn-danger">Hapus</a>
            </div>
        </div>
    </div>
</div>
@endforeach

<!-- Modal -->
@foreach ($prosedur as $item)
<div class="modal fade" id="detailProsedur{{ $item->id_prosedur }}" tabindex="-1" aria-labelledby="detailProsedurLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailProsedurLabel">Detail Prosedur {{ $item->nama }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {!! $item->deskripsi !!}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection
