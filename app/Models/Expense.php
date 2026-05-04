<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Expense extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'expenses';
    protected $fillable = [
        'name_expense',
        'note_expense',
        'id_trading',
        'id_sale_product',
        'id_purchase_order',
        'price_expense'
    ];

    /**
     * Get the trading that owns the Expense
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function trading(): BelongsTo
    {
        return $this->belongsTo(Trading::class, 'id_trading', 'id');
    }

    /**
     * Get the sale that owns the Expense
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sale(): BelongsTo
    {
        return $this->belongsTo(SaleProduct::class, 'id_sale_product', 'id');
    }

    /**
     * Get the purchase that owns the Expense
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function purchase(): BelongsTo
    {
        return $this->belongsTo(PurchaseOrder::class, 'id_purchase_order', 'id');
    }

}
