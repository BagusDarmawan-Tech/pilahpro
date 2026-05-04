<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PurchaseTrip extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'purchase_trips';

    protected $fillable = [
        "note_purchase_trip",
        "id_purchase_order",
        "weight_gross",
        "date_purchase_trip",
        "price_per_kg",
        "total_paid",
        "total_bag_purchase_product",
        "location_trip",
    ];

    protected $casts = [
        'date_purchase_trip' => 'date',
    ];
     /**
     * Get the contact that owns the PurchaseOrder
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function purchase_order()
    {
        return $this->belongsTo(PurchaseOrder::class, 'id_purchase_order', 'id');
    }

}
