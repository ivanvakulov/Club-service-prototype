<?php

namespace App\Http\Controllers;

use App\Clubs;
use App\Managers;
use App\Orders;
use App\Stewards;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class OrdersController extends Controller
{
    public function index(){
        $orders = Orders::all();

        return view('site.orders')->with(['orders' => $orders, 'title' => 'Замовлення']);
    }
    public function create()
    {
        $stewardsid = Stewards::select('steward_passport', 'surname')->get();
        $stewards = [];
        foreach ($stewardsid as $steward) {
            $stewards[$steward->steward_passport] = $steward->steward_passport.' '. $steward->surname ;
        }
        //dd($stewards);
        return view('site.content.orders.create')->with([ 'stewards'=>$stewards,'title' => 'Додати замовлення']);
    }


    public function store()
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'table_number' => 'required',
            'order_date' => 'required',
            'steward_passport' => 'required|numeric'

        );
        $validator = validator(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect('order/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $order = new Orders();
            $order->table_number = Input::get('table_number');
            $order->order_date = Input::get('order_date');
            $order->order_sum = 0;
            $order->steward_passport = Input::get('steward_passport');
            $order->save();

            // redirect
            // Session::flash('message', 'Картина успішно додано!');
            return redirect('order');
        }
    }


    public function show($id_order)
    {
        $order = Orders::find($id_order);
//        if(!isset($order)){
//            return redirect('main');
//        }

        return view('site.content.orders.show')
            ->with(['order' => $order, 'title' => 'Інформація про замовлення']);
    }

    public function edit($id_order)
    {
        // get the nerd
        $order = Orders::find($id_order);
        $stewardsid = Stewards::select('steward_passport', 'surname')->get();
        $stewards = [];
        foreach ($stewardsid as $steward) {
            $stewards[$steward->steward_passport] = $steward->steward_passport.' '. $steward->surname ;
        }

        // show the edit form and pass the nerd
        return view('site.content.orders.edit')
            ->with(['order' => $order, 'stewards'=>$stewards, 'title' => 'Редагувати замовлення']);
    }


    public function update($id_order)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(

            'table_number' => 'required',
            'order_date' => 'required',
            'steward_passport' => 'required|numeric'

        );
        $validator = validator(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect('order/' . $id_order . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $order = Orders::find($id_order);
            $order->table_number = Input::get('table_number');
            $order->order_date = Input::get('order_date');
            $order->steward_passport = Input::get('steward_passport');
            $order->save();

            // redirect
            //Session::flash('message', 'Картину успішно оновлено!');
            return redirect('order');
        }
    }

    public function destroy($id_order)
    {
        // delete
        $order = Orders::find($id_order);
        $waiter = Stewards::find($order->steward_passport);
        $club = Clubs::find($waiter->id_club);
        $club->income -= $order->order_sum;
        $club->save();
        $order->delete();

        // redirect
        //Session::flash('message', 'Successfully deleted the nerd!');
        return redirect('order');
    }

}
