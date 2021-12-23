@extends('layout.main')

@section('content')

<section class="page-section about-heading">
    <div class="container">
        <img class="img-fluid rounded about-heading-img mb-3 mb-lg-0" src="assets/img/about.jpg" alt="..." />
        <div class="about-heading-content">
            <div class="row">
                <div class="col-xl-9 col-lg-10 mx-auto">
                    <div class="bg-faded rounded p-5">
                        <h2 class="section-heading mb-4">
                            <span class="section-heading-upper">Forte Pulito</span>
                            <span class="section-heading-lower">Kontak Kami</span>
                        </h2>
                        @foreach ($profil as $item)
                        <div class="row">
                            <div class="col-auto">
                                <i class="fas fa-house-user mt-sm-3"></i>
                            </div>
                            <div class="col-auto">
                                <p>{!! $item->alamat !!}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-auto">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div class="col-auto">
                                <p>{{ $item->no_hp }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-auto">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="col-auto">
                                <p>{{ $item->email }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
