<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Music Library</title>

    <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons' rel="stylesheet">
    <link href="/css/app.css" rel="stylesheet">
</head>

<body>
    <form method="POST" action="/login">
        @csrf
        <div id="app">
            <login/>
        </div>
    </form>

    <script type="text/javascript" src="/js/app.js"></script>
</body>
</html>
