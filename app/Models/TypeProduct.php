<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;



class TypeProduct extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'type_products';

    protected $fillable = [
        "name_product",
        "note_product",
    ];

    /**
     * Get all of the type product for the TypeProduct
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function  type_product(): HasMany
    {
        return $this->hasMany(TypeProduct::class, 'id_type_product', 'id');
    }
}
