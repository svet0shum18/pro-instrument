<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $table = 'brand'; // Убедись, что имя таблицы совпадает
    protected $fillable = [
        'name', // Название категории
        'logo',
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'id_brand');
    }
}
