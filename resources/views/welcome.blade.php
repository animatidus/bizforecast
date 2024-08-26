<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>BizForecast</title>

        @vite('resources/css/app.css')

    </head>
    <body>
        @vite('resources/js/app.js')
        <div id="app">

        </div>
    </body>
</html>
