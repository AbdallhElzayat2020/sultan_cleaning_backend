<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PageRequest;
use App\Models\Page;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\View\View;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $pages = Page::orderBy('order', 'asc')->orderBy('id', 'desc')->get();

        return view('admin.pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PageRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['status'] = $request->has('status');
        $data['show_in_header'] = false;
        $data['show_in_footer'] = $request->has('show_in_footer');

        if (empty($data['slug'])) {
            $baseSlug = Str::slug($data['title']);
            if (empty($baseSlug)) {
                $baseSlug = 'page-'.Str::random(6);
            }
            $slug = $baseSlug;
            $count = 1;
            while (Page::where('slug', $slug)->exists()) {
                $slug = $baseSlug.'-'.(++$count);
            }
            $data['slug'] = $slug;
        }

        Page::create($data);

        return redirect()->route('admin.pages.index')->with('success', 'تم إنشاء الصفحة بنجاح.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Page $page): View
    {
        return view('admin.pages.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PageRequest $request, Page $page): RedirectResponse
    {
        $data = $request->validated();
        $data['status'] = $request->has('status');
        $data['show_in_header'] = false;
        $data['show_in_footer'] = $request->has('show_in_footer');

        if (empty($data['slug'])) {
            $baseSlug = Str::slug($data['title']);
            if (empty($baseSlug)) {
                $baseSlug = 'page-'.$page->id;
            }
            $slug = $baseSlug;
            $count = 1;
            while (Page::where('slug', $slug)->where('id', '!=', $page->id)->exists()) {
                $slug = $baseSlug.'-'.(++$count);
            }
            $data['slug'] = $slug;
        }

        $page->update($data);

        return redirect()->route('admin.pages.index')->with('success', 'تم تحديث بيانات الصفحة بنجاح.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Page $page): RedirectResponse
    {
        $page->delete();

        return redirect()->route('admin.pages.index')->with('success', 'تم حذف الصفحة بنجاح.');
    }
}
