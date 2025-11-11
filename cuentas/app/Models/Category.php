<?php

namespace App\Models;

// Una Category pertenece a un User y tiene muchas Transactions.
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];
protected $table = 'categories';
protected $fillable = ['name', 'type', 'user_id'];
    public function user(): BelongsTo
    {
        return $this-> belongsTo (User::class);
    
    }
    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }
}