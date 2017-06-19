<?php

namespace App\Http\Controllers;

use App\Events;
use App\Managers;
use App\Orders;
use App\Stewards;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MineController extends Controller
{
    public function Index($steward_passport){

        $query = DB::table('orders')
            ->select()->where('steward_passport',$steward_passport)->get();


        return view('site.mine')->with(['orders'=> $query,'title' => 'Мої замовлення']);
    }
}
