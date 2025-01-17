<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

use App\Services\FileService;
use App\Services\MercadoLivreService;
use App\Services\OAuthService;
use App\Services\ProductsService;

use App\Http\Requests\Products\CreateProductRequest;

class ProductsController extends Controller
{


  private ProductsService $productsService;
  private OAuthService $oAuthService;

  public function __construct(
    ProductsService $productsService,
    OAuthService $oAuthService
  ) {
    $this->productsService = $productsService;
    $this->oAuthService = $oAuthService;
  }

  public function create(): View
  {
    $oAuthToken = '';

    if (session()->has('oAuthToken')) {
      $oAuthToken = session('oAuthToken');
    }

    $response = Http::withOptions(['verify' => false])->get('https://api.mercadolibre.com/sites/MLB/categories');

    $categories = $response->json();

    return view('products.form', ['categories' => $categories, 'oAuthToken' => $oAuthToken]);
  }


  public function createOAuthToken(Request $request)
  {
    $code = $request->query('code');

    $this->oAuthService->authenticate($code);

    return redirect('/produtos');
  }

  public function createProduct(CreateProductRequest $request)
  {

    $response = $this->productsService->createProduct($request);

    if ($response === null) {
      return redirect('/produtos');
    } else {
      return redirect('/produtos')->with('response', $response->json());
    }
  }
}
