@extends('portal.read')

@section('portal')
<div class="row">
    <div class="col s12 m4">
        <div class="card">
            <div class="card-image">
                <img src="/storage/loterias.jpg">
                <span class="card-title">  
                    <span class="card-panel grey lighten-1 black-text" style="opacity: 0.8">Os Milionários</span>
                </span>
                <a href="/milionarios" class="btn-floating halfway-fab waves-effect waves-light green" title="Visitar Site"><i class="material-icons">near_me</i></a>
            </div>
            <div class="card-content">
                <p>Criado com o ituito de ficar milionário através das loterias.</p>
            </div>
        </div>
    </div>
</div>
@endsection