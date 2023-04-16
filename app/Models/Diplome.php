<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diplome extends Model
{
    use HasFactory;
    protected $fillable = [
        'typediplome',
        'optiondiplome',
        'etablissement',
        'villeetablissement',
        'moyenne',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
        }
}
