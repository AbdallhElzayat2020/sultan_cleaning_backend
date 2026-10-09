<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FaqRequest;
use App\Models\Faq;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $faqs = Faq::orderBy('order', 'asc')->orderBy('id', 'asc')->get();

        return view('admin.faqs.index', compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.faqs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FaqRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['status'] = $request->has('status');

        Faq::create($data);

        return redirect()
            ->route('admin.faqs.index')
            ->with('success', 'تم إضافة السؤال الشائع بنجاح');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Faq $faq): View
    {
        return view('admin.faqs.edit', compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FaqRequest $request, Faq $faq): RedirectResponse
    {
        $data = $request->validated();
        $data['status'] = $request->has('status');

        $faq->update($data);

        return redirect()
            ->route('admin.faqs.index')
            ->with('success', 'تم تحديث السؤال الشائع بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Faq $faq)
    {
        $faq->delete();

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'status' => 'success',
                'message' => 'تم حذف السؤال الشائع بنجاح',
            ]);
        }

        return redirect()
            ->route('admin.faqs.index')
            ->with('success', 'تم حذف السؤال الشائع بنجاح');
    }
}
