<!DOCTYPE html>
<html lang="EN">

@include('layout.head')

<body>
    @include('layout.nav')
    <div class="container py-4">

        {{-- Page Content --}}

        @yield('content')

    </div>


    <footer class="text-center">
        <p class="m-3 h3">&copy; Copyright {{ date('Y') }} | Created By Shaun</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>
