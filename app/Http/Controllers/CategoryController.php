<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Jobs\UploadImage;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Get all Categories
        $categories = Category::all();
        return response()->json($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest  $request)
    {
        $category = new Category;
        $category->fill($request->validated());
        $category->save();

        if ($request->hasFile('images')) {
            $images = $request->file('images');
            foreach ($images as $image) {
                UploadImage::dispatch($category, $image);
            }
        }

        return response()->json($category, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
        $category->load('images');
        $category->load('articles');
        return response()->json($category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest  $request, Category $category)
    {
        //Update Category
        $category->fill($request->validated());
        $category->save();

        if ($request->hasFile('images')) {
            $images = $request->file('images');
            foreach ($images as $image) {
                UploadImage::dispatch($category, $image);
            }
        }

        return response()->json($category);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json(null, 204);
    }
}
