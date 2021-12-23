@extends('layout.main')

@section('content')
<section class="page-section about-heading">
    <div class="container">
        <div class="about-heading-content">
            @foreach ($prosedur as $item)
            <div class="row">
                <div class="col-xl-9 col-lg-10 mx-auto mt-3">
                    <div class="bg-faded rounded p-5">
                        <h2 class="section-heading mb-4">
                            <span class="section-heading-upper">Prosedur Forte Pulito</span>
                            <span class="section-heading-lower">{{ $item->nama }}</span>
                        </h2>
                        {!! $item->deskripsi !!}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
