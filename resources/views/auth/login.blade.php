<x-guest-layout>

  <x-auth-session-status class="mb-4" :status="session('status')" />

  <form method="POST" action="{{ route('login') }}" class="max-w-md w-full p-6 bg-white rounded-lg shadow-md">
    @csrf

    <div class="flex justify-between">
      <x-header-text :text="__('Login')" />
      <img
        src="https://http2.mlstatic.com/frontend-assets/ml-web-navigation/ui-navigation/6.6.92/mercadolibre/logo-pt__large_25years_v2.png"
        alt="Logo Mercado Livre" class="h-8">
    </div>


    <div class="mb-4">
      <x-input-label for="email" :value="__('E-mail')" />
      <x-text-input type="email" id="email" name="email" />
      <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <div class="mb-4">
      <x-input-label for="password" :value="__('Senha')" />
      <x-text-input type="password" id="password" name="password" />
      <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    <div class="flex justify-between items-center mt-4">

      <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
        href="{{ route('register') }}">
        {{ __('Não tem uma conta?') }}
      </a>

      <x-primary-button>
        {{__('Log in')}}
      </x-primary-button>

    </div>

  </form>

</x-guest-layout>