<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <!-- Fonts -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.1/css/foundation.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        @include('inc.topbar')
        <div class="row">
            @include('inc.messages')
            @yield('content')
        </div>           
    </body>
</html>
