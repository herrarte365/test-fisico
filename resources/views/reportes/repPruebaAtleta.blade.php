<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Pruebas Físicas</title>
    
    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box
        }

        body,html{
            height:100%;
            margin: 20px;
            font-family:sans-serif;
            color: #566573;
            font-size: 12px;
        }

        tbody tr:nth-child(even){background-color:#F5FFFF}

        
        a{margin:0;transition:all .4s;-webkit-transition:all .4s;-o-transition:all .4s;-moz-transition:all .4s}
        
        .centrar {
            text-align: center;
        }

        .titulo {
            font-size: 30px;
            color: #2d3748;
        }
        
        .sub-titulo {
            font-size: 25px;
            text-align: center;
        }
        
        .encabezado{
            margin: 20px 20px 20px;
        }


        .izquierdo{
            float:left;
            width: 47%;
            margin-top: 30px;
            margin-right: 5px;
            border-radius: 5px;
            padding: 5px;
            border: gray dotted;
        }
        .derecho{
            float: left;
            width: 48%;
            margin-left: 5px;
            padding: 5px;
            border-radius: 5px;
            border: gray dotted;
        }
        
        .completo{
            float: left;
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: gray dotted;
            margin-top: 150px;
        }

        td {
            padding-left: 15px;
        }

        table{
            width:100%;
        }


    </style>

    </head>

    <body class="font-sans antialiased">
        <div>
            <center>
                <H3>PRUEBA FÍSICA DE ATLETISMO</H3>
            </center>
            <div class="izquierdo">
                <h4>DATOS GENERALES</h4>
                <BR>
                <table>
                    
                    <tr>
                        <td><h5>PRUEBA</h5></td>
                        <td>{{ $encabezado->description }}</td>
                    </tr>
                    <tr>
                        <td><h5>GRUPO</h5></td>
                        <td>{{ $encabezado->name }}</td>
                    </tr>
                    <tr>
                        <td><h5>UBICACIÓN</h5></td>
                        <td>{{ $encabezado->name_municipality }}, {{ $encabezado->name_department }}</td>
                    </tr>
                    <tr>
                        <td><h5>ENTRENADOR</h5></td>
                        <td>{{ $encabezado->first_name }} {{ $encabezado->last_name }}</td>
                    </tr>
                </table>
            </div>
            <div class="derecho">
                <h4>DATOS DEL ATLETA</h4>
                <BR>
                <table>
                    <tr>
                        <td><h5>ATLETA</h5></td>
                        <td>{{ $atleta->first_name }} {{ $atleta->last_name }}</td>
                    </tr>
                    <tr>
                        <td><h5>PUNTAJE GENERAL</h5></td>
                        <td>{{ $atleta->general_score }}</td>
                    </tr>
                    <tr>
                        <td><h5>NIVEL GENERAL</h5></td>
                        <td>{{ $atleta->general_level }}</td>
                    </tr>
                    <tr>
                        <td><h5>EDAD Y GENERO</h5></td>
                        <td>{{ $encabezado->age }} años - {{ $encabezado->gender == 'M' ? 'Masculino' : 'Femenino' }}</td>
                    </tr>
                </table>
            </div>
        </div>
        <div>
        <div class="completo">
                <h4>DETALLE DEL RESULTADO</h4>
                <BR>
                <table>
                    <tr>
                        <td><h5><center>NO</h5></td>
                        <td><h5>PRUEBA</h5></td>
                        <td><h5><center>RESULTADO</center></h5></td>
                        <td><h5><center>PUNTAJE</center></h5></td>
                        <td><h5><center>NIVEL</center></h5></td>
                    </tr>
                    @foreach ($detalles as $key => $detalle)
                        
                        <tr>
                            <td><h5><center>{{ $key+1 }}</center></h5></td>
                            <td>{{ $pruebas[$key]->name_test }}</td>
                            <td><center>{{ $detalle->result }}</center></td>
                            <td><center>{{ $detalle->points }}</center></td>
                            <td><center>{{ number_format($detalle->level,0) }}</center></td>
                        </tr>

                    @endforeach
                </table>
            </div>
        </div>


        
    </body>
</html>
 