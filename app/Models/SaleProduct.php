<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SaleProduct extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'sale_products';
    protected $fillable = [
        "date_sale_product",
        "name_sale_product",
        "grand_total",
        "id_contact_buyer"
    ];

    protected $casts = [
        'date_sale_product' => 'datetime',
    ];

    public function buyer()
    {
        return $this->belongsTo(Contact::class, 'id_contact_buyer');
    }

    /**
     * Get all of the sale_product for the SaleProduct
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sale_product()
    {
        return $this->hasMany(SaleProductDetail::class, 'id_sale_product','id');
    }
}
