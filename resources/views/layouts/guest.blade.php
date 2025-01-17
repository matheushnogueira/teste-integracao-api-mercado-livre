<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link
    href="https://http2.mlstatic.com/frontend-assets/ml-web-navigation/ui-navigation/5.21.22/mercadolibre/favicon.svg"
    rel="icon" />
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Login</title>

  @vite('resources/css/app.css')
</head>

<body class="h-screen bg-gray-100">

  <div class="flex items-center justify-center h-full">
    {{ $slot }}
  </div>

</body>

</html>