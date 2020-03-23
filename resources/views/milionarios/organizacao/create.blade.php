@extends('milionarios.read')

@section('milion')
<div class="row">
    <a href="/organizacao" class=" btn btn-flat waves-effect waves-light"><i class="material-icons right">arrow_back</i></a>    
    <div class="btn btn-flat #ffcdd2 "><i class="material-icons">account_balance</i> Organizações</div>
</div>
@if(session('success'))
<div class="card center-align {{session('alert')}}">{{session('success')}}</div>
@endif
<div class="row">    
    <div class="row">
        <form class="col s12 m6" method="post" action="/organizacao">

            @csrf
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">account_balance</i>
                    <input id="icon_prefix" name="nome" type="text" class="validate" required="required" minlength="5">
                    <label for="icon_prefix">Nome da Organização</label>
                </div>               
                <div class="input-field col s12 m6">
                    <input class="btn col s12" type="submit"/>
                </div>               
            </div>
        </form>
    </div>

</div>
@endsection