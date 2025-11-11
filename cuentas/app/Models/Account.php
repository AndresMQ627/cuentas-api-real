<?php

namespace App\Models;

// Un Account pertenece a un User y tiene muchas Transactions.
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Account extends Model
{
    use HasFactory;

    protected $guarded = [];
protected $table = 'accounts';
protected $fillable = ['name', 'amount', 'status', 'user_id'];
    public function user(){
        return $this->hasOne (User::class,'id','user_id');
    }

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }

}