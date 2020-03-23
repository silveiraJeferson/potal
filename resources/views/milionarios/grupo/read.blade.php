@extends('milionarios.read')

@section('milion')
<div class="row">
    <a href="/grupo/create" class="btn btn-flat waves-effect waves-light btn"><i class="material-icons right">add</i></a>    
    <div class="btn btn-flat #ffcdd2 "><i class="material-icons">group</i> Grupos</div>
</div>

@if(session('success'))
<div class="card center-align {{session('alert')}}">{{session('success')}}</div>
@endif
<div class="row">    
    @foreach($grupos as $grupo)
    <div class="col s12 m4">
        <a class=" btn-flat" href="/grupo/{{$grupo->id}}"><i class="material-icons">group</i> {{$grupo->nome}}</a>
    </div>
    @endforeach
</div>
@endsection
