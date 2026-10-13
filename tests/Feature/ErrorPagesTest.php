<?php

use Illuminate\Support\Facades\Route;

test('404 error page is rendered when visiting a non-existent route', function () {
    $response = $this->get('/non-existent-random-page-'.uniqid());

    $response->assertStatus(404);
    $response->assertSee('404');
    $response->assertSee('الصفحة غير موجودة');
    $response->assertSee('العودة للرئيسية');
});

test('403 error page is rendered when access is forbidden', function () {
    Route::get('/test-forbidden-route', function () {
        abort(403);
    });

    $response = $this->get('/test-forbidden-route');

    $response->assertStatus(403);
    $response->assertSee('403');
    $response->assertSee('غير مصرح');
    $response->assertSee('العودة للرئيسية');
});
