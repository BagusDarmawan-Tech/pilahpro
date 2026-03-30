<?php

namespace App\Models;

use App\Models\Securitas;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'contacts';
    protected $fillable = [
        'name_contact',
        'number_contact',
        'addres_contact',
        'number_account_contact',
        'id_securitas',
        'notes_contacts',
    ];

    /**
     * Get the securitas that owns the Contact
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function securitas(): BelongsTo
    {
        return $this->belongsTo(Securitas::class, 'id_securitas', 'id');
    }

    /**
     * Get all of the purchase_orders for the Contact
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    // public function purchase_orders(): HasMany
    // {
    //     return $this->hasMany(PurchaseOrder::class, 'foreign_key', 'local_key');
    // }

}
