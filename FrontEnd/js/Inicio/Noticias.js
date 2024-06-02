// Definición de las noticias
const noticias = [
  {
    titulo: "Noticia 1",
    url: "https://www.espn.com.co/futbol/nota/_/id/13428704/seleccion-colombia-gana-rumania-fecha-fifa-extiende-invicto",
    imagen:
      "https://a.espncdn.com/combiner/i?img=%2Fphoto%2F2024%2F0326%2Fr1310393_1296x729_16%2D9.jpg&w=920&h=518&scale=crop&cquality=80&location=origin&format=jpg",
  },
  {
    titulo: "Noticia 2",
    url: "https://www.foxsports.com.mx/2024/03/26/espana-3-3-brasil-espectacular-partido-con-golazo-de-endrick-futuro-jugador-del-real-madrid-en-el-bernabeu/",
    imagen:
      "https://www.elfinanciero.com.mx/resizer/EOoTNLD835L-Rexne8sEtjHo-_Y=/1440x0/filters:format(png):quality(70)/cloudfront-us-east-1.images.arcpublishing.com/elfinanciero/2XSEUIMPDZHBBPBMINHFJYG6MY.png",
  },
  {
    titulo: "Noticia 3",
    url: "https://www.transfermarkt.co/seis-del-top-historico-entre-los-mas-devaluados-desde-2020-messi-y-neymar-en-rojo/view/news/435446",
    imagen:
      "https://tmssl.akamaized.net//images/foto/galerie/lionel-messi-1711467863-132837.jpg",
  },
  // Agrega más noticias según sea necesario
];

// Definición de los textos para las leyendas del carrusel
const leyendasCarrusel = [
  {
    titulo:
      "Colombia honra los elogios con victoria ante Rumania en el cierre de fecha FIFA",
    parrafo:
      "Triunfo con autoridad de Selección Colombia en Madrid. Se impuso 3-2 frente a Rumania con goles de Jhon Córdoba,Jhon Arias y Yaser Asprilla.",
    fuente: "ESPN.com <br> 26 de mar, 2024, 18:25",  
  },
  {
    titulo:
      "¡España 3-3 Brasil! Espectacular partido con golazo de Endrick, futuro jugador del Real Madrid, en el Bernabéu",
    parrafo:
      "El partido amistoso internacional entre España vs Brasil generó muchísima polémica y discusión luego de la sensible rueda de prensa de Vinícius Jr. con llanto incluido por el racismo sufrido como futbolista de Real Madrid..",
    fuente: "FOXSPORT.com <br> marzo 26, 2024 | 16:46 pm hrs", 
  },
  {
    titulo:
      "Seis del top histórico, entre los más devaluados desde 2020: Messi y Neymar, en rojo",
    parrafo:
      "Lionel Messi sigue en caída libre y por temas de edad, su devaluación generalizada cada vez es más grande. El referente de Inter Miami fue valorado en apenas 30 millones de euros, cifra que ha caído paulatinamente desde su salida del FC Barcelona. El argentino está entre los cinco jugadores más valiosos de la historia y en su momento alcanzó un récord personal de 180 millones de euros. Hoy por hoy, seis del top histórico aparecen entre los jugadores más devaluados desde 2020, la mayoría de ellos por el tema de la edad, agregándole el bajón sustancial de varias de esas figuras en cuanto a nivel en grandes ligas europeas.",
    fuente: "Transfermarkt.co <br> 26 de mar, 2024 - 10:17", 
  },
];

// Código para cargar y mostrar las noticias y las leyendas del carrusel
document.addEventListener("DOMContentLoaded", function () {
  const noticiasContainers = document.querySelectorAll(".noticiascompleta");
  const leyendasContainers = document.querySelectorAll(
    ".carousel-captionotice"
  );

  // Cargar noticias
  noticiasContainers.forEach((noticiasContainer, index) => {
    const noticia = noticias[index]; // Obtener la noticia correspondiente al índice

    // Crear el contenido HTML de la noticia
    const noticiaElement = document.createElement("div");
    noticiaElement.innerHTML = `
          <a href="${noticia.url}" target="_blank">
            ${noticia.titulo}    
            <img src="${noticia.imagen}" alt="${noticia.titulo}">
          </a>
      `;

    // Agregar el contenido al contenedor de noticias correspondiente
    noticiasContainer.appendChild(noticiaElement);
  });

  // Cargar leyendas del carrusel
leyendasContainers.forEach((leyendasContainer, index) => {
  const leyenda = leyendasCarrusel[index]; // Obtener la leyenda correspondiente al índice
  
  // Actualizar el contenido HTML de la leyenda
  leyendasContainer.innerHTML = `
      <h4>${leyenda.titulo}</h4>
      <p class="parrafonoticia">${leyenda.parrafo}</p>
      <p class="fuentenoticia">${leyenda.fuente}</p>
  `;
});
});
