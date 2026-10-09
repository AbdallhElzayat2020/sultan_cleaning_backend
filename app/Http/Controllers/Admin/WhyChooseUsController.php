<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\WhyChooseUsRequest;
use App\Models\WhyChooseUs;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class WhyChooseUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $items = WhyChooseUs::orderBy('order', 'asc')->orderBy('id', 'asc')->get();

        return view('admin.why-choose-us.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.why-choose-us.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WhyChooseUsRequest $request): RedirectResponse
    {
        WhyChooseUs::create($request->validated());

        return redirect()
            ->route('admin.why-choose-us.index')
            ->with('success', 'تم إضافة الميزة بنجاح إلى قسم لماذا سلطان كلين');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WhyChooseUs $whyChooseUs): View
    {
        return view('admin.why-choose-us.edit', compact('whyChooseUs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(WhyChooseUsRequest $request, WhyChooseUs $whyChooseUs): RedirectResponse
    {
        $whyChooseUs->update($request->validated());

        return redirect()
            ->route('admin.why-choose-us.index')
            ->with('success', 'تم تحديث الميزة بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, WhyChooseUs $whyChooseUs)
    {
        $whyChooseUs->delete();

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'status' => 'success',
                'message' => 'تم حذف العنصر بنجاح',
            ]);
        }

        return redirect()
            ->route('admin.why-choose-us.index')
            ->with('success', 'تم حذف العنصر بنجاح');
    }
}
