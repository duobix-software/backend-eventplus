<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title inertia>{{ "Admin Panel" }}</title>

    {{-- {{
        Vite::useHotFile('../../public/admin-default-vite.hot')
            ->useBuildDirectory('build/admin')
            ->withEntryPoints([ 'app/resources/assets/css/app.css'])
    }} --}}

    @viteReactRefresh
    {{ module_vite('build/admin', 'resources/assets/css/app.css') }}
    {{ module_vite('build/admin', 'resources/assets/js/app.tsx') }}
    @inertiaHead
</head>

<body class="bg-blue-800">
    @inertia
</body>

</html>
