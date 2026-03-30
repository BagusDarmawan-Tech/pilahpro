<?php

namespace App\Models;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Securitas extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name_securitas','code_securitas'];



    /**
     * Get all of the comments for the Securitas
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contacts(): HasMany
    {
        return $this->hasMany(Contact::class, 'id_securitas', 'id');
    }

}
