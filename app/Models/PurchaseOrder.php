<?php

namespace App\Models;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class PurchaseOrder extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'id_contact_supplier',
        'name_purchase_order',
        'status',
        'date_purchase_order',
        'notes_purchase_orders',
    ];
    /**
     * Casting kolom date agar otomatis menjadi objek Carbon.
     * Tanpa ini, $this->date->format() di Resource akan ERROR.
     */
    protected $casts = [
    'date_purchase_order' => 'datetime',
];

    /**
     * Get the contact that owns the PurchaseOrder
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function contact()
    {
        return $this->belongsTo(Contact::class, 'id_contact_supplier');
    }
}
