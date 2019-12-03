<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Airport;
use App\Models\City;
use App\Http\Requests\UpdateStoreAirportFormRequest;

class AirportController extends Controller
{

    private $airport, $city, $totalPage = 10;

    public function __construct(City $city, Airport $airport) 
    {
        $this->city = $city;
        $this->airport = $airport;
    }
    
    public function index($idCity)
    {

        $city = $this->city->find($idCity);
        if(!$city)
            return redirect()->back();

        $title = "Aeroportos da cidade {$city->name}";

        $airports = $city->airports()->paginate($this->totalPage);

        return view('painel.airports.index', compact('city', 'title', 'airports'));

    }

    
    public function create($idCity)
    {
        $city = $this->city->find($idCity);
        if(!$city)
            return redirect()->back();

        $title = "Cadastrar novo aeroporto na cidade {$city->name}";

        $cities = $this->city->pluck('name', 'id');

        return view('painel.airports.create', compact('title', 'city', 'cities'));
    }

    
    public function store(UpdateStoreAirportFormRequest $request, $idCity)
    {
         $city = $this->city->find($idCity);
         if(!$city)
            return redirect()->back();

        if ($city->airports()->create($request->all()))
            return redirect()
                ->route('airports.index', $idCity)
                ->with('success', 'Aeroport cadastrado com sucesso');

            return redirect()
                ->back()
                ->with('error', 'Deu merda')
                ->withInput();
    }

    
    public function show($idCity, $id)
    {
        $airport = $this->airport->with('city')->find($id);
        if ( !$airport)
            return redirect()->back();
        
            $city = $airport->city;

            $title = "Aeroporto {$airport->name} - {$city->name}";

            return view('painel.airports.show', compact('city', 'title', 'airport'));
    }

    
    public function edit($idCity ,$id)
    {
        $airport = $this->airport->with('city')->find($id);
        if(!$airport)
            return redirect()->back();

        $city = $airport->city;

        $title = "Editando aeroporto {{$airport->name}}";

        return view('painel.airports.edit', compact('airport', 'title', 'city'));
    }

    
    public function update(UpdateStoreAirportFormRequest $request, $idCity, $id)
    {
        $airport = $this->airport->find($id);
        if(!$airport)
            return redirect()->back();

        if($airport->update($request->all()))
            return redirect()
                ->route('airports.index', $idCity)
                ->with('success','Aeroporto atualizad com sucesso');

        return redirect()
            ->back()
            ->with('error', 'Falha ao atualizar aeroporto')
            ->withInput();
    }

    
    public function destroy($idCity, $id)
    {
        $airport = $this->airport->find($id);
        if( !$airport)
            return redirect()->back();
        
        if($airport->delete())
            return redirect()
                    ->route('airports.index', $idCity)
                    ->with('success', 'Aeroporto deletado com sucesos!');

            return redirect()
                    ->back()
                    ->with('error', 'Falha ao deletar aeroporto')
                    ->withInput();
    }

    public function search($idCity, Request $request){
        $city =  $this->city->find($idCity);
        if(!$city)
            return redirect()->back();
        
            $airports = $this->airport->search($city, $request, $this->totalPage);

            $title = "Aeroportos da cidade {$city->name}";

            $dataForm = $request->except('_token');

            return view('painel.airports.index', compact('city', 'title', 'airports', 'dataForm'));
    }
}
