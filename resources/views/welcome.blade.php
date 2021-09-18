<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>PROATLETA</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <style>


            section.side {
                background-size: 100% 102%;
            }
                        

            * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Montserrat', sans-serif;
            color: #303433;
            }

            body {
            min-height: 100vh;
            width: 100%;
            display: grid;
            margin: 0;
            grid-template-columns: 1fr 1fr;
            }

            section {
            display: flex;
            justify-content: center;
            align-items: center;
            }

            section.side {
            background-size: 100% 102%;
            }

            .side img {
            width: 70%;
            max-width: 70%;
            }

            .login-container {
            max-width: 450px;
            padding: 24px;
            display: flex;
            flex-direction: column;
            align-items: center;
            }

            .title {
            text-transform: uppercase;
            font-size: 2em;
            font-weight: bold;
            text-align: center;
            letter-spacing: 1px;
            }

            .separator {
            width: 150px;
            height: 4px;
            background-color: #00DEF4;
            margin: 24px;
            }

            .welcome-message {
            text-align: center;
            font-size: 1.1em;
            line-height: 28px;
            margin-bottom: 30px;
            color: #696969;
            }

            .login-form {
            width: 100%;
            display: flex;
            flex-direction: column;
            }

            .form-control {
            width: 100%;
            position: relative;
            margin-bottom: 24px;
            }

            input,
            button {
            border: none;
            outline: none;
            border-radius: 30px;
            font-size: 1.1em;
            }

            input {
            width: 100%;
            background: #e6e6e6;
            color: #333;
            letter-spacing: 0.5px;
            padding: 14px 64px;
            }

            input ~ i {
            position: absolute;
            left: 32px;
            top: 50%;
            transform: translateY(-50%);
            color: #888;
            transition: color   0.4s;
            }

            input:focus ~ i {
            color: #843bc7;
            }

            button.submit {
            color: #fff;
            padding: 14px 64px;
            margin: 32px auto;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-weight: bold;
            background-image: linear-gradient(to right, #8b33c5, #00DEF4);
            cursor: pointer;
            transition: opacity 0.4s;
            }

            button.submit:hover {
            opacity: 0.9;
            }

            /* ----  Responsiveness   ----  */
            @media (max-width: 780px) {

            body {
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .side {
                display: none;
            }
            }

            
            .fade-in {
              animation: fadeIn ease 1s;
              -webkit-animation: fadeIn ease 1s;
              -moz-animation: fadeIn ease 1s;
              -o-animation: fadeIn ease 1s;
              -ms-animation: fadeIn ease 1s;
            }
            @keyframes fadeIn {
              0% {
                opacity:0;
              }
              100% {
                opacity:1;
              }
            }
            
            @-moz-keyframes fadeIn {
              0% {
                opacity:0;
              }
              100% {
                opacity:1;
              }
            }
            
            @-webkit-keyframes fadeIn {
              0% {
                opacity:0;
              }
              100% {
                opacity:1;
              }
            }
            
            @-o-keyframes fadeIn {
              0% {
                opacity:0;
              }
              100% {
                opacity:1;
              }
            }
            
            @-ms-keyframes fadeIn {
              0% {
                opacity:0;
              }
              100% {
                opacity:1;
            }
          }

        </style>

    </head>
    <body>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <section class="side fade-in">
            <img src="{{ asset('img/atleta.svg') }}" alt="">
        </section>

        <section class="main fade-in">
            <div class="login-container">
                <p class="title">PROATLETA</p>
                <div class="separator"></div>
                <p class="welcome-message">Sistema para la administración de resultados de Pruebas físicas</p>

                <a href="{{ route('login') }}"><button class="submit">Iniciar Sesión</button></a>

            </div>
        </section>
    </body>
</html>
