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

    public function read(Request $request)
    {
        if ($request->has('id')) {
            $result = Album::find($request->id);
            if($result)
                return $result;
            return response()->json('No such album.', 404);
        } elseif ($request->has('queryString')) {
            $result = Album::where(
                'artist', 'ILIKE', '%'.$request->input('queryString').'%')->orWhere(
                'name', 'ILIKE', '%'.$request->input('queryString').'%')->orWhere(
                'label', 'ILIKE', '%'.$request->input('queryString').'%')->orWhere(
                'genre', 'ILIKE', '%'.$request->input('queryString').'%')->orWhere(
                'songs', 'ILIKE', '%'.$request->input('queryString').'%')->get();
            if(count($result) > 0)
                return $result;
            return response()->json('No such album.', 404);
        }
        return response()->json(Album::inRandomOrder()->first(), 200);
    }

    public function update(Request $request)
    {
        $album = Album::find($request->id);
        $success = $album->update($request->all());
        if($success){
            return response()->json($album, 200);
        }
        return response()->json('There was a problem trying to update the album', 500);
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $album = Album::find($id);
        if($album){
            $success = $album->delete();
            if($success){
                return response()->json("Deleted album successfully", 200);
            }
            return response()->json('There was a problem trying to delete the album', 500);
        }
        return response()->json("There is no album with id $id", 404);
    }
}
