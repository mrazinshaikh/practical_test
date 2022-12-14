<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = (new Image())->all();

        foreach ($images as $key => $imageObject) {
            $images[$key]['image'] = url('/images') . '/' . $imageObject->image;
        }

        return $images;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:png,jpg'
        ]);

        $file = $request->file('image');
        $fileName = time() . '.' . $file->extension(); // created file name with time for uniqueness
        $file->move(public_path('images'), $fileName); // move file to public folder /project_dir/public/image

        // Create new entry with image name to database.
        $imageObject = new Image();
        $imageObject->image = $fileName;
        $imageObject->save();
        return $imageObject;
    }
}
