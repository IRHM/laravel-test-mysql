<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>{{ $title ?? 'Test App' }}</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
        {{ $imports ?? '' }}
    </head>
    <body>
        <section class="section">
            <div class="container">
                <h1 class="title">
                  {{ $title ?? 'Test App' }}
                </h1>
                @isset ($subtitle)
                  <p class="subtitle">
                    {{ $subtitle }}
                  </p>
                @endisset
            </div>

            <div class="container mt-5">
              {{ $slot }}
            </div>
        </section>
    </body>
</html>
