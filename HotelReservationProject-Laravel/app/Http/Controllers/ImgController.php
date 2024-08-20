<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImgController extends Controller
{
    public function imgserve()
    {
        // Manually define the image URLs
        $imageUrls = [
            'https://alpinekpk.com/wp-content/uploads/2022/05/deluxe-1024x683.jpg',
            'https://alpinekpk.com/wp-content/uploads/2023/03/villa5-room-4.jpg',
            'https://alpinekpk.com/wp-content/uploads/2022/05/vip-suite-alpine-hotel.jpg'
        ];
        dd($imageUrls);
        // Pass the image URLs to the view
        return view('reserve', compact('imageUrls'));
    }
}