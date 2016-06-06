<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Response;
use DateTime;
use App\Cards;
use App\Purchases;

class CardsController extends Controller
{
    public function index()
    {
      $cards = Cards::all();
      return view('allcards', ['cards' => $cards]);
    }

    public function create(Request $request)
    {
        $series = $request->input('series');
        $count = $request->input('count');
        $activity = $request->input('activity');
        $allids=array();
        for ($i=0; $i < $count; $i++) {
          while (true) {
            $code = mt_rand(0, 9999999999);
            if (strlen($code) != 16) {
              $len = 16 - strlen($code);
              for ($j=0; $j < $len; $j++) {
                $code = "0".$code;
              }
            }
            $sdate = date('Y-m-d H:i:s');
            if ($activity == 0) {
              $edate = date('Y-m-d H:i:s', strtotime('+1 year'));
            }
            elseif ($activity == 1) {
              $edate = date('Y-m-d H:i:s', strtotime('+6 month'));
            }
            elseif ($activity == 2) {
              $edate = date('Y-m-d H:i:s', strtotime('+1 month'));
            }
            if (!in_array($code, $allids)) {
              array_push($allids, $code);
              $newcard = new Cards();
              $newcard->series = $series;
              $newcard->card_number = $code;
              $newcard->start_date = $sdate;
              $newcard->end_date = $edate;
              $newcard->sum = 0;
              $newcard->status = "не активирована";
              $newcard->save();
              break;
            }
          }
        }
        return Response::json('success');
    }

    public function show($id)
    {
      $card = Cards::where('id', '=', $id)->first();
      $history = Purchases::where('card_id', '=', $id)->get();
      return view('cardhistory', ['id' => $id, 'card' => $card, 'history' => $history]);
    }

    public function edit($id)
    {
        $card = Cards::where('id', '=', $id)->first();
        if ($card->status == 'не активирована') {
          $value = 0;
        }
        elseif ($card->status == 'активирована') {
          $value = 1;
        }
        elseif ($card->status == 'просрочена') {
          $value = 2;
        }
        return view('editcard', ['card' => $card, 'value' => $value]);
    }

    public function editcard(Request $request)
    {
        $status = $request->input('status');
        $sum = $request->input('sum');
        echo $status." ".$sum;
    }

    public function addprise(Request $request)
    {
        $id = $_GET['id'];
        $dtime = DateTime::createFromFormat('d/m/Y H:i A', $request->input('pay_day'));
        $pay_day = $dtime->format('Y-m-d H:i:s');
        $price = $request->input('price');
        $newprise = new Purchases();
        $newprise->card_id = $id;
        $newprise->buy_date = $pay_day;
        $newprise->price = $price;
        $newprise->save();
        return redirect('/card/'.$id.'/edit');
    }

}
