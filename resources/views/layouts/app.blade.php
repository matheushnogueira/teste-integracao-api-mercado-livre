<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Painel de Controle - Mercado Livre</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link
    href="https://http2.mlstatic.com/frontend-assets/ml-web-navigation/ui-navigation/5.21.22/mercadolibre/favicon.svg"
    rel="icon" />
</head>

<body class="h-screen bg-gray-100">
  <x-navbar />

  <main class="container mx-auto mt-6 px-4">
    {{ $slot }}
  </main>
</body>