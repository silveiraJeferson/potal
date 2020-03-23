@extends('milionarios.read')

@section('milion')
<div class="row">
    <a href="/grupo" class=" btn btn-flat waves-effect waves-light"><i class="material-icons right">arrow_back</i></a>    
    <div class="btn btn-flat #ffcdd2 "><i class="material-icons">group</i> Grupos</div>
</div>
<div class="row">
    <h5>{{$grupo->nome}}</h5>
</div>
@if(session('success'))
<div class="card center-align {{session('alert')}}">{{session('success')}}</div>
@endif

<a class="waves-effect waves-light btn btn-flat modal-trigger" href="#add_ap"><i class=" material-icons">group_add</i></a>







<ul class="collection row">
    @foreach($ap_grup as $ap)
    <li class="collection-item col s12 m6 " style="height: 40px;">{{$ap->apelido}}
        <span class="badge">
            <form class="" method="post" action="/grupo/{{$ap->id}}">
                @method('DELETE')
                @csrf
                <input type="hidden" name="remove" value="true"/>
                <input type="hidden" name="grupo" value="{{$ap->grupo_id}}"/>
                <button  type="submit" class="btn-flat"><i class=" material-icons red-text">indeterminate_check_box</i></button>    

            </form>
        </span></li>
    @endforeach
</ul>
@endsection



<!-- Modal Structure -->
<div id="add_ap" class="modal modal-fixed-footer">
    <div class="modal-content">
        <h4>Adicionar apostadores ao grupo</h4>
        <div class="row">
            <div class="col s12">
                <ul class="tabs">
                    @foreach($orgs as $org)
                    <li class="tab col s3 "><a class="black-text" href="#org{{$org->id}}">{{$org->nome}}</a></li>
                    @endforeach

                </ul>
            </div>
            @foreach($orgs as $org)
            <div id="org{{$org->id}}" class="col s12 card">
                <div class="card-content">
                    <form class="" method="post" action="/grupo/{{$id}}">
                        @method('PUT')
                        @csrf
                        @foreach($ap_org as $ap )

                        @if($ap->org_id == $org->id)
                        <span class="col s6 m4">
                            @if(in_array($ap->id, $array_apostadores))
                            <input type="checkbox"  name="checkbox[]" value="{{$ap->id}}" class="filled-in" id="check{{$ap->id}}" checked="checked" />
                            <label for="check{{$ap->id}}">{{$ap->nome}}</label>
                            @else
                            <input type="checkbox"  name="checkbox[]" value="{{$ap->id}}" class="filled-in" id="check{{$ap->id}}" />
                            <label for="check{{$ap->id}}">{{$ap->nome}}</label>
                            @endif
                        </span>
                        @endif
                        @endforeach
                        <br/>
                        <br/>
                        <br/>
                        <p class="card-footer">
                            <button type="submit" class="btn col s12 m4">Salvar</button>
                        </p>
                    </form>
                </div>

            </div>
            @endforeach

        </div>

    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">OK</a>
    </div>
</div>