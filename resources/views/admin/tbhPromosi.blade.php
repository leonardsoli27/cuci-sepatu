@extends('admin.layout.main')

@section('promosi', 'active')

@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-4">Promosi</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Tambah Promosi</li>
    </ol>

    <div class="row">
        <div class="col-lg">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-percentage me-1"></i>
                    Tambah Promosi
                </div>
                <div class="card-body">
                    <form action="{{ route('tbhPromosi') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="nama_promosi" class="form-label">Nama Promosi</label>
                            <input type="text" class="form-control  @error('nama_promosi') is-invalid
                            @enderror" name="nama_promosi" id="nama_promosi">
                            <div class="invalid-feedback">
                                Wajib Diisi | Min 5 Karakter.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" class="@error('deskripsi') is-invalid
                            @enderror" id="deskripsi"></textarea>
                            <div class="invalid-feedback">
                                Wajib Diisi | Min 10 Karakter.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="gambar_promosi" class="form-label">Gambar Promosi</label>
                            <img class="lihat-gambar img-fluid mb-3 col-sm-5">
                            <input class="form-control  @error('gambar_promosi') is-invalid
                            @enderror" type="file" onchange="tampilGambar()" name="gambar_promosi" id="gambar_promosi">
                            <div class="invalid-feedback">
                                Wajib Diisi | Format file jpg, jpeg, png.
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="/promosi" class="btn btn-danger">Kembali</a>
                    </form>
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
        const image = document.querySelector('#gambar_promosi');
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
