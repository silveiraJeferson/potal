@extends('portal.read')

@section('portal')



@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif



@endsection
