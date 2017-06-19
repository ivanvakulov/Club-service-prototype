<?php

namespace App\Http\Controllers;

use App\Clubs;
use App\MenuPositions;
use App\Positions;
use App\Orders;
use App\Stewards;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

    public function create1($id_order)
    {
        $ordersid = Orders::select('id_order')->where('id_order',$id_order)->get();
        $orders = [];
        foreach ($ordersid as $order) {
            $orders[$order->id_order] = $order->id_order;
        }
        $menupositionsid = MenuPositions::select('id_menu_position','position_name')->get();
        $menupositions = [];
        foreach ($menupositionsid as $menuposition) {
            $menupositions[$menuposition->id_menu_position] = $menuposition->id_menu_position.' '.$menuposition->position_name;
        }
        return view('site.content.positions.create')->with([  'orders'=>$orders, 'menupositions'=>$menupositions , 'title' => 'Додати позицію в замовленні']);
    }


    public function store()
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'table_number' => 'required|numeric|min:0',
            'order_date' => 'required|date|after:yesterday',
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

    public function show1($id_order)
    {
//        $positions = Positions::select()->where('id_order',$id_order)->get();
        $positions = DB::table('positions')->join('orders','orders.id_order','=','positions.id_order')->join('menu_positions','positions.id_menu_position','=','menu_positions.id_menu_position')
            ->select()->where('orders.id_order',$id_order)->get();
        $order = Orders::find($id_order);
        return view('site.positions')->with(['positions' => $positions,'order'=>$order, 'title' => 'Замовлення №'.$id_order]);
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

            'table_number' => 'required|numeric|min:0',
            'order_date' => 'required|date|after:yesterday',
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
