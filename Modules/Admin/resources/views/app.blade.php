<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title inertia>{{ 'Admin Panel' }}</title>

    @viteReactRefresh
    {{-- refactor this to a utility or helper function to use it globally because it works when using laravel-modules --}}
    @if (file_exists(public_path('admin-default-vite.hot')))
        <script type="module" src="http://localhost:5173/resources/js/app.tsx"></script>
    @else
        {{ Vite::useHotFile('../../public/admin-default-vite.hot')->useBuildDirectory('build/admin')->withEntryPoints(['resources/js/app.tsx']) }}
    @endif
    @inertiaHead
</head>

<body>
    @inertia
</body>

</html>
