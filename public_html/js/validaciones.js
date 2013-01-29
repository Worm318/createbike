// JavaScript Document
function campoTexto(campo,mensaje)
{
	//alert("validando " + campo);
/*
campo: es el id del textbox
detalle: el mensaje de error a mostra al usuario
*/	
valor = document.getElementById(campo).value;
	if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) 
	{
	 	alert(mensaje);
		document.getElementById(campo).focus();	
		return false;
	}else{
		return true;
	}
}

function edad(dia,mes,ano)
{	
//alert(document.getElementById(ano).value);
	if(isNaN(document.getElementById(ano).value)) {

	 	alert("Año no es correcto");
		document.getElementById('ano').focus();	
		return false;
	}
	
	if(document.getElementById(ano).value<1910) {

	 	alert("Año no es correcto");
		document.getElementById('ano').focus();	
		return false;
	}
	
	Fecha=document.getElementById(dia).value+"/"+document.getElementById(mes).value+"/"+document.getElementById(ano).value;
	//alert(Fecha);
	fecha = new Date(Fecha);
	hoy = new Date();
	ed = parseInt((hoy -fecha)/365/24/60/60/1000);
	//alert("edad" + ed);
	document.getElementById('edad').value = ed;
 if (ed>0 && ed <100)
 {
	 return true;
 }else{
	
	 alert("La fecha de nacimiento no es correcta");
	 document.getElementById('ano').focus();
	 return false;

 }
}





function campoNum(campo,mensaje)
{
//alert("validando " + campo);
/*
campo: es el id del textbox
detalle: el mensaje de error a mostra al usuario
*/	
valor = document.getElementById(campo).value;
//alert ("valor: "+ valor);
//alert (isNaN(valor));

	if( valor == null || valor.length == 0 || /^\s+$/.test(valor)) 
	{
	 	alert(mensaje);
		document.getElementById(campo).focus();	
		return false;
	}

	if(isNaN(valor)) 
	{
	 	alert(mensaje);
		document.getElementById(campo).focus();	
		return false;
	}else{
		return true;
	}
}



function validarEmail(valor,mensaje) {	
correo=document.getElementById(valor).value;
  if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(correo)){
   //alert("La dirección de email " + valor    + " es correcta.") 
   return (true)
  } else {
   		alert(mensaje);
		document.getElementById(valor).focus();	
   return (false);
  }
 }
 
 function compara(campo1,campo2,mensaje) {	
valor1=document.getElementById(campo1).value;
valor2=document.getElementById(campo2).value;
  if (valor1==valor2){
   //alert("La dirección de email " + valor    + " es correcta.") 
   return (true)
  } else {
   		alert(mensaje);
		document.getElementById(valor).focus();	
   return (false);
  }
 }
 
function vacio(campo)
{
	valor = document.getElementById(campo).value;
	if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) 
	{
		//vacio
	 	return true;
	}else{
		return false;
	}
}

function campoCelular(campo,mensaje)
{
//alert("validando " + campo);
/*
campo: es el id del textbox
detalle: el mensaje de error a mostra al usuario
*/	
valor = document.getElementById(campo).value;
//alert ("valor: "+ valor);
//alert (isNaN(valor));

	if( valor == null || valor.length != 8 || /^\s+$/.test(valor)) 
	{
	 	alert(mensaje);
		document.getElementById(campo).focus();	
		return false;
	}

	if(isNaN(valor)) 
	{
	 	alert(mensaje);
		document.getElementById(campo).focus();	
		return false;
	}else{
		return true; 
	}
}

function campoTelefono(codi,campo)
{
	//,mensajeCampo,mensajeCodigo
	
	var valor, codi;
	valor = document.getElementById(campo);
	codigo = document.getElementById(codi);
	
//	alert (valor.value +" - "+ codigo.value);

var arreglo = new Array();
arreglo[0] = '02';
arreglo[1] = '032';
arreglo[2] = '033';
arreglo[3] = '034';
arreglo[4] = '035';
arreglo[5] = '041';
arreglo[6] = '042';
arreglo[7] = '043';
arreglo[8] = '045';
arreglo[9] = '051';
arreglo[10] = '052';
arreglo[11] = '053';
arreglo[12] = '055';
arreglo[13] = '057';
arreglo[14] = '058';
arreglo[15] = '061';
arreglo[16] = '063';
arreglo[17] = '064';
arreglo[18] = '065';
arreglo[19] = '067';
arreglo[20] = '071';
arreglo[21] = '072';
arreglo[22] = '073';
arreglo[23] = '075';
error=1;
//alert (valor.value +" - "+ codigo.value);

	//if(valor.value != "" || codigo.value != "")
	//{
		if(codigo.value == "")
		{
			alert ("El código no es correcto");
			codigo.focus();
			return false;
		}
		
		for (i=0;i<24;i++)
		{
				
			if (arreglo[i]==codigo.value)
			error=0;
		}
		
			if (error==1)
			{
				alert ("Código no es correcto");
				codigo.focus();
				return false;
			}
			
				
		if (codigo.value=='02' || codigo.value=='032' || codigo.value=='041')
		{
			//alert(valor.value.length);
			if (eval(valor.value.length) != 7)
			{
				
				alert ("Teléfono no es correcto");
				valor.focus();
				return false;
			}
		}
		else
		{
			if (eval(valor.value.length) != 6)
			{
				alert ("Teléfono no es correcto");
				valor.focus();
				return false;
			}
		}
	//}
return true;

}
//ALE validacion radios
function radios(campo,mensaje)
{
	//alert("hola");
	valor = document.getElementById(campo);
	largo = valor.length;
	contador=0;
	
	for(i=0;i<largo;i++)
	  if(!valor[i].checked) contador++;
	  
	if(contador == largo)
	{
	  alert (mensaje); 
	  document.getElementById(campo).focus();	
	  return false;
	}
	else{
	   return true;
	}
}


function campoCheckbox(campo,mensaje)
{
 if (document.getElementById(campo).checked)
 {
	 return true;
 }else{
	 alert(mensaje);
	 return false;
	 }
}

//////////////////////////////////////////////////

function revisarDigito( dvr, xCampo )
{	
	dv = dvr + ""	
	if ( dv != '0' && dv != '1' && dv != '2' && dv != '3' && dv != '4' && dv != '5' && dv != '6' && dv != '7' && dv != '8' && dv != '9' && dv != 'k'  && dv != 'K')	
	{		
		alert("Debe ingresar un digito verificador valido");		
		window.document.getElementById(xCampo).focus();		
		window.document.getElementById(xCampo).select();		
		return false;	
	}	
	return true;
}

function revisarDigito2( crut , xCampo )
{	
	largo = crut.length;	
	if ( largo < 2 )	
	{		
		alert("Debe ingresar el rut completo")		
		window.document.getElementById(xCampo).focus();		
		window.document.getElementById(xCampo).select();		
		return false;	
	}	
	if ( largo > 2 )		
		rut = crut.substring(0, largo - 1);	
	else		
		rut = crut.charAt(0);	
	dv = crut.charAt(largo-1);	
	revisarDigito( dv,xCampo );	

	if ( rut == null || dv == null )
		return 0	

	var dvr = '0'	
	suma = 0	
	mul  = 2	

	for (i= rut.length -1 ; i >= 0; i--)	
	{	
		suma = suma + rut.charAt(i) * mul		
		if (mul == 7)			
			mul = 2		
		else    			
			mul++	
	}	
	res = suma % 11	
	if (res==1)		
		dvr = 'k'	
	else if (res==0)		
		dvr = '0'	
	else	
	{		
		dvi = 11-res		
		dvr = dvi + ""	
	}
	if ( dvr != dv.toLowerCase() )	
	{		
		alert("EL rut es incorrecto")		
		window.document.getElementById(xCampo).focus();		
		window.document.getElementById(xCampo).select();		
		return false	
	}

	return true
}

function Rut(texto,xCampo)
{	
//alert("xCampo " + xCampo);
//X es el id del textbox
//alert ("revisando rut..");
//alert (texto);
//alert(x);


	var tmpstr = "";	
	for ( i=0; i < texto.length ; i++ )		
		if ( texto.charAt(i) != ' ' && texto.charAt(i) != '.' && texto.charAt(i) != '-' )
			tmpstr = tmpstr + texto.charAt(i);	
	texto = tmpstr;	
	largo = texto.length;	

	if ( largo < 2 )	
	{		
		alert("Debe ingresar el rut completo")		
		window.document.getElementById(xCampo).focus();		
		window.document.getElementById(xCampo).select();		
		return false;	
	}	

	for (i=0; i < largo ; i++ )	
	{			
		if ( texto.charAt(i) !="0" && texto.charAt(i) != "1" && texto.charAt(i) !="2" && texto.charAt(i) != "3" && texto.charAt(i) != "4" && texto.charAt(i) !="5" && texto.charAt(i) != "6" && texto.charAt(i) != "7" && texto.charAt(i) !="8" && texto.charAt(i) != "9" && texto.charAt(i) !="k" && texto.charAt(i) != "K" )
 		{			
			alert("El valor ingresado no corresponde a un R.U.T valido");			
			window.document.getElementById(xCampo).focus();			
			window.document.getElementById(xCampo).select();			
			return false;		
		}	
	}	

	var invertido = "";	
	for ( i=(largo-1),j=0; i>=0; i--,j++ )		
		invertido = invertido + texto.charAt(i);	
	var dtexto = "";	
	dtexto = dtexto + invertido.charAt(0);	
	dtexto = dtexto + '-';	
	cnt = 0;	

	for ( i=1,j=2; i<largo; i++,j++ )	
	{		
		//alert("i=[" + i + "] j=[" + j +"]" );		
		if ( cnt == 3 )		
		{			
			dtexto = dtexto + '.';			
			j++;			
			dtexto = dtexto + invertido.charAt(i);			
			cnt = 1;		
		}		
		else		
		{				
			dtexto = dtexto + invertido.charAt(i);			
			cnt++;		
		}	
	}	
//alert("xCampo " + xCampo);
	invertido = "";	
	for ( i=(dtexto.length-1),j=0; i>=0; i--,j++ )		
		invertido = invertido + dtexto.charAt(i);	

//alert("xx130" + xCampo);
	document.getElementById(xCampo).value = invertido.toUpperCase();			
//alert("x");
	if ( revisarDigito2(texto,xCampo) )		
		return true;	

	return false;
}
