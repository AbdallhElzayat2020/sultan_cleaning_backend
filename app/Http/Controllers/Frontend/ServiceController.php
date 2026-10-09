<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\WhyChooseUs;
use Illuminate\View\View;

class ServiceController extends Controller
{
    /**
     * Display a listing of active services.
     */
    public function index(): View
    {
        $services = Service::where('status', true)
            ->orderBy('order', 'asc')
            ->orderBy('id', 'asc')
            ->get();

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

        return view('frontend.pages.services', compact('services', 'whyChooseUsList', 'testimonials', 'faqs'));
    }

    /**
     * Display the specified service details.
     */
    public function show(string $slug): View
    {
        $service = Service::where('status', true)
            ->where(function ($query) use ($slug) {
                $query->where('slug', $slug)
                    ->orWhere('id', $slug);
            })
            ->firstOrFail();

        $services = Service::where('status', true)
            ->orderBy('order', 'asc')
            ->orderBy('id', 'asc')
            ->get();

        return view('frontend.pages.service-details', compact('service', 'services'));
    }
}
