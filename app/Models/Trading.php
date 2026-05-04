<?php

namespace App\Models;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Trading extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'trading';
    protected $fillable = [
        "trading_date",
        "name_trading",
        "grand_total",
        "id_contact_buyer"
    ];

    protected $casts = [
        'trading_date' => 'date:Y-m-d',
    ];

    public function buyer()
    {
        return $this->belongsTo(Contact::class, 'id_contact_buyer');
    }
}
