<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Music Library</title>

    <link href="/css/app.css" rel="stylesheet">
</head>

<body>
    @include('layouts.navtop')

    <div class="container-fluid">
        <div class="row">
            @include('layouts.navleft')

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">
                        @yield('header')
                    </h1>
                </div>

                @yield('content')
            </main>
        </div>
    </div>

    @include('layouts.footer')

    @yield('footer')
</body>
</html>
