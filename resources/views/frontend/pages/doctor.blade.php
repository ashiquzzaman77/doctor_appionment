@extends('frontend.master')
@section('main')
    <style>
        .btn-gradient {
            background: linear-gradient(to right, #6a11cb, #2575fc);
            color: white;
            /* Ensures the text remains readable */
        }

        .btn-gradient:hover {
            background: linear-gradient(to right, #2575fc, #6a11cb);
        }
    </style>
    <section class="container-fluid"
        style="background-image: url('{{ 'frontend/15292559_5544562.jpg' }}'); background-size: cover; background-position: center; height: 600px;">
    </section>

    <section class="container" style="margin-bottom: 120px; margin-top: 50px;">

        <div class="text-center mx-auto">
            <h2 class="mb-5">All Doctors</h2>
        </div>


        <div class="row row-cols-1 row-cols-md-2 g-4">

            @forelse ($doctors as $doctor)

            @php
                $practiceDays = $doctor->practice_day ? json_decode($doctor->practice_day) : [];
            @endphp

                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card h-100">

                        <img src="https://ui-avatars.com/api/?name={{ urlencode($doctor->name) }}&background=243642&color=ffffff"
                            class="card-img-top" alt="...">

                        <div class="card-body">
                            <h4 class="card-title">{{ $doctor->name }}</h4>

                            <p class="text-muted mb-0">Parctice Day : <span
                                    class="fw-bold">{{ (is_array($practiceDays) ? implode(', ', $practiceDays) : $practiceDays) }}</span></p>

                            <p class="text-muted">Visiting Hour : <span class="fw-bold">{{ $doctor->visiting_hour }}</span>
                            </p>
                            <p class="card-text">This is a longer card with supporting text below as a natural lead content.
                            </p>
                            <a href="{{ route('appointment') }}" class="btn btn-primary rounded-0"
                                style="background: linear-gradient(to right, #6a11cb, #2575fc);">Get Appointment</a>

                        </div>
                    </div>
                </div>
            @empty
            @endforelse

        </div>


    </section>
@endsection
