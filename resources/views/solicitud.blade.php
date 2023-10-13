@extends('layouts.app')

@section('content')
@if (session('status'))
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php echo "<script>swal.fire('";?>{{session('status')}}<?php echo "').then(res=>{if(res.isConfirmed){window.location='/solicitud';}});</script>"; ?>

@endif
@if(@Auth::user()->hasRole('aspirante'))
<solicitud usuario="{{Auth::user()->id}}"></solicitud>
@endif
@if(@Auth::user()->hasRole('admin'))
<aspirantes></aspirantes>
@endif
@if(@Auth::user()->hasRole('financiero'))
<comprobantes></comprobantes>
@endif

@endsection
