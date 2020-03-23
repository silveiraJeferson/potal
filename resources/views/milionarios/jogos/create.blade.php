@extends('milionarios.read')

@section('milion')

<div class="card">
    <div class="card-header"><h5>Add Jogos</h5>
        <div id="arrayDezenas">


        </div>

    </div>
    <div class="card-body">
        <div class="row center-align">
            <form method="post" action="/jogos">
                @csrf
                @php
                $count = 0;
                @endphp
                @foreach(range(1,60) as $i)

                @if($count % 6 == 0)
                <br/>
                @endif
                <span class="col s2">
                    <input onclick="setArrayDezenas()" name="chek{{$i}}"  value="{{$i}}" type="checkbox" id="test{{$i}}" />
                    @if($i < 10)
                    <label for="test{{$i}}">0{{$i}}</label>
                    @else
                    <label for="test{{$i}}">{{$i}}</label>
                    @endif
                </span>
                @php $count++; @endphp

                @endforeach
                <div id="btnSubmit"></div>
            </form>

        </div>
    </div>
</div>


@endsection