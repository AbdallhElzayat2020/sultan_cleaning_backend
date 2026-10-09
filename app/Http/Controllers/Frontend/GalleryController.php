<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\View\View;

class GalleryController extends Controller
{
    /**
     * Display a listing of active gallery items.
     */
    public function index(): View
    {
        $galleries = Gallery::where('status', true)
            ->orderBy('order', 'asc')
            ->orderBy('id', 'desc')
            ->get();

        return view('frontend.pages.gallery', compact('galleries'));
    }
}
