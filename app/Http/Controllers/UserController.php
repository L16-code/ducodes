<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('name')->paginate(20);

        return view('admin.users.index', compact('users'));
    }

    public function updateRole(Request $request, User $user)
    {
        $validated = $request->validate([
            'userType' => 'required|in:admin,user',
        ]);

        if ($user->id === Auth::id() && $validated['userType'] !== 'admin') {
            return back()->with('error', 'You can\'t remove your own admin access.');
        }

        $user->update(['userType' => $validated['userType']]);

        return back()->with('status', 'User role updated successfully.');
    }
}
