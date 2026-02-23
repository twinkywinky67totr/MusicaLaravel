<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $table = 'albums';
    use HasFactory;

    protected $fillable = [
        'titulo',
        'artista',
        'genero',
        'discografia',
        'formato',
        'anio_publicacion',
        'num_pistas',
        'minutos_duracion',
        'image',
        'average_rating',
        'total_ratings',
    ];
    public function reviews(){
        return $this->hasMany(Review::class);
    }

    public function ratings(){
        return $this->hasMany(Rating::class, 'albums_id');
    }

    public function users(){
        return $this->belongsTo(User::class);
    }

    public function updateAverageRating(): void
{
    $ratings = $this->ratings();

    $this->update([
        'average_rating' => $ratings->avg('score') ?? 0,
        'total_ratings'  => $ratings->count(),
    ]);
}


}
