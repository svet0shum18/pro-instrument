<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * Поля, которые можно массово назначать.
     *
     * @var array
     *
     */

    protected $table = 'category'; // Убедись, что имя таблицы совпадает
    protected $fillable = [
        'name', // Название категории
    ];

    /**
     * Отношение "один ко многим" с моделью Product.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany(Product::class, 'id_category');
    }
}
