<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $table = 'games';
    protected $fillable = ['user_id', 'name', 'company', 'description', 'url_img'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
