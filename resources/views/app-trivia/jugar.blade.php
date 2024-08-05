<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Signika+Negative:wght@300..700&display=swap" rel="stylesheet">
    @vite(['resources/js/app-trivia.js', 'resources/css/normalize.css', 'resources/css/app-trivia.css' ])
    <title>Trivia de preguntas</title>
</head>
<body>
    <header class="header">
        <h1>Trivia de preguntas</h1>
    </header>

    <section id="section-temas">
        <div class="contenedor-temas">
            <div class="temas">

            </div>
        </div>
    </section>

    <section id="section-preguntas">
        <div class="contenedor-preguntas">
            <div class="contenedor-tema-seleccionado">
                <div id="tema-seleccionado">
                    tema
                </div>
            </div>
            <div class="contenedor-cronometro">
                <h5 id="num-pregunta">Pregunta <span id="pregunta-i">0</span> de <span id="pregunta-total">0</span></h5>
                <div>
                    <svg id="svg-clock" xmlns="http://www.w3.org/2000/svg" height="50px" viewBox="0 -960 960 960" width="50px" fill="#000000">
                        <path d="m612-292 56-56-148-148v-184h-80v216l172 172ZM480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-400Zm0 320q133 0 226.5-93.5T800-480q0-133-93.5-226.5T480-800q-133 0-226.5 93.5T160-480q0 133 93.5 226.5T480-160Z" /></svg>
                    <div class="div-clock">
                        <span id="div-cronometro"></span>
                    </div>
                </div>
            </div>
            <div class="contenedor-pregunta">
                {{-- Pregunta --}}
                <h3 id="h-pregunta"></h3>
            </div>
            <div class="contenedor-resultado">
                <p id="p-resultado" class="resultado">resultado</p>
            </div>
            <div class="contenedor-respuestas">
                {{-- Respuestas --}}
            </div>
            <div class="contenedor-siguiente">
                <button id="btn-siguiente">
                    <svg fill="#ffffff" height="60px" width="60px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="-46.08 -46.08 604.16 604.16" xml:space="preserve" transform="matrix(1, 0, 0, 1, 0, 0)" stroke="#ffffff" stroke-width="5.12">
                        <g id="SVGRepo_bgCarrier" stroke-width="0">
                            <rect x="-46.08" y="-46.08" width="604.16" height="604.16" rx="302.08" fill="#00D6B6" strokewidth="0" />
                        </g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />
                        <g id="SVGRepo_iconCarrier">
                            <g>
                                <g>
                                    <path d="M501.843,231.478l-86.518-86.518c-6.551-6.55-15.259-10.157-24.522-10.157c-19.122,0-34.678,15.557-34.678,34.678v43.179 H43.339C19.442,212.66,0,232.102,0,256c0,23.899,19.442,43.341,43.339,43.341h312.785v43.178 c0,19.122,15.557,34.678,34.676,34.678c0.003,0,0.004,0,0.006,0c9.26,0,17.967-3.607,24.517-10.156l86.517-86.518 C508.393,273.975,512,265.266,512,256C512,246.737,508.393,238.029,501.843,231.478z M487.418,266.097l-86.519,86.519 c-2.696,2.698-6.281,4.183-10.095,4.183c0,0-0.001,0-0.002,0c-7.874,0-14.279-6.406-14.279-14.28v-53.378 c0-5.632-4.567-10.199-10.199-10.199H43.339c-12.65,0-22.941-10.292-22.941-22.942c0-12.649,10.291-22.941,22.941-22.941v0 h322.984c5.632,0,10.199-4.567,10.199-10.199v-53.379c0-7.874,6.406-14.28,14.28-14.28c3.813,0,7.4,1.486,10.097,4.184 l86.518,86.518c2.698,2.697,4.184,6.284,4.184,10.097C491.602,259.815,490.117,263.4,487.418,266.097z" />
                                </g>
                            </g>
                            <g>
                                <g>
                                    <path d="M423.682,193.83l-1.494-1.494c-3.985-3.982-10.441-3.982-14.425,0c-3.983,3.984-3.983,10.442,0,14.425l1.494,1.494 c1.992,1.991,4.601,2.987,7.212,2.987c2.611,0,5.22-0.995,7.213-2.987C427.665,204.271,427.665,197.812,423.682,193.83z" />
                                </g>
                            </g>
                            <g>
                                <g>
                                    <path d="M477.62,247.767l-31.191-31.192c-3.984-3.981-10.44-3.982-14.425,0c-3.983,3.984-3.983,10.442,0,14.425l31.191,31.192 c1.992,1.991,4.601,2.987,7.212,2.987c2.609,0,5.22-0.996,7.213-2.987C481.602,258.208,481.602,251.75,477.62,247.767z" />
                                </g>
                            </g>
                        </g>
                    </svg>
                </button>
            </div>
        </div>
    </section>

    <section id="section-resultados">
        <div class="contenedor-puntaje">
            <div class="puntaje">
                <h2 class="h-game-over">Juego terminado</h2>
                <h4 class="h-score">Tu puntaje es de: <span id="span-puntaje"></span></h4>
                <button id="btn-reiniciar">Reiniciar</button>
            </div>
        </div>
    </section>

    <footer class="footer">
        <h5>Juego de preguntas</h5>
    </footer>

</body>
</html>
