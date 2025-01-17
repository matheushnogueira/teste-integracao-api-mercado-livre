<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Exception;

class MercadoLivreService
{
  public function createProduct(Request $request, $imageUrl)
  {
    try {
      $token = session('oAuthToken');

      $url = 'https://api.mercadolibre.com/items';

      $data = [
        "title"              => $request->input('name'),
        "category_id"        => $request->input('category'),
        "price"              => $request->input('price'),
        "currency_id"        => "BRL",
        "available_quantity" => $request->input('stock_quantity'),
        "buying_mode"        => "buy_it_now",
        "listing_type_id"    => "gold_special",
        "condition"          => "new",
        "description"        => [
          "plain_text" => $request->input('description')
        ],
        "pictures" => [
          [
            "source" => $imageUrl
          ]
        ],
        "attributes" => [
          [
            "id" => "BRAND",
            "value_name" => "Marca Mercado"
          ],
          [
            "id" => "MODEL",
            "value_name" => "Modelo Mercado"
          ],
          [
            "id" => "RECOMMENDED_AMBIENTS",
            "value_name" => "Ambiente recomendado"
          ]
        ]
      ];


      $response = Http::withoutVerifying()->withToken($token)->post($url, $data);

      return $response;
    } catch (\Exception $e) {
      throw new Exception($e->getMessage());
      Log::error('Erro ao o cadastro do produto no mercado livre: ' . $e->getMessage());
    }
  }
}
