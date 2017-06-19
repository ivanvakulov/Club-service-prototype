<?php

namespace App\Http\Controllers;

use App\Clubs;
use App\MenuPositions;
use App\Orders;
use App\Positions;
use App\Stewards;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class PositionsController extends Controller
{
    public function index(){
        $positions = Positions::all();
        return view('site.positions')->with(['positions' => $positions, 'title' => 'Позиції замовлень']);
    }


    public function create()
    {
        $ordersid = Orders::select('id_order')->get();
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
            'position_count' => 'required|numeric|min:1',
            'id_order' => 'required|numeric',
            'id_menu_position' => 'required|numeric'
        );

        $validator = validator(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect('position/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store

            $position = new Positions();
            $position->position_count = Input::get('position_count');
            $position->id_order = Input::get('id_order');
            $position->id_menu_position = Input::get('id_menu_position');
            $menu_position =  MenuPositions::find($position->id_menu_position);
            $position->result_price = $position->position_count * $menu_position->price;
            $order = Orders::find($position->id_order);
            $order->order_sum += $position->result_price;
            $order->save();
            $waiter = Stewards::find($order->steward_passport);
            $club = Clubs::find($waiter->id_club);
            $club->income += $position->result_price;
            $club->save();
            $position->save();
            return redirect('order');
        }
    }


    public function show($id_order_position)
    {
        $position = Positions::find($id_order_position);
//        if(!isset($position)){
//            return redirect('main');
//        }

        return view('site.content.positions.show')
            ->with(['position' => $position, 'title' => 'Інформація про позицію в замовленні']);
    }

    public function edit($id_order_position)
    {

        $position = Positions::find($id_order_position);
        $ordersid = Orders::select('id_order')->get();
        $orders = [];
        foreach ($ordersid as $order) {
            $orders[$order->id_order] = $order->id_order;
        }
        $menupositionsid = MenuPositions::select('id_menu_position','position_name')->get();
        $menupositions = [];
        foreach ($menupositionsid as $menuposition) {
            $menupositions[$menuposition->id_menu_position] = $menuposition->id_menu_position.' '.$menuposition->position_name;
        }

        return view('site.content.positions.edit')
            ->with(['position' => $position, 'orders'=>$orders, 'menupositions'=>$menupositions, 'title' => 'Редагувати позицію в замовленні']);
    }


    public function update($id_order_position)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'position_count' => 'required|numeric|min:1',
            'id_order' => 'required|numeric',
            'id_menu_position' => 'required|numeric'
        );
        $validator = validator(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect('position/' . $id_order_position . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $position = Positions::find($id_order_position);
            $position->position_count = Input::get('position_count');
            $position->id_order = Input::get('id_order');
            $position->id_menu_position = Input::get('id_menu_position');
            $order = Orders::find($position->id_order);
            $waiter = Stewards::find($order->steward_passport);
            $club = Clubs::find($waiter->id_club);
            $club->income -= $position->result_price;
            $order->order_sum -= $position->result_price;
            $menu_position =  MenuPositions::find($position->id_menu_position);
            $position->result_price = $position->position_count * $menu_position->price;
            $order->order_sum += $position->result_price;
            $order->save();
            $club->income += $position->result_price;
            $club->save();
            $position->save();

            // redirect
            //Session::flash('message', 'Картину успішно оновлено!');
            return redirect('order');
        }
    }

    public function destroy($id_order_position)
    {
        // delete
        $position = Positions::find($id_order_position);
        $order = Orders::find($position->id_order);
        $waiter = Stewards::find($order->steward_passport);
        $club = Clubs::find($waiter->id_club);
        $club->income -= $position->result_price;
        $order->order_sum -= $position->result_price;
        $menu_position =  MenuPositions::find($position->id_menu_position);
        $order->save();
        $club->save();
        $position->delete();

        // redirect
        //Session::flash('message', 'Successfully deleted the nerd!');
        return redirect('order');
    }

}
