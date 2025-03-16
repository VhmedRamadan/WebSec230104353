<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserLoginRequest;


class UsersController extends Controller
{
    public function index(Request $request)
    {
        // $query = User::where('name', 'like', "%{$request->search}%")->orWhere('email', 'like', "%{$request->search}%")->get('sort_by', 'id');

        // // Search filter 
        // if ($request->has('search')) {
        //     $query->where('name', 'like', "%{$request->search}%")
        //           ->orWhere('email', 'like', "%{$request->search}%");
        // }

        // // Sorting
        // $sortField = $request->get('sort_by', 'id'); // Default: sort by ID
        // $sortDirection = $request->get('sort_order', 'asc'); // Default: ascending

        // // Prevent sorting by unauthorized fields
        // $allowedSortFields = ['id', 'name', 'email', 'created_at'];
        // if (!in_array($sortField, $allowedSortFields)) {
        //     $sortField = 'id';
        // }

        // $users = $query->orderBy($sortField, $sortDirection)->get();

        // return view('users', compact('users', 'sortField', 'sortDirection'));
    }

    public function register()
{
    return view('users.create'); // This will load resources/views/users/create.blade.php
}

    public function store(UserLoginRequest $request)
    {
        // Log::info('Store method triggered'); // Debugging

        // $validatedData = $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|email|unique:users,email',
        //     'password' => 'required|min:6',
        // ]);

        // Log::info('Validated Data:', $validatedData);

        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt(  $request->password),
            ]);

            // Log::info('User Created:', ['id' => $user->id]);

            return redirect()->route('users.welcome')->with('success', 'User added successfully');
        } catch (\Exception $e) {
            Log::error('Error Storing User: ' . $e->getMessage());
            return back()->with('error', 'Failed to store user');
        }
    }

    public function edit($id)
    {
        $user = users::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = users::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:6',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
        ]);

        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }

    public function destroy($id)
    {
        users::findOrFail($id)->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }
    public function login(Request $request) {
        return view('users.login');
    }

    public function doLogin(UserLoginRequest $request)
    {
 
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate(); // Regenerate session for security
            return redirect('/')->with('success', 'Login successful.');
        }

        return back()->withErrors('Invalid login credentials.')->withInput();
    }

    public function doLogout(Request $request) {
    	
    	Auth::logout();

        return redirect('/');
    }
}
