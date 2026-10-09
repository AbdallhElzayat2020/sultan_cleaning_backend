<!DOCTYPE html>
<html lang="en">

{{-- Head  --}}
@include('admin.layouts.head')

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>

            @include('admin.layouts.navbar')
            @include('admin.layouts.sidebar')

            <!-- Main Content -->
            <div class="main-content">

                @yield('content')

            </div>

            {{--     Footer   --}}
            @include('admin.layouts.footer')

        </div>
    </div>

    <!-- General JS Scripts -->
    @include('admin.layouts.scripts')
</body>

</html>
