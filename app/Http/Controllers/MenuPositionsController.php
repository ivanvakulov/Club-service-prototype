<?php

namespace App\Http\Controllers;

use App\Managers;
use App\MenuPositions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class MenuPositionsController extends Controller
{
    public function index(){
        $menupositions = MenuPositions::all();
        return view('site.menupositions')->with(['menupositions' => $menupositions, 'title' => 'Позиції меню']);
    }


    public function create()
    {


        return view('site.content.menupositions.create')->with([ 'title' => 'Додати позицію меню']);
    }


    public function store()
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'position_name' => 'required',
            'price' => 'required|numeric|min:0'
        );

        $validator = validator(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect('menuposition/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $menu_position = new MenuPositions();
            $menu_position->position_name = Input::get('position_name');
            $menu_position->price = Input::get('price');
            $menu_position->save();


            // redirect
            // Session::flash('message', 'Картина успішно додано!');
            return redirect('menuposition');
        }
    }


    public function show($id_menu_position)
    {
        $menu_position = MenuPositions::find($id_menu_position);
//        if(!isset($menu_position)){
//            return redirect('main');
//        }

        return view('site.content.menupositions.show')
            ->with(['menuposition' => $menu_position, 'title' => 'Інформація про позицію меню']);
    }

    public function edit($id_menu_position)
    {
        // get the nerd
        $menu_position = MenuPositions::find($id_menu_position);

        // show the edit form and pass the nerd
        return view('site.content.menupositions.edit')
            ->with(['menuposition' => $menu_position, 'title' => 'Редагувати позицію меню']);
    }


    public function update($id_menu_position)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'position_name' => 'required',
            'price' => 'required|numeric|min:0'
        );
        $validator = validator(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect('menuposition/' . $id_menu_position . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $menu_position = MenuPositions::find($id_menu_position);
            $menu_position->position_name = Input::get('position_name');
            $menu_position->price = Input::get('price');
            $menu_position->save();

            // redirect
            //Session::flash('message', 'Картину успішно оновлено!');
            return redirect('menuposition');
        }
    }

    public function destroy($id_menu_position)
    {
        // delete
        $menu_position = MenuPositions::find($id_menu_position);
        $menu_position->delete();

        // redirect
        //Session::flash('message', 'Successfully deleted the nerd!');
        return redirect('menuposition');
    }

}
