<?php

namespace App\Http\Requests\Products;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
{
  public function rules(): array
  {
    return [
      'name'           => 'required|string|max:255',
      'description'    => 'required|string',
      'price'          => 'required|numeric|min:0',
      'stock_quantity' => 'required|integer|min:1',
      'category'       => 'required',
      'file'           => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
    ];
  }

  public function messages(): array
  {
    return [
      'name.required'           => 'O nome do produto é obrigatório.',
      'description.required'    => 'A descrição é obrigatória.',
      'price.required'          => 'O preço é obrigatório.',
      'stock_quantity.required' => 'A quantidade é obrigatório.',
      'category.required'       => 'A categoria selecionada não é válida.',
      'file.mimes'              => 'A imagem deve ser um arquivo JPG ou PNG.',
    ];
  }
}
