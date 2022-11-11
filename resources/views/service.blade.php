@extends('layout')

@section('meta_title') Сервис ex2 @endsection
@section('main_content')
    <h1>Страница сервиса по созданию контактов и покупателей в AmoCRM</h1>

    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif
    <form method="post" action="/amoapi/make">
        @csrf
        <div class="form_field">
            <label for="firstname">Имя</label>
            <input type="text" name="firstname">
        </div>
        <div class="form_field">
            <label for="lastname">Фамилия</label>
            <input type="text" name="lastname">
        </div>
        <div class="form_field">
            <label for="years">Возраст</label>
            <input type="number" name="years">
        </div>
        <div class="form_field">
            <p>Выберите пол</p>
            <label for="gender_m">Мужской</label>
            <input type="radio" name="gender" id="gender_m" value="4080251" checked>
            <label for="gender_w">Женский</label>
            <input type="radio" name="gender" id="gender_w" value="4080253">
        </div>
        <div class="form_field">
            <label for="phone">Телефон</label>
            <input type="tel" name="phone">
        </div>
        <div class="form_field">
            <label for="email">Email</label>
            <input type="email" name="email">
        </div>
        <div class="form_field">
            <button type="submit">Отправить</button>
        </div>
    </form>
@endsection
