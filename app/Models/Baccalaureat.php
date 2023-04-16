<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Baccalaureat extends Model
{
    use HasFactory;
    protected $fillable = [
        'typebaccalaureat',
        'mentionbac',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
        }
    

}
