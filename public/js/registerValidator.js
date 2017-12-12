window.addEventListener("load", function() {
  var csrf = document.querySelector('#csrf-token').content;
  var formulario = document.forms[1];
  var elementos = formulario.elements;
  var emailbox = formulario.elements[7];
  var namebox = formulario.elements[1];
  var last_namebox = formulario.elements[2];
  var land_phonebox = formulario.elements[3];
  var cel_phonebox = formulario.elements[4];
  var addressbox = formulario.elements[5];
  var citybox = formulario.elements[6];
  var passwordbox = formulario.elements[8];
  var password_confirmationbox = formulario.elements[9];

  //Selectores para mostrar errores
  var erroremail = document.querySelector(".eemail");
  erroremail.style.visibility = "hidden";
  var errorname = document.querySelector(".ename");
  errorname.style.visibility = "hidden";
  var errorlast_name = document.querySelector(".elast_name");
  errorlast_name.style.visibility = "hidden";
  var errorland_phone = document.querySelector(".eland_phone");
  errorland_phone.style.visibility = "hidden";
  var errorcel_phone = document.querySelector(".ecel_phone");
  errorcel_phone.style.visibility = "hidden";
  var erroraddress = document.querySelector(".eaddress");
  erroraddress.style.visibility = "hidden";
  var errorcity = document.querySelector(".ecity");
  errorcity.style.visibility = "hidden";
  var errorpassword = document.querySelector(".epassword");
  errorpassword.style.visibility = "hidden";
  var errorpassword_confirmation = document.querySelector(".epassword_confirmation");
  errorpassword_confirmation.style.visibility = "hidden";


// Validacion de enail JS + AJAX
emailbox.onchange = function() {
  var email = formulario.email.value;
  var url = '/api/validarEmail';
  erroremail.style.visibility = "hidden";

  if (email.length < 5 || email.length > 250) {
     erroremail.style.visibility = "visible";
     erroremail.innerText = "La longitud del email es incorrecta";
  } else {
  axios.post(url, {
    email: email,
    'XSRF-TOKEN': csrf
  }).then(function(datos) {
      //console.log(datos.data.validacion);
      if (datos.data.validacion == "existe") {
        erroremail.style.visibility = "visible";
        erroremail.innerText = "El email ya existe y no se pueden registrar otro usuario con el mismo email";
      }
}); }

}

// prevalido el form antes de enviarlo
  formulario.onsubmit = function(evento) {

    var errores = prevalidarForm(formulario);
    if (errores.length != 0) {
      evento.preventDefault();
      //alert("Errores de validacion:   " + errores);
    }
  }


  ///  Validación del formulario
  function prevalidarForm(form) {
    // Capturo Valores
    var name = form.name.value;
    var last_name = form.last_name.value;
    var land_phone = form.land_phone.value;
    var cel_phone = form.cel_phone.value;
    var address = form.address.value;
    var city = form.city.value;
    var email = form.email.value;
    var password = form.password.value;
    var password_confirmation = form.password_confirmation.value;
    var accept = form.accept.value;

    // Cleanning
    var errores = [];
    erroremail.style.visibility = "hidden";
    errorname.style.visibility = "hidden";
    errorlast_name.style.visibility = "hidden";
    errorland_phone.style.visibility = "hidden";
    errorcel_phone.style.visibility = "hidden";
    erroraddress.style.visibility = "hidden";
    errorcity.style.visibility = "hidden";
    errorpassword.style.visibility = "hidden";
    errorpassword_confirmation.style.visibility = "hidden";

    // Validation
    if (name.length < 4) {
      errores.push("El nombre es muy corto");
      errorname.style.visibility = "visible";
      errorname.innerText="El nombre es muy corto";

    }
    if (name.length > 254) {
      errores.push("El nombre excede la longitud permitida");
      errorname.style.visibility = "visible";
      errorname.innerText="El nombre excede la longitud permitida";

    }
    if (last_name.length < 2) {
      errores.push("El apellido es muy corto");
      errorlast_name.style.visibility = "visible";
      errorlast_name.innerText="El apellido es muy corto";
    }
    if (last_name.length > 254) {
      errores.push("El apellido excede la longitud permitida");
      errorlast_name.style.visibility = "visible";
      errorlast_name.innerText="El apellido excede la longitud permitida";

    }
    if ((land_phone.length < 6 || land_phone.length > 20)&& (land_phone.lenght !=0)) {
      errores.push("El telefono de linea tiene una longitud inadecuada");
      errorland_phone.style.visibility = "visible";
      errorland_phone.innerText="El telefono de linea tiene una longitud inadecuada";

    }
    if ((cel_phone.length < 6 || cel_phone.length > 20) && (cel_phone.lenght !=0)) {
      errores.push("El telefono celular tiene una longitud inadecuada");
      errorcel_phone.style.visibility = "visible";
      errorcel_phone.innerText="El telefono celular tiene una longitud inadecuada";

    }

    if (address.length < 6 || address.length > 250) {
      errores.push("La dirección parece no ser correcta");
      erroraddress.style.visibility = "visible";
      erroraddress.innerText="La dirección parece no ser correcta";

    }
    if (city.length < 6 || city.length > 250) {
      errores.push("Verifique la ciudad");
      errorcity.style.visibility = "visible";
      errorcity.innerText="Verifique la ciudad";
    }
    if (password.length < 6 || password.length > 250) {
      errores.push("El password tiene una longitud inadecuada");
      errorpassword.style.visibility = "visible";
      errorpassword.innerText="El password tiene una longitud inadecuada";


    }
    if (password != password_confirmation) {
      errores.push("El password no coincide en ambas casillas");
      errorpassword_confirmation.style.visibility = "visible";
      errorpassword_confirmation.innerText="El password no coincide en ambas casillas";
    }

    if (email.length < 5 || email.length > 250) {
       erroremail.style.visibility = "visible";
       erroremail.innerText = "La longitud del email es incorrecta";
    }

    return errores;
  }


  // Validacion de nombre
  namebox.onchange = function() {
    var name = formulario.name.value;
    errorname.style.visibility = "hidden";

    if (name.length < 2) {
      errorname.style.visibility = "visible";
      errorname.innerText="El nombre es muy corto";
    }
    if (name.length > 254) {
      errorname.style.visibility = "visible";
      errorname.innerText="El nombre excede la longitud permitida";
    }
  }

  // Validacion de apellido
  last_namebox.onchange = function() {
    var last_name = formulario.last_name.value;
    errorlast_name.style.visibility = "hidden";

    if (last_name.length < 4) {
      errorlast_name.style.visibility = "visible";
      errorlast_name.innerText="El apellido es muy corto";
    }
    if (last_name.length > 254) {
      errorlast_name.style.visibility = "visible";
      errorlast_name.innerText="El apellido excede la longitud permitida";

    }
  }

  // Validacion de telefono fijo
  land_phonebox.onchange = function() {
    var land_phone = formulario.land_phone.value;
    errorland_phone.style.visibility = "hidden";

    if ((land_phone.length < 6 || land_phone.length > 20)&& (land_phone.lenght !=0)) {
      errorland_phone.style.visibility = "visible";
      errorland_phone.innerText="El telefono de linea tiene una longitud inadecuada";

    }
  }

  // Validacion de telefono movil
  cel_phonebox.onchange = function() {
    var cel_phone = formulario.cel_phone.value;
    errorcel_phone.style.visibility = "hidden";

    if ((cel_phone.length < 6 || cel_phone.length > 20) && (cel_phone.lenght !=0)) {
      errorcel_phone.style.visibility = "visible";
      errorcel_phone.innerText="El telefono celular tiene una longitud inadecuada";

    }
  }

  // Validacion de direccion
  addressbox.onchange = function() {
    var address = formulario.address.value;
    erroraddress.style.visibility = "hidden";

    if (address.length < 6 || address.length > 250) {
      erroraddress.style.visibility = "visible";
      erroraddress.innerText="La dirección parece no ser correcta";

    }
  }

  // Validacion de ciudad
  citybox.onchange = function() {
    var city = formulario.city.value;
    errorcity.style.visibility = "hidden";

    if (city.length < 6 || city.length > 250) {
      errorcity.style.visibility = "visible";
      errorcity.innerText="Verifique la ciudad";
    }
  }

  // Validacion de password
  passwordbox.onchange = function() {
    var password = formulario.password.value;
    errorpassword.style.visibility = "hidden";

    if (password.length < 6 || password.length > 250) {
      errorpassword.style.visibility = "visible";
      errorpassword.innerText="El password tiene una longitud inadecuada";
    }
  }

  // Validacion de password_confirmation
  password_confirmationbox.onchange = function() {
    var password = formulario.password.value;
    var password_confirmation = formulario.password_confirmation.value;
    errorpassword_confirmation.style.visibility = "hidden";

    if (password != password_confirmation) {
      errorpassword_confirmation.style.visibility = "visible";
      errorpassword_confirmation.innerText="El password no coincide en ambas casillas";
    }
  }

});
