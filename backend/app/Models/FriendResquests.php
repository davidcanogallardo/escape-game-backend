<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FriendResquests extends Model
{
    use HasFactory;

    protected $fillable = [
        'requester_id',
        'addressee_id',
        'status'
    ];
    protected $attributes = array(
        'status' => false
    );
}
