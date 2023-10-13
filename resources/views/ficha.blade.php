<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ficha_Examen</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="mt-4">
        <table  border="2" width="105%" style="margin:0px -23px;">
            <tr>
                <td rowspan="3" width="100">
                <center><img src="images/itt.jpg" width="80"></center>
                </td>
                <td rowspan="2" style="font-size:14px; font-weight: bold; font-family:Arial, Helvetica, sans-serif;"> Nombre del formato: Ficha para examen de selección.</td>
                <td style="font-size:14px; font-weight: bold; font-family:Arial, Helvetica, sans-serif;"> Código: N/A</td>
            </tr>
            <tr>
                <td width="130" style="font-size:14px; font-weight: bold; font-family:Arial, Helvetica, sans-serif;"> Revisión: 3</td>
            </tr>
            <tr>
                
                <td style="font-size:14px; font-weight: bold; font-family:Arial, Helvetica, sans-serif;"> Referencia a la Norma ISO 9001:2015 8.2.2, 8.2.3, 8.2.1, 8.5.2 </td>
                <td style="font-size:14px; font-weight: bold; font-family:Arial, Helvetica, sans-serif;"> Página 1 de 1</td>
            </tr>
        </table>
        </div>
        <div class="row mt-3">
            <center>
                <p style="font-size:14px; font-weight: bold; font-family: Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif;">TECNOLÓGICO NACIONAL DE MÉXICO</p>
                <p style="font-size:14px; font-weight: bold; font-family: Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif;">INSTITUTO TECNOLÓGICO DE <font style="text-decoration: underline;">TECOMATLÁN</font></p>
                <p style="font-size:14px; font-family: Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif;">Ficha: <font style="text-decoration: underline;">{{$personales[0]->id}}</font></p>
            </center>
            <div class="row mt-3" >
                <table style="font-size:14px; font-family: Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif; margin:0px 110px; line-height: 2.5;">
                    <tr>
                        <td>DATOS</td>
                        <td>Nombre:</td>
                        <td style="text-decoration: underline;">{{$personales[0]->nombre}} {{$personales[0]->a_paterno}} {{$personales[0]->a_materno}}</td>
                    </tr>
                    <tr>
                        <td width="90">DEL ASPIRANTE</td>
                        <td>Domicilio:</td>
                        <td style="text-decoration: underline;">{{$domicilio[0]->calle_nombre}} No. {{$domicilio[0]->num_exterior}}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Col. Fracc.:</td>
                        <td style="text-decoration: underline;">{{$domicilio[0]->localidad}}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Población:</td>
                        <td style="text-decoration: underline;">{{$domicilio[0]->municipio}}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Teléfono:</td>
                        <td style="text-decoration: underline;">{{$domicilio[0]->telefono}}</td>
                    </tr>
                </table>
            </div>
            <div class="row mt-4">
                <table style="font-size:14px; font-family: Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif; margin:0px 110px; line-height: 2.5;">
                    <tr>
                        <td>DATOS</td>
                        <td>Clave Prepa.:</td>
                        <td style="text-decoration: underline;">{{$escolares[0]->clave_escuela}}</td>
                        <td>Documento:</td>
                        <td style="text-decoration: underline;">N/A</td>
                    </tr>
                    <tr>
                        <td width="90">ESCOLARES</td>
                        <td>Preparatoria:</td>
                        <td style="text-decoration: underline;">{{$escolares[0]->nombre_escuela}}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Domicilio:</td>
                        <td style="text-decoration: underline;">{{$escolares[0]->municipio_procedencia}}, {{$escolares[0]->estado_procedencia}}</td>
                    </tr>
                </table>
            </div>
            <div class="col-md-12 mt-4">
                
                <table border="1" width="80%" style="font-size:14px; font-family: Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif;margin:0px 70px; line-height: 1.2;">
                    <thead>
                      <tr>
                        <th width="50%">1a. Opción:</th>
                        <th width="50%">2a. Opción:</th>
                      </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$solicitud[0]->primera_opcion}}</td>
                            <td>{{$solicitud[0]->segunda_opcion}}</td>
                        </tr>    
                    </tbody>
                  </table>
                
                  <table style="font-size:14px; font-family: Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif; margin:0px 80px;">
                    <tr>
                        <td>EXAMEN DE CENEVAL &nbsp;</td>
                        <td style="text-decoration: underline;"> N/A</td>
                        <td>&nbsp; SALÓN</td>
                        <td style="text-decoration: underline;">&nbsp;N/A</td>
                    </tr>
                  </table>
                  <div style="font-size: 10px; font-family: Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif; margin:0px 80px;">
                    <center class="mt-5" >
                       <p>Esta ficha deberá traerla consigo durante todo el proceso de selección</p>
                       <p>Mostrarla como identificación para presentar examen, y para inducción</p>
                       <p>Traer lápiz número 2, sacapuntas y goma para contestar los exámenes</p>
                    </center>
                  </div>
                  <div class="mt-4" style="font-size: 10px; font-family: Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif; margin:0px 80px;">
                    <p>Elaboró: <font style="text-decoration: underline;">Departamento de Servicios Escolares</font></p>
                    <p>Registrado el: <font style="text-decoration: underline;">

                    <?php
                    $info = explode(" ", $solicitud[0]->created_at);
                     echo $info[0]; ?>

                    </font></p>
                  </div>

                  
            </div>
        </div>
    </div>
    <footer style="position:relative; top:130px;">
        <div>
            <div style="font-size: 14px; font-family:Arial, Helvetica, sans-serif; margin:0px 80px;">
                
                    <div width="50%" style="float:left;">N/A</div>
                    <div width="50%" style="float:right;">Rev. 3</div>
                
</div>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>