<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\BookingRequest;
use App\Models\Booking;
use App\Models\Service;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Store a newly created booking request.
     */
    public function store(BookingRequest $request): JsonResponse|RedirectResponse
    {
        $data = $request->validated();

        if (! empty($data['service_id'])) {
            $service = Service::find($data['service_id']);
            if ($service) {
                $data['service_name'] = $service->title;
            }
        }

        $booking = Booking::create($data);

        // Pre-build WhatsApp text for instant follow up
        $serviceName = $booking->service_name_display;
        $siteName = setting('site_name', 'سين ياء');
        $whatsappNumber = preg_replace('/[^0-9]/', '', setting('top_bar_whatsapp', '966582102525'));
        $waMessage = "مرحباً {$siteName}، أود تأكيد طلب الحجز:\n"
            ."- الاسم: {$booking->name}\n"
            ."- رقم الجوال: {$booking->phone}\n"
            ."- الخدمة المطلوبة: {$serviceName}\n"
            ."- المدينة/الحي: {$booking->city}"
            .($booking->notes ? "\n- ملاحظات: {$booking->notes}" : '');

        $whatsappUrl = "https://wa.me/{$whatsappNumber}?text=".urlencode($waMessage);

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'status' => 'success',
                'message' => 'تم استلام طلبك بنجاح! سيقوم فريق خدمة العملاء بالتواصل معك لتأكيد الموعد.',
                'booking_id' => $booking->id,
                'whatsapp_url' => $whatsappUrl,
            ]);
        }

        return redirect()
            ->back()
            ->with('success', 'تم استلام طلب الحجز بنجاح! سنتواصل معك قريباً.');
    }
}
