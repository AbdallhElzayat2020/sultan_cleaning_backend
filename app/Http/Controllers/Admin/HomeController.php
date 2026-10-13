<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Faq;
use App\Models\Gallery;
use App\Models\Page;
use App\Models\Post;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\WhyChooseUs;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Show the admin dashboard home with real-time statistics.
     */
    public function index(): View
    {
        // Booking Metrics
        $totalBookings = Booking::count();
        $pendingBookings = Booking::where('status', 'pending')->count();
        $contactedBookings = Booking::where('status', 'contacted')->count();
        $completedBookings = Booking::where('status', 'completed')->count();
        $cancelledBookings = Booking::where('status', 'cancelled')->count();
        $todayBookings = Booking::whereDate('created_at', today())->count();

        $completionRate = $totalBookings > 0
            ? round(($completedBookings / $totalBookings) * 100)
            : 0;

        // Content & Management Metrics
        $servicesCount = Service::count();
        $activeServicesCount = Service::where('status', true)->count();
        $postsCount = Post::count();
        $galleriesCount = Gallery::count();
        $testimonialsCount = Testimonial::count();
        $faqsCount = Faq::count();
        $pagesCount = Page::count();
        $whyChooseUsCount = WhyChooseUs::count();

        // Recent Inquiries & Content
        $recentBookings = Booking::with('service')->latest('id')->take(6)->get();
        $recentServices = Service::latest('id')->take(4)->get();
        $recentPosts = Post::latest('id')->take(4)->get();

        return view('admin.index', compact(
            'totalBookings',
            'pendingBookings',
            'contactedBookings',
            'completedBookings',
            'cancelledBookings',
            'todayBookings',
            'completionRate',
            'servicesCount',
            'activeServicesCount',
            'postsCount',
            'galleriesCount',
            'testimonialsCount',
            'faqsCount',
            'pagesCount',
            'whyChooseUsCount',
            'recentBookings',
            'recentServices',
            'recentPosts'
        ));
    }
}
