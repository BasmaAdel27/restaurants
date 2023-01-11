<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\Customer;
use App\Models\Order;

use App\Models\Truck;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:admin.dashboard')->only(['home']);

    }

    public function home()
    {
        $restaurants=User::whereHas('roles', fn ($q) => $q->whereIn('name', ['restaurant']))->count();
        return view('admin.dashboard',compact('restaurants'));
    }


}
