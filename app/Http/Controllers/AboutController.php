<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use League\CommonMark\Extension\CommonMark\Node\Inline\Strong;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $header = About::select("*")->where("name", "header")->first();
        $about_us = About::select("*")->where("name", "about_us")->first();
        $header->image = Storage::url($header->image);
        $about_us->image = Storage::url($about_us->image);
        return response()->json([
            "header" => $header,
            "about_us" => $about_us
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $image = $request->file('image');
        // ->store('images');
        $path = "project_img/img_about/";
        $name = time() + rand(1, 1000) . "." . $image->getClientOriginalExtension();
        Storage::disk('public')->put($path . $name,  file_get_contents($image));

        $about = new About();
        $about->name = $request['name'];
        $about->title = $request['title'];
        $about->description = $request['description'];
        $about->image = $path . $name;
        $request = $about->save();

        return response()->json([
            "message" => "The about have been successfully stored",
            "about_save" => $request

        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, About $about)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy(About $about)
    {
        //deleted all
        // About::truncate();
        $news = About::findOrFail($about->id);
        // $image_path = app_path("project_img/img_about/{$news->image}");

        // if (File::exists($image_path)) {
        //     //File::delete($image_path);
        //     unlink($image_path);
        // }$news->image
        Storage::disk('public')->delete($news->image);
        // $news->delete();
        $news->delete();
        return response()->json([
            "message" => "The form has been deleted "
        ], 200);
    }
}