let arreglo=[{
                "titulo":"Iron Man",
                "parrafo":"Anthony Edward (Tony) Stark fue un multimillonario industrial, anterior Director General de Industrias Stark y miembro fundador de los Vengadores. Siendo el hijo de Howard Stark y poseyendo un gran intelecto, Stark se volvió un inventor de armas mundialmente reconocido hasta que fue secuestrado por los Diez Anillos. En su cautiverio, él diseñó un traje blindado para escapar de la organización, regresando a casa y convirtiéndose en el superhéroe conocido como Iron Man, luchando contra los terroristas y su ex compañero de negocios, Obadiah Stane. Stark gozó de la fama que le llegó con su nueva identidad secreta y decidió compartirla con el mundo, anunciando públicamente que él era Iron Man.",
            },{    
                "titulo":"Black Panter",
                "parrafo":"T'Challa es el Rey de Wakanda y el titular del protector de su tribu, la Pantera Negra. Después de que su padre fue asesinado en un ataque terrorista orquestado por el Coronel Helmut Zemo, T'Challa centró sus esfuerzos en matar al hombre que él creía que era el responsable, James Barnes. Esto lo llevó a entrar en el conflicto entre los Vengadores del lado del equipo de Anthony Stark. Sin embargo, cuando descubrió que Zemo había sido el culpable de la muerte de T'Chaka, él lo capturó sin dejarse consumir por la venganza y ayudó a Barnes a recuperarse de su trauma en Wakanda."
            },{
                "titulo":"Spider-Man",
                "parrafo":"Peter Benjamin Parker es un estudiante de la Escuela de Ciencia y Tecnología de Midtown que, después de adquirir sus habilidades a causa de la mordida de una araña radiactiva, eligió combatir el crimen como el Hombre Araña. A pesar de esforzarse por mantener su identidad en secreto de todos, incluida su tía Maybelle, fue encontrado y reclutado por Anthony Stark para unirse a la Guerra Civil de los Vengadores, obteniendo un nuevo traje y tecnología a cambio. Después de ayudar a Stark, Parker conservó su traje para seguir operando como el Hombre Araña."
            },{
                "titulo":"Doctor Strange",
                "parrafo":"El Doctor Stephen Vincent Strange es un poderoso hechicero y miembro destacado de los Maestros de las Artes Místicas. Él era un neurocirujano exitoso y arrogante, hasta que un accidente automovilístico dañó gravemente sus manos, lo que le hizo iniciar un viaje que lo llevó a Kamar-Taj, donde al descubrir la magia y las dimensiones alternativas, fue entrenado por Ancestral y Karl Mordo. Aunque su enfoque era curar sus manos, Strange aprendió más acerca de las artes místicas, y ayudó a los Maestros a evitar que Kaecilius y los Fanáticos fusionaran la Tierra con la Dimensión Oscura de Dormammu, a costo de la muerte de Ancestral. Con la pérdida de su mentora, Strange se convirtió en el protector del Santuario de Nueva York y de la Tierra contra las amenazas interdimensionales."
            },{
                "titulo":"Black Widow",
                "parrafo":"Natalia Alianovna (Natasha) Romanoff (Ruso: Наталья Альяновна (Наташа) Романова), mejor conocida como Black Widow, fue una antigua agente especial de S.H.I.E.L.D. y miembro fundadora de los Vengadores. Romanoff fue adoctrinada en la Habitación Roja desde muy joven. Romanoff participó de una misión de la agencia junto a Yelena Belova, Alexei Shostakov y Melina Vostokoff, en donde actuaban de familia estadounidense. Luego de tres años, la misión concluyó y Romanoff junto a Belova fueron entrenadas por la agencia como Black Widows."
            },{
                "titulo":"Star Lord",
                "parrafo":"Peter Jason Quill es un híbrido Celestial-humano, que fue secuestrado por los Devastadores y fue entrenado por Yondu Udonta cuando era niño. Él se ganó una reputación como el legendario forajido conocido como Star-Lord y eventualmente abandonó a los Devastadores para robar el Orbe en Morag, formando parte de la Búsqueda del Orbe. Durante estos acontecimientos, Quill conoció a Gamora, Drax, Rocket y Groot, con quienes formó a los Guardianes de la Galaxia, a pesar de que en un principio no le agradó la idea. Después de vencer a Ronan y salvar Xandar de la destrucción, Quill decidió quedarse como el líder de su nuevo equipo para ir de aventuras juntos."
            }];


function construir(){
    padre=document.getElementById("incisos1");
    while(padre.hasChildNodes())
        padre.removeChild(padre.firstChild);
    for(let i=0;i<arreglo.length;i++){
        let tituloE=document.createElement("h1");
        let parrafoE=document.createElement("p");
        let tituloT=document.createTextNode(arreglo[i].titulo);
        let parrafoT=document.createTextNode(arreglo[i].parrafo);
        tituloE.appendChild(tituloT);
        parrafoE.appendChild(parrafoT);
        let cuerpo=document.getElementById("incisos1");
        cuerpo.appendChild(tituloE);
        cuerpo.appendChild(parrafoE);
    }
}


        