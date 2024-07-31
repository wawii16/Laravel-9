<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    @include('includes.head')
</head>

<body class="h-full">
    <div class="min-h-full">


        <header class="bg-white shadow">
            @include('includes.header')
        </header>
        <!-- Header -->
        <main>
            @yield('content')
        </main>
    </div>
    <script>

    </script>


</body>

</html>