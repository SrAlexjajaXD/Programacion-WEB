

function crear(padre, id, artista, nombre, ano, descripcion, enlace, foto) {
    let contenedor=document.createElement("div");
    let info=document.createElement("section");
    contenedor.setAttribute('id','album');

    let ids=document.createElement("h5");
    let idsNode=document.createTextNode(id);
    
    let album=document.createElement("h1");
    let albumNode=document.createTextNode(nombre);
    
    let artist=document.createElement("h3");
    let artistNode=document.createTextNode(artista);
    
    

    let year=document.createElement("h4");
    let yearNode=document.createTextNode(ano);
    
    let desc=document.createElement("p");
    desc.textContent=descripcion;
    
    let pic=document.createElement("img");
    pic.setAttribute('src', foto);
    pic.setAttribute('width','240');
    
    
    ids.appendChild(idsNode);
    album.appendChild(albumNode);
    artist.appendChild(artistNode);
    year.appendChild(yearNode);
    
    let img=document.createElement("a");
    img.setAttribute("href",enlace);
    img.appendChild(pic);

    info.appendChild(ids);
    info.appendChild(album);
    info.appendChild(artist);
    info.appendChild(year);
    info.appendChild(desc);
    
    contenedor.appendChild(img);
    contenedor.appendChild(info);

    padre.appendChild(contenedor);

}


fetch("http://localhost/html/19091364XA5/consultar.php").then(respuesta=>respuesta.json()).then(datos=>datos.forEach(elemento => crear(cuerpo,
elemento.id,elemento.artista,elemento.nombre,elemento.ano,elemento.descripcion,elemento.link,elemento.imagen)));





