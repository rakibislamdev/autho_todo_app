<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Todo extends Model
{
    use HasFactory;

    protected $fillable = ['date', 'name', 'details', 'user_id', 'complete'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
