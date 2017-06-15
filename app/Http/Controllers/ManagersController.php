<?php

namespace App\Http\Controllers;

use App\Managers;
use App\MenuPositions;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ManagersController extends Controller
{
    public function index(){
        $managers = Managers::all();
        return view('site.managers')->with(['managers' => $managers, 'title' => 'Менеджери']);
    }


    public function create()
    {


        return view('site.content.managers.create')->with([ 'title' => 'Додати менеджера']);
    }


    public function store()
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'manager_passport' => 'required|numeric',
            'surname' => 'required',
            'name' => 'required',
            'salary' => 'required|numeric',
            'birth_date' => 'required'
        );

        $validator = validator(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect('manager/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $manager = new Managers();
            $manager->manager_passport = Input::get('manager_passport');
            $manager->surname = Input::get('surname');
            $manager->name = Input::get('name');
            $manager->salary = Input::get('salary');
            $manager->birth_date = Input::get('birth_date');
            $manager->save();

            $user = new User();
            $user->passport_number = Input::get('manager_passport');
            $user->position = 'Менеджер';
            $user->password = bcrypt('root');
            $user->surname = Input::get('surname');
            $user->name = Input::get('name');
            $user->save();


            // redirect
            // Session::flash('message', 'Картина успішно додано!');
            return redirect('manager');
        }
    }


    public function show($manager_passport)
    {
        $manager = Managers::find($manager_passport);
//        if(!isset($manager)){
//            return redirect('main');
//        }

        return view('site.content.managers.show')
            ->with(['manager' => $manager, 'title' => 'Інформація про менеджера']);
    }

    public function edit($manager_passport)
    {
        // get the nerd
        $manager = Managers::find($manager_passport);

        // show the edit form and pass the nerd
        return view('site.content.managers.edit')
            ->with(['manager' => $manager, 'title' => 'Редагувати менеджера']);
    }


    public function update($manager_passport)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'manager_passport' => 'required|numeric',
            'surname' => 'required',
            'name' => 'required',
            'salary' => 'required|numeric',
            'birth_date' => 'required'
        );
        $validator = validator(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect('manager/' . $manager_passport . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $manager = Managers::find($manager_passport);
            $manager->manager_passport = Input::get('manager_passport');
            $manager->surname = Input::get('surname');
            $manager->name = Input::get('name');
            $manager->salary = Input::get('salary');
            $manager->birth_date = Input::get('birth_date');
            $manager->save();

            // redirect
            //Session::flash('message', 'Картину успішно оновлено!');
            return redirect('manager');
        }
    }

    public function destroy($manager_passport)
    {
        // delete
        $manager = Managers::find($manager_passport);
        $manager->delete();

        // redirect
        //Session::flash('message', 'Successfully deleted the nerd!');
        return redirect('manager');
    }

}
