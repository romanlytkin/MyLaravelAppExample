@extends('layout')

@section('title', 'Home')

@section('content')
<div class="content">
  <div id="generatecards">
    <div class="content-title">
      <h2>Генератор карт</h2>
      <hr/>
    </div>
    {!! Form::open(array('url'=>'generatecards','method'=>'POST', 'id'=>'myform')) !!}
      <div>
        {!! Form::label(null, 'Серия') !!}
        {!! Form::text(null, null, ['class' => 'form-control', 'name' => 'series']) !!}
      </div>
      <div>
        {!! Form::label(null, 'Количество карт') !!}
        {!! Form::text(null, null, ['class' => 'form-control', 'name' => 'count']) !!}
      </div>
      <div>
        {!! Form::label(null, 'Срок окончания активности') !!}
        {!! Form::select('activity', ['1 год', '6 месяцев', '1 месяц'], null) !!}
      </div>
      <div>
        {!! Form::button('Создать карты', array('class' => 'btn createCards')) !!}
      </div>
    {!! Form::close() !!}
  </div>
</div>
@stop
