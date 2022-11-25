<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return (new Image())->all();
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
