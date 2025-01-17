<?php

namespace App\Services;

use App\Http\Requests\Products\CreateProductRequest;
use App\Repositories\ProductRepository;
use Exception;

class ProductsService
{
  private ProductRepository $productsRepository;
  private FileService $fileService;
  private MercadoLivreService $mercadoLivreService;

  public function __construct(
    ProductRepository $productsRepository,
    FileService $fileService,
    MercadoLivreService $mercadoLivreService
  ) {
    $this->productsRepository = $productsRepository;
    $this->fileService = $fileService;
    $this->mercadoLivreService = $mercadoLivreService;
  }

  public function createProduct(CreateProductRequest $request)
  {
    try {
      $image = $request->hasFile('file')
        ? $this->fileService->uploadFile($request)
        : null;

      $mercadoLivreResponse = $this->mercadoLivreService->createProduct($request, $image?->url);


      if (isset($mercadoLivreResponse['cause'][0])) {
        $error = $mercadoLivreResponse['cause'][0]['message'];
        throw new Exception("Erro Mercado Livre: $error");
      }

      $data = [
        'name'           => $request->input('name'),
        'description'    => $request->input('description'),
        'price'          => $request->input('price'),
        'stock_quantity' => $request->input('stock_quantity'),
        'category_id'    => $request->input('category'),
        'file_id'        => $image?->id,
      ];

      $this->productsRepository->create($data);

      session()->flash('message', 'Produto cadastrado com sucesso! Acesse o Mercado Livre para vê-lo.');
      session()->flash('type', 'success');

      return $mercadoLivreResponse;
    } catch (Exception $e) {
      session()->flash('message', $e->getMessage());
      session()->flash('type', 'error');
      return null;
    }
  }
}
