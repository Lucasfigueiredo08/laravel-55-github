<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 
use App\Models\Reserve;
use App\Models\Flight; 
use App\User;

class ReservesController extends Controller
{
    private $reserve, $totalPage = 50;

    public function __construct(Reserve $reserve)
    {
        $this->reserve = $reserve;
    }

    public function index()
    {
        $title = "Reservas de Passagens aéreas";

        $reserves = $this->reserve->with(['user', 'flight'])->paginate($this->totalPage);

        return view('painel.reserves.index', compact('title', 'reserves'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Nova Reserva';

        $users = User::pluck('name', 'id');
        $flights = Flight::pluck('id', 'id');

        $status = $this->reserve->status();

        return view('painel.reserves.create', compact('title', 'users', 'flights', 'status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }
}
