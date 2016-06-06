@extends('layout')

@section('title', 'All Cards')

@section('content')
    <table id="cardsTable" class="table table-hover table-bordered">
    <thead>
      <tr>
        <th class='col-lg-2'><h5><strong>Серия</strong></h5></th>
        <th class='col-lg-2'><h5><strong>Номер</strong></h5></th>
        <th class='col-lg-2'><h5><strong>Дата выпуска</strong></h5></th>
        <th class='col-lg-2'><h5><strong>Дата окончания активности</strong></h5></th>
        <th class='col-lg-2'><h5><strong>Статус</strong></h5></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($cards as $card)
        <tr class='clickable-row' data-href='/card/{{$card->id}}'>
          <td>{{ $card->series }}</td>
          <td>{{ $card->card_number }}</td>
          <td>{{ $card->start_date }}</td>
          <td>{{ $card->end_date }}</td>
          <td>{{ $card->status }}</td>
        </tr>
      @endforeach
    </tbody>
    </table>
@stop
