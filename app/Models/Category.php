<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'text',
        'preview_image',
        'page_title',
        'meta_description',
        'meta_keywords',
        'display_order',
        'active'
    ];

    protected $casts = [
        'name' => 'string',
        'text' => 'string',
        'preview_image' => 'string',
        'page_title' => 'string',
        'meta_description' => 'string',
        'meta_keywords' => 'string',
        'display_order' => 'int',
        'active' => 'bool',
    ];
}
