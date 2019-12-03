<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model {

	
	protected $casts = [
		'is_promotion' => 'boolean',
	];

	public $fillable = [
		'plane_id',
		'airport_origin_id',
		'airport_destination_id',
		'date',
		'time_duration',
		'hour_output',
		'arrival_time',
		'old_price',
		'price',
		'total_plots',
		'is_promotion',
		'image',
		'qtd_stops',
		'description',
	];

	public function getItens() {
		return $this->with(['origin', 'destination'])
			->paginate($this->totalPage);
	}

	public function newFlight($request, $newNameFile = '') {
		/*
			$data = $request->all();
				$data = $request->all();
				$data['airport_origin_id'] = $request->origin;
		*/
		$data = $request->all();
		$data['image'] = $newNameFile;
		return $this->create($data);
	}

	public function updateFlight($request, $nameFile = '') {
		/*$data = $request->all();
			$data['airport_origin_id'] = $request->origin;
			$data['airport_destination_id'] = $request->destination;
		*/
		$data = $request->all();
		$data['image'] = $nameFile;
		return $this->update($data);
	}

	public function origin() {
		return $this->belongsTo(Airport::class, 'airport_origin_id');
	}

	public function destination() {
		return $this->belongsTo(Airport::class, 'airport_destination_id');
	}

	// public function getDateAttribute($value)
	// {
	// 	return \Carbon\Carbon::parse($value)->format('d/m/Y');
	// }

	public function search($request, $totalPage)
	{
		$flights = $this->where(function($query) use ($request) {
			if ($request->code)
				$query->where('id', $request->code);

			if ($request->date)
				$query->where('date', $request->date);

			if ($request->hour_output)
				$query->where('hour_output', $request->hour_output);

			if ($request->qtd_stops)
				$query->where('qtd_stops', $request->qtd_stops);

			if ($request->origin)
				$query->where('airport_origin_id', $request->origin);

			if ($request->destination)
				$query->where('aiport_destination_id', $request->destination);
		})->paginate($totalPage);

		return $flights;
	}
}
