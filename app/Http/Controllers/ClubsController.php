<?php

namespace App\Http\Controllers;

use App\Clubs;
use App\Managers;
use Illuminate\Support\Facades\Input;

class ClubsController extends Controller
{
    public function index(){
        $clubs = Clubs::all();
        return view('site.clubs')->with(['clubs' => $clubs, 'title' => 'Клуби']);
    }


    public function create()
    {
        $managersid = Managers::select('manager_passport', 'surname')->get();
        $managers = [];
        foreach ($managersid as $manager) {
            $managers[$manager->manager_passport] = $manager->manager_passport.' '. $manager->surname ;
        }
        return view('site.content.clubs.create')->with([  'managers'=>$managers, 'title' => 'Додати клуб']);
    }


    public function store()
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'club_name' => 'required',
            'number_of_workers' => 'required|numeric',
            'manager_passport' => 'required'
        );

        $validator = validator(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect('club/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $club = new Clubs();
            $club->club_name = Input::get('club_name');
            $club->number_of_workers = Input::get('number_of_workers');
            $club->income = 0;
            $club->manager_passport = Input::get('manager_passport');
            $club->save();
            return redirect('club');
        }
    }


    public function show($id_club)
    {
        $club = Clubs::find($id_club);
//        if(!isset($club)){
//            return redirect('main');
//        }

        return view('site.content.clubs.show')
            ->with(['club' => $club, 'title' => 'Інформація про клуб']);
    }

    public function edit($id_club)
    {
        $club = Clubs::find($id_club);
        $managersid = Managers::select('manager_passport', 'surname')->get();
        $managers = [];
        foreach ($managersid as $manager) {
            $managers[$manager->manager_passport] = $manager->manager_passport.' '. $manager->surname ;
        }
        // show the edit form and pass the nerd
        return view('site.content.clubs.edit')
            ->with(['club' => $club, 'managers'=>$managers, 'title' => 'Редагувати клуб']);
    }


    public function update($id_club)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'club_name' => 'required',
            'number_of_workers' => 'required|numeric',
            'manager_passport' => 'required'
        );
        $validator = validator(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect('club/' . $id_club . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $club = Clubs::find($id_club);
            $club->club_name = Input::get('club_name');
            $club->number_of_workers = Input::get('number_of_workers');
            $club->manager_passport = Input::get('manager_passport');
            $club->save();

            // redirect
            //Session::flash('message', 'Картину успішно оновлено!');
            return redirect('club');
        }
    }

    public function destroy($id_club)
    {
        // delete
        $club = Clubs::find($id_club);
        $club->delete();

        // redirect
        //Session::flash('message', 'Successfully deleted the nerd!');
        return redirect('club');
    }

}
