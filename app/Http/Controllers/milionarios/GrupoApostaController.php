<?php

namespace App\Http\Controllers\milionarios;

use App\Http\Controllers\Controller;
use App\models_milionarios\Grupo;
use Illuminate\Http\Request;
use App\models_milionarios\Organizacao;
use App\models_milionarios\ApostadorOrganizacao;
use App\models_milionarios\ApostadorGrupo;

class GrupoApostaController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $grupos = Grupo::orderBy('nome')->get();


        return view('milionarios.grupo.read', compact('grupos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $organizacoes = Organizacao::all();
        return view('milionarios.grupo.create', compact('organizacoes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $grupo = new Grupo($request->all());
        $grupo->save();
        session()->flash('success', "Grupo Adicionado!");
        return redirect('/grupo');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $grupo = Grupo::find($id);
        $apostadores = ApostadorGrupo::where('grupo_id', $id)->get();
        $array_apostadores = [];
        foreach ($apostadores as $item) {
            $array_apostadores[] = $item->apostador_id;
        }

        $ap_org = ApostadorOrganizacao::select('apostador.*', 'organizacao.nome as org', 'organizacao.id as org_id')
                ->leftJoin('apostador', 'apostador.id', '=', 'apostador_organizacao.apostador_id')
                ->leftJoin('organizacao', 'organizacao.id', '=', 'apostador_organizacao.organizacao_id')
                ->get();
        $ap_grup = ApostadorGrupo::select('apostador.*', 'grupo.nome as grupo', 'grupo.id as grupo_id')
                ->leftJoin('apostador', 'apostador.id', '=', 'apostador_grupo.apostador_id')
                ->leftJoin('grupo', 'grupo.id', '=', 'apostador_grupo.grupo_id')
                ->where('apostador_grupo.grupo_id', $id)
                ->get();

        $orgs = Organizacao::all();



        return view('milionarios.grupo.show', compact('grupo', 'apostadores', 'array_apostadores', 'orgs', 'ap_org', 'ap_grup', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $organizacoes = Organizacao::all();

        $apostadores = ApostadorGrupo::select('apostador.*', 'grupo.id as grupo', 'apostador_organizacao.organizacao_id as org')
                ->leftJoin('apostador', 'apostador.id', '=', 'apostador_grupo.apostador_id')
                ->leftJoin('grupo', 'grupo.id', '=', 'apostador_grupo.grupo_id')
                ->leftJoin('apostador_organizacao', 'apostador_organizacao.apostador_id', '=', 'apostador.id')
                ->get();
        $grupo = ApostadorGrupo::where('grupo_id', $id)
                ->select('apostador_id')
                ->get();
        $array_apostadores = [];
        foreach ($grupo as $i) {
            $array_apostadores[] = $i->apostador_id;
        }
        return view('milionarios.grupo.edit', compact('organizacoes', 'apostadores', 'id', 'array_apostadores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {

        $apostadores = ApostadorGrupo::where('grupo_id', $id)->get();
        $arr = [];
        foreach ($apostadores as $i) {
            $arr[] = $i->apostador_id;
        }

        foreach ($request->checkbox as $i) {
            if (!in_array($i, $arr)) {
                ApostadorGrupo::create([
                    'grupo_id' => $id,
                    'apostador_id' => $i
                ]);
            }
        }
        return redirect("/grupo/$id");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id) {
       
        if ($request->remove != 'true') {
            Grupo::destroy($id);
            session()->flash('success', "Grupo Excluido!");
            return redirect('/grupo');
        }else{
            ApostadorGrupo::where('apostador_id',$id)
                    ->where('grupo_id',$request->grupo)
                    ->delete();
            return redirect("/grupo/$request->grupo");
        }
    }

    public function addpessoa($id) {
        dd('oi');
        return view('milionarios.grupo.add_app_grupo');
    }

}
