<header>

    <section class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-secondary text-white">

            <div class="container p-3">
                <a class="navbar-brand text-white" href="#">Doctor Appointment</a>
                <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                        <li class="nav-item">
                            <a class="nav-link active text-white" aria-current="page" href="{{ route('homepage') }}">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('doctor') }}">Doctor</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('appointment') }}">Appointment</a>
                        </li>
                        
                    </ul>
                </div>
            </div>


        </nav>



    </section>

</header>