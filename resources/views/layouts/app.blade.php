<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    {{-- blade-formatter-disable --}}

    <style type='text/tailwindcss'>
        label {
            @apply block uppercase
        }
    </style>

    {{-- blade-formatter-enable--}}

    @yield('styles')
</head>

<body class="container mx-auto mt-10 mb-10 max-w-lg">
    <h1 class="mb-4 text-2xl">@yield('title')</h1>
    <div>
        {{--        @if (session()->has('success')) --}}
        {{-- <div>{{ session('success') }}</div> --}}
        <div class="relative mb-10 rounded border border-green-400 bg-green-100 px-4 py-3  text-lg text-green-700" role="alert">
            <strong class="font-bold">Success!</strong>
            <div> This is a flash message!</div>
        </div>
        {{--       @endif --}}
        @yield('content')
    </div>
</body>

</html>
