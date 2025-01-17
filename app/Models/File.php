<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class File extends Model
{
  use HasFactory, SoftDeletes;

  protected $fillable = [
    'url',
    'file_name',
    'file_path',
    'mime_type',
    'size',
  ];

  public $timestamps = true;

  protected $dates = ['deleted_at'];
}
