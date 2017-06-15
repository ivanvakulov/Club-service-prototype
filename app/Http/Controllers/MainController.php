<?php

namespace App\Http\Controllers;




use App\Events;
use App\Clubs;
use App\Managers;
use App\Stewards;
use App\Orders;
use App\PhoneNumbers;
use App\MenuPositions;
use App\Positions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class MainController extends Controller
{
    public function Index(){

        $orders = Orders::all()->count();
        $menupositions = MenuPositions::all()->count();
        $managers = Managers::all()->count();
        $clubs = Clubs::all()->count();
        $stewards = Stewards::all()->count();
        $events = Events::all()->count();
        $phones = PhoneNumbers::all()->count();
        $positions = Positions::all()->count();
        $counts = [
            'orders' => $orders,
            'stewards'=>$stewards,
            'menupositions' => $menupositions,
            'managers' => $managers,
            'clubs' => $clubs,
            'events' => $events,
            'phones' => $phones,
            'positions' => $positions
       ];

        return view('site.main')->with(['counts' => $counts, 'title' => 'АІС "Мережа клубів"']);
    }


    public function Noaccess(){
        //logout
        return view('site.noaccess')->with([ 'title' => 'Немає доступу']);
    }


    public function password(){

        $user = Auth::user();
        return view('site.password')->with(['user' => $user, 'title' => 'Змінити пароль']);

    }


    public function update()
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'password' => 'required',
        );
        $validator = validator(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect('password/')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            Auth::user()->password = bcrypt(Input::get('password'));
            Auth::user()->save();
            return redirect('/');
        }
    }

}
