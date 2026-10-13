<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the admin profile page.
     */
    public function index(): View
    {
        return view('admin.profile.index', [
            'user' => Auth::user(),
        ]);
    }

    /**
     * Update the admin profile information.
     */
    public function update(Request $request): RedirectResponse
    {
        $user = $request->user();

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
            'avatar' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
        ], [
            'name.required' => 'يرجى إدخال اسم المستخدم',
            'email.required' => 'يرجى إدخال البريد الإلكتروني',
            'email.email' => 'صيغة البريد الإلكتروني غير صالحة',
            'email.unique' => 'البريد الإلكتروني مستخدم من قبل',
            'avatar.image' => 'يجب أن يكون الملف المرفوع صورة صالحة',
            'avatar.max' => 'أقصى حجم مسموح به للصورة هو 2 ميجابايت',
        ]);

        if ($request->hasFile('avatar')) {
            $avatarFile = $request->file('avatar');
            $avatarDirectory = public_path('uploads/avatars');

            if (! File::isDirectory($avatarDirectory)) {
                File::makeDirectory($avatarDirectory, 0755, true, true);
            }

            // Remove old avatar if custom
            if ($user->avatar && File::exists(public_path('uploads/avatars/'.$user->avatar))) {
                File::delete(public_path('uploads/avatars/'.$user->avatar));
            }

            $fileName = 'avatar_'.time().'_'.uniqid().'.'.$avatarFile->getClientOriginalExtension();
            $avatarFile->move($avatarDirectory, $fileName);
            $user->avatar = $fileName;
        }

        $user->name = $validated['name'];
        if ($user->email !== $validated['email']) {
            $user->email = $validated['email'];
            $user->email_verified_at = null;
        }

        $user->save();

        return redirect()->back()->with('success', 'تم تحديث الملف الشخصي بنجاح');
    }

    /**
     * Update user password.
     */
    public function updatePassword(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', Password::defaults()],
        ], [
            'current_password.required' => 'يرجى إدخال كلمة المرور الحالية',
            'current_password.current_password' => 'كلمة المرور الحالية غير صحيحة',
            'password.required' => 'يرجى إدخال كلمة المرور الجديدة',
            'password.confirmed' => 'تأكيد كلمة المرور غير متطابق',
        ]);

        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->back()->with('success', 'تم تغيير كلمة المرور بنجاح');
    }

    /**
     * Remove user avatar.
     */
    public function destroyAvatar(Request $request): RedirectResponse
    {
        $user = $request->user();

        if ($user->avatar && File::exists(public_path('uploads/avatars/'.$user->avatar))) {
            File::delete(public_path('uploads/avatars/'.$user->avatar));
        }

        $user->avatar = null;
        $user->save();

        return redirect()->back()->with('success', 'تمت استعادة الصورة الافتراضية بنجاح');
    }
}
