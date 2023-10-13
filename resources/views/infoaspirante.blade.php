@extends('layouts.app')

@section('content')
@if(@Auth::user()->hasRole('admin'))
<detalle aspiranteid='{{$id}}'></detalle>
@endif
@if(@Auth::user()->hasRole('financiero'))
<detallitos aspiranteid='{{$id}}'></detallitos>
@endif
@endsection