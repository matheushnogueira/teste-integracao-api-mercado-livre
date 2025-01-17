<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Exception;

class OAuthService
{
  public function authenticate(string $code)
  {
    try {
      $response = Http::withoutVerifying()->post('https://api.mercadolibre.com/oauth/token', [
        'grant_type'    => 'authorization_code',
        'client_id'     => env('CLIENT_ID'),
        'client_secret' => env('SECRET_KEY'),
        'code'          => $code,
        'redirect_uri'  => env('REDIRECT_URI'),
      ]);

      session(['oAuthToken' => $response->json()['access_token']]);

      session()->flash('message', 'Autenticação realizada com sucesso!');
      session()->flash('type', 'success');
    } catch (Exception $e) {
      session()->flash('message', 'Erro ao autenticar com o Mercado Livre.');
      session()->flash('type', 'error');
    }
  }
}
