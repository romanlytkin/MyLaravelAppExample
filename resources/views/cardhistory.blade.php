@extends('layout')

@section('title', 'Card history')

@section('content')
    <div class="panel panel-default col-lg-6">
      <div class="panel-body">
      <h2>Карта</h2>
      </div>
      <div class="panel-footer">
        <fieldset class="form-group">
          {!! Form::open(array('url'=>'/card/'.$id.'/edit','method'=>'POST', 'id'=>'myform2')) !!}
            <div><strong>Серия: </>{{ $card->series }}</div>
            <div><strong>Номер: </>{{ $card->card_number }}</div>
            <div><strong>Дата окончания активности: </>{{ $card->end_date }}</div>
            <div><strong>Статус: </>{{ $card->status }}</div>
            <p></>
            <button class="btn btn-success pull-right" role="button" type="submit">Редактировать карту</button>
          {!! Form::close() !!}
        </fieldset>
      </div>
    </div>
    <div class='col-lg-12'>
      @if (count($history) !== 0)
        <table>
          <thead>
            <tr>
              <th class='col-lg-6'><h5><strong>Дата покупки</strong></h5></th>
              <th class='col-lg-6'><h5><strong>Цена</strong></h5></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($history as $row)
            <tr>
              <td>{{ $row->buy_date }}</td>
              <td>{{ $row->price }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      @else
        <h2 class="text-center">Покупок по карте пока не производилось</>
      @endif
    </div>
@stop
