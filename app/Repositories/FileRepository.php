<?php

namespace App\Repositories;

use App\Models\File;

class FileRepository
{
  public function store(array $data)
  {
    return File::create($data);
  }
}
