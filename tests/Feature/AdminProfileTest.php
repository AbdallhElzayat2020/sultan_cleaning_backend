<?php

use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

test('guest cannot access admin profile page', function () {
    $response = $this->get('/admin/profile');

    $response->assertRedirect('/login');
});

test('admin can view profile page', function () {
    $user = User::factory()->create();

    $response = $this
        ->actingAs($user)
        ->get('/admin/profile');

    $response->assertOk();
    $response->assertViewIs('admin.profile.index');
    $response->assertViewHas('user');
});

test('admin can update profile name and email', function () {
    $user = User::factory()->create([
        'name' => 'Old Name',
        'email' => 'old@example.com',
    ]);

    $response = $this
        ->actingAs($user)
        ->put('/admin/profile', [
            'name' => 'New Name',
            'email' => 'new@example.com',
        ]);

    $response->assertRedirect();
    $response->assertSessionHas('success');

    $user->refresh();
    expect($user->name)->toBe('New Name')
        ->and($user->email)->toBe('new@example.com');
});

test('admin can update password with valid current password', function () {
    $user = User::factory()->create([
        'password' => Hash::make('old-password-123'),
    ]);

    $response = $this
        ->actingAs($user)
        ->put('/admin/profile/password', [
            'current_password' => 'old-password-123',
            'password' => 'new-secret-password-456',
            'password_confirmation' => 'new-secret-password-456',
        ]);

    $response->assertRedirect();
    $response->assertSessionHas('success');

    $user->refresh();
    expect(Hash::check('new-secret-password-456', $user->password))->toBeTrue();
});

test('admin cannot update password with wrong current password', function () {
    $user = User::factory()->create([
        'password' => Hash::make('correct-password-123'),
    ]);

    $response = $this
        ->actingAs($user)
        ->put('/admin/profile/password', [
            'current_password' => 'wrong-password',
            'password' => 'new-secret-password-456',
            'password_confirmation' => 'new-secret-password-456',
        ]);

    $response->assertSessionHasErrors('current_password');
    $user->refresh();
    expect(Hash::check('correct-password-123', $user->password))->toBeTrue();
});

test('admin can upload and delete custom avatar', function () {
    $user = User::factory()->create();

    $file = UploadedFile::fake()->image('my-avatar.jpg');

    $response = $this
        ->actingAs($user)
        ->put('/admin/profile', [
            'name' => $user->name,
            'email' => $user->email,
            'avatar' => $file,
        ]);

    $response->assertRedirect();
    $response->assertSessionHas('success');

    $user->refresh();
    expect($user->avatar)->not->toBeNull();

    $avatarPath = public_path('uploads/avatars/'.$user->avatar);
    expect(File::exists($avatarPath))->toBeTrue();

    // Now test avatar removal
    $deleteResponse = $this
        ->actingAs($user)
        ->delete('/admin/profile/avatar');

    $deleteResponse->assertRedirect();
    $deleteResponse->assertSessionHas('success');

    $user->refresh();
    expect($user->avatar)->toBeNull()
        ->and(File::exists($avatarPath))->toBeFalse();
});
