@extends('layout.main')

@section('content')

<section class="page-section about-heading">
    <div class="container">
        <img class="img-fluid rounded about-heading-img mb-3 mb-lg-0" src="assets/img/about.jpg" alt="..." />
        <div class="about-heading-content">
            @foreach ($profil as $item)
            <div class="row">
                <div class="col-xl-9 col-lg-10 mx-auto">
                    <div class="bg-faded rounded p-5">
                        <h2 class="section-heading">
                            <span class="section-heading-upper mb-2">Profil Forte Pulito</span>
                            <span class="section-heading-lower">Tentang Kami</span>
                        </h2>
                        <p>{!! $item->tentang_kami !!}</p>

                        <h2 class="section-heading">
                            <span class="section-heading-lower">Visi</span>
                        </h2>
                        <p>{!! $item->visi !!}
                        </p>

                        <h2 class="section-heading ">
                            <span class="section-heading-lower">Misi</span>
                        </h2>
                        <p>
                            {!! $item->misi !!}
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
