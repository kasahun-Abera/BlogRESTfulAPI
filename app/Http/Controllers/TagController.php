<?php

namespace App\Http\Controllers;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();

        return response()->json($tags);
    }

    public function store(Request $request)
    {
        $tag = Tag::create([
            'name' => $request->name,
        ]);

        return response()->json($tag);
    }

    public function update(Request $request, Tag $tag)
    {
        $tag->update([
            'name' => $request->name,
        ]);

        return response()->json($tag);
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();

        return response()->json(['message' => 'Tag deleted']);
    }
}
