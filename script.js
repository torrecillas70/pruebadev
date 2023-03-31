function validateForm() {

    var nombre = document.getElementById("nombre").value;
    var alias = document.getElementById("alias").value;
    var rut = document.getElementById("rut").value;
    var email = document.getElementById("email").value;
    var region = document.getElementById("region").value;
    var comuna = document.getElementById("comuna").value;
    var candidato = document.getElementById("cadidato").value;
  
    if (nombre == "" || alias == "" || rut == "" || email == "" || region == ""  || comuna == "" || candidato == "" ) {
      alert("Por favor complete todos los campos obligatorios.");
      return false;
    }

    var opciones = document.getElementsByName("entero[]");
    var seleccionado = false;
    for (var i = 0; i < opciones.length; i++) {
      if (opciones[i].checked) {
        seleccionado = true;
        break;
      }
    }
    if (!seleccionado) {
      alert("Por favor seleccione al menos una opción de 'Cómo se enteró de nosotros'.");
      return false;
    }
  
    submitForm();
  }
  
  function submitForm() {

    var nombre = document.getElementById("nombre").value;
    var alias = document.getElementById("alias").value;
    var rut = document.getElementById("rut").value;
    var email = document.getElementById("email").value;
    var region = document.getElementById("region").value;
    var comuna = document.getElementById("comuna").value;
    var entero = "";
    var opciones = document.getElementsByName("entero[]");
    for (var i = 0; i < opciones.length; i++) {
      if (opciones[i].checked) {
        entero += opciones[i].value + ", ";
      }
    }
 
    entero = entero.slice(0, -2);
  

    var xmlhttp;
    if (window.XMLHttpRequest) {
      xmlhttp = new XMLHttpRequest();
    } else {
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
  
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        alert("¡Gracias por votar!");
        document.getElementById("votar-form").reset();
      }
    };
  
    xmlhttp.open("POST", "submit.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("nombre=" + nombre + "&alias=" + alias + "&rut=" + rut + "&email=" + email + "&region=" + region + "&comuna=" + comuna + "&entero=" + entero);
  }