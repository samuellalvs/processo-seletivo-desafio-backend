<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="shortcut icon" type="image/jpg" href={{asset('favicon.ico')}} />

    <link rel="stylesheet" href={{asset('/assets/css/global.css')}}>
    <link rel="stylesheet" href={{asset('/assets/css/loader.css')}}>

    <title>@yield('title') - Desafio PicPay</title>

    @yield('styles')
</head>

<body>
    <div class="root">

        @yield('content')

    </div>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src={{asset('/assets/js/services/api.js')}}></script>
    @yield('scripts')

</body>

</html>