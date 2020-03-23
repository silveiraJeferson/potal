@extends('milionarios.read')

@section('milion')

<div class="row">
    <a href="/apostador" class=" btn btn-flat waves-effect waves-light"><i class="material-icons right">arrow_back</i>Voltar</a>    
    <div class="btn btn-flat #ffcdd2 "><i class="material-icons">person</i> Apostador</div>
</div>

<div class="row">    
    <div class="row">
        <form class="col s12 m6" method="post" action="/apostador">

            @csrf
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">person</i>
                    <input id="icon_prefix" name="nome" type="text" class="validate" required="required" minlength="5">
                    <label for="icon_prefix">Nome do Apostador</label>
                </div>               
                <div class="input-field col s12">
                    <i class="material-icons prefix">assignment_ind</i>
                    <input id="icon_prefix" name="apelido" type="text" class="validate" required="required" minlength="5">
                    <label for="icon_prefix">Apelido do Apostador</label>
                </div>              
                <div class="input-field col s12">
                    <i class="material-icons prefix">account_balance</i>
                    <select name="org" >
                        <option value="" disabled selected>Selecione...</option>
                        @foreach($organizacoes as $org)
                        <option value="{{$org->id}}">{{$org->nome}}</option>
                        @endforeach

                    </select>
                    <label>Organização</label>
                </div>

                <div class="input-field col s12 m6">
                    <input class="btn col s12" type="submit"/>
                </div>               
            </div>
        </form>
    </div>

</div>
@endsection