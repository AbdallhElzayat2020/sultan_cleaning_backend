<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ServiceRequest;
use App\Models\Service;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $services = Service::orderBy('order', 'asc')->orderBy('id', 'asc')->get();

        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServiceRequest $request): RedirectResponse
    {
        $data = $request->validated();

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
            $count = Service::where('slug', 'LIKE', "{$data['slug']}%")->count();
            if ($count > 0) {
                $data['slug'] = "{$data['slug']}-".($count + 1);
            }
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = 'service_'.time().'_'.Str::random(6).'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('uploads/services');

            if (! File::isDirectory($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true, true);
            }

            $image->move($destinationPath, $imageName);
            $data['image'] = $imageName;
        }

        Service::create($data);

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'تم إضافة الخدمة بنجاح');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service): View
    {
        return view('admin.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServiceRequest $request, Service $service): RedirectResponse
    {
        $data = $request->validated();

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
            $count = Service::where('slug', 'LIKE', "{$data['slug']}%")->where('id', '!=', $service->id)->count();
            if ($count > 0) {
                $data['slug'] = "{$data['slug']}-".($count + 1);
            }
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = 'service_'.time().'_'.Str::random(6).'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('uploads/services');

            if (! File::isDirectory($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true, true);
            }

            // Remove previous image if exists
            if ($service->image && File::exists($destinationPath.'/'.$service->image)) {
                File::delete($destinationPath.'/'.$service->image);
            }

            $image->move($destinationPath, $imageName);
            $data['image'] = $imageName;
        }

        $service->update($data);

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'تم تحديث بيانات الخدمة بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Service $service)
    {
        if ($service->image) {
            $imagePath = public_path('uploads/services/'.$service->image);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }

        $service->delete();

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'status' => 'success',
                'message' => 'تم حذف الخدمة بنجاح',
            ]);
        }

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'تم حذف الخدمة بنجاح');
    }
}
