<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\Models\Airport;
use App\Models\Flight;
use App\Models\Plane;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdatFightFormRequest;

class FlightController extends Controller {

	private $flight;
	private $totalPage = 20;

	public function __construct(Flight $flight) {
		$this->flight = $flight;
	}

	public function index() {
		$title = 'Voos disponiveis';

		$flights = $this->flight->getItens();

		$airports = Airport::pluck('name', 'id');
		$airports->prepend('Escolha o aeroporto', '');
		return view('painel.flights.index', compact('title', 'flights', 'airports'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$title = 'Cadastrar voos';

		$planes = Plane::pluck('id', 'id');

		$airports = Airport::pluck('name', 'id');

		return view('painel.flights.create', compact('title', 'planes', 'airports'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(StoreUpdatFightFormRequest $request) {

		$nameFile = '';

		if ($request->hasFile('image') && $request->file('image')->isValid()) {

			$nameFile = uniqid(date('HisYmd')) . '.' . $request->image->extension();

			if (!$request->image->storeAs('flights', $nameFile)) {
				return redirect()
					->back()
					->with('error', 'Falha ao fazer Upload')
					->withInput();
			}

		}

		if ($this->flight->newFlight($request, $nameFile)) {
			return redirect()
				->route('flights.index')
				->with('success', 'Sucesso ao cadastrar!');
		} else {
			return redirect()
				->back()
				->with('error', 'Falha ao cadastrar')
				->withInput();
		}

	}

	public function show($id) {
		$flight = $this->flight->with(['origin', 'destination'])->find($id);
		if (!$flight) {
			return redirect()->back();
		}

		$title = "Detalhes do voo {$flight->id}";

		return view('painel.flights.show', compact('flight', 'title'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$flight = $this->flight->find($id);

		if (!$flight) {
			return redirect()->back();
		}

		$title = "Editar Voo {$flight->id}";

		$planes = Plane::pluck('id', 'id');

		$airports = Airport::pluck('name', 'id');

		return view('painel.flights.edit', compact('title', 'flight', 'planes', 'airports'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(StoreUpdatFightFormRequest $request, $id) {

		$flight = $this->flight->find($id);

		if (!$flight) {
			return redirect()->back();
		}

		$nameFile = $flight->image;
		if ($request->hasFile('image') && $request->file('image')->isValid()) {

			if($flight->image)
				$nameFile = $flight->image;
			else
				$nameFile = uniqid(date('HisYmd')) . '.' . $request->image->extension();

			if (!$request->image->storeAs('flights', $nameFile)) {
				return redirect()
					->back()
					->with('error', 'Falha ao fazer Upload')
					->withInput();
			}

		}

		if ($flight->updateFlight($request, $nameFile)) {
			return redirect()
				->route('flights.index')
				->with('success', 'Sucesso ao atualizar');
		} else {
			return redirect()
				->back()
				->with('error', 'Falha ao atualizar')
				->withInput();
		}

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		$this->flight->find($id)->delete();

		return redirect()
			->route('flights.index')
			->with('success', 'Sucesso ao deletar');
	}

	public function search(Request $request) {
		$flights = $this->flight->search($request, $this->totalPage);

		$dataForm = $request->except('_token');

		$title = 'Resultados dos voos pesquisados';

		$airports = Airport::pluck('name', 'id');

		return view('painel.flights.index', compact('title', 'flights', 'dataForm', 'airports'));
	}
}
