<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Service;
use Illuminate\View\View;

class ContactController extends Controller
{
    /**
     * Display the Contact Us page with dynamic services and FAQs.
     */
    public function index(): View
    {
        $services = Service::where('status', true)
            ->orderBy('order', 'asc')
            ->orderBy('id', 'asc')
            ->get();

        $faqs = Faq::where('status', true)
            ->orderBy('order', 'asc')
            ->orderBy('id', 'asc')
            ->get();

        return view('frontend.pages.contact', compact('services', 'faqs'));
    }
}
