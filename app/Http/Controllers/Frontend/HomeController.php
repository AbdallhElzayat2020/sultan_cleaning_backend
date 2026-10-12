<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Post;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\WhyChooseUs;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $whyChooseUsList = WhyChooseUs::where('status', true)
            ->orderBy('order', 'asc')
            ->orderBy('id', 'asc')
            ->get();

        $services = Service::where('status', true)
            ->orderBy('order', 'asc')
            ->orderBy('id', 'asc')
            ->get();

        $testimonials = Testimonial::where('status', true)
            ->orderBy('order', 'asc')
            ->orderBy('id', 'asc')
            ->get();

        $faqs = Faq::where('status', true)
            ->orderBy('order', 'asc')
            ->orderBy('id', 'asc')
            ->get();

        $posts = Post::where('status', true)
            ->orderBy('order', 'asc')
            ->orderBy('published_at', 'desc')
            ->orderBy('id', 'desc')
            ->take(6)
            ->get();

        return view('frontend.pages.home', compact('whyChooseUsList', 'services', 'testimonials', 'faqs', 'posts'));
    }

    public function landpage(): View
    {
        return view('frontend.pages.landpage');
    }
}
