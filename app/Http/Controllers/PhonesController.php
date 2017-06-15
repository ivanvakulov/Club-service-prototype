<?php

namespace App\Http\Controllers;


use App\Managers;
use App\PhoneNumbers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class PhonesController extends Controller
{
    public function index(){
        $phones = PhoneNumbers::all();


        return view('site.phones')->with(['phones' => $phones, 'title' => 'Номери телефонів']);
    }
    public function create()
    {
        $managersid = Managers::select('manager_passport', 'surname')->get();
        $managers = [];
        foreach ($managersid as $manager) {
            $managers[$manager->manager_passport] = $manager->manager_passport.' '. $manager->surname ;
        }
        return view('site.content.phones.create')->with([  'managers'=>$managers, 'title' => 'Додати номер телефону']);
    }


    public function store()
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'mobile' => 'required',
            'home' => 'required',
            'manager_passport' => 'required|numeric'

        );
        $validator = validator(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect('phone/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $phone = new PhoneNumbers();
            $phone->mobile = Input::get('mobile');
            $phone->home = Input::get('home');
            $phone->manager_passport = Input::get('manager_passport');
            $phone->save();

            // redirect
            // Session::flash('message', 'Картина успішно додано!');
            return redirect('phone');
        }
    }


    public function show($mobile)
    {
        $phone = PhoneNumbers::find(strval($mobile));
//        if(!isset($phone)){
//            return redirect('main');
//        }

        return view('site.content.phones.show')
            ->with(['phone' => $phone, 'title' => 'Інформація про номер телефону']);
    }

    public function edit($mobile)
    {
        // get the nerd
        $phone = PhoneNumbers::find($mobile);
        $managersid = Managers::select('manager_passport', 'surname')->get();
        $managers = [];
        foreach ($managersid as $manager) {
            $managers[$manager->manager_passport] = $manager->manager_passport.' '. $manager->surname ;
        }
        // show the edit form and pass the nerd
        return view('site.content.phones.edit')
            ->with(['phone' => $phone, 'managers'=>$managers, 'title' => 'Редагувати номер телефону']);
    }


    public function update($mobile)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'mobile' => 'required',
            'home' => 'required',
            'manager_passport' => 'required|numeric'

        );
        $validator = validator(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect('phone/' . $mobile . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $phone = PhoneNumbers::find($mobile);
            $phone->mobile = Input::get('mobile');
            $phone->home = Input::get('home');
            $phone->manager_passport = Input::get('manager_passport');
            $phone->save();

            // redirect
            //Session::flash('message', 'Картину успішно оновлено!');
            return redirect('phone');
        }
    }

    public function destroy($mobile)
    {
        // delete
        $phone = PhoneNumbers::find($mobile);
        $phone->delete();

        // redirect
        //Session::flash('message', 'Successfully deleted the nerd!');
        return redirect('phone');
    }

}
