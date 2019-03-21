<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;

class AlbumController extends Controller
{
    public function create(Request $request)
    {
        $album = new Album;
        $album->image = $request->image;
        $album->artist = $request->artist;
        $album->name = $request->name;
        $album->genre = $request->genre;
        $album->year = $request->year;
        $album->label = $request->label;
        $album->songs = $request->songs;
        $album->rating = $request->rating;

        $id = $album->save();
        return $id ? "Created album successfully" : 'There was a problem trying to insert into the database';
    }

    public function read(Request $request)
    {
        if ($request->has('id')) {
            $result = Album::find($request->input('id'));
            return $result ? $result : 'No such album.';
        } elseif ($request->has('queryString')) {
            $result = Album::where(
                'artist', 'ILIKE', '%'.$request->input('queryString').'%')->orWhere(
                'name', 'ILIKE', '%'.$request->input('queryString').'%')->orWhere(
                'label', 'ILIKE', '%'.$request->input('queryString').'%')->orWhere(
                'genre', 'ILIKE', '%'.$request->input('queryString').'%')->orWhere(
                'songs', 'ILIKE', '%'.$request->input('queryString').'%')->get();
            return count($result) > 0 ? $result : 'No such album.';
        }
        return Album::inRandomOrder()->first();
    }

    public function update(Request $request)
    {
        $album = Album::find($request->id);
        $album->image = $request->image;
        $album->artist = $request->artist;
        $album->name = $request->name;
        $album->genre = $request->genre;
        $album->year = $request->year;
        $album->label = $request->label;
        $album->songs = $request->songs;
        $album->rating = $request->rating;
        $id = $album->save();
        return $id ? "Updated album successfully" : 'There was a problem trying to update the album';
    }

    public function delete(Request $request)
    {
        $album = Album::find($request->id);
        $status = $album->delete();
        return $status ? "Deleted album successfully" : 'There was a problem trying to delete the album';
    }
}
