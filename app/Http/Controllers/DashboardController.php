<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->isAdmin()) {
            return redirect()->route('admin.dashboard');
        } elseif ($user->isSeller()) {
            return redirect()->route('seller.dashboard');
        } else {
            return redirect()->route('customer.dashboard');
        }
    }
}
