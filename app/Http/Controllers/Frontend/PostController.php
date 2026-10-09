<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
    /**
     * Display a listing of active blog posts.
     */
    public function index(Request $request): View
    {
        $category = $request->query('category');
        $search = $request->query('search');

        $query = Post::where('status', true);

        if ($category) {
            $query->where('category', $category);
        }

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('short_description', 'like', "%{$search}%")
                    ->orWhere('content', 'like', "%{$search}%");
            });
        }

        $posts = $query->orderBy('order', 'asc')
            ->orderBy('published_at', 'desc')
            ->orderBy('id', 'desc')
            ->paginate(9)
            ->withQueryString();

        $featuredPost = Post::where('status', true)
            ->orderBy('order', 'asc')
            ->orderBy('published_at', 'desc')
            ->first();

        $categories = Post::where('status', true)
            ->whereNotNull('category')
            ->select('category')
            ->distinct()
            ->pluck('category');

        $recentPosts = Post::where('status', true)
            ->orderBy('published_at', 'desc')
            ->orderBy('id', 'desc')
            ->take(5)
            ->get();

        return view('frontend.pages.blog', compact('posts', 'featuredPost', 'categories', 'recentPosts', 'category', 'search'));
    }

    /**
     * Display the specified blog post.
     */
    public function show(string $slug): View
    {
        $post = Post::where('status', true)
            ->where(function ($query) use ($slug) {
                $query->where('slug', $slug)
                    ->orWhere('id', $slug);
            })
            ->firstOrFail();

        // Increment views count safely
        $post->increment('views');

        $relatedPosts = Post::where('status', true)
            ->where('id', '!=', $post->id)
            ->where('category', $post->category)
            ->take(3)
            ->get();

        if ($relatedPosts->isEmpty()) {
            $relatedPosts = Post::where('status', true)
                ->where('id', '!=', $post->id)
                ->take(3)
                ->get();
        }

        $recentPosts = Post::where('status', true)
            ->where('id', '!=', $post->id)
            ->orderBy('published_at', 'desc')
            ->take(4)
            ->get();

        $categories = Post::where('status', true)
            ->whereNotNull('category')
            ->select('category')
            ->distinct()
            ->pluck('category');

        $services = Service::where('status', true)
            ->orderBy('order', 'asc')
            ->get();

        return view('frontend.pages.blog-details', compact('post', 'relatedPosts', 'recentPosts', 'categories', 'services'));
    }
}
