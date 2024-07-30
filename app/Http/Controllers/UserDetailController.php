<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Import the User model

class UserDetailController extends Controller
{
    public function adminProfile()
    {
        // Fetch all user details from the users table
        $userDetails = User::select('id', 'name', 'email', 'phone')->get();
        return view('admin.adminprofile', ['userDetails' => $userDetails]);
    }

    public function edit($id)
    {
        $user = User::find($id);
        if ($user) {
            return view('admin.edit_user', compact('user'));
        } else {
            return redirect()->route('admin.profile')->with('error', 'User not found');
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
        ]);

        $user = User::find($id);
        if ($user) {
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->phone = $request->input('phone');
            $user->save();

            return redirect()->route('admin.profile')->with('success', 'User updated successfully');
        } else {
            return redirect()->route('admin.profile')->with('error', 'User not found');
        }
    }

    public function destroy($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return redirect()->route('admin.profile')->with('success', 'User deleted successfully');
        } else {
            return redirect()->route('admin.profile')->with('error', 'User not found');
        }
    }
}
