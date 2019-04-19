<?php

namespace App\Http\Controllers;

use App\Listing;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        $listings = Listing::latest()
            ->where('live', true)
            ->take(8)
            ->get();
        $featured = Listing::latest()
            ->where([
                ['live', true],
                ['featured', true]
            ])
            ->take(3)
            ->get();
        return view('home', compact('listings','featured'));
    }

    public function about()
    {
        return view('pages.about');
    }

    public function buyers()
    {
        return view('pages.buyers');
    }

    public function sellers()
    {
        return view('pages.sellers');
    }
}
