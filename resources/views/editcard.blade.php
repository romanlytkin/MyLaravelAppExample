@extends('layout')

@section('title', 'Card history')

@section('content')
    <div class="col-lg-12">
      <div class="panel panel-default col-lg-6 col-lg-offset-3">
        <div class="panel-body">
          <h2>Карта</h2>
        </div>
        <div class="panel-footer">
          <fieldset class="form-group">
            <div><strong>Серия: </>{{ $card->series }}</div>
            <div><strong>Номер: </>{{ $card->card_number }}</div>
            <div><strong>Дата окончания активности: </>{{ $card->end_date }}</div>
            {!! Form::label(null, 'Сумма на счете') !!}
            {!! Form::text(null, null, ['class' => 'form-control', 'name' => 'sum']) !!}
            {!! Form::label(null, 'Статус') !!}
            {!! Form::select('status', ['не активирована', 'активирована', 'просрочена'], $value) !!}
            <div class="form-group">
              <button class="btn btn-success pull-right editcard" role="button">Изменить статус</button>
            </div>
          </fieldset>
        </div>
      </div>
    </div>

    <div class="col-lg-12">
      <div class="panel panel-default col-lg-6 col-lg-offset-3">
        <div class="panel-body">
          <h2>Выполнить оплату по карте</h2>
        </div>
        <div class="panel-footer">
          <fieldset class="form-group">
            {!! Form::open(array('url'=>'addprise/?id='.$card->id,'method'=>'POST', 'id'=>'myform')) !!}
              <div class="form-group">
                {!! Form::label(null, 'Дата отлаты') !!}
                <div class='input-group date' id='datetimepicker'>
                    <input type='text' class="form-control" name='pay_day'/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
              </div>
              <div class="form-group">
                {!! Form::label(null, 'Цена') !!}
                {!! Form::text(null, null, ['class' => 'form-control', 'name' => 'price']) !!}
              </div>
              <div class="form-group">
                <button class="btn btn-success pull-right" role="submit">Добавить</button>
              </div>
            {!! Form::close() !!}
          </fieldset>
        </div>
      </div>
    </div>

@stop
