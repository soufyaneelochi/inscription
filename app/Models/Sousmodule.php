<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sousmodule extends Model
{
    use HasFactory;
    use HasFactory;protected $fillable = [
        'sousmodule',
        'note',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
        }
}
