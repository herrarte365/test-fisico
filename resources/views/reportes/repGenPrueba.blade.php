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
            font-family:sans-serif
        }
        
        a{margin:0;transition:all .4s;-webkit-transition:all .4s;-o-transition:all .4s;-moz-transition:all .4s}
        
        h1,h2,h3,h4,h5,h6{margin:0}
        
        p{margin:0}
        
        ul,li{margin:0;list-style-type:none}
        
        input{display:block;outline:none;border:none!important}
        
        textarea{display:block;outline:none}
        
        button{outline:none!important;border:none;background:0 0}
        
        iframe{border:none!important}

        table{
            border-spacing:1;
            border-collapse:collapse;
            background:#fff;
            border-radius:5px;
            overflow:hidden;
            width:100%;
            position:relative;
        }
        
        table *{position:relative}
        
        table td,table th{
        }
        
        table thead tr{
            background: #2d3748;
        }
        
        .head-table th{
            font-size:13px;
            color:#fff;
            font-weight:unset;
            padding: 2px;
        }
        
        tbody tr:nth-child(even){background-color:#f5f5f5}
        
        tbody tr{
            font-size:12px;
            color:gray;
            line-height:1.2;
            font-weight:unset
        }
        
        
        .column1{
            text-align: center;
        }

        .centrar {
            text-align: center;
        }

        .titulo {
            font-size: 30px;
            color: #2d3748;
        }
        
        .sub-titulo {
            font-size: 25px;
            color: #808080;
            text-align: center;
        }

        p{
            color: #808080;
        }
        
        .encabezado{
            margin: 20px 0px 20px;
        }

    </style>

    </head>

    <body class="font-sans antialiased">

        <p class="sub-titulo">Prueba Física de Atletismo</p>
        <p class="encabezado">
            {{ $encabezado->description }} <br>
            {{ $encabezado->name }} - {{ $encabezado->gender }} - {{ $encabezado->age }} años <br>
            {{ $encabezado->name_municipality }}, {{ $encabezado->name_department }} <br>
            {{ $encabezado->first_name }} {{ $encabezado->last_name }}
        </p>

        <table class="">
            <thead>
                <tr class="head-table">
                    <th class="column1">No</th>
                    <th>Nombre</th>
                    <th></th>
                    <th>Talla</th>
                    <th>Flexibilidad</th>
                    <th>Despechadas</th>
                    <th>Abdominales</th>
                    <th>Alcance(m)</th>
                    <th>SVSCI(m)</th>
                    <th>Despegue(m)</th>
                    <th>SLSCI(m)</th>
                    <th>Velocidad</th>
                    <th>Resistencia</th>
                    <th>Peso</th>
                    <th>Total Puntos</th>
                    <th>Nivel General</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($atletas as $key => $atleta)
                    <tr>
                        <td class="column1">{{ $key+1 }}</td>
                        <td>{{ $atleta->first_name }} {{ $atleta->last_name }}</td>
                        <td>Nivel<br>Resul</td>
                        @foreach ($resultados as $r)
                            @if($atleta->id == $r->athlete_id)
                                <td class="centrar">
                                    <p>{{ number_format($r->level, 0) }}</p>
                                    <p>{{ $r->result }}</p>
                                </td>
                            @endif
                        @endforeach                                    
                                                            <td class="centrar">
                            @if(is_null($atleta->general_score))
                                <p class="text-cian-300">NC</p>
                            @else 
                                <p class="text-cian-300">{{ $atleta->general_score }}</p>
                            @endif
                        </td>
                        <td class="centrar">
                            @if(is_null($atleta->general_level))
                                <p class="text-cian-300">NC</p>
                            @else 
                                <p class="text-cian-300">{{ $atleta->general_level }}</p>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>
 