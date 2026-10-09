<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostRequest;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\View\View;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $posts = Post::orderBy('order', 'asc')->orderBy('id', 'desc')->get();

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['status'] = $request->has('status');

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
            $count = Post::where('slug', 'LIKE', "{$data['slug']}%")->count();
            if ($count > 0) {
                $data['slug'] = "{$data['slug']}-".($count + 1);
            }
        }

        if (empty($data['published_at'])) {
            $data['published_at'] = now();
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = 'post_'.time().'_'.Str::random(6).'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('uploads/posts');

            if (! File::isDirectory($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true, true);
            }

            $image->move($destinationPath, $imageName);
            $data['image'] = 'uploads/posts/'.$imageName;
        }

        Post::create($data);

        return redirect()
            ->route('admin.posts.index')
            ->with('success', 'تم إضافة المقال بنجاح');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post): View
    {
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, Post $post): RedirectResponse
    {
        $data = $request->validated();
        $data['status'] = $request->has('status');

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
            $count = Post::where('slug', 'LIKE', "{$data['slug']}%")->where('id', '!=', $post->id)->count();
            if ($count > 0) {
                $data['slug'] = "{$data['slug']}-".($count + 1);
            }
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = 'post_'.time().'_'.Str::random(6).'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('uploads/posts');

            if (! File::isDirectory($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true, true);
            }

            // Delete old uploaded image if exists
            if ($post->image && File::exists(public_path($post->image))) {
                File::delete(public_path($post->image));
            }

            $image->move($destinationPath, $imageName);
            $data['image'] = 'uploads/posts/'.$imageName;
        }

        $post->update($data);

        return redirect()
            ->route('admin.posts.index')
            ->with('success', 'تم تحديث بيانات المقال بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Post $post)
    {
        if ($post->image && File::exists(public_path($post->image))) {
            File::delete(public_path($post->image));
        }

        $post->delete();

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'status' => 'success',
                'message' => 'تم حذف المقال بنجاح',
            ]);
        }

        return redirect()
            ->route('admin.posts.index')
            ->with('success', 'تم حذف المقال بنجاح');
    }
}
