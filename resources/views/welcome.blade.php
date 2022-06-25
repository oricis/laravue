<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="{{ route('web.products.index') }}">Productos (web)</a>
                    <a href="{{ route('api.products.index') }}">Productos (api)</a>

                    <a href="https://github.com/oricis/laravue" target="_blanck" rel="nofollow noopener">Código en GitHub</a>
                </div>
            </div>
        </div>
    </body>
</html>
