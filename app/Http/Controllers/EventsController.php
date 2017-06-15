<?php

namespace App\Http\Controllers;

use App\Clubs;
use App\Events;;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class EventsController extends Controller
{
    public function index(){
        $events = Events::all();
        return view('site.events')->with(['events' => $events, 'title' => 'Заходи']);
    }


    public function create()
    {
        $clubsid = Clubs::select('id_club', 'club_name')->get();
        $clubs = [];
        foreach ($clubsid as $club) {
            $clubs[$club->id_club] = $club->id_club.' '. $club->club_name ;
        }
        return view('site.content.events.create')->with([  'clubs'=>$clubs, 'title' => 'Додати захід']);
    }


    public function store()
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'id_club' => 'required',
            'event_name' => 'required',
            'event_artist' => 'required',
            'event_date' => 'required'
        );

        $validator = validator(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect('event/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $event = new Events();
            $event->id_club = Input::get('id_club');
            $event->event_name = Input::get('event_name');
            $event->event_artist = Input::get('event_artist');
            $event->event_date = Input::get('event_date');
            $event->save();


            // redirect
            // Session::flash('message', 'Картина успішно додано!');
            return redirect('event');
        }
    }


    public function show($id_event)
    {
        $event = Events::find($id_event);
//        if(!isset($event)){
//            return redirect('main');
//        }

        return view('site.content.events.show')
            ->with(['event' => $event, 'title' => 'Інформація про захід']);
    }

    public function edit($id_event)
    {
        // get the nerd
        $event = Events::find($id_event);
        $clubsid = Clubs::select('id_club', 'club_name')->get();
        $clubs = [];
        foreach ($clubsid as $club) {
            $clubs[$club->id_club] = $club->id_club.' '. $club->club_name ;
        }
        // show the edit form and pass the nerd
        return view('site.content.events.edit')
            ->with(['event' => $event, 'clubs'=>$clubs, 'title' => 'Редагувати номер телефону']);
    }


    public function update($id_event)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'id_club' => 'required',
            'event_name' => 'required',
            'event_artist' => 'required',
            'event_date' => 'required'
        );
        $validator = validator(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect('event/' . $id_event . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $event = Events::find($id_event);
            $event->id_club = Input::get('id_club');
            $event->event_name = Input::get('event_name');
            $event->event_date = Input::get('event_date');
            $event->event_artist = Input::get('event_artist');
            $event->save();

            return redirect('event');
        }
    }

    public function destroy($id_event)
    {
        // delete
        $event = Events::find($id_event);
        $event->delete();

        // redirect
        //Session::flash('message', 'Successfully deleted the nerd!');
        return redirect('event');
    }

}
