<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Recipe extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "recipes";

    protected $fillable = ['title','user_id'];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function ingredients() : BelongsToMany
    {
        return $this->BelongsToMany(Ingredient::class)->withPivot(['amount','unit']);
    }
}
