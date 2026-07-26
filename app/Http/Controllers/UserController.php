<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
class UserController extends Controller
{
    // Display all users
    public function index(Request $request)
    {
        $search = $request->search;
        $users = User::when($search, function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                      ->orWhere('email', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(10);
        return view('users.index', compact('users', 'search'));
    }
    // Delete User
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if (auth()->id() == $user->id) {
            return redirect()->back()
                ->with('error', 'You cannot delete your own account.');
        }
        $user->delete();
        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully.');
    }
}