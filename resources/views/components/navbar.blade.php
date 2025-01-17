<header class="bg-white shadow">
  <div class="container mx-auto px-4 py-4 flex items-center justify-between">
    <h1 class="text-lg font-semibold text-gray-800 flex items-center">
      <img
        src="https://http2.mlstatic.com/frontend-assets/ml-web-navigation/ui-navigation/6.6.92/mercadolibre/logo-pt__large_25years_v2.png"
        alt="Logo Mercado Livre" class="h-8 mr-2">
      Painel de Controle
    </h1>
    <div class="flex justify-between items-center">
      <div class="text-gray-600 mr-10">{{ Auth::user()->name }}</div>


      <form method="POST" action="{{ route('logout') }}">
        @csrf

        <x-primary-button onclick="event.preventDefault(); this.closest('form').submit();">
          {{__('Sair')}}
        </x-primary-button>

      </form>

    </div>
  </div>
</header>