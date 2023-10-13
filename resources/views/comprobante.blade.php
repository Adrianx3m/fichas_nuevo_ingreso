@extends('layouts.app')

@section('content')

@php
$desdos = json_decode($idEnc);
@endphp


  <div class="container">
      <h1 class="mt-5 fw-bold">Comprobante de pago</h1>
      <p class="text-dark" style="font-size:18px; font-family:Arial, Helvetica, sans-serif;">Para continuar con el proceso de admisión deberás cubrir la cuota por derecho a Examen de Admisión.</p>
      <div>
        <h3 class="mt-3 fw-bold">Conceptos y costos</h3>
        <h5 class="mt-3 fw-bold">Ficha de admisión: $ 225.00</h5>
        <div style="font-size:18px; font-family:Arial, Helvetica, sans-serif;">
          <p class="text-dark" >El pago será válido solo si se realiza el deposito a la cuenta:</p>
          <p class="text-dark" >Número de cuenta: <b class="fw-bold">65-50864959-1</b></p>
          <p class="text-dark" >Clabe interbancaria: <b class="fw-bold">014651655086495911</b></p>
        </div>
      </div>
      <div style="font-size:18px; font-family:Arial, Helvetica, sans-serif; text-align: justify;">
        <span>Realiza el pago en cualquier sucursal SANTANDER a nombre del Instituto Tecnológico de Tecomatlán.</span>
        <span>El pago puede ser en ventanilla bancaria, transferencias electrónicas, depósito en cajeros y telégrafos.</span>
        <span>Posteriormente deberás escanear tu comprobante en formato PDF y subirlo en el siguiente recuadro:</span>
      </div>

  </div>
    <div class="container mt-3">
        @if($comprovante=="no")
      <form enctype="multipart/form-data" class="form-control" method="POST" action="/comprobantescool">
      @csrf
      <input type="file" class="mt-3" accept="application/pdf" name="urlpdf">
        <div class="d-grid gap-2 col-2 mx-auto mt-3">
              <input type="submit" class="btn btn-primary">
        </div>
      </form>
      @endif
      @if($comprovante=="si")
      <form enctype="multipart/form-data" class="form-control" method="POST" action="/comprobantes/{{$desdos[0]->id}}">
      @csrf
      <input type="file" class="mt-3" accept="application/pdf" name="urlpdf">
        <div class="d-grid gap-2 col-3 mx-auto mt-3">
              <input type="submit" class="btn btn-success" value="Actualizar">
        </div>
      </form>
      @endif
    </div>
@endsection