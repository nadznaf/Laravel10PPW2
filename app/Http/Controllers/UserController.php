<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login')
                ->withErrors(['email'=>'You must be logged in to access this page.',])->onlyInput('email');
        }
        $users = User::get();
        return view('users')->with('userss', $users);
    }

    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('edit')->with('user', $user);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = User::findOrFail($id);

        // Update data
        $user->name = $request->name;
        $user->email = $request->email;

        // Update photo if provided
        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            $oldPhotoPath = public_path('storage/' . $user->photo);
            if (File::exists($oldPhotoPath)) {
                File::delete($oldPhotoPath);
            }

            // Store new photo
            $photoPath = $request->file('photo')->store('photos', 'public');
            $user->photo = $photoPath;
        }

        $user->save();

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }


    public function destroy(string $id)
    {
        $user = User::find($id);
        $file = public_path() . '/storage/' . $user->photo;
        try {
            if (File::exists($file)) {
                File::delete($file);
                $user->delete();
            }
        } catch (\Throwable $th) {
            return redirect('users')->with('error', 'Unsuccessful delete data');
        }
        return redirect('users')->with('success', 'Successfully delete data');
    }
}
