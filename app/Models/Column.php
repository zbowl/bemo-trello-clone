<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Column extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
    ];

    /**
     * Card Table Relationship
     *     title: string
     *     description: string
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cards(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Card::class);
    }

    /**
     * User Table Relationship
     *     name: string
     *     email: string
     *     columns: HasMany
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
