<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DesignerController extends Controller
{
    // Method to display the 'About Us' page
    public function aboutUs()
    {
        return view('aboutus');
    }

    // Method to display the 'Designer' page (new method)
    public function index()
    {
        // Return the view for designer page
        return view('designer');
    }

    // Method to display the user's profile
    public function profile()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
    }

    // Method to handle profile updates
    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'address' => 'nullable|string|max:255',
            // Add other fields as necessary
        ]);

        $user->update($request->all());

        return redirect()->route('profile')->with('success', 'Profile updated successfully.');
    }
}
