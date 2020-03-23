<?php

namespace App\Http\Controllers\milionarios;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models_milionarios\Apostador;
use App\models_milionarios\Organizacao;
use Illuminate\Support\Facades\DB;

class ApostadorController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $apostadores = Apostador::orderBy('nome')->paginate(10);
        $organizacoes = Organizacao::all();
        if (count($organizacoes) == 0) {
            session()->flash('success', 'Ok, mas primeiro adicione uma organização!!');

            session()->flash('alert', '#f8bbd0 pink lighten-4');
            return redirect('/organizacao/create');
        }
        return view('milionarios.apostador.read', compact('apostadores', 'organizacoes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $organizacoes = Organizacao::all();
        if (count($organizacoes) == 0) {
            session()->flash('success', 'Ok, mas primeiro adicione uma organização!!');
            session()->flash('alert', '#f8bbd0 pink lighten-4');
            return redirect('/organizacao/create');
        }
        return view('milionarios.apostador.create', compact('organizacoes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $apostador = new Apostador($request->all());
        $apostador->save();

        DB::insert('insert into apostador_organizacao (apostador_id, organizacao_id) values (?, ?)', [$apostador->id, $request->org]);

        session()->flash('success', 'Item Adicionado!!!');

        session()->flash('alert', '#b2dfdb teal lighten-4 ');
        return redirect('/apostador');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        Apostador::destroy($id);
        session()->flash('success', 'Item Excluido!!!');
        session()->flash('alert', '#f8bbd0 pink lighten-4');

        return redirect('/apostador');
    }

}
