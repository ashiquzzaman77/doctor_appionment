<!DOCTYPE html>

<html lang="en">


@include('admin.layouts.head')

<body>
    <div class="main-wrapper">

        <!-- partial:partials/_sidebar.html -->
        @include('admin.layouts.sidebar')
        <!-- partial -->

        <div class="page-wrapper">

            <!-- partial:partials/_navbar.html -->
            @include('admin.layouts.header')
            <!-- partial -->

            {{ $slot }}

            <!-- partial:partials/_footer.html -->
            @include('admin.layouts.footer')
            <!-- partial -->

        </div>
    </div>

    
    <!-- End custom js for this page -->

    @include('admin.layouts.script')

</body>

</html>
