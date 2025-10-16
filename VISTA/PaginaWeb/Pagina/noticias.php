<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noticias</title>
    <link rel="stylesheet" href="breadcrumbs.css">
    <link rel="stylesheet" href="../css/noticias.css">
</head>
<div id="cms-root"></div>
<body>
    <div id="original-content">
     <!-- Navigation -->
          <nav class="navbar">
              <div class="nav-container">
                  <div class="nav-logo">
                      <img src="FOTOS/fotosPrincipales/logo2.png" alt="Scuola Italiana di Montevideo" style="height: 120px;">
                  </div>
                  <div class="nav-menu-button" onclick="window.location.href='menuScuola.php'">
                      <span></span>
                      <span></span>
                      <span></span>
                  </div>
              </div>
          </nav>

          <!-- Hero Section -->
          <section class="hero-gallery editable-image" style="background-image: url('FOTOS/fotosPrincipales/heliopolis3.jpg'); background-size: cover; background-position: center;">
              <div class="hero-overlay"></div>
              <div class="hero-content-gallery">
                  <h1 class="hero-title-gallery editable-text">Noticias Scuola Italiana</h1>
                  <p class="hero-subtitle-gallery editable-text">Mantente informado sobre las últimas novedades de nuestra institución</p>
              </div>
          </section>
          <div id="breadcrumbs" class="breadcrumbs-container"></div>

          <!-- Main Content -->
          <main class="main-gallery">
              <div class="container">
                  <!-- Gallery Description -->
                  <section class="gallery-intro">
                      <h2 class="gallery-title editable-text">Últimas Noticias</h2>
                      <p class="gallery-description editable-text">Descubre las actividades más recientes, eventos destacados y logros de nuestra comunidad educativa. Cada noticia refleja el compromiso y la excelencia que caracteriza a la Scuola Italiana di Montevideo.</p>
                  </section>

                  <!-- News Carousel -->
                  <section class="news-carousel">
                      <div class="carousel-container">
                          <div class="carousel-track" id="carouselTrack">
                              <div class="carousel-slide">
                                  <div class="news-card">
                                      <div class="news-image">
                                          <img class="editable-image" src="FOTOS/fotosPrincipales/arcimboldo2.jpg" alt="Noticia 1">
                                      </div>
                                      <div class="news-content">
                                          <span class="news-date">15 Septiembre 2025</span>
                                          <h3 class="news-title editable-text">Ceremonia de Graduación 2025</h3>
                                          <p class="news-excerpt editable-text">Celebramos con orgullo a nuestros graduados de bachillerato en una emotiva ceremonia que marcó el fin de su etapa escolar.</p>
                                      </div>
                                  </div>
                              </div>
                              
                              <div class="carousel-slide">
                                  <div class="news-card">
                                      <div class="news-image">
                                          <img class="editable-image" src="FOTOS/fotosPrincipales/arcimboldo3.jpg" alt="Noticia 2">
                                      </div>
                                      <div class="news-content">
                                          <span class="news-date">10 Septiembre 2025</span>
                                          <h3 class="news-title editable-text">Intercambio Cultural con Italia</h3>
                                          <p class="news-excerpt editable-text">Estudiantes de secundaria participaron en un enriquecedor programa de intercambio con colegios de Roma y Milán.</p>
                                      </div>
                                  </div>
                              </div>
                              
                              <div class="carousel-slide">
                                  <div class="news-card">
                                      <div class="news-image">
                                          <img class="editable-image" src="FOTOS/fotosPrincipales/arcimboldo4.jpg" alt="Noticia 3">
                                      </div>
                                      <div class="news-content">
                                          <span class="news-date">5 Septiembre 2025</span>
                                          <h3 class="news-title editable-text">Festival de Ciencias 2025</h3>
                                          <p class="news-excerpt editable-text">Los proyectos científicos de nuestros alumnos destacaron por su innovación y creatividad en el festival anual.</p>
                                      </div>
                                  </div>
                              </div>
                              
                              <div class="carousel-slide">
                                  <div class="news-card">
                                      <div class="news-image">
                                          <img class="editable-image" src="FOTOS/fotosPrincipales/arcimboldo5.jpg" alt="Noticia 4">
                                      </div>
                                      <div class="news-content">
                                          <span class="news-date">1 Septiembre 2025</span>
                                          <h3 class="news-title editable-text">Torneo Deportivo Interescolar</h3>
                                          <p class="news-excerpt editable-text">Nuestros equipos de fútbol y básquet obtuvieron destacadas posiciones en el campeonato regional.</p>
                                      </div>
                                  </div>
                              </div>
                              
                              <div class="carousel-slide">
                                  <div class="news-card">
                                      <div class="news-image">
                                          <img class="editable-image" src="FOTOS/fotosPrincipales/arcimboldo.jpg" alt="Noticia 5">
                                      </div>
                                      <div class="news-content">
                                          <span class="news-date">25 Agosto 2025</span>
                                          <h3 class="news-title editable-text">Concurso de Arte y Literatura</h3>
                                          <p class="news-excerpt editable-text">Premiamos la creatividad de nuestros estudiantes en el concurso anual de expresión artística y literaria.</p>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          
                          <button class="carousel-btn prev-btn" onclick="moveSlide(-1)">‹</button>
                          <button class="carousel-btn next-btn" onclick="moveSlide(1)">›</button>
                      </div>
                      
                      <div class="carousel-dots">
                          <span class="dot active" onclick="currentSlide(1)"></span>
                          <span class="dot" onclick="currentSlide(2)"></span>
                          <span class="dot" onclick="currentSlide(3)"></span>
                          <span class="dot" onclick="currentSlide(4)"></span>
                          <span class="dot" onclick="currentSlide(5)"></span>
                      </div>
                  </section>

                  <!-- Gallery Footer Text -->
                  <section class="gallery-footer-text">
                      <div class="footer-text-container">
                          <h2 class="footer-text-title editable-text">Mantente conectado</h2>
                          <p class="footer-text-content editable-text">Sigue nuestras redes sociales y suscríbete a nuestro boletín para no perderte ninguna novedad de la Scuola Italiana. Juntos construimos una comunidad educativa sólida y comprometida.</p>
                      </div>
                  </section>
              </div>
          </main>

        

        <footer class="footer-bottom-new">
    <div class="footer-container">
        <div class="footer-Aleft">
            <div class="footer-logo">
                <img src="FOTOS/fotosPrincipales/logotipo.png" alt="Scuola Italiana di Montevideo" style="height: 60px;">
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



<script>
let slideIndex = 0;
const slides = document.querySelectorAll('.carousel-slide');
const dots = document.querySelectorAll('.dot');
const track = document.getElementById('carouselTrack');

function moveSlide(direction) {
    slideIndex += direction;
    
    if (slideIndex >= slides.length) {
        slideIndex = 0;
    }
    if (slideIndex < 0) {
        slideIndex = slides.length - 1;
    }
    
    updateCarousel();
}

function currentSlide(index) {
    slideIndex = index - 1;
    updateCarousel();
}

function updateCarousel() {
    const translateX = -slideIndex * 100;
    track.style.transform = `translateX(${translateX}%)`;
    
    // Update dots
    dots.forEach((dot, index) => {
        dot.classList.toggle('active', index === slideIndex);
    });
}

// Auto-slide functionality
setInterval(() => {
    moveSlide(1);
}, 5000);

// Initialize
updateCarousel();
</script>
</div>
<script src="breadcrumbs.js"></script>
<script src="cms-admin.js"></script>
<script src="analytics.js"></script>
</body>
</html>