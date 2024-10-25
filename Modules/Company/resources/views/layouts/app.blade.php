<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    {{ module_vite('build/company', 'resources/assets/css/app.css') }}
    {{ module_vite('build/company', 'resources/assets/js/app.js') }}
</head>
<body class="flex">

    @include('company::body.sidebar')  <!-- Sidebar -->

    <div class="flex-grow ml-64 transition-all duration-300" id="mainContent">
        @include('company::body.header')  <!-- Header -->

        <!-- Main content goes here -->
        <main class="p-4">
            @yield('content')
        </main>

        @include('company::body.footer')  <!-- Footer -->
    </div>

    <!-- Scripts -->
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const sidebarToggle = document.querySelector(".sidebar-toggle");
            const sidebarMenu = document.querySelector("#sidebarMenu");
            const mainContent = document.querySelector("#mainContent"); // Main content div

            // Function to toggle sidebar visibility
            function toggleSidebar() {
                sidebarMenu.classList.toggle("hidden"); // Show or hide the sidebar
                mainContent.classList.toggle("ml-64"); // Adjust the main content margin
            }

            // Event listener for the sidebar toggle button
            sidebarToggle.addEventListener("click", function (e) {
                e.preventDefault();
                toggleSidebar();
            });
        });
    </script>
</body>
</html>
