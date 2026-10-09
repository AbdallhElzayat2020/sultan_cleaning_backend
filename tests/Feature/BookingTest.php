<?php

use App\Models\Booking;
use App\Models\Service;
use App\Models\User;

test('customer can submit booking request from frontend', function () {
    $service = Service::factory()->create([
        'title' => 'تنظيف منازل وفلل VIP',
    ]);

    $data = [
        'name' => 'محمد القحطاني',
        'phone' => '0555123456',
        'service_id' => $service->id,
        'city' => 'الرياض - حي الملز',
        'notes' => 'يرجى الحضور في الفترة المسائية',
    ];

    $response = $this->post(route('booking.store'), $data);

    $response->assertSessionHas('success');
    $this->assertDatabaseHas('bookings', [
        'name' => 'محمد القحطاني',
        'phone' => '0555123456',
        'service_id' => $service->id,
        'service_name' => 'تنظيف منازل وفلل VIP',
        'city' => 'الرياض - حي الملز',
        'status' => 'pending',
    ]);
});

test('customer receives json and whatsapp url when submitting via ajax', function () {
    $service = Service::factory()->create([
        'title' => 'غسيل سجاد بالبخار',
    ]);

    $data = [
        'name' => 'عبدالله السبيعي',
        'phone' => '0501234567',
        'service_id' => $service->id,
        'city' => 'الرياض - حي الياسمين',
        'notes' => 'سجاد حرير 3 قطع',
    ];

    $response = $this->postJson(route('booking.store'), $data);

    $response->assertOk()
        ->assertJson([
            'status' => 'success',
        ])
        ->assertJsonStructure([
            'status',
            'message',
            'booking_id',
            'whatsapp_url',
        ]);

    $this->assertDatabaseHas('bookings', [
        'name' => 'عبدالله السبيعي',
        'phone' => '0501234567',
        'city' => 'الرياض - حي الياسمين',
    ]);
});

test('guest cannot access admin bookings page', function () {
    $response = $this->get(route('admin.bookings.index'));

    $response->assertRedirect(route('login'));
});

test('admin can view bookings index list', function () {
    $user = User::factory()->create();
    $booking = Booking::factory()->create([
        'name' => 'خالد الدوسري',
        'city' => 'الرياض - الصحافة',
    ]);

    $response = $this->actingAs($user)->get(route('admin.bookings.index'));

    $response->assertOk();
    $response->assertSee('خالد الدوسري');
    $response->assertSee('طلبات الحجز والمعاينة');
});

test('admin can view booking details page', function () {
    $user = User::factory()->create();
    $booking = Booking::factory()->create([
        'name' => 'سعود الشمري',
    ]);

    $response = $this->actingAs($user)->get(route('admin.bookings.show', $booking));

    $response->assertOk();
    $response->assertSee('سعود الشمري');
    $response->assertSee('تفاصيل طلب المعاينة');
});

test('admin can update booking status', function () {
    $user = User::factory()->create();
    $booking = Booking::factory()->create([
        'status' => 'pending',
    ]);

    $response = $this->actingAs($user)->patch(route('admin.bookings.update-status', $booking), [
        'status' => 'contacted',
    ]);

    $response->assertSessionHas('success');
    $this->assertDatabaseHas('bookings', [
        'id' => $booking->id,
        'status' => 'contacted',
    ]);
});

test('admin can delete a booking', function () {
    $user = User::factory()->create();
    $booking = Booking::factory()->create();

    $response = $this->actingAs($user)->delete(route('admin.bookings.destroy', $booking));

    $response->assertRedirect(route('admin.bookings.index'));
    $response->assertSessionHas('success');

    $this->assertDatabaseMissing('bookings', [
        'id' => $booking->id,
    ]);
});
