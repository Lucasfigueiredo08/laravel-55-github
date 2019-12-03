<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\Models\State;
use Illuminate\Http\Request;

class CityController extends Controller {

	private $totalPage = 20;

	public function index($initials) {

		$state = State::where('initials', $initials)->get()->first();

		if (!$state) {
			return redirect()->back();
		}

		$cities = $state->cities()->paginate($this->totalPage);

		$title = "Cidades do Estado {$state->name}";

		return view('painel.cities.index', compact('title', 'state', 'cities'));
	}

	public function search(Request $request, $initials) {
		$state = State::where('initials', $initials)->get()->first();

		if (!$state) {
			return redirect()->back();
		}

		$dataForm = $request->all();

		$keySearch = $request->key_search;

		$cities = $state->searchCities($keySearch, $this->totalPage);

		$title = "Filtro: Cidades do estado {$state->name}";

		return view('painel.cities.index', compact('title', 'state', 'cities', 'dataForm'));
	}

}
