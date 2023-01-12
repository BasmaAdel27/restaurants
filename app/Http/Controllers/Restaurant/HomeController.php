<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Customer;
use App\Models\Section;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct(){
        $this->middleware('permission:restaurant.dashboard')->only(['home']);

    }
    public function home(){
        $customers=Customer::where('user_id',auth()->id())->count();
        $branches=Branch::where('user_id',auth()->id())->count();
        $sections=Section::where('user_id',auth()->id())->count();
        return view('restaurants.dashboard',compact('customers','branches','sections'));
    }
}
