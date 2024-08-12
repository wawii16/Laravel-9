<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <title>@yield('$pageTitle', 'Dashboard')</title>

    

    @include('includes.head')
</head>

<body class="h-full">
    <div class="min-h-full">
        @include('includes.sidebar') <!-- Include the sidebar here -->

        @include('includes.navbar')
        @if (session('message'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif


        <header class="bg-slate-100">
            <title>@yield('$pageTitle', 'Dashboard')</title>

            @include('includes.header')
        </header>
        <!-- Header -->
        <main id="main-content" class="ml-[240px] bg-slate-100 h-screen">
            @include('sweetalert::alert')

            @yield('content')
        </main>
    </div>
    <script>
document.addEventListener('DOMContentLoaded', () => {
    const sidebar = document.getElementById('sidebar');
    const menuIcon = document.getElementById('menu-icon');
    const navbar = document.getElementById('navbar');
    const header = document.getElementById('header');
    const mainContent = document.getElementById('main-content');

    // Function to toggle sidebar visibility
    function toggleSidebar() {
        if (sidebar.classList.contains('hidden')) {
            sidebar.classList.remove('hidden');
            sidebar.classList.add('block');
            navbar.classList.remove('ml-[0]');
            navbar.classList.add('ml-[240px]');
            header.classList.remove('ml-[0]');
            header.classList.add('ml-[240px]');
            mainContent.classList.remove('ml-[0]');
            mainContent.classList.add('ml-[240px]');
            localStorage.setItem('sidebar', 'visible');
        } else {
            sidebar.classList.remove('block');
            sidebar.classList.add('hidden');
            navbar.classList.remove('ml-[240px]');
            navbar.classList.add('ml-[0]');
            header.classList.remove('ml-[240px]');
            header.classList.add('ml-[0]');
            mainContent.classList.remove('ml-[240px]');
            mainContent.classList.add('ml-[0]');
            localStorage.setItem('sidebar', 'hidden');
        }
    }

    // Add click event listener to menu icon
    menuIcon.addEventListener('click', toggleSidebar);

    // Check localStorage to set initial state
    const sidebarState = localStorage.getItem('sidebar');
    if (sidebarState === 'hidden') {
        sidebar.classList.add('hidden');
        sidebar.classList.remove('block');
        navbar.classList.remove('ml-[240px]');
        navbar.classList.add('ml-[0]');
        header.classList.remove('ml-[240px]');
        header.classList.add('ml-[0]');
        mainContent.classList.remove('ml-[240px]');
        mainContent.classList.add('ml-[0]');
    } else {
        sidebar.classList.add('block');
        sidebar.classList.remove('hidden');
        navbar.classList.remove('ml-[0]');
        navbar.classList.add('ml-[240px]');
        header.classList.remove('ml-[0]');
        header.classList.add('ml-[240px]');
        mainContent.classList.remove('ml-[0]');
        mainContent.classList.add('ml-[240px]');
    }
});

    </script>
    
    


</body>

</html>