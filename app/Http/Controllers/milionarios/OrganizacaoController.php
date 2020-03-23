<?php

namespace App\Http\Controllers\milionarios;

use App\Http\Controllers\Controller;
use App\models_milionarios\Organizacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\models_milionarios\ApostadorOrganizacao;

class OrganizacaoController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $organizacoes = Organizacao::all();
        $count = [];
        foreach ($organizacoes as $org){
            $count[$org->id] = ApostadorOrganizacao::where('organizacao_id',$org->id)->count();
            $apostadores[$org->id]= ApostadorOrganizacao::where('organizacao_id',$org->id)
//                    
                    ->leftJoin('apostador','apostador_organizacao.apostador_id','=', 'apostador.id' )
                    ->get();
        }
        
        
        return view('milionarios.organizacao.read', compact('organizacoes', 'count', 'apostadores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('milionarios.organizacao.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $org = new Organizacao($request->all());
        $org->save();
        session()->flash('success', 'Item Adicionado!!!');
        session()->flash('alert', '#b2dfdb teal lighten-4 ');
        return redirect('/organizacao');
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
        Organizacao::destroy($id);
        session()->flash('success', 'Item Excluido!!!');
        session()->flash('alert', '#f8bbd0 pink lighten-4');

        return redirect('/organizacao');
    }

}
