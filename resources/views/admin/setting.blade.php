@extends('admin.layout.main')

@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-4">Setting</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Setting Profil</li>
    </ol>

    <div class="row">
        <div class="card">
            <div class="card-header">
                <i class="fas fa-user me-1"></i>
                Profil Admin
            </div>
            <div class="card-body">
                @foreach ($user as $item)
                <form>
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Admin</label>
                        <input type="text" readonly class="form-control" id="name" value="{{ $item->name }}">
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" readonly class="form-control" id="username" value="{{ $item->username }}">
                    </div>
                </form>
                @endforeach
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="card">
            <div class="card-header">
                <i class="fas fa-key me-1"></i>
                Ganti Password
            </div>
            <div class="card-body">
                <form action="/setting" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="old_password" class="form-label">Password Lama</label>
                        <input type="password" class="form-control @error('old_password') is-invalid
                        @enderror" id="old_password" name="old_password">
                        <div class="invalid-feedback">
                            Wajib Diisi | Min 5 Karakter.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password Baru</label>
                        <input type="password" class="form-control @error('password') is-invalid
                        @enderror" id="password" name="password">
                        <div class="invalid-feedback">
                            Wajib Diisi | Min 5 Karakter.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="password_confirm" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control @error('password_confirm') is-invalid
                        @enderror" id="password_confirm" name="password_confirm">
                        <div class="invalid-feedback">
                            Wajib Diisi | Min 5 Karakter.
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Ganti</button>
                </form>
            </div>
        </div>
    </div>

</div>

@endsection
