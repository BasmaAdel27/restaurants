<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct(){
        $this->middleware('permission:restaurant.dashboard')->only(['home']);

    }
    public function home(){
        $customers=Customer::where('user_id',auth()->id())->count();
        $branches=Customer::where('user_id',auth()->id())->count();
        $sections=Customer::where('user_id',auth()->id())->count();
        return view('restaurants.dashboard',compact('customers','branches','sections'));
    }
}
