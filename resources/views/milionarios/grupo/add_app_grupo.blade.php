
<div class="row">
    <div class="col s12">
        <ul class="tabs tabs-fixed-width">
            @foreach($organizacoes as $org)
            <li class="tab col s6 m4"><a class="black-text" href="#org{{$org->id}}">{{$org->nome}}</a></li>  
            @endforeach
        </ul>
    </div>
    @foreach($organizacoes as $org)
    <div id="org{{$org->id}}" class="col s12">
        <p>{{$org->nome}}<span class=" badge #b71c1c red darken-4 white-text">{{$count[$org->id]}}</span></p>
        <div class="row">
            <form method="post" action="/grupo/{{$grupo->id}}">
                @method('PUT')
                @csrf
                @foreach($apostadores as $ap )
                <span class="col s6 m3">
                    <input type="checkbox"  name="checkbox[]" value="{{$ap->id}}" class="filled-in" id="check{{$ap->id}}" />
                    <label for="check{{$ap->id}}">{{$ap->nome}}</label>
                </span>  
                @endforeach
                <br/>
                <p>
                    <button type="submit" class="btn col s12 m4">Salvar</button>
                </p>
            </form>
        </div>
    </div>
    @endforeach
</div>