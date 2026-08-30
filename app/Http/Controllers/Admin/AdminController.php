<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin.auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors([
            'email' => 'Kredensial tidak valid.',
        ])->onlyInput('email');
    }

    public function dashboard()
    {
        $stats = [
            'total_products' => \App\Models\Product::count(),
            'total_orders' => \App\Models\Order::count(),
            'pending_orders' => \App\Models\Order::where('status', 'pending')->count(),
            'completed_orders' => \App\Models\Order::where('status', 'completed')->count(),
        ];

        $recent_orders = \App\Models\Order::with('product')->latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recent_orders'));
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}