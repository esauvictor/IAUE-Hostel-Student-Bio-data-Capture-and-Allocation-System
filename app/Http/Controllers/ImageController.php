<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ImageController extends Controller
{
    public function createRedImage()
    {
        // Create ImageManager instance using GD driver
        $manager = new ImageManager(new Driver());

        // Create 200x200 red image
        $image = $manager->create(200, 200)->fill('red');

        // Save to public path
        $image->toJpeg()->save(public_path('red.jpg'));

        return response()->json(['message' => 'Red image created successfully']);
    }
}
