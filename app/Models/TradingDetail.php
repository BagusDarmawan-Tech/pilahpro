<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TradingDetail extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "trading_details";
    protected $fillable = [
        "id_trading",
        "id_type_product",
        "weight_product",
        "price_product",
        "total_price_product",
        "total_bag_sale_product",
    ];

    /**
     * Get the purchaseOrder that owns the SaleProductDetail
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function trading(): BelongsTo
    {
        return $this->belongsTo(Trading::class, 'id_trading', 'id');
    }

    /**
     * Get the typeProduct that owns the SaleProductDetail
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function type_product(): BelongsTo
    {
        return $this->belongsTo(TypeProduct::class, 'id_type_product', 'id');
    }

}
