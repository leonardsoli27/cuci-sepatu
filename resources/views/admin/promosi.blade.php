@extends('admin.layout.main')

@section('promosi', 'active')

@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-4">Promosi</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Daftar Promosi</li>
    </ol>
    <a href="{{ url('/promosi.tbh') }}" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Tambah Promosi</a>
    <div class="row">
        <div class="col-lg">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Daftar Promosi
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Nama Promosi</th>
                                <th>Deskripsi</th>
                                <th>Gambar</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($promosi as $item)
                            <tr>
                                <td>{{ $item->nama }}</td>
                                <td><a href="#" data-bs-toggle="modal"
                                        data-bs-target="#detailPromosi{{ $item->id_promosi }}">Detail Deskripsi</a></td>
                                <td><a href="#" data-bs-toggle="modal"
                                        data-bs-target="#gamPromosi{{ $item->id_promosi }}">{{ $item->gambar }}</a>
                                </td>
                                <td>{{ $item->status }}</td>
                                <td>
                                    <a href="/promosi.edt/{{ $item->id_promosi }}" class="btn btn-sm btn-warning"><i
                                            class="fas fa-edit"></i></a>
                                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#delPromosi{{ $item->id_promosi }}"><i
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
@foreach ($promosi as $item)
<div class="modal fade" id="delPromosi{{ $item->id_promosi }}" tabindex="-1" aria-labelledby="delPromosiLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delPromosiLabel">Hapus Promosi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Ada yakin ingin menghapus data promosi {{ $item->nama }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <a href="/promosi.del/{{ $item->id_promosi }}" type="button" class="btn btn-danger">Hapus</a>
            </div>
        </div>
    </div>
</div>
@endforeach

<!-- Modal -->
@foreach ($promosi as $item)
<div class="modal fade" id="detailPromosi{{ $item->id_promosi }}" tabindex="-1" aria-labelledby="detailPromosiLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailPromosiLabel">Detail Promosi {{ $item->nama }}</h5>
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

<!-- Modal -->
@foreach ($promosi as $item)
<div class="modal fade" id="gamPromosi{{ $item->id_promosi }}" tabindex="-1" aria-labelledby="gamPromosiLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="gamPromosiLabel">Gambar Promosi {{ $item->nama }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img style="width: 450px; height: 400px;" src="{{ asset('Image/' . $item->gambar) }}" alt="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection
