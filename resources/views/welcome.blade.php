<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Shorty</title>

    @vite(['resources/js/app.js'])

</head>

<body class="antialiased bg-gray-900 text-white">
    <div id="app"></div>
</body>

</html>
