<?php

namespace App\Http\Controllers;
use Pusher\Pusher;
use App\Events\ArticlePublished;
use Illuminate\Http\Request;
use App\Article;
use App\Http\Requests\ArticleRequest;
use App\Jobs\UploadImage;
class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Get all Articles
        $articles = Article::all();
        return response()->json($articles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        //
        $article = new Article;
        $article->fill($request->validated());
        $article->save();
        if ($request->hasFile('images')) {
            $images = $request->file('images');
            foreach ($images as $image) {
                UploadImage::dispatch($article, $image);
            }
        }

        $article->tags()->sync($request->tags);

        return response()->json($article, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        $article->load('images');
        $article->load('tags');
        return response()->json($article);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, Article $article)
    {
        //
        $article->fill($request->validated());
        $article->save();
        if ($request->hasFile('images')) {
            $images = $request->file('images');
            foreach ($images as $image) {
                UploadImage::dispatch($article, $image);
            }
        }

        $article->tags()->sync($request->tags);
        return response()->json($article);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return response()->noContent();
    }
    public function publish(Article $article)
    {
        $article->published = true;
        $article->save();

        event(new ArticlePublished($article));

        return response()->json([
            'message' => 'Article published successfully.',
            'article' => $article,
        ]);
    }
}
