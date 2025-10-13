<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Scuola Italiana - Campus Interactivo</title>
  <link rel="stylesheet" href="breadcrumbs.css">
  <link rel="stylesheet" href="../css/mapa.css">


  <!-- Navigation -->
<nav class="navbar">
    <div class="nav-container">
        <div class="nav-logo">
            <img src="FOTOS/fotosPrincipales/logo2.png" alt="Scuola Italiana di Montevideo">
        </div>
        <div class="nav-menu-button" onclick="window.location.href='menuScuola.php'">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</nav>

<style>
/* Navigation */
.navbar {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    height: 80px; /* altura fija del header */
    background: rgba(10, 36, 82, 0.5);
    z-index: 1000;
    transition: all 0.3s ease, transform 0.3s ease, opacity 0.3s ease;
}

.nav-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0 5%; /* sin padding vertical para no alterar la altura */
    max-width: 1200px;
    margin: 0 auto;
    height: 100%; /* ocupa todo el alto de la navbar */
}

.nav-logo {
    position: relative;
    height: 100%;
    overflow: visible; /* deja que el logo sobresalga */
}

.nav-logo img {
    height: 120px; /* logo grande */
    width: auto;
    position: absolute;
    top: 50%;
    transform: translateY(-50%); /* centrado vertical */
}

.nav-menu-button {
    display: flex;
    flex-direction: column;
    cursor: pointer;
    padding: 8px;
    transition: all 0.3s ease;
}

.nav-menu-button span {
    width: 25px;
    height: 3px;
    background-color: white;
    margin: 3px 0;
    transition: 0.3s;
    border-radius: 2px;
}

.nav-menu-button:hover span {
    background-color: #F39C12;
}
</style>

<script>
let lastScrollTop = 0;

window.addEventListener('scroll', function() {
    const navbar = document.querySelector('.navbar');
    let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
    
    if (scrollTop > lastScrollTop && scrollTop > 100) {
        // Scrolling down y ya bajó más de 100px
        navbar.style.transform = 'translateY(-100%)';
        navbar.style.opacity = '0';
    } else {
        // Scrolling up o está en el top
        navbar.style.transform = 'translateY(0)';
        navbar.style.opacity = '1';
    }
    
    lastScrollTop = scrollTop;
});
</script>

  <style>

    
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    

    body {
      font-family: sans-serif;
      overflow-x: hidden;
      background: white;
    }

    /* Header responsivo */
    .header {
      position: relative;
      width: 100%;
      min-height: 100vh;
      background: linear-gradient(180deg, rgba(0, 0, 0, 0.60) 0%, rgba(0, 0, 0, 0) 100%);
    }

    .header video {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
      z-index: -1;
    }

    /* Navegación responsiva */
    .nav-container {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      padding: 20px;
      z-index: 100;
    }

    .nav-content {
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
      max-width: 1200px;
      margin: 0 auto;
    }

    .logo {
      width: 200px;
      height: auto;
    }

    .nav-menu {
      display: flex;
      gap: 20px;
      flex-wrap: wrap;
      align-items: center;
    }

    .nav-item {
      color: white;
      font-size: 14px;
      font-family: Roboto, sans-serif;
      font-weight: 900;
      text-align: center;
      cursor: pointer;
      padding: 8px 12px;
      border-radius: 4px;
      transition: background-color 0.3s;
    }

    .nav-item:hover {
      background-color: rgba(255, 255, 255, 0.2);
    }

    /* Sección principal */
    .main-section {
      width: 100%;
      background: linear-gradient(90deg, #00963A 0%, #E5151C 100%);
      padding: 60px 20px;
      text-align: center;
    }

    .main-title {
      color: white;
      font-size: clamp(32px, 6vw, 64px);
      font-family: Crimson Pro, serif;
      font-style: italic;
      margin-bottom: 40px;
    }

    /* Menú de navegación interno */
    .internal-nav {
      background: white;
      padding: 40px 20px;
      border-bottom: 1px solid #716E6E;
    }

    .nav-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 20px;
      max-width: 1200px;
      margin: 0 auto;
      text-align: center;
    }

    .nav-grid-item {
      color: #716E6E;
      font-size: 14px;
      font-family: Crimson Pro, serif;
      font-weight: 900;
      line-height: 1.2;
      padding: 10px;
      cursor: pointer;
      transition: color 0.3s;
    }

    .nav-grid-item:hover {
      color: #2E2C6B;
    }

    /* Sección Explore Campus */
    .explore-section {
      padding: 60px 20px;
      text-align: center;
      background: white;
    }

    .section-title {
      color: #2E2C6B;
      font-size: clamp(32px, 5vw, 64px);
      font-family: Ruwudu, serif;
      font-weight: 600;
      margin-bottom: 30px;
    }

    .section-description {
      color: #041E42;
      font-size: 16px;
      font-family: Crimson Pro, serif;
      font-weight: 700;
      line-height: 1.6;
      max-width: 800px;
      margin: 0 auto 60px;
    }

    /* Mapa interactivo responsivo */
    .map-section {
      background: #453D3D;
      padding: 60px 20px;
    }

    .mapa-container {
      position: relative;
      max-width: 1200px;
      width: 100%;
      margin: 0 auto;
      box-shadow: 0 0 15px rgba(0,0,0,0.3);
      border-radius: 10px;
      overflow: hidden;
      background-color: #222;
    }

    .mapa-container img {
      width: 100%;
      height: auto;
      display: block;
      min-height: 300px;
      object-fit: cover;
    }

    .punto {
      position: absolute;
      width: clamp(25px, 3vw, 40px);
      height: clamp(25px, 3vw, 40px);
      background-color: white;
      color: black;
      border-radius: 50%;
      font-weight: bold;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      border: 2px solid #444;
      transition: transform 0.2s;
      z-index: 10;
      font-size: clamp(12px, 2vw, 18px);
    }

    .punto:hover {
      transform: scale(1.2);
      background-color: #00963A;
      color: white;
    }

    /* Panel de información responsivo */
    .infoPanel {
      position: fixed;
      top: 0;
      right: -100vw;
      width: min(90vw, 400px);
      height: 100vh;
      background-color: #222;
      color: white;
      border-top-left-radius: 20px;
      border-bottom-left-radius: 20px;
      box-shadow: -4px 0 20px rgba(0,0,0,0.7);
      transition: right 0.4s ease;
      overflow-y: auto;
      padding: 20px;
      z-index: 1000;
    }

    .infoPanel.active {
      right: 0;
    }

    .infoPanel img {
      width: 100%;
      border-radius: 12px;
      margin-bottom: 15px;
      box-shadow: 0 0 10px rgba(0,0,0,0.5);
    }

    .infoPanel .closeBtn {
      position: absolute;
      top: 10px;
      right: 15px;
      background: #444;
      border: none;
      color: white;
      font-size: 18px;
      padding: 8px 12px;
      cursor: pointer;
      border-radius: 8px;
      z-index: 1001;
    }

    .infoPanel .content {
      font-size: 14px;
      line-height: 1.5;
      margin-top: 50px;
    }

    /* Carrusel responsivo */
    .carousel-container {
      position: relative;
      max-width: 900px;
      width: 100%;
      margin: 60px auto;
      overflow: hidden;
      border-radius: 12px;
      box-shadow: 0 4px 15px rgba(0,0,0,0.3);
    }

    .carousel-track {
      display: flex;
      transition: transform 0.5s ease-in-out;
    }

    .carousel-track img {
      width: 100%;
      height: 400px;
      flex-shrink: 0;
      object-fit: cover;
    }

    .carousel-btn {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      background: rgba(0,0,0,0.7);
      border: none;
      cursor: pointer;
      padding: 12px;
      border-radius: 50%;
      transition: background-color 0.3s;
      z-index: 10;
    }

    .carousel-btn:hover {
      background: rgba(0,0,0,0.9);
    }

    .carousel-btn img {
      width: clamp(20px, 3vw, 40px);
      height: clamp(20px, 3vw, 40px);
    }

    .carousel-btn.left {
      left: 15px;
    }

    .carousel-btn.right {
      right: 15px;
    }

    /* Sección Prosperar */
    .prosper-section {
      padding: 60px 20px;
      text-align: center;
      background: white;
    }

    .divider {
      display: flex;
      align-items: center;
      margin: 40px auto;
      max-width: 600px;
    }

    .divider::before,
    .divider::after {
      content: '';
      flex: 1;
      height: 1px;
      background: #716E6E;
    }

    .divider img {
      margin: 0 20px;
      width: 50px;
      height: auto;
    }

  

    /* Media Queries */
    @media (max-width: 768px) {
      .nav-menu {
        display: none;
      }

      .nav-content {
        justify-content: center;
      }

      .logo {
        width: 150px;
      }

      .main-section {
        padding: 40px 20px;
      }

      .internal-nav {
        padding: 20px;
      }

      .nav-grid {
        grid-template-columns: 1fr;
        gap: 15px;
      }

      .map-section {
        padding: 40px 10px;
      }

      .carousel-track img {
        height: 250px;
      }

      .punto {
        font-size: 16px;
        width: 30px;
        height: 30px;
      }

      .infoPanel {
        width: 95vw;
        border-radius: 0;
        right: -100vw;
      }

      .infoPanel.active {
        right: 0;
      }
    }

    @media (max-width: 480px) {
      .header {
        min-height: 70vh;
      }

      .section-description {
        font-size: 14px;
        padding: 0 10px;
      }

      .carousel-btn {
        padding: 8px;
      }

      .carousel-track img {
        height: 200px;
      }

      .punto {
        width: 25px;
        height: 25px;
        font-size: 14px;
      }
    }

    /* Animaciones */
    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(30px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .fade-in {
      animation: fadeInUp 0.6s ease-out;
    }

    /* Mejoras de accesibilidad */
    .punto:focus,
    .carousel-btn:focus,
    .nav-item:focus {
      outline: 2px solid #00963A;
      outline-offset: 2px;
    }

    /* Spinner de carga */
    .loading {
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      z-index: 9999;
      display: none;
    }

    .spinner {
      border: 4px solid #f3f3f3;
      border-top: 4px solid #00963A;
      border-radius: 50%;
      width: 50px;
      height: 50px;
      animation: spin 1s linear infinite;
    }

    @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }
  </style>
</head>
<div id="cms-root"></div>
<body>
  <div class="loading" id="loading">
    <div class="spinner"></div>
  </div>

  <!-- Header con video -->
  <div class="header">
    <video autoplay loop muted playsinline>
      <source src="FOTOS/fotosPrincipales/scuola.mp4" type="video/mp4">
      Tu navegador no soporta video HTML5.
    </video>
    
    

  <!-- Sección principal -->
  <div class="main-section">
    <h1 class="main-title">Acerca de la Scuola italiana</h1>
  </div>
  <div id="breadcrumbs" class="breadcrumbs-container"></div>



  <!-- Sección Explore Campus -->
  <div class="explore-section fade-in">
    <h2 class="section-title">Explore Our Campus</h2>
    <p class="section-description">
      Kent Denver's scenic, 200-acre campus supports more than 200,000 square feet of state-of-the-art academic, arts and athletic facilities. Our wide-open spaces also include a Tiny Farm, two reservoirs, 1,600+ trees, a thriving wetlands and easy access to the High Line Canal Trail.
    </p>
  </div>

  <!-- Mapa interactivo -->
  <div class="map-section">
    <div class="mapa-container">
      <img src="FOTOS/fotosPrincipales/scuola.jpg" alt="Mapa de la escuela" />

      <!-- Puntos interactivos responsivos -->
      <div class="punto" style="top: 12%; left: 40%;" onclick="mostrarInfo('FOTOS/fotosPrincipales/scuolaclub.jpg', 'Scuola Club ofrece a su comunidad educativa acceso a canchas de tenis, canchas de césped sintético, clases de gimnasia, un Club House para celebraciones y una colonia de vacaciones con actividades guiadas. Los alumnos pueden acceder a 30 becas completas para aprender y practicar tenis.')">+</div>

      <div class="punto" style="top: 26%; left: 50%;" onclick="mostrarInfo('FOTOS/fotosPrincipales/poli.jpg', 'El colegio cuenta con un polideportivo moderno y funcional, destinado a la realización de actividades deportivas, recreativas y eventos institucionales. El espacio está equipado para la práctica de diversos deportes como voleibol, básquetbol, handball, fútbol y gimnasia.')">+</div>

      <div class="punto" style="top: 40%; left: 20%;" onclick="mostrarInfo('FOTOS/fotosPrincipales/bachi.jpg', 'Bachillerato del Colegio. El colegio ofrece un bachillerato completo que combina formación académica sólida con el desarrollo personal de los estudiantes, preparándolos tanto para estudios terciarios como para su integración activa en la sociedad.')">+</div>

      <div class="punto" style="top: 30%; left: 20%;" onclick="mostrarInfo('FOTOS/fotosPrincipales/estacionamiento.jpg', 'Estacionamiento del Colegio. El colegio cuenta con un espacio de estacionamiento disponible para alumnos, funcionarios y familias de la comunidad educativa, con sectores diferenciados para automóviles, motos y bicicletas.')">+</div>

      <div class="punto" style="top: 65%; left: 47%;" onclick="mostrarInfo('FOTOS/fotosPrincipales/BBSIM.jpg', 'La sección inicial del colegio está especialmente diseñada para niños y niñas de hasta 6 años, brindando un entorno seguro, cálido y estimulante donde comienzan sus primeros pasos en el ámbito educativo.')">+</div>

      <div class="punto" style="top: 43%; left: 46%;" onclick="mostrarInfo('FOTOS/fotosPrincipales/nuestro-colegio.jpg', 'Scuola italiana di montevideo. La Scuola Italiana es una institución educativa bilingüe que acompaña el recorrido académico y personal de sus estudiantes desde los primeros años hasta el egreso de bachillerato.')">+</div>

      <div class="punto" style="top: 50%; left: 44%;" onclick="mostrarInfo('FOTOS/fotosPrincipales/loba.jpg', 'La Loba. Ubicada frente a la entrada principal, la escultura de la Loba Capitolina con Rómulo y Remo simboliza la herencia cultural italiana que identifica a la Scuola.')">+</div>

      <div class="punto" style="top: 52%; left: 33%;" onclick="mostrarInfo('FOTOS/fotosPrincipales/scuolacaffe.jpg', 'Scuola Caffè. El Scuola Caffè es un espacio pensado para que los estudiantes puedan permanecer en el colegio fuera del horario de clase, en un ambiente cómodo y tranquilo.')">+</div>

      <div class="punto" style="top: 52%; left: 27%;" onclick="mostrarInfo('FOTOS/fotosPrincipales/bici.jpg', 'Sector de bicicletas y motos. El colegio dispone de un espacio específico para que los estudiantes puedan dejar sus bicicletas y motos de forma segura durante el horario escolar.')">+</div>

      <div class="punto" style="top: 20%; left: 77%;" onclick="mostrarInfo('FOTOS/fotosPrincipales/canchas.jpg', 'Canchas de fútbol. La Scuola Italiana cuenta con dos canchas de fútbol acondicionadas para la práctica deportiva, tanto en el marco de las clases de educación física como en actividades extracurriculares.')">+</div>

      <div class="punto" style="top: 32%; left: 75%;" onclick="mostrarInfo('FOTOS/fotosPrincipales/hockey.jpg', 'Canchas de hockey. El colegio dispone de dos canchas de hockey que forman parte del proyecto deportivo institucional, permitiendo el entrenamiento y la competencia.')">+</div>
    </div>
  </div>

  <!-- Sección Prosperar -->
  <div class="prosper-section">
    <div class="divider">
      <img src="FOTOS/fotosPrincipales/logo2.png" alt="Logo" />
    </div>
    <h2 class="section-title">Espacio para prosperar</h2>
    <p class="section-description">
      Nuestro entorno físico tiene un impacto significativo en nuestra capacidad de aprendizaje. En Kent Denver, creemos que los estudiantes deben contar con espacios de aprendizaje dinámicos, espaciosos y de vanguardia que estimulen su curiosidad, estimulen su imaginación y les permitan alcanzar su máximo potencial. Nuestro campus de 81 hectáreas incluye:
    </p>

<div id="original-content">
    <!-- Carrusel responsivo -->
    <div class="carousel-container">
      <div class="carousel-track" id="carouselTrack">
        <img src="FOTOS/fotosPrincipales/convivencia3.jpg" alt="Imagen 1">
        <img src="FOTOS/fotosPrincipales/CursosExtracurriculares1.jpg" alt="Imagen 2">
        <img src="FOTOS/fotosPrincipales/CursosExtracurriculares2.jpg" alt="Imagen 3">
        <img src="FOTOS/fotosPrincipales/ejemplo2.jpg" alt="Imagen 4">
        <img src="FOTOS/fotosPrincipales/heliopolis2.jpg" alt="Imagen 5">
        <img src="FOTOS/fotosPrincipales/PrimerDia2.jpg.png" alt="Imagen 6">
      </div>

      <button class="carousel-btn left" id="prevBtn" aria-label="Imagen anterior">
        <img src="FOTOS/fotosPrincipales/flecha-izquierda.png" alt="Anterior">
      </button>
      <button class="carousel-btn right" id="nextBtn" aria-label="Imagen siguiente">
        <img src="fotos/flecha-derecha.png" alt="Siguiente">
      </button>
    </div>
  </div>

  <!-- Footer -->

  <!-- Panel de información -->
  <div class="infoPanel" id="infoPanel">
    <button class="closeBtn" onclick="cerrarInfo()" aria-label="Cerrar información">×</button>
    <img id="infoImage" src="" alt="Imagen del punto" />
    <div class="content" id="infoText">Aquí aparecerá la información.</div>
  </div>
      </div>

      <footer class="footer-bottom-new">
    <div class="footer-container">
        <div class="footer-Aleft">
            <div class="footer-logo">
                <img src="fotosPrincipales/logotipo.png" alt="Scuola Italiana di Montevideo" style="height: 60px;">
            </div>
            <div class="footer-subtitle">
                <p>Scuola Italiana di Montevideo</p>
            </div>
        </div>
        
        <div class="footer-center">
            <div class="footer-section">
                <h4>Contacto</h4>
                <p>Av. Brasil 3149, Montevideo</p>
                <p>(+598) 2621 4822 / 2622 1422</p>
                <p>info@scuolaitaliana.edu.uy</p>
            </div>
        </div>
        
        <div class="footer-right">
            <div class="footer-section">
                <h4>Enlaces útiles</h4>
                <p>Política de privacidad</p>
                <p>Requisitos técnicos</p>
                <p>Accesibilidad</p>
            </div>
        </div>
    </div>
    
    <div class="footer-info-bar">
        <p>Desarrollado por el equipo SGE | Proyecto de apoyo 2002 - EE Informática</p>
    </div>
</footer>

<style>
.footer-bottom-new {
    background: #1B4F72;
    color: white;
    padding: 0;
    margin: 0;
}

.footer-container {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 30px 5%;
    max-width: 1200px;
    margin: 0 auto;
}

.footer-left {
    flex: 1;
    display: flex;
    align-items: center;
    gap: 20px;
}

.footer-logo img {
    height: 60px;
    width: auto;
}

.footer-subtitle p {
    margin: 0;
    font-size: 14px;
    color: #E8E8E8;
}

.footer-center,
.footer-right {
    flex: 1;
    padding: 0 20px;
}

.footer-section h4 {
    color: white;
    font-size: 16px;
    font-weight: 600;
    margin-bottom: 10px;
    border-bottom: 1px solid rgba(255,255,255,0.2);
    padding-bottom: 5px;
}

.footer-section p {
    margin: 8px 0;
    font-size: 14px;
    color: #E8E8E8;
    line-height: 1.4;
}

.footer-info-bar {
    background: #154360;
    text-align: center;
    padding: 15px 5%;
    border-top: 1px solid rgba(255,255,255,0.1);
}

.footer-info-bar p {
    margin: 0;
    font-size: 12px;
    color: #BDC3C7;
}

/* Responsive */
@media (max-width: 768px) {
    .footer-container {
        flex-direction: column;
        gap: 30px;
        text-align: center;
    }
    
    .footer-left {
        flex-direction: column;
        gap: 10px;
    }
    
    .footer-center,
    .footer-right {
        padding: 0;
        width: 100%;
    }
    
    .footer-section {
        margin-bottom: 20px;
    }
}
/* MEJORAS PARA VIVIR LA SCUOLA */
.quality-icon {
    transition: all 0.3s ease;
    cursor: pointer;
}

.quality-icon:hover {
    background: #049B4C !important;
    transform: scale(1.1);
}

.quality-icon i {
    font-size: 40px;
    color: white;
}

.quality-item a {
    text-decoration: none;
}



/* MEJORAR LA SEPARACIÓN Y ANIMACIÓN DE NOTICIAS */
.projects-section {
    background: #1B2F6F;
    padding: 200px 5% 150px 5%;
    text-align: center;
    margin-bottom: 120px;
}

.news-section {
    padding: 140px 5% 100px 5%;
    background: #0A2452;
    position: relative;
    overflow: hidden;
}

.news-section::after {
    content: '';
    position: absolute;
    top: 0;
    right: 0;
    width: 0%;
    height: 870px;
    background: #004ECC;
    transition: width 2.5s cubic-bezier(1, 0.46, 0.45, 0.94);
    

    
    z-index: 1;
}

.news-section.animate::after {
    width: 50%;
}

.news-header, 
.news-grid {
    position: relative;
    z-index: 2;
}

</style>

  <script>
    // Funciones del mapa
    function mostrarInfo(imagen, texto) {
      const panel = document.getElementById('infoPanel');
      const img = document.getElementById('infoImage');
      const text = document.getElementById('infoText');
      
      img.src = imagen;
      text.innerText = texto;
      panel.classList.add('active');
      
      // Bloquear scroll del body cuando el panel está abierto
      document.body.style.overflow = 'hidden';
    }

    function cerrarInfo() {
      const panel = document.getElementById('infoPanel');
      panel.classList.remove('active');
      
      // Restaurar scroll del body
      document.body.style.overflow = 'auto';
    }

    // Cerrar panel al hacer clic fuera
    document.addEventListener('click', function(e) {
      const panel = document.getElementById('infoPanel');
      const puntos = document.querySelectorAll('.punto');
      const esPunto = Array.from(puntos).some(punto => punto.contains(e.target));
      
      if (!panel.contains(e.target) && !esPunto && panel.classList.contains('active')) {
        cerrarInfo();
      }
    });

    // Funciones del carrusel
    const track = document.getElementById('carouselTrack');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const slides = Array.from(track.children);
    let index = 0;
    let slideWidth = 0;

    function updateSlideWidth() {
      slideWidth = slides[0].offsetWidth;
    }

    function updateCarousel() {
      updateSlideWidth();
      track.style.transform = `translateX(-${index * slideWidth}px)`;
    }

    nextBtn.addEventListener('click', () => {
      index = (index + 1) % slides.length;
      updateCarousel();
    });

    prevBtn.addEventListener('click', () => {
      index = (index - 1 + slides.length) % slides.length;
      updateCarousel();
    });

    // Auto-play del carrusel
    let autoPlay = setInterval(() => {
      index = (index + 1) % slides.length;
      updateCarousel();
    }, 5000);

    // Pausar auto-play al hover
    const carouselContainer = document.querySelector('.carousel-container');
    carouselContainer.addEventListener('mouseenter', () => {
      clearInterval(autoPlay);
    });

    carouselContainer.addEventListener('mouseleave', () => {
      autoPlay = setInterval(() => {
        index = (index + 1) % slides.length;
        updateCarousel();
      }, 5000);
    });

    // Control por teclado
    document.addEventListener('keydown', (e) => {
      if (e.key === 'ArrowLeft') {
        index = (index - 1 + slides.length) % slides.length;
        updateCarousel();
      } else if (e.key === 'ArrowRight') {
        index = (index + 1) % slides.length;
        updateCarousel();
      } else if (e.key === 'Escape') {
        cerrarInfo();
      }
    });

    // Gestos táctiles para móviles
    let startX = 0;
    let endX = 0;

    carouselContainer.addEventListener('touchstart', (e) => {
      startX = e.touches[0].clientX;
    });

    carouselContainer.addEventListener('touchend', (e) => {
      endX = e.changedTouches[0].clientX;
      const diff = startX - endX;
      
      if (Math.abs(diff) > 50) {
        if (diff > 0) {
          // Swipe left - next
          index = (index + 1) % slides.length;
        } else {
          // Swipe right - prev
          index = (index - 1 + slides.length) % slides.length;
        }
        updateCarousel();
      }
    });

    // Redimensionar ventana
    window.addEventListener('resize', () => {
      updateCarousel();
    });

    // Animaciones al scroll
    const observerOptions = {
      threshold: 0.1,
      rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('fade-in');
        }
      });
    }, observerOptions);

    // Observar elementos para animar
    document.querySelectorAll('.explore-section, .prosper-section').forEach(el => {
      observer.observe(el);
    });

    // Loading inicial
    window.addEventListener('load', () => {
      document.getElementById('loading').style.display = 'none';
      updateCarousel();
    });

    // Lazy loading para imágenes
    if ('loading' in HTMLImageElement.prototype) {
      const images = document.querySelectorAll('img[data-src]');
      images.forEach(img => {
        img.src = img.dataset.src;
        img.removeAttribute('data-src');
      });
    } else {
      // Fallback para navegadores que no soportan loading="lazy"
      const script = document.createElement('script');
      script.src = 'https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js';
      document.body.appendChild(script);
    }
  </script>
  <script src="breadcrumbs.js"></script>
<script src="cms-admin.js"></script>
</body>
</html>