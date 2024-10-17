@extends('frontend.master')
@section('main')
    <section class="container-fluid"
        style="background-image: url('{{ 'frontend/15292559_5544562.jpg' }}'); background-size: cover; background-position: center; height: 600px;">
    </section>

    <section class="container" style="margin-bottom: 120px; margin-top: 50px;">

        <div class="text-center mx-auto">
            <h2 class="mb-5">All Doctors</h2>
        </div>


        <div class="row row-cols-1 row-cols-md-2 g-4">

            @forelse ($doctors as $doctor)
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card h-100">

                    <img src="https://ui-avatars.com/api/?name={{ urlencode($doctor->name) }}&background=243642&color=ffffff" class="card-img-top" alt="...">

                    <div class="card-body">
                        <h5 class="card-title">{{ $doctor->name }}</h5>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to
                            additional content. This content is a little bit longer.</p>
                        <button class="btn btn-primary rounded-0">See Details</button>
                    </div>
                </div>
            </div>
            @empty
                
            @endforelse

        </div>


    </section>
@endsection
