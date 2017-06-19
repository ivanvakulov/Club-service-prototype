<?php

namespace App\Http\Controllers;

use App\Events;
use App\Managers;
use App\Orders;
use App\Stewards;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatisticController extends Controller
{
    public function Index(){

        $query = DB::table('orders')
            ->join('stewards','orders.steward_passport','=','stewards.steward_passport')
            ->select('orders.steward_passport','stewards.surname','stewards.name')->get();

        $orders = [];
        foreach ($query as $steward_passport) {
            $orders[$steward_passport->surname." ".$steward_passport->name] = DB::table('orders')->where('steward_passport', $steward_passport->steward_passport)->count();
        }

        $query = DB::table('clubs')
            ->join('stewards','clubs.id_club','=','stewards.id_club')
            ->select('clubs.id_club','clubs.club_name')->get();

        $last = [];
        foreach ($query as $steward_passport) {
            $last[$steward_passport->club_name] = DB::table('stewards')->where('id_club', $steward_passport->id_club)->count();
        }

        $query = DB::table('clubs')
            ->join('events','clubs.id_club','=','events.id_club')
            ->select('clubs.id_club','clubs.club_name')->get();
        $id_clubs = [];
        foreach ($query as $id_club) {
            $id_clubs[$id_club->club_name] = DB::table('events')->where('id_club',$id_club->id_club)->count();
        }


        $query = DB::table('orders')
            ->join('stewards','orders.steward_passport','=','stewards.steward_passport')
            ->select('stewards.steward_passport','stewards.name','stewards.surname','orders.order_sum')->get();

        $ordersSt = [];
        foreach ($query as $steward_passport) {
            $temp =  $steward_passport->surname . " " . $steward_passport->name;
            $ordersSt[$temp] = DB::table('orders')->where('steward_passport', $steward_passport->steward_passport)->sum('order_sum');
        }

        $managers = [
            '-20' => 0,
            '20-40' => 0,
            '40-60' => 0,
            '60-80' => 0,
            '80+' => 0,
        ];
        $query = Managers::all();

        foreach ($query as $manager) {
            $age = Carbon::parse($manager->birth_date)->age;
            if($age < 20){
                $managers['-20']=$managers['-20'] + 1;
            }elseif ($age < 40){
                $managers['20-40']=$managers['20-40'] + 1;
            }elseif ($age < 60){
                $managers['40-60']=$managers['40-60'] + 1;
            }elseif ($age < 80) {
                $managers['60-80'] = $managers['60-80'] + 1;
            }else{
                $managers['80+'] = $managers['80+'] + 1;
            }
        }



        return view('site.statistic')->with(['orders'=> $orders, 'id_clubs' => $id_clubs, 'ordersSt'=>$ordersSt,'last'=>$last , 'managers' => $managers,  'title' => 'Статистика']);
    }
}
