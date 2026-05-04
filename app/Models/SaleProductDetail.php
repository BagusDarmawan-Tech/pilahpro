<?php

namespace App\Models;

use App\Models\PurchaseOrder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class SaleProductDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "sale_product_details";
    protected $fillable = [
        "id_purchase_order",
        "id_type_product",
        "id_sale_product",
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
    public function purchase_order(): BelongsTo
    {
        return $this->belongsTo(PurchaseOrder::class, 'id_purchase_order', 'id');
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

    /**
     * Get the saleProduct that owns the SaleProductDetail
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sale_product(): BelongsTo
    {
        return $this->belongsTo(SaleProduct::class, 'id_sale_product','id');
    }


}
