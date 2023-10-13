@extends('layouts.app')

@section('content')
@if(@Auth::user()->hasRole('aspirante'))
<welcome usuario="{{Auth::user()->name}}" id="{{Auth::user()->id}}" />
@endif
@if(@Auth::user()->hasRole('admin'))
<bienvenida usuario="{{Auth::user()->name}}" id="{{Auth::user()->id}}" />
@endif
@if(@Auth::user()->hasRole('financiero'))
<financieros usuario="{{Auth::user()->name}}" id="{{Auth::user()->id}}" />
@endif
@endsection
