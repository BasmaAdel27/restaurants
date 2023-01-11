<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $user = auth()->user();
        if ($user->isSuperAdmin() || empty(array_intersect(
                    $user->roles()->pluck('name')->toArray(),
                    ['restaurant']
              ))) {
            return redirect()->route('admin.dashboard');
        } elseif (in_array('restaurant', $user->roles()->pluck('name')->toArray())) {
            return redirect()->route('restaurant.dashboard');
        }
    }
}
