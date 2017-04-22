<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Challenger;

class ChallengerController extends Controller
{
	function index() {
		return view('public.challengers', [
			'challengers' => Challenger::all(),
			'season_badges' => 18
		]);
	}
}