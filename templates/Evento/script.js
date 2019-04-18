


  function ocultar(){
    var formulario = document.getElementById("formul");
    var comentarios = document.getElementById("full-coment");
    if (formulario.style.display == "block") {
      formulario.style.display = "none";
      comentarios.style.display = "none";
    } else {
      formulario.style.display = "block";
      comentarios.style.display = "block";
    }
  }


  function prohibidas(){


    $.ajax({
      url: "prohibidas.php",
      type: "POST",
      success: function(response){
        //convierto el objeto json devuelto por el  php a un objeto javascript
        var palabras = JSON.parse(response);

        var valor = document.getElementById("coment-form").value;

        for(var i = 0; i < palabras.length; i++){
          var texto = "";
          var num = palabras[i]['palabras'].length;
          for (var j = 0; j < num; j++) {
            texto += "*";
          }
          valor = valor.replace(palabras[i]['palabras'],texto);
        }
         document.getElementById("coment-form").value = valor;

      }
    });

  }

  function validar() {
    var nombre = document.getElementById("nombre-form");
    var email = document.getElementById("email-form");
    var comentario = document.getElementById("coment-form");
    var enviar = true;
    var texto = "";
    if (nombre.value == "") {
      texto += " Campo Nombre vacio ";
      enviar = false;
    }
    if (email.value == "") {
      texto += " Campo Email vacio ";
      enviar = false;
    }
    if (comentario.value == "") {
      texto += " Campo Comentario vacio ";
      enviar = false;
    }

    if (enviar == false) {
      alert(texto);
    }
    else {
      enviar = true;
      //var div1 = document.createElement("div");
      //div1.className = "coment";
      //div1.innerHTML = `<p> Nombre: ${nombre.value}</p> <p> Fecha y hora: ${new Date()}</p> <p> Comentario: ${comentario.value}</p> `;
      //var contenedor = document.getElementById("full-coment");
      //contenedor.appendChild(div1);
   }

   return enviar;
 }
