var formulario=document.getElementById("form");

var validar=function(e){
    var mensaje="";

    const valoresper=new RegExp(/^[a-z ,.'-]+$/i)
    if(formulario.Nombre.value==0)
    mensaje+="Nombre\n";
    else if(!valoresper.test(formulario.Nombre.value))
    mensaje+="No debes de incluir numeros para el nombre\n";

    if(formulario.Pa.value==0)
    mensaje+="Apellido paterno\n";
    else if(!valoresper.test(formulario.Pa.value))
    mensaje+="No debes de incluir numeros para el apellido paterno\n";

    if(formulario.Sa.value==0)
    mensaje+="Apellido materno\n";
    else if(!valoresper.test(formulario.Sa.value))
    mensaje+="No debes de incluir numeros para el apellido materno\n";

    if(formulario.ano.value==0)
    mensaje+="Año de nacimiento\n";

    chek = document.getElementsByName("dispositivos[]");
    chk = 0;
    for (i = 0; i < chek.length; i++)
        if (chek[i].checked)
            chk++;
    if (chk == 0)
        mensaje += "Dispositivos\n";

    radios=document.getElementsByName("sexo");
    radChk=0;
    for(i=0;i<radios.length;i++)
        if(radios[i].checked)
            radChk++;
    if(radChk==0)
        mensaje+="Genero\n";
    
    if(mensaje!=""){
        e.preventDefault();
        alert("Te ha faltado capturar\n"+mensaje);
    }else
        alert("Formulario enviado exitosamente");
};
formulario.addEventListener("submit", validar);