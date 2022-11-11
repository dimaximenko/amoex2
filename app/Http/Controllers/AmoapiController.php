<?php

namespace App\Http\Controllers;

use App\Models\Amoapi;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AmoapiController extends Controller
{

    //получения токена авторизации
    public function makeAuthAccess()
    {
        $amoApi = new Amoapi();
        $amoApi->getAccessToken();
    }

    public function makeLeadByContactTest()
    {
        $amoApi = new Amoapi();
        $contacts = $amoApi->getContacts();
        var_dump($contacts);
    }

    public function makeLeadByContact(Request $request)
    {
        //производим валидацию формы и создаем объект контакта
        Validator::make($request->all(), Contact::getRequiredFields(), Contact::getValidationMessages())->validate();
        $contactByForm = new Contact();
        $contactByForm->setContactValues($request->all());

        $leadParams = [
            [
                'name' => 'Сделка для примера 1',
                'price' => 220
            ]
        ];

        $amoApi = new Amoapi();
        $contact = null;
        //Проверяем существует ли контакт в системе по номеру телефону
        $contactsList = $amoApi->getContactsByPhone($contactByForm);
        if (!empty($contactsList)) {
            //т.к. фильтрация по кастомным полям по неведомой причине не работает то перебираем вручную
            $contact = Contact::checkContactByPhoneFromList($contactsList, $contactByForm);
        }

        if (!empty($contact) && !isset($contact['_embedded']['customers'])) {
            //проверяем есть ли у контакта связанная сделка со статусом (142 - успешно реализована)
            $succseccLead = $amoApi->getSuccessLeadsByContact($contact);
            if (!empty($succseccLead)) {
                //создаем новыго покупателя
                $customer = $amoApi->makeNewCustomers($contact);
                //привязываем сущность покупателя к сущности контакта
                $makeBindingLink = '/api/v4/contacts/'.$contact['id'].'/link';
                //параметры привязываемой сущности (покупаель)
                $makeBindingParams = [
                    [
                        'to_entity_id' => $customer['id'], //id сущности
                        'to_entity_type' => 'customers' //тип сущности
                    ]
                ];
                $amoApi->makeEmbeddedBinding($makeBindingLink, $makeBindingParams);
            }
        } else {
            //создаем новый контакт
            $contact = $amoApi->makeNewContact($contactByForm);
        }

        //добавляем в параметры запроса на создание сделки id контака
        $leadParams[0]['_embedded']['contacts'][0]['id'] = $contact['id'];

        //создаем сделку
        $lead = $amoApi->makeNewLead($leadParams);
        //привязываем элементы каталога к сделке
        /*$link = 'http://hobayef337.meremin.amocrm2.saas/api/v4/catalogs/10845/elements';//каталог с товарами
        $req = $amoApi->makeGetRequest($link, true);
        var_dump($req);*/

        $makeBindingLink = '/api/v4/leads/'.$lead['id'].'/link';
        $makeBindingParams = [
            [
                'to_entity_id' => 1645515, //id самого товара
                'to_entity_type' => 'catalog_elements', //тип каталога
                'metadata' => [
                    'quantity' => 1,
                    'catalog_id' => 10845 //id каталога в котором он лежит
                ]
            ],
            [
                'to_entity_id' => 1645513,
                'to_entity_type' => 'catalog_elements',
                'metadata' => [
                    'quantity' => 1,
                    'catalog_id' => 10845
                ]
            ],
        ];
        $amoApi->makeEmbeddedBinding($makeBindingLink, $makeBindingParams);

        //создаем новую задачу
        $task = $amoApi->makeNewTasks($lead);

        return view('success');
    }
}
