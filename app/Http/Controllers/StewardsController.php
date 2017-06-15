<?php

namespace App\Http\Controllers;

use App\Clubs;
use App\Stewards;
use App\MenuPositions;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use PhpParser\Node\Stmt\UseUse;

class StewardsController extends Controller
{
    public function index(){
        $stewards = Stewards::all();
        return view('site.stewards')->with(['stewards' => $stewards, 'title' => 'Офіціанти']);
    }


    public function create()
    {
        $clubsid = Clubs::select('id_club', 'club_name')->get();
        $clubs = [];
        foreach ($clubsid as $club) {
            $clubs[$club->id_club] = $club->id_club.' '. $club->club_name ;
        }
        return view('site.content.stewards.create')->with([  'clubs'=>$clubs, 'title' => 'Додати офіціанта']);
    }


    public function store()
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'steward_passport' => 'required|numeric',
            'id_club' => 'required',
            'surname' => 'required',
            'name' => 'required',
            'birth_date' => 'required',
            'email' => 'required',
            'sum_per_day' => 'required',
            'salary' => 'required',
            'is_main' => 'required'
        );

        $validator = validator(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect('steward/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $steward = new Stewards();
            $steward->steward_passport = Input::get('steward_passport');
            $steward->id_club = Input::get('id_club');
            $steward->surname = Input::get('surname');
            $steward->name = Input::get('name');
            $steward->birth_date = Input::get('birth_date');
            $steward->email = Input::get('email');
            $steward->sum_per_day = Input::get('sum_per_day');
            $steward->salary = Input::get('salary');
            $steward->extra_salary = $steward->salary / 10;
            $steward->is_main = Input::get('is_main');
            $steward->save();

            $user = new User();
            $user->passport_number = Input::get('steward_passport');
            if(Input::get('is_main') == 1){
                $user->position = 'Старший офіціант';
            }else {
                $user->position = 'Офіціант';
            }
            $user->password = bcrypt('root');
            $user->name = Input::get('name');
            $user->surname = Input::get('surname');
            $user->save();


            // redirect
            // Session::flash('message', 'Картина успішно додано!');
            return redirect('steward');
        }
    }


    public function show($steward_passport)
    {
        $steward = Stewards::find($steward_passport);
//        if(!isset($steward)){
//            return redirect('main');
//        }

        return view('site.content.stewards.show')
            ->with(['steward' => $steward, 'title' => 'Інформація про офіціанта']);
    }

    public function edit($steward_passport)
    {
        // get the nerd
        $steward = Stewards::find($steward_passport);
        $clubsid = Clubs::select('id_club', 'club_name')->get();
        $clubs = [];
        foreach ($clubsid as $club) {
            $clubs[$club->id_club] = $club->id_club.' '. $club->club_name ;
        }
        // show the edit form and pass the nerd
        return view('site.content.stewards.edit')
            ->with(['steward' => $steward, 'clubs'=>$clubs, 'title' => 'Редагувати офіціанта']);
    }


    public function update($steward_passport)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'steward_passport' => 'required|numeric',
            'id_club' => 'required',
            'surname' => 'required',
            'name' => 'required',
            'birth_date' => 'required',
            'email' => 'required',
            'sum_per_day' => 'required',
            'salary' => 'required',
            'is_main' => 'required'
        );
        $validator = validator(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect('steward/' . $steward_passport . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $steward = Stewards::find($steward_passport);
            $steward->steward_passport = Input::get('steward_passport');
            $steward->id_club = Input::get('id_club');
            $steward->surname = Input::get('surname');
            $steward->name = Input::get('name');
            $steward->salary = Input::get('salary');
            $steward->birth_date = Input::get('birth_date');
            $steward->email = Input::get('email');
            $steward->sum_per_day = Input::get('sum_per_day');
            $steward->salary = Input::get('salary');
            $steward->extra_salary = $steward->salary / 10;
            $steward->is_main = Input::get('is_main');
            $steward->save();

            // redirect
            //Session::flash('message', 'Картину успішно оновлено!');
            return redirect('steward');
        }
    }

    public function destroy($steward_passport)
    {
        // delete
        $steward = Stewards::find($steward_passport);
        $steward->delete();
        //$user=User::find($steward_passport);
        //$user->delete();
        // redirect
        //Session::flash('message', 'Successfully deleted the nerd!');
        return redirect('steward');
    }

}
