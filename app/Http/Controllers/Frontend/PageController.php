<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\View\View;

class PageController extends Controller
{
    /**
     * Display a custom dynamic page by its slug.
     */
    public function show(string $slug): View
    {
        $page = Page::where('slug', $slug)
            ->where('status', true)
            ->firstOrFail();

        $page->increment('views');

        return view('frontend.pages.custom-page', compact('page'));
    }

    /**
     * Dedicated handler for privacy policy route.
     */
    public function privacyPolicy(): View
    {
        return $this->show('privacy-policy');
    }
}
