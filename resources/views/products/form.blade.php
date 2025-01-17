<x-app-layout>
  @if (session('message'))
  <x-toast :message="session('message')" :type="session('type')" />
  @endif

  <div class="flex justify-center gap-4">

    <div class="w-[50%] bg-white p-6 rounded-lg shadow">
      <x-header-text :text="__('Adicionar Produto')" />



      <form action="{{route('cadastrar-produto')}}" method="POST" enctype="multipart/form-data" novalidate>
        @csrf

        <div class="mb-4">
          <x-input-label for="name" :value="__('Nome')" />
          <x-text-input type="text" id="name" name="name" required />
          <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="mb-4">
          <x-input-label for="description" :value="__('Descrição')" />
          <x-textarea id="description" name="description" required />
          <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>

        <div class="grid grid-cols-2 gap-4 mb-4">
          <div>
            <x-input-label for="price" :value="__('Preço')" />
            <x-text-input type="number" id="price" name="price" required />
            <x-input-error :messages="$errors->get('price')" class="mt-2" />
          </div>
          <div>
            <x-input-label for="stock_quantity" :value="__('Quantidade')" />
            <x-text-input type="number" id="stock_quantity" name="stock_quantity" required />
            <x-input-error :messages="$errors->get('stock_quantity')" class="mt-2" />
          </div>
        </div>

        <div class="mb-4">
          <x-input-label for="category" :value="__('Categoria')" />
          <x-select-input id="category" name="category" required>

            @if(count($categories) > 0)

            <option value="" selected disabled>Selecione uma categoria</option>

            @foreach($categories as $category)

            <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>

            @endforeach

            @else
            <option value="" disabled>Nenhuma categoria encontrada</option>
            @endif

          </x-select-input>
          <x-input-error :messages="$errors->get('category')" class="mt-2" />
        </div>

        <div class="mb-4">
          <x-input-label for="file" :value="__('Imagem')" />
          <x-file-input id="file" name="file" required />
          <x-input-error :messages="$errors->get('file')" class="mt-2" />
        </div>
        <div class="flex justify-end items-center mt-4">

          @if(empty($oAuthToken))
          <x-primary-button disabled="true">
            {{__('Cadastrar produto')}}
          </x-primary-button>
          @else
          <x-primary-button>
            {{__('Cadastrar produto')}}
          </x-primary-button>
          @endif
        </div>

      </form>
    </div>

    <div class="w-[30%]">

      <div class="bg-white p-4 rounded-lg shadow mb-4">
        <h2 class="text-lg font-semibold text-gray-700 mb-4">Resposta da API</h2>
        <div class="h-40 bg-gray-50 rounded border border-gray-300 overflow-auto p-2">
          @if(empty($response))
          <p class="text-sm text-gray-600">Nenhuma resposta no momento.</p>
          @else
          <p class="text-sm text-gray-600">{{$response->id}}</p>
          <p class="text-sm text-gray-600">{{$response->title}}</p>
          <p class="text-sm text-gray-600">{{$response->category_id}}</p>
          <p class="text-sm text-gray-600">{{$response->status}}</p>
          @endif
        </div>
      </div>

      <div class="bg-white p-4 rounded-lg shadow">

        @if(empty($oAuthToken))

        <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 rounded">
          <p class="text-sm text-gray-700 mb-2">
            <strong>Não Conectado</strong><br>
            Para realizar o cadastro de produtos você precisa estar conectado à uma conta do Mercado Livre.
          </p>
          <a href="https://auth.mercadolivre.com.br/authorization?response_type=code&client_id={{ env('CLIENT_ID') }}&redirect_uri={{ urlencode(env('REDIRECT_URI')) }}"
            class="w-full py-2 px-4 text-sm text-white bg-yellow-500 rounded hover:bg-yellow-600 focus:outline-none">
            Realizar Login
          </a>
        </div>

        @else

        <div class="bg-green-50 border-l-4 border-green-400 p-4 rounded">
          <p class="text-sm text-gray-700 mb-2">
            <strong>Conectado com Sucesso!</strong><br>
            Agora você pode realizar o cadastro de produtos utilizando sua conta do Mercado Livre.
          </p>
        </div>

        @endif

      </div>

    </div>

  </div>
</x-app-layout>