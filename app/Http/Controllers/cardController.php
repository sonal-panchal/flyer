<?php

namespace App\Http\Controllers;

use App\Card;
use Illuminate\Http\Request;
use App\Note;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class cardController extends Controller
{
    public function index()
	{


		/*$cards=Card::all();
		return view("card.index",compact('cards'));*/
	}

	public function show(Card $id)
	{

		//$record=Card::with('notes')->get();

		return view("card.show",compact('id'));
	}
}
