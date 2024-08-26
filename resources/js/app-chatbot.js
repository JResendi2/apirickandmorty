const boton_enviar = $("#boton-enviar");
const url_chatbot = 'https://resendizj.pythonanywhere.com/chatbot/';
const api_key_default = 'jzFWve6o.kQgkg2ZADCg1nozHOgfZKHE0E1huoNgw';

const chat = $("#chat");

boton_enviar.click(function () {
    let mensaje = $("#txt--enviar").val();

    if (mensaje != "") {
        let chat__contenerdor = '<div class="chat__contenerdor"><div class="chat__limite"><div class="chat__mensaje">' + mensaje + '</div></div></div>';
        chat.append(chat__contenerdor); // Agregar el chat__contenerdor a chat__barra

        const data = { message: mensaje };
        const options = {
            method: 'POST', // Método de la solicitud
            headers: {
                'Content-Type': 'application/json', // Tipo de contenido
                'Authorization': `Api-Key ${api_key_default}` // Encabezado de autenticación
            },
            body: JSON.stringify(data) // Datos en el cuerpo de la solicitud, convertidos a JSON
        };

        // Realizar la solicitud fetch
        fetch(url_chatbot, options)
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                console.log('Success:', data);
                setResponse(data.response);
            })
            .catch(error => {
                console.error('Error:', error);
            });

        $("#txt--enviar").val("");
    }

});


function setResponse(response) {
    if (response != "") {
        let chat__contenerdor = '<div class="chat__contenerdor2"><div class="chat__limite2"><div class="chat__mensaje2">' + response + '</div></div></div>';
        chat.append(chat__contenerdor);
    }
};