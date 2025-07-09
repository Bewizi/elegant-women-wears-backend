<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $incrementing = false;

    public $table = 'products';

    protected $keyType = 'string';
    //
    protected $fillable = [
        'name',
        'description',
        'details',
        'price',
        'image',
        'inStock',
        'rating',
    ];

    public static function getProductById($id)
    {
        return self::find($id);
    }
}
