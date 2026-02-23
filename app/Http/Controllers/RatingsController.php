<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingsController extends Controller
{
    public function store(Request $request, $albumId)
{
    if (!Auth::check()) {
        return response()->json(['error' => 'No autenticado'], 401);
    }

    $request->validate([
        'score' => 'required|integer|min:1|max:5',
    ]);

    $userId = Auth::id();

    $rating = Rating::where('users_id', $userId)
                    ->where('albums_id', $albumId)
                    ->first();

    if ($rating) {
        $rating->update(['score' => $request->score]);
        $mensaje = 'Valoración actualizada correctamente.';
    } else {
        Rating::create([
            'users_id'  => $userId,
            'albums_id' => $albumId,
            'score'    => $request->score,
        ]);
        $mensaje = 'Valoración creada correctamente.';
    }

    $album = Album::findOrFail($albumId);
    $album->updateAverageRating();

    if (request()->expectsJson()) {
        return response()->json([
            'message'       => $mensaje,
            'promedio'      => $album->average_rating,
            'tu_valoracion' => $request->score,
        ]);
    }

    return redirect()->back()->with('success', $mensaje);
}
}
