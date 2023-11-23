<!DOCTYPE html>
<html lang="en">

<head data-baseurl="{{ URL::to('/') }}">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
        content="width=device-width, content=user-scalable=yes, initial-scale=1.0, maximum-scale=5, minimum-scale=1.0">
    <!-- Meta Information -->
    <meta name="keywords" content="@yield('meta_keyword')" />
    <meta name="description" content="@yield('meta_description')" />
    <meta property="og:title" content="Reliant Tours - Your trusted travel service provider | Reliant Tours">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ $siteSettingData->logo->image ?? '' }}">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:site_name" content="Online Tour Travel Agencies">
    <meta property="og:description" content="Online Tour Travel Agencies . Save money, save time" />
    <meta name="twitter:card" content="{{ $siteSettingData->logo->image ?? '' }}">

    <!-- Favicon Icon -->
    <link rel='icon' type='image/png' sizes='32x32'
        href="{{ $siteSettingData->favicon->image ?? asset('images/min_soft_dark.png') }}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="base-url" content="{{ URL::to('/') }}" />

    <script>
        window.laravel = {
            csrfToken: '{{ csrf_token() }}',
            baseurl: '{{ URL::to('/') }}'
        }
    </script>
    <title>@yield('title')</title>

    <!-- all css file -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css'>
    @yield('style')
    <!-- all css file -->

</head>

<body>


    <div id="app">
        <div class="container">
            <website />
        </div>
    </div>
    <!-- all script file -->
    @vite(['resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- all script file -->
    @yield('script')


</body>

</html>
