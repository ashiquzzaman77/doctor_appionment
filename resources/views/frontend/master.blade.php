<!doctype html>
<html lang="en">


@include('frontend.partials.head')

<body>

    @include('frontend.partials.header')


    <main>

        @yield('main')

    </main>



    @include('frontend.partials.footer')

    @include('frontend.partials.script')

</body>

</html>
