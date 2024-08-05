document.addEventListener("DOMContentLoaded", () => {
    const contenedor_temas = document.querySelector(".temas");
    const section_temas = document.querySelector("#section-temas");
    const section_preguntas = document.querySelector("#section-preguntas");
    const section_resultados = document.querySelector("#section-resultados");
    const contenedor_pregunta = document.querySelector(".contenedor-pregunta");
    const contenedor_respuestas = document.querySelector(".contenedor-respuestas");
    const pResultado = document.querySelector("#p-resultado");
    const btnSiguiente = document.querySelector("#btn-siguiente");
    const hPregunta = document.querySelector("#h-pregunta");
    const spanPuntaje = document.querySelector("#span-puntaje");
    const btnReiniciar = document.querySelector("#btn-reiniciar");
    const divCronometro = document.querySelector("#div-cronometro");
    const spanPreguntaI = document.querySelector("#pregunta-i");
    const spanPreguntaTotal = document.querySelector("#pregunta-total");
    const temaSeleccionado = document.querySelector("#tema-seleccionado");
    
    const svgClock = document.querySelector("#svg-clock");
    let cronometro;
    let tiempo = 18;
    let preguntas; // Se actualiza cada vez que se selecciona un nuevo tema

    let respuestas;
    let contador = 0;
    let total;
    let puntaje = 0;

    section_preguntas.classList.add("d-none");
    section_resultados.classList.add("d-none");

    fetch("http://127.0.0.1:8000/temas")
        .then(data => data.json())
        .then(res => {
            let i = 0;
            res.forEach(tema => {
                const btnTema = document.createElement("BUTTOM");
                btnTema.setAttribute("data-tema-id", tema.id);
                btnTema.textContent = tema.tema;
                btnTema.classList.add("tema-" + i++);
                btnTema.classList.add("tema");
                btnTema.addEventListener("click", getPregutas);
                contenedor_temas.appendChild(btnTema);
            });
        });


    function getPregutas(e) {
        const tema_id = e.target.getAttribute("data-tema-id");
        temaSeleccionado.className = '';
        temaSeleccionado.classList.add("tema-seleccionado");
        temaSeleccionado.classList.add("tema-"+(tema_id-1));
        temaSeleccionado.textContent = e.target.textContent;
        section_preguntas.classList.add("d-inline");
        section_preguntas.classList.remove("d-none");
        section_temas.classList.add("d-none");
        section_temas.classList.remove("d-inline");

        fetch("http://127.0.0.1:8000/preguntas/" + tema_id)
            .then(data => data.json())
            .then(res => {
                preguntas = res;
                preguntas = shuffleArray(preguntas);
                total = preguntas.length;
                spanPreguntaTotal.textContent = total;
                spanPreguntaI.textContent = 1;
                mostrarRespuestas();
            });
    }

    function mostrarRespuestas(){
        const pregunta = preguntas[contador++];
        respuestas = pregunta.respuestas;
        respuestas = shuffleArray(respuestas);

        hPregunta.textContent = pregunta.pregunta;
        contenedor_pregunta.appendChild(hPregunta);
        btnSiguiente.classList.add("d-none");

        contenedor_respuestas.innerHTML = '';
        respuestas.forEach(respuesta => {
            const btnRespuesta= document.createElement("BUTTON");
            btnRespuesta.setAttribute("data-id", respuesta.id);
            btnRespuesta.textContent = respuesta.respuesta;
            btnRespuesta.classList.add("respuestas");
            btnRespuesta.classList.add("respuesta");
            btnRespuesta.addEventListener("click", validarRespuesta);
            contenedor_respuestas.appendChild(btnRespuesta);
        });
        cronometro = setInterval(() => {
            if(tiempo === 0){
                clearInterval(cronometro);
                pResultado.textContent = "Tiempo agotado";
                pResultado.classList.remove("resultado");
                pResultado.classList.remove("respuesta-correcta");
                pResultado.classList.add("resultado-incorrecta");
                svgClock.setAttribute('fill', 'red');
                btnSiguiente.classList.add("d-inline");
                btnSiguiente.classList.remove("d-none");
                disabledBtns();
                showRespuestaCorrecta();
                
            }
            divCronometro.textContent = tiempo;
            tiempo--;
        },1000)
    }

    function validarRespuesta(e){
        const respuesta_id = e.target.getAttribute("data-id");
        
        let myRespuesta;
        

        respuestas.some(function(respuesta){
            if (respuesta.id === parseInt(respuesta_id)){
                myRespuesta = respuesta;
            }
        })

        if(myRespuesta.correcta === 1){
            pResultado.textContent = "Respuesta correcta";
            e.target.classList.remove("respuesta");
            e.target.classList.add("respuesta-correcta");
            pResultado.classList.remove("resultado");
            pResultado.classList.remove("resultado-incorrecta");
            pResultado.classList.add("resultado-correcta");
            puntaje++;
        } else {
            pResultado.textContent = "Respuesta incorrecta";
            e.target.classList.remove("respuesta");
            e.target.classList.add("respuesta-incorrecta");
            pResultado.classList.remove("resultado");
            pResultado.classList.remove("resultado-correcta");
            pResultado.classList.add("resultado-incorrecta");
            showRespuestaCorrecta();
        }
        btnSiguiente.classList.add("d-inline");
        btnSiguiente.classList.remove("d-none");
        disabledBtns();
        clearInterval(cronometro);
    }

    btnSiguiente.addEventListener("click", () => {
        if(contador < total){
            tiempo = 18;
            spanPreguntaI.textContent = contador + 1;
            svgClock.setAttribute('fill', 'black');
            pResultado.classList.remove("resultado-incorrecta");
            pResultado.classList.remove("resultado-correcta");
            pResultado.classList.add("resultado");
            btnSiguiente.classList.remove("d-inline");
            btnSiguiente.classList.add("d-none");
            mostrarRespuestas();
        } else {
            section_resultados.classList.add("d-inline");
            section_resultados.classList.remove("d-none");
            section_preguntas.classList.add("d-none");
            section_preguntas.classList.remove("d-inline");
            spanPuntaje.textContent = puntaje + " de " + total;
        }
    });

    btnReiniciar.addEventListener("click", () => {
        puntaje = 0;
        contador = 0;
        clearInterval(cronometro);
        tiempo = 18;
        svgClock.setAttribute('fill', 'black');
        pResultado.classList.remove("resultado-incorrecta");
        pResultado.classList.remove("resultado-correcta");
        pResultado.classList.add("resultado");
        section_resultados.classList.add("d-none");
        section_resultados.classList.remove("d-inline");
        section_temas.classList.add("d-inline");
        section_temas.classList.remove("d-none");
    })

    

    function shuffleArray(array) {
        for (let i = array.length - 1; i > 0; i--) {
            const j = Math.floor(Math.random() * (i + 1));
            [array[i], array[j]] = [array[j], array[i]];
        }
        return array;
    }

    function disabledBtns(){
         const btns = contenedor_respuestas.querySelectorAll(".respuestas");
         btns.disabled = true;
         btns.forEach(btn => {
            btn.disabled = true
         });
    }

    function showRespuestaCorrecta(){
        let respuestaCorrecta;
        respuestas.some(function(respuesta){
            if (respuesta.correcta === 1){
                respuestaCorrecta = respuesta;
            }
        })
        contenedor_respuestas.querySelector(`[data-id="${respuestaCorrecta.id}"]`).classList.add("respuesta-correcta")
    }
    
})