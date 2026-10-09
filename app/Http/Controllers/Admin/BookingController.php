<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BookingController extends Controller
{
    /**
     * Display a listing of bookings.
     */
    public function index(Request $request): View
    {
        $query = Booking::with('service')->latest('id');

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $bookings = $query->get();

        $totalCount = Booking::count();
        $pendingCount = Booking::where('status', 'pending')->count();
        $contactedCount = Booking::where('status', 'contacted')->count();
        $completedCount = Booking::where('status', 'completed')->count();

        return view('admin.bookings.index', compact(
            'bookings',
            'totalCount',
            'pendingCount',
            'contactedCount',
            'completedCount'
        ));
    }

    /**
     * Display the specified booking.
     */
    public function show(Booking $booking): View
    {
        $booking->load('service');

        return view('admin.bookings.show', compact('booking'));
    }

    /**
     * Update status of the booking.
     */
    public function updateStatus(Request $request, Booking $booking): RedirectResponse
    {
        $request->validate([
            'status' => ['required', 'in:pending,contacted,completed,cancelled'],
        ]);

        $booking->update([
            'status' => $request->status,
        ]);

        return redirect()
            ->back()
            ->with('success', 'تم تحديث حالة الطلب بنجاح');
    }

    /**
     * Remove the specified booking.
     */
    public function destroy(Request $request, Booking $booking)
    {
        $booking->delete();

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'status' => 'success',
                'message' => 'تم حذف الطلب بنجاح',
            ]);
        }

        return redirect()
            ->route('admin.bookings.index')
            ->with('success', 'تم حذف الطلب بنجاح');
    }
}
