<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;

class AlbumController extends Controller
{
    public function create(Request $request)
    {
        $album = new Album;
        $instance = $album->create($request->all());
        if($instance){
            return response()->json($instance, 200);
        }
        return response()->json('There was a problem trying to create the album', 500);
    }

    public function read(Album $album)
    {
        return $album;
    }

    public function search(Request $request){
        $offset = $request->offset ? $request->offset : 0;
        if ($request->has('queryString')) {
            $results = Album::where(
                'artist', 'ILIKE', '%'.$request->input('queryString').'%')->orWhere(
                'name', 'ILIKE', '%'.$request->input('queryString').'%')->orWhere(
                'label', 'ILIKE', '%'.$request->input('queryString').'%')->orWhere(
                'genre', 'ILIKE', '%'.$request->input('queryString').'%')->orWhere(
                'songs', 'ILIKE', '%'.$request->input('queryString').'%')->skip($offset);
            return response()->json($results->take(10)->get(), 200);
        }
        return response()->json(Album::skip($offset)->take(10)->get(), 200);
    }

    public function update(Album $album, Request $request)
    {
        $success = $album->update($request->all());
        if($success){
            return response()->json($album, 200);
        }
        return response()->json('There was a problem trying to update the album', 500);
    }

    public function delete(Album $album, Request $request)
    {
        $success = $album->delete();
        if($success){
            return response()->json("Deleted album successfully", 200);
        }
        return response()->json('There was a problem trying to delete the album', 500);
    }
}
