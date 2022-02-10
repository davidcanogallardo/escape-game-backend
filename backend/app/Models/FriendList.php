<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FriendList extends Model
{
    use HasFactory;
    protected $fillable = [
        'friend1_id',
        'friend2_id'
    ];
    // protected $primaryKey = ['friend1_id', 'friend2_id'];
    // public $incrementing = false;
}
