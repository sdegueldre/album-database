<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;

class AlbumController extends Controller
{
    public function album(Request $request)
    {
        if ($request->has('id')) {
            return Album::find($request->input('id'));
        }
        return Album::inRandomOrder()->take(1)->get();
    }

    public function albums()
    {

    }
}
