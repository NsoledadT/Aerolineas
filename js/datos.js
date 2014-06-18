function valida () {
	var nombre = document.getElementById('nom').value;	
	var documento = document.getElementById('doc').value;
	var telefono = document.getElementById('tel').value;
	var correo = document.getElementById('correo').value;
	var dia = document.getElementById('d').value;
	var mes = document.getElementById('m').value;
	var anio = document.getElementById('a').value;
	mes = mes-1;
	
	var fecha = new Date(anio, mes, dia);
	
	var expRegNom = /^[a-zA-Z]{4,10}$/;
	var expRegDni = /^\d{8}$/;
	var expRegEmail = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	var expRegTelefono = /^[0-9]{2,3}-? ?[0-9]{6,7}$/;

	if(nombre == ""){
		alert("Por favor ingrese el nombre");
		return false;
	}else if(!expRegNom.test(nombre)){
		alert("El nombre puede tener entre 4 y 10 caracteres y no puedo contener numero o caracteres especiales");
		return false;
	}else if(documento == null){
		alert("Por favor ingrese su numero de dni");
		return false;
	}else if(!expRegDni.test(documento)){
		alert("El numero de dni debe tener 8 digitos");
		return false;
	}else if(telefono == null){
		alert("por favor ingrese el numero telefonico");
		return false;
	}else if(!expRegTelefono.test(telefono)){
		alert("por favor ingrese un numero de celular valido");
		return false;
	}else if(correo == ""){
		alert("por favor ingrese su email");
		return false;
	}else if(!expRegEmail.test(correo)){
		alert("por favor ingrese un email valido");
		return false;
	}else if(!((dia == fecha.getDate()) && (mes == fecha.getMonth()) && (anio == fecha.getFullYear()))){
		alert("por favor ingrese una fecha valida");
		return false;
	}
}