<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Amoapi extends Model
{
    protected $domain = 'http://hobayef337.meremin.amocrm2.saas'; //Домен нужного аккаунта
    protected $client_id = 'e685358f-a82e-453d-b751-1bb3ad168a53'; //ID интеграции
    protected $client_secret = '38C0OvrjnI8UGwVbAzTOR6TBOMZhMILNcbeu6W6xLnUsg3JDcK2qqKExaSGBr1Em'; //секретный ключ интеграции
    //Код авторизации действителен 20 мин
    protected $auth_code = 'def502004b9fbe064f73894a6698a8cb254a09d496d76b37fec0061722358cc2dd3b21f4a91a27a5c4764dab1b6a0710b2e85df6b9497d485f38d5f708c0affe6bdc9902041cd5872a173848bbdf560d278e43fcf05e346eae7329bb0a8fb4713958994bf73286e5a998fdc84fe90232685bc7f808ab635927675b1f19d4ba87cb3a7e46c4a1cdeb92647a089485f8133ab48cae9c4f1dba19d51cc027d9a3ed8823a506913baacf8397a3df3c11c56a16b8f5d8d978d55ddaff83e67776ac4f2fb7cdb5445409fb060771e4f21647ae908aa0d179c4a0859a1abb2718ec9f67575160feaba327efb05c027682e5d1cea2591023645a1bb6d83e812d632d6d9612ad144d7590176d5f45d8ae3f8239a53b93f951e9319fa9f39d2d6e57fb6bbdbc1ad2edeb2aca828fd4a98f19267a49e36ec007ad1213ce626036cb8495af6a188c00efa1109c45b11ceb2d246d59d9aebf749a58f99677058fba4a6da996ebf35a6d0270f3682fbab3761ccf6ae35dd4886f53657bb34ccbcab401ba67b69d1fbd3e04ea9bc7bf88c65614c57acbad9a9fd1468baf2d43247213fd8b8db7a641e4f8aab5bf85d8dd04aa364b5dadf182c433629f552d6691696e42a7c5866e0d36f7204e76de644f8014268473e67aff';
    //полученый токен доступа для подключения к API
    protected $access_token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjFhN2ZiMTE3MzM5ODY3MzY3NGNhYmRjNmE2MDI3MmNjOGY5MDY0YjVkMzM3ZTZmMTljZGU1ZGE1MzVjNTc2YTk1NjMyYTVhZjhjNDg5MDE2In0.eyJhdWQiOiJlNjg1MzU4Zi1hODJlLTQ1M2QtYjc1MS0xYmIzYWQxNjhhNTMiLCJqdGkiOiIxYTdmYjExNzMzOTg2NzM2NzRjYWJkYzZhNjAyNzJjYzhmOTA2NGI1ZDMzN2U2ZjE5Y2RlNWRhNTM1YzU3NmE5NTYzMmE1YWY4YzQ4OTAxNiIsImlhdCI6MTY2ODE1OTMzMSwibmJmIjoxNjY4MTU5MzMxLCJleHAiOjE2NjgyNDU3MzEsInN1YiI6Ijk4MzM3NCIsImFjY291bnRfaWQiOjI5ODA2NDYxLCJzY29wZXMiOlsicHVzaF9ub3RpZmljYXRpb25zIiwiY3JtIiwibm90aWZpY2F0aW9ucyJdfQ.j9rqZl7X9y9diGzPE2ZoLChRnmlTrqJ9_RHdkZ10r54HtqAPHmUx2s1a7PPS_conBSD3U0wDtiOb3OXWrhD7HBW7RDm__tIdCoW9y0JIVtS2CcclBpc2obWSWgKMacIACbOJr6j4-hfKBdGxG1RMPLJ4DYzoDHgyUAWSvF8R57bgbfGhfpOAzeYjJ5MaZT8McA4A8oem1Gipft6rGoDArdAQetX9Xk-1wQAGeG-RhjSGkiibXwQZmTgcOs_2oi1O4MSfa9pMb3rLyvyZ33_CtCOUmixTnySUOjqwjETV4ggH8_laXjxrLKoC6VqsjvWLJvI4uk1Wiuv3k8U3y4hB4w';
    //полученый токен обновления доступа для подключения к API
    protected $refresh_token = 'def5020003160841e9ddd9abe7e3536f0c939844c1e6b81283810966d03ff7ef1f1abac020b04cdf7e20a087ca2684e462a784060005d6f88bc153acffb915aa7868682f6002f5f2686160046d06e65a18b8bcd472979ce4b45b3156de6fe9b051e2c1343f24781fca199461a8004434caf2a00db910b6743de36addc63994d1eb71d638f4794a7b08fe12ef8a1fba9f74d8195aea0d07bc728411aca32444c7189aa33715e55596907cac71d02b36b81b352f1a52a4ca41105e12f09edad4ea82c78e4bf3f19403590759cb7b64fa784149124f9376c79c8bfdfdec11f59e36c4a2bbfae199834bb2f066e6edb55358857692ea7deb4aaed997469e45a051ff725050a78fa28ec2f197b8069e9ac04bd389edaf87d49c1e2e4ae294973c9c0e64d72d516acbf79bba067e42f4769a1b849f6b4b012280dd57a10af37b57dca006b4e14449d81f951699ab19e9630889d9ab76ccc9e429cb5c309206226672202e1117b4361709c8049a7545380fa4fa2e63ea027e756798b5549f61aae366da2e0b75df75376f9c0493d9ea0584ea82959480b49701bd5b0bbc55d0ad65b7f3c0d44c1c92a41656f06f2a1c21cb655a7175ab8ebf15dfceee47c5f3dc7e81f61ae1c078c61f2dd467';

    protected $errors = [
        400 => 'Bad request',
        401 => 'Unauthorized',
        403 => 'Forbidden',
        404 => 'Not found',
        500 => 'Internal server error',
        502 => 'Bad gateway',
        503 => 'Service unavailable',
    ];

    /*
     * Получаем доступ к API
     *
     */
    public function getAccessToken()
    {
        $link = $this->domain . '/oauth2/access_token'; //Формируем URL для запроса

        $data = [
            'client_id' => $this->client_id,
            'client_secret' => $this->client_secret,
            'grant_type' => 'authorization_code',
//            'code' => $this->auth_code,
            'refresh_token' => $this->refresh_token,
            'redirect_uri' => 'http://hobayef337.meremin.amocrm2.saas/',
        ];

        $curl = curl_init(); //Сохраняем дескриптор сеанса cURL
        curl_setopt($curl,CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl,CURLOPT_USERAGENT,'amoCRM-oAuth-client/1.0');
        curl_setopt($curl,CURLOPT_URL, $link);
        curl_setopt($curl,CURLOPT_HTTPHEADER,['Content-Type:application/json']);
        curl_setopt($curl,CURLOPT_HEADER, false);
        curl_setopt($curl,CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($curl,CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($curl,CURLOPT_SSL_VERIFYPEER, 1);
        curl_setopt($curl,CURLOPT_SSL_VERIFYHOST, 2);
        $out = curl_exec($curl); //Инициируем запрос к API и сохраняем ответ в переменную
        $code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);
        var_dump($data);
        var_dump(json_decode($out, true));
        $this->checkServerRequestCode($code);

        $response = json_decode($out, true);
        var_dump($response);

        $tokens = [
            'access_token' => $response['access_token'], //Access токен
            'refresh_token' => $response['refresh_token'], //Refresh токен
            'token_type' => $response['token_type'], //Тип токена
            'expires_in' => $response['expires_in'] //Через сколько действие токена истекает
        ];

        $this->putRefreshToken($tokens);
    }

    /*
     * Создаем новую сделку
     *
     */
    public function makeNewLead(array $params)
    {
        $link = $this->domain  . '/api/v4/leads';
        $response = $this->makePostRequest($link, $params);

        if (!empty($response['_embedded']['leads'])) {
            //сразу запрашиваем созданную сделку чтобы был номер ответственного и другие параметры
            $link = $this->domain  . '/api/v4/leads/' . $response['_embedded']['leads'][0]['id'];
            $responseLead = $this->makeGetRequest($link);
            if (!empty($responseLead)) {
                return $responseLead;
            }
        }

        return false;
    }

    /*
     * Получаем список контактов по номеру телефона (фильтр не работает, возвращает весь список контактов)
     *
     */
    public function getContactsByPhone(object $contact)
    {
        $link = $this->domain  . '/api/v4/contacts';
//        $link = $this->domain  . '/api/v4/contacts?filter[cf][4799403][]=test.testerov%40test.ru&useFilter=y';
        $queryParams = [
            'filter' => [
                'custom_fields_values' => [
                    4799401 => [
                        [
                            $contact->phone
                        ]
                    ]
                ]
            ]
//            'filter[name]' => 'Тест Тестеров',
//            'filter[custom_fields_values][4799401][]' => $contact->phone,
//            'filter[cf][4799401][]' => '89999999999',
//            'useFilter' => 'y'
        ];

        if (!empty($queryParams)) {
            $link.= '?'.http_build_query($queryParams);
        }

        $response = $this->makeGetRequest($link);

        if (!empty($response['_embedded']['contacts'])) {
            return $response['_embedded']['contacts'];
        }

        return false;
    }

    /*
     * Получаем список сделок связанных с контактом и имеющих статус 142 (успешно реализована)
     *
     */
    public function getSuccessLeadsByContact(array $contact)
    {
        //получаем связанные сделки с контактом
        //(не работат код чисто по сделкам, только если указывать id конкретной сделки, потому получаем все связанные сущности)
        $link = $this->domain  . '/api/v4/contacts/links';
        $bindingParams = [
            'filter' => [
                'entity_id' => $contact['id'], //обязательное поле
//                'to_entity_id' => 669985677,
//                'to_entity_type' => 'leads'
            ]
        ];
        if (!empty($bindingParams)) {
            $link.= '?'.http_build_query($bindingParams);
        }

        $response = $this->makeGetRequest($link);
        $embeddedLinks = [];//складываем id сделок
        if (!empty($response['_embedded']['links'])) {
            foreach ($response['_embedded']['links'] as $embeddedLink) {
                if ($embeddedLink['to_entity_type'] == 'leads') {
                    $embeddedLinks[] = $embeddedLink['to_entity_id'];
                }
            }
        }

        //ищем сделки с полученными id и  статусом 142 (успешно реализован) внутри воронки
        $link = $this->domain  . '/api/v4/leads';
        $queryParams = [
            'filter' => [
                'statuses' => [
                    [
                        'status_id' => 142, //id статуса (успешно реплизован)
                        'pipeline_id' => 32575 //id воронки
                    ],
                ],
                //тут пробовал импровизированный фильтр по контактам, но не работает
                /*'_embedded' => [
                    [
                        'contacts' => [
                            [
                                'id' => 40652501666
                            ]
                        ]
                    ]
                ]*/
            ],
//            'with' => 'contacts'
        ];
        $queryParams['filter']['id'] = $embeddedLinks;

        if (!empty($queryParams)) {
            $link.= '?'.http_build_query($queryParams);
        }

        $response = $this->makeGetRequest($link);

        if (!empty($response['_embedded']['leads'])) {
            return $response['_embedded']['leads'];
        }

        return false;
    }

    /*
     * Создаем контакт
     *
     */
    public function makeNewContact(object $contact)
    {
        $link = $this->domain  . '/api/v4/contacts';

        $data = [
            [
                'name' => $contact->firstname . ' ' . $contact->lastname,
                'first_name' => $contact->firstname,
                'last_name' => $contact->lastname,
                'custom_fields_values' => [
                    [
                        'field_id' => 4799401,
                        'values' => [
                            [
                                'value' => $contact->phone
                            ]
                        ]
                    ],
                    [
                        'field_id' => 4799403,
                        'values' => [
                            [
                                'value' => $contact->email
                            ]
                        ]
                    ],
                    [
                        'field_id' => 4800807,
                        'values' => [
                            [
                                'value' => $contact->years
                            ]
                        ]
                    ],
                    [
                        'field_id' => 4800809,
                        'values' => [
                            [
                                'enum_id' => (int)$contact->gender //в данном случае переключатель и значение обязательно int
                            ]
                        ]
                    ]
                ]
            ]
        ];

        $response = $this->makePostRequest($link, $data);

        if (!empty($response['_embedded']['contacts'])) {
            return $response['_embedded']['contacts'][0];
        }

        return false;
    }

    /*
     * Создаем привязку сущностей
     *
     */
    public function makeEmbeddedBinding($link, $params)
    {
        $link = $this->domain  . $link;
        $response = $this->makePostRequest($link, $params);

        if (!empty($response['_embedded']['contacts'])) {
            return $response['_embedded']['contacts'][0];
        }

        return false;
    }

    /*
     * Создаем нового покупателя
     *
     */
    public function makeNewCustomers(array $contact)
    {
        $link = $this->domain  . '/api/v4/customers';

        $params = [
            [
                'name' => $contact['name']
            ]
        ];

        $response = $this->makePostRequest($link, $params);

        if (!empty($response['_embedded']['customers'])) {
            return $response['_embedded']['customers'][0];
        }

        return false;
    }

    /*
     * Создаем новую задачу
     *
     */
    public function makeNewTasks(array $lead)
    {
        $link = $this->domain  . '/api/v4/tasks';

        $params = [
            [
                'responsible_user_id' => $lead['responsible_user_id'],
                'entity_id' => $lead['id'],
                'entity_type' => 'leads',
                'text' => 'Очень важная задача на очень ответственного пользователя',
                'duration' => 60*60*9, //9 часов
                'complete_till' => $this->calculateCompleteTaskDatetime(4),
            ]
        ];

        $response = $this->makePostRequest($link, $params);

        if (!empty($response['_embedded']['tasks'])) {
            return $response['_embedded']['tasks'][0];
        }

        return false;
    }

    public function makeGetRequest($link, $show = false)
    {
        $headers = [
            'Authorization: Bearer ' . $this->access_token,
            'Content-Type: application/json'
        ];

        $curl = curl_init(); //Сохраняем дескриптор сеанса cURL
        curl_setopt($curl,CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl,CURLOPT_USERAGENT,'amoCRM-oAuth-client/1.0');
        curl_setopt($curl,CURLOPT_URL, $link);
        curl_setopt($curl,CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl,CURLOPT_HEADER, false);
        curl_setopt($curl,CURLOPT_SSL_VERIFYPEER, 1);
        curl_setopt($curl,CURLOPT_SSL_VERIFYHOST, 2);
        $out = curl_exec($curl); //Инициируем запрос к API и сохраняем ответ в переменную
        $code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);
        if ($show == true) {
            var_dump($link);
            var_dump(json_decode($out, true));
        }
        $this->checkServerRequestCode($code);

        return json_decode($out, true);
    }


    public function makePostRequest($link, $data, $show = false)
    {
        $headers = [
            'Authorization: Bearer ' . $this->access_token,
            'Content-Type: application/json'
        ];

        $curl = curl_init(); //Сохраняем дескриптор сеанса cURL
        curl_setopt($curl,CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl,CURLOPT_USERAGENT,'amoCRM-oAuth-client/1.0');
        curl_setopt($curl,CURLOPT_URL, $link);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($curl,CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl,CURLOPT_HEADER, false);
        curl_setopt($curl,CURLOPT_SSL_VERIFYPEER, 1);
        curl_setopt($curl,CURLOPT_SSL_VERIFYHOST, 2);
        $out = curl_exec($curl); //Инициируем запрос к API и сохраняем ответ в переменную
        if ($show == true) {
            var_dump($link);
            var_dump($data);
            var_dump($out);
        }
        $code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);

        $this->checkServerRequestCode($code);

        return json_decode($out, true);
    }

    /*
     * Метод обработки кодов ответов, полученных от сервера.
     *
     */
    public function checkServerRequestCode($code)
    {
        $code = (int)$code;
        try
        {
            if ($code < 200 || $code > 204) {
                throw new \Exception(isset($this->errors[$code]) ? $this->errors[$code] : 'Undefined error', $code);
            }
        }
        catch(\Exception $e)
        {
            die('Ошибка: ' . $e->getMessage() . PHP_EOL . 'Код ошибки: ' . $e->getCode());
        }
    }


    /*
     * Расчет даты выполнения поставленной задачи с учетом рабочего времени
     * @param int $plusDays - через сколько дней окончание задачи
     *
     * @return int - начало рабочего дня даты выполнения задачи в формате unix с учетом часового пояса
     */
    public function calculateCompleteTaskDatetime(int $plusDays)
    {
        //получаем планируемый день выполнения задачи
        $dayComplete = date(strtotime('+'.$plusDays.' days'));
        $day_week = date( 'N', $dayComplete);//смотрим какой это день недели

        if ($day_week > 5) {
            //если день выпадает на выходные, то ставим понедельник и получаем в unix
            $dayCompleteTemp = new \DateTime(date( "Y-m-d", $dayComplete));
            $dayComplete = $dayCompleteTemp->modify('monday')->getTimestamp();
        }
        //получаем время unix начала судного дня с учетом часого пояса
        $dateTimeZone = new \DateTimeImmutable(date("Y-m-d", $dayComplete), new \DateTimeZone('Europe/Moscow'));
        $dayComplete = $dateTimeZone->getTimestamp();
        //прибавляем 9 часов (начало рабочего дня)
        $dayCompleteTime = $dayComplete + (60 * 60 * 9);

        return $dayCompleteTime;
    }

}
