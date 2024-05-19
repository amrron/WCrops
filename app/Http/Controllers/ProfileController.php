<?php

namespace App\Http\Controllers;

use App\Models\Alamat;
use App\Models\Ulasan;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Transaksi;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function index() {
        return view('profile.akun', [
            'alamats' => Alamat::where('user_id', auth()->id())->get()
        ]);
    }

    public function ulasan() {

        $transaksis = Transaksi::has('ulasan')->where('user_id', auth()->id())->get();
        $transaksisNoReview = Transaksi::doesntHave('ulasan')->where('user_id', auth()->id())->where('status', 'finished')->get();

        return view('profile.ulasan', [
            'transaksis' => $transaksis,
            'transaksisNoReview' => $transaksisNoReview,
        ]);
    }

    public function password() {
        return view('profile.ganti-password');
    }
}
