<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Hostel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    // Admin dashboard
    public function home()
    {
        if (Auth::check()) {
            $hostels = Hostel::all();
            return view('admin.home', compact('hostels'));
        }
        return view('admin.login');
    }

    // Login view
    public function login()
    {
        return Auth::check()
            ? redirect()->route('admin.home')
            : view('admin.login');
    }

    // Registration view
    public function admin_registration()
    {
        return Auth::check()
            ? redirect()->route('admin.home')
            : view('admin.registration');
    }

    // Handle login
    public function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
           return redirect()->route('home');

        }

        return redirect()->route('login')->with('error', 'Login unsuccessful');
    }

    // Handle registration
    public function registrationPost(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'admin'
        ]);

        return $user
            ? redirect()->route('login')->with('success', 'Registration successful')
            : back()->with('error', 'Registration failed');
    }

    // Logout
    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('login')->with('success', 'Logged out');
    }

    // View one hostel record
    public function view($id)
    {
        $hostels = Hostel::findOrFail($id);
        return view('admin.view', compact('hostels'));
    }

    // Edit form
    public function edit($id)
    {
        if (!Auth::check()) return redirect()->route('login');
        $hostels = Hostel::findOrFail($id);
        return view('admin.edit', compact('hostels'));
    }

    // Update hostel record
    public function update(Request $request, $id)
    {
        $record = Hostel::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'matriculation_number' => 'required',
            'state_of_origin' => 'required',
            'residential_address' => 'required',
            'phone_number' => 'required',
            'email' => 'required|email',
            'sex' => 'required',
            'marital_status' => 'required',
            'hostel_choice' => 'required',
            'department' => 'required',
            'faculty' => 'required',
            'year_of_entry' => 'required',
            'date_of_birth' => 'required',
            'local_government_area' => 'required',
            'level' => 'required',
            'club_membership' => 'required',
            'assigned_Room' => 'required',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $record->fill($request->except('photo'));

        if ($request->hasFile('photo')) {
            if ($record->photo && file_exists(public_path($record->photo))) {
                @unlink(public_path($record->photo));
            }

            $file = $request->file('photo');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $path = 'uploads/photos/';
            $file->move(public_path($path), $filename);
            $record->photo = $path . $filename;
        }

        return $record->save()
            ? redirect()->back()->with('success', 'Record updated')
            : redirect()->back()->with('error', 'Update failed');
    }

    // Delete hostel record
    public function destroy($id)
    {
        $record = Hostel::findOrFail($id);
        if ($record->photo && file_exists(public_path($record->photo))) {
            @unlink(public_path($record->photo));
        }
        $record->delete();
        return back()->with('success', 'Record deleted');
    }

    // Allocate hostel
    public function updateStatus($id)
    {
        $hostel = Hostel::findOrFail($id);
        if ($hostel->status !== 'Allocated') {
            $hostel->status = 'Allocated';
            $hostel->save();
            return back()->with('success', 'Hostel allocated');
        }
        return back()->with('error', 'Already allocated');
    }

    // Deallocate hostel
    public function updateStatusTwo($id)
    {
        $hostel = Hostel::findOrFail($id);
        if ($hostel->status !== 'Deallocated') {
            $hostel->status = 'Deallocated';
            $hostel->save();
            return back()->with('success', 'Hostel deallocated');
        }
        return back()->with('error', 'Already deallocated');
    }

    // Filter & print view
    public function printFilter(Request $request)
    {
        if (Auth::check() && Auth::user()->role === 'admin') {
            return redirect()->route('home')->with('error', 'Only Superadmin can access this page');
        }

        $campuses = Hostel::distinct()->pluck('campus');
        $hostel_choices = Hostel::distinct()->pluck('hostel_choice');
        $statuses = Hostel::distinct()->pluck('status');

        $query = Hostel::query();

        if ($request->filled('campus')) {
            $query->where('campus', $request->campus);
        }
        if ($request->filled('hostel')) {
            $query->where('hostel_choice', $request->hostel);
        }
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $filteredHostels = $query->get();

        return view('admin.filter', compact('campuses', 'hostel_choices', 'statuses', 'filteredHostels'));
    }
}
