<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>WEATHER</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <link rel="stylesheet" href="/css/main.css">
        <script src="/js/app.js" defer> </script>
       
    </head>
    <body class="bg-gray-500">
        <div class="flex item-center justify-between font-semibold text-xl ml-2 mt-4">
            <div></div>
            <div class="mr-2 ">
                @if (Route::has('login'))
                    <div class="top-right links">
                        @auth
                            <a href="{{ url('/home') }}"></a>
                        @else
                            <a href="{{ route('login') }}" class="mr-2 mt-2 bg-gray-300 border-2 border-gray-600 rounded-lg p-2 ">Login</a>
    
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="mr-2 mt-2 bg-gray-300 border-2 border-gray-600  rounded-lg p-2 ">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
     
            </div>

        </div>
    </body>
</html>
