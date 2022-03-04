<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RankingDaily extends Model
{
    use HasFactory;
    protected $fillable = [
        'user',
        'difficulty',
        'nGames',
        'avgScore',
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'id', 'user');
        
    }
}
