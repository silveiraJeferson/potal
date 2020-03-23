<?php

namespace App\Http\Controllers\milionarios;
use App\Http\Controllers\Controller;

use App\models_milionarios\Jogo;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Controllers\DateController;

class JogosController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('milionarios.jogos.read');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('milionarios.jogos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $requests = $request->all();
        foreach ($requests as $item) {
            $arr[] = $item;
        }
        $numeros = [];
        for ($i = 1; $i < count($arr); $i++) {
            $numeros[] = $arr[$i];
        }
       
        $data_extenso = new DateController();
        $today = $data_extenso->getDiaDASemana(date('D'));
        if($today == "Domingo" || $today == "Segunda" || $today == "Terça" ){
            $data_aposta = new Carbon('next wednesday');
        }elseif ($today == 'Quinta' || $today == 'Sexta') {
            $data_aposta = new Carbon('next saturday');
        }else{
            $data_aposta =  Carbon::today();
        }
        

        $jogo = new Jogo();
        $jogo->data = $data_aposta;
        $jogo->numeros = json_encode($numeros);
        $jogo->save();
        return $this->create();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Jogo  $jogo
     * @return \Illuminate\Http\Response
     */
    public function show(Jogo $jogo) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Jogo  $jogo
     * @return \Illuminate\Http\Response
     */
    public function edit(Jogo $jogo) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Jogo  $jogo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jogo $jogo) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Jogo  $jogo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jogo $jogo) {
        //
    }

    public function salvarjogo() {
        
    }

}
