<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Testimonial;
use App\Models\WhyChooseUs;
use Illuminate\View\View;

class AboutController extends Controller
{
    /**
     * Display the About Us page with dynamic features, testimonials, and FAQs.
     */
    public function index(): View
    {
        $whyChooseUsList = WhyChooseUs::where('status', true)
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

        return view('frontend.pages.about', compact('whyChooseUsList', 'testimonials', 'faqs'));
    }
}
