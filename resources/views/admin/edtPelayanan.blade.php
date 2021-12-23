@extends('admin.layout.main')

@section('pelayanan', 'active')

@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-4">Pelayanan</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Edit Pelayanan</li>
    </ol>

    <div class="row">
        <div class="col-lg">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-concierge-bell"></i>
                    Edit Pelayanan
                </div>
                <div class="card-body">
                    @foreach ($pelayanan as $item)
                    <form action="{{ route('edtPelayanan') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input name="id_pelayanan" type="hidden" value="{{ $item->id_layanan }}">
                        <div class="mb-3">
                            <label for="nama_pelayanan" class="form-label">Nama Pelayanan</label>
                            <input type="text" class="form-control @error('nama_pelayanan') is-invalid
                            @enderror" name="nama_pelayanan" id="nama_pelayanan" value="{{ $item->nama }}">
                            <div class="invalid-feedback">
                                Wajib Diisi | Min 5 Karakter.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="text" class="form-control @error('harga') is-invalid
                            @enderror" name="harga" id="harga" value="{{ $item->harga }}">
                            <div class="invalid-feedback">
                                Wajib Diisi.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="gambar_pelayanan" class="form-label">Gambar Pelayanan</label>
                            @if ($item->gambar)
                            <img class="lihat-gambar img-fluid mb-3 col-sm-5 d-block"
                                src="{{ asset('Image/' . $item->gambar) }}">
                            @else
                            <img class="lihat-gambar img-fluid mb-3 col-sm-5">
                            @endif
                            <input class="form-control @error('gambar_pelayanan') is-invalid
                            @enderror" type="file" onchange="tampilGambar()" id="gambar_pelayanan"
                                name="gambar_pelayanan">
                            <div class="invalid-feedback">
                                Wajib Diisi | Format file jpg, jpeg, png.
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Edit</button>
                        <a href="/pelayanan" class="btn btn-danger">Kembali</a>
                    </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('textarea')
<script>
    tinymce.init({
        selector: '#deskripsi',
        height: 300,
    });

</script>
@endsection

@section('lihat-gambar')

<script>
    function tampilGambar() {
        const image = document.querySelector('#gambar_pelayanan');
        const lihatImg = document.querySelector('.lihat-gambar');

        lihatImg.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function (oFREvent) {
            lihatImg.src = oFREvent.target.result;
        }
    }

</script>

@endsection
