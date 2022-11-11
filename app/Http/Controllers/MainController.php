<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MainController extends Controller
{
    public function main()
    {
        return view('main');
    }

    public function service()
    {
        return view('service');
    }

    public function serviceMake(Request $request)
    {
        //производим валидацию формы
        Validator::make($request->all(), $this->getRequiredFields(), $this->getValidationMessages())->validate();
        $contact = new Contact();
        $contact->makeContactValues($request->all());
        $contact->makeContactAmocrm();

        var_dump($contact);
        die;

//        return redirect()->route('service');
    }

    public function getValidationMessages()
    {
        return [
            'firstname.required' => 'Поле Имя является обязательным для заполнения',
            'lastname.required' => 'Поле Фамилия является обязательным для заполнения',
            'years.required' => 'Укажите ваш возраст',
            'phone.required' => 'Укажите ваш номер телефона',
            'email.required' => 'Укажите ваш email телефона',
        ];
    }

    public function getRequiredFields()
    {
        return [
            'firstname' => 'required',
            'lastname' => 'required',
            'years' => 'required|min:1|max:120',
            'gender' => 'required',
            'phone' => 'required',
            'email' => 'required'
        ];
    }
}
