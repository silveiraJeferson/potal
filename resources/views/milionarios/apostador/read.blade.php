@extends('milionarios.read')

@section('milion')

<div class="row">
    <a href="/apostador/create" class="btn btn-flat waves-effect waves-light btn"><i class="material-icons right">add</i>Adicionar</a>    
    <div class="btn btn-flat #ffcdd2 "><i class="material-icons">person</i> Apostador</div>
</div>
@if(session('success'))
<div class="card center-align {{session('alert')}}">{{session('success')}}</div>
@endif
<div class="row">    
    <ul class="collapsible " data-collapsible="accordion">
        @foreach($apostadores as $apostador)
        <li>
            <div class="collapsible-header">{{$apostador->nome}}<span class=" badge">4</span></div>
            <div class="collapsible-body">
                <span>
                    kkk
                </span>
                <div class="divider"></div>

                <form class=" right-align" method="post" action="/apostador/{{$apostador->id}}">
                    @csrf
                    @method('DELETE')
                    <button  type="submit" class="btn-flat"><i class="material-icons right red-text">delete</i></button>    
                </form>
            </div>

        </li>       
        @endforeach
        {{ $apostadores->render() }}
    </ul>
</div>
@endsection