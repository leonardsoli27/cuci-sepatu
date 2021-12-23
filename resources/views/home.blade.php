@extends('layout.main')

@section('content')

@foreach ($promosi as $item)
<section class="page-section clearfix">
    <div class="container">
        <div class="intro">
            <img class="intro-img img-fluid mb-3 mb-lg-0 rounded" src="{{ asset('Image/' . $item->gambar) }}"
                alt="..." />
            <div class="intro-text left-0 text-center bg-faded p-5 rounded">
                <h2 class="section-heading mb-4">
                    <span class="section-heading-upper">Promosi Forte Pulito</span>
                    <span class="section-heading-lower">Promosi {{ $item->nama }}</span>
                </h2>
                {!! $item->deskripsi !!}
            </div>
        </div>
    </div>
    </div>
</section>
@endforeach

@endsection
