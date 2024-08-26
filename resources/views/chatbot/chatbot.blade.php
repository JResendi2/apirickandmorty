<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChatBot</title>


    @vite(['resources/css/app-chatbot.css','resources/js/app-chatbot.js'])

 
</head>
<body>

    <div class="contenedor">
        <h2 class="titulo">ChatBot</h2>

        <div class="chat">
            <div class="chat__barra" id="chat">
                {{--<div class="chat__contenerdor">

                     <div class="chat__limite">
                        <div class="chat__mensaje">
                            
                        </div>
                    </div> 

                </div>--}}
            </div>
        </div>

        <div class="enviar-contenedor">
            <div class="enviar-txt">
                <textarea id="txt--enviar"  class="txt-enviar" cols="30" rows="5"></textarea>
            </div>
            <div class="boton_contenedor">
                <button class="boton" id="boton-enviar">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#2F2F2F"><path d="M440-160v-487L216-423l-56-57 320-320 320 320-56 57-224-224v487h-80Z"/></svg>
                </button>
            </div>
        </div>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</body>
</html>