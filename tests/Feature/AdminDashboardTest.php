<?php

use App\Models\Booking;
use App\Models\Service;
use App\Models\User;

test('guest cannot access admin dashboard', function () {
    $response = $this->get('/admin/dashboard');

    $response->assertRedirect(route('login'));
});

test('authenticated admin can view dashboard with statistics', function () {
    $user = User::factory()->create();

    Service::factory()->create(['status' => true]);
    Booking::create([
        'name' => 'محمد أحمد',
        'phone' => '0501234567',
        'city' => 'الرياض',
        'status' => 'pending',
    ]);

    $response = $this
        ->actingAs($user)
        ->get('/admin/dashboard');

    $response->assertOk();
    $response->assertViewIs('admin.index');
    $response->assertViewHas([
        'totalBookings',
        'pendingBookings',
        'contactedBookings',
        'completedBookings',
        'servicesCount',
        'recentBookings',
    ]);
});
