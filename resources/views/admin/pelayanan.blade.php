@extends('admin.layout.main')

@section('pelayanan', 'active')

@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-4">Pelayanan</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Pelayanan Perusahaan</li>
    </ol>

    <a href="{{ url('/pelayanan.tbh') }}" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Tambah
        Layanan</a>
    <div class="row">
        <div class="col-lg">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Daftar Layanan
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Nama Pelayanan</th>
                                <th>Harga Pelayanan</th>
                                <th>Status</th>
                                <th>Gambar</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pelayanan as $item)
                            <tr>
                                <td>{{ $item->nama }}</td>
                                <td>Rp. {{ number_format($item->harga) }}</td>
                                <td>{{ $item->status }}</td>
                                <td><a href="#" data-bs-toggle="modal"
                                        data-bs-target="#gamPelayanan{{ $item->id_layanan }}">Gambar Layanan</a>
                                </td>
                                <td>
                                    <a href="/pelayanan.edt/{{ $item->id_layanan }}" class="btn btn-sm btn-warning"><i
                                            class="fas fa-edit"></i></a>
                                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#delPelayanan{{ $item->id_layanan }}"><i
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
@foreach ($pelayanan as $item)
<div class="modal fade" id="delPelayanan{{ $item->id_layanan }}" tabindex="-1" aria-labelledby="delPelayananLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delPelayananLabel">Hapus pelayanan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Ada yakin ingin menghapus data pelayanan {{ $item->nama }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <a href="/pelayanan.del/{{ $item->id_layanan }}" type="button" class="btn btn-danger">Hapus</a>
            </div>
        </div>
    </div>
</div>
@endforeach

<!-- Modal -->
@foreach ($pelayanan as $item)
<div class="modal fade" id="gamPelayanan{{ $item->id_layanan }}" tabindex="-1" aria-labelledby="gamPelayananLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="gamPelayananLabel">Gambar pelayanan {{ $item->nama }}</h5>
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
