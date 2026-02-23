<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\ValidationException;

class Rating extends Model
{
    protected $table = 'ratings';

    protected $fillable = [
        'users_id',
        'albums_id',
        'score',
    ];

    protected static function validacion(): void
    {
        static::saving(function ($rating) {
            if ($rating->score < 1 || $rating->score > 5) {
                throw ValidationException::withMessages([
                    'score' => 'La puntuación debe estar entre 1 y 5.',
                ]);
            }
        });
    }
    public function users(){
        return $this->belongsTo(User::class);
    }
    public function album(){
        return $this->belongsTo(Album::class, 'id');
    }
}
