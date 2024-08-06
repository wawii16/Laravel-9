<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <title>@yield('$pageTitle', 'Dashboard')</title>

    @include('includes.head')
</head>

<body class="h-full">
    <div class="min-h-full">
        @include('includes.navbar')
        @if (session('message'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif


        <header class="bg-white shadow">
            <title>@yield('$pageTitle', 'Dashboard')</title>

            @include('includes.header')
        </header>
        <!-- Header -->
        <main>
            @include('sweetalert::alert')

            @yield('content')
        </main>
    </div>
    <script>

    </script>


</body>

</html>