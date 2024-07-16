<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ingredient extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "ingredients";

    protected $fillable = ['name'];


    public function recipes() : BelongsToMany
    {
        return $this->BelongsToMany(Recipe::class)->withPivot(['amount','unit']);
    }
}
