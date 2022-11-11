<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    public $firstname;
    public $lastname;
    public $years;
    public $gender;
    public $phone;
    public $email;


    /*
     * Принимает данные из формы и подставляет данные в свойства объекта
     *
     * @param array $data
     */
    public function setContactValues(array $data)
    {
        if (!empty($data)) {
            foreach ($data as $datumKey => $datumValue) {
                if (property_exists($this, $datumKey)) {
                    $this->$datumKey = $datumValue;
                }
            }
        }
    }


    /*
     * Фильтруем контакт по телефону
     *
     * @param
     */

    public static function checkContactByPhoneFromList(array $data, object $contact)
    {
        foreach ($data as $datum) {
            if (!empty($datum['custom_fields_values'])) {
                foreach ($datum['custom_fields_values'] as $customField) {
                    if ($customField['field_id'] == 4799401 && $customField['values'][0]['value'] == $contact->phone) {
                        return $datum;
                    }
                }
            }
        }
        return false;
    }

    public static function getValidationMessages()
    {
        return [
            'firstname.required' => 'Поле Имя является обязательным для заполнения',
            'lastname.required' => 'Поле Фамилия является обязательным для заполнения',
            'years.required' => 'Укажите ваш возраст',
            'phone.required' => 'Укажите ваш номер телефона',
            'email.required' => 'Укажите ваш email телефона',
        ];
    }

    public static function getRequiredFields()
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
