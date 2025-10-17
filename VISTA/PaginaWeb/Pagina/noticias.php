<!DOCTYPE html>
<?php if (session_status() === PHP_SESSION_NONE) { session_start(); } $cl = $_SESSION['lang'] ?? 'es'; ?>
<html lang="<?php echo $cl; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php $nt_meta=['es'=>'Noticias - Scuola Italiana','en'=>'News - Scuola Italiana','it'=>'Notizie - Scuola Italiana']; echo $nt_meta[$cl]; ?></title>
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
          <?php 
            $nt = [
              'hero_t' => ['es'=>'Noticias Scuola Italiana','en'=>'Scuola Italiana News','it'=>'Notizie Scuola Italiana'],
              'hero_s' => ['es'=>'Mantente informado sobre las últimas novedades de nuestra institución','en'=>'Stay informed about the latest updates from our institution','it'=>'Rimani informato sulle ultime novità della nostra istituzione'],
              'intro_t' => ['es'=>'Últimas Noticias','en'=>'Latest News','it'=>'Ultime Notizie'],
              'intro_p' => ['es'=>'Descubre actividades recientes, eventos y logros de nuestra comunidad educativa.','en'=>'Discover recent activities, events, and achievements from our educational community.','it'=>'Scopri attività recenti, eventi e traguardi della nostra comunità educativa.'],
              'slides' => [
                [
                  'img' => 'FOTOS/fotosPrincipales/arcimboldo2.jpg',
                  'date' => ['es'=>'15 Septiembre 2025','en'=>'15 September 2025','it'=>'15 Settembre 2025'],
                  'title' => ['es'=>'Ceremonia de Graduación 2025','en'=>'Graduation Ceremony 2025','it'=>'Cerimonia di Laurea 2025'],
                  'excerpt' => ['es'=>'Celebramos con orgullo a nuestros graduados en una emotiva ceremonia.','en'=>'We proudly celebrated our graduates in a moving ceremony.','it'=>'Abbiamo festeggiato con orgoglio i nostri diplomati in una cerimonia emozionante.'],
                ],
                [
                  'img' => 'FOTOS/fotosPrincipales/arcimboldo3.jpg',
                  'date' => ['es'=>'10 Septiembre 2025','en'=>'10 September 2025','it'=>'10 Settembre 2025'],
                  'title' => ['es'=>'Intercambio Cultural con Italia','en'=>'Cultural Exchange with Italy','it'=>'Scambio Culturale con l’Italia'],
                  'excerpt' => ['es'=>'Estudiantes participaron en un programa de intercambio con colegios de Roma y Milán.','en'=>'Students took part in an exchange program with schools in Rome and Milan.','it'=>'Gli studenti hanno partecipato a uno scambio con scuole di Roma e Milano.'],
                ],
                [
                  'img' => 'FOTOS/fotosPrincipales/arcimboldo4.jpg',
                  'date' => ['es'=>'5 Septiembre 2025','en'=>'5 September 2025','it'=>'5 Settembre 2025'],
                  'title' => ['es'=>'Festival de Ciencias 2025','en'=>'Science Festival 2025','it'=>'Festival della Scienza 2025'],
                  'excerpt' => ['es'=>'Los proyectos destacaron por innovación y creatividad.','en'=>'Projects stood out for innovation and creativity.','it'=>'I progetti si sono distinti per innovazione e creatività.'],
                ],
                [
                  'img' => 'FOTOS/fotosPrincipales/arcimboldo5.jpg',
                  'date' => ['es'=>'1 Septiembre 2025','en'=>'1 September 2025','it'=>'1 Settembre 2025'],
                  'title' => ['es'=>'Torneo Deportivo Interescolar','en'=>'Inter-school Sports Tournament','it'=>'Torneo Sportivo Inter-scolastico'],
                  'excerpt' => ['es'=>'Equipos obtuvieron destacadas posiciones en el campeonato regional.','en'=>'Teams achieved notable positions in the regional championship.','it'=>'Le squadre hanno ottenuto posizioni di rilievo nel campionato regionale.'],
                ],
                [
                  'img' => 'FOTOS/fotosPrincipales/arcimboldo.jpg',
                  'date' => ['es'=>'25 Agosto 2025','en'=>'25 August 2025','it'=>'25 Agosto 2025'],
                  'title' => ['es'=>'Concurso de Arte y Literatura','en'=>'Art and Literature Contest','it'=>'Concorso di Arte e Letteratura'],
                  'excerpt' => ['es'=>'Premiamos la creatividad en nuestro concurso anual.','en'=>'We awarded creativity in our annual contest.','it'=>'Abbiamo premiato la creatività nel nostro concorso annuale.'],
                ],
              ],
              'stay_t' => ['es'=>'Mantente conectado','en'=>'Stay connected','it'=>'Rimani connesso'],
              'stay_p' => ['es'=>'Sigue nuestras redes y suscríbete al boletín para no perderte novedades.','en'=>'Follow our social networks and subscribe to the newsletter to not miss updates.','it'=>'Segui i nostri social e iscriviti alla newsletter per non perdere aggiornamenti.'],
              'contact' => ['es'=>'Contacto','en'=>'Contact','it'=>'Contatto'],
              'links' => ['es'=>'Enlaces útiles','en'=>'Useful links','it'=>'Link utili'],
              'link_items' => [
                'es' => ['Política de privacidad','Requisitos técnicos','Accesibilidad'],
                'en' => ['Privacy Policy','Technical Requirements','Accessibility'],
                'it' => ['Informativa sulla privacy','Requisiti tecnici','Accessibilità'],
              ],
            ];
          ?>
          <section class="hero-gallery editable-image" style="background-image: url('FOTOS/fotosPrincipales/heliopolis3.jpg'); background-size: cover; background-position: center;">
              <div class="hero-overlay"></div>
              <div class="hero-content-gallery">
                  <h1 class="hero-title-gallery editable-text"><?php echo $nt['hero_t'][$cl]; ?></h1>
                  <p class="hero-subtitle-gallery editable-text"><?php echo $nt['hero_s'][$cl]; ?></p>
              </div>
          </section>

          <div id="breadcrumbs" class="breadcrumbs-container"></div>

          <!-- Main Content -->
          <main class="main-gallery">
              <div class="container">
                  <!-- Gallery Description -->
                  <section class="gallery-intro">
                      <h2 class="gallery-title editable-text"><?php echo $nt['intro_t'][$cl]; ?></h2>
                      <p class="gallery-description editable-text"><?php echo $nt['intro_p'][$cl]; ?></p>
                  </section>

                  <!-- News Carousel -->
                  <section class="news-carousel">
                      <div class="carousel-container">
                          <div class="carousel-track" id="carouselTrack">
                              <?php foreach ($nt['slides'] as $slide) { ?>
                              <div class="carousel-slide">
                                  <div class="news-card">
                                      <div class="news-image">
                                          <img class="editable-image" src="<?php echo $slide['img']; ?>" alt="Noticia">
                                      </div>
                                      <div class="news-content">
                                          <span class="news-date"><?php echo $slide['date'][$cl]; ?></span>
                                          <h3 class="news-title editable-text"><?php echo $slide['title'][$cl]; ?></h3>
                                          <p class="news-excerpt editable-text"><?php echo $slide['excerpt'][$cl]; ?></p>
                                      </div>
                                  </div>
                              </div>
                              <?php } ?>
                          </div>
                          
                          <button class="carousel-btn prev-btn" onclick="moveSlide(-1)">‹</button>
                          <button class="carousel-btn next-btn" onclick="moveSlide(1)">›</button>
                      </div>
                      
                      <div class="carousel-dots">
                          <?php for ($i = 0; $i < count($nt['slides']); $i++) { ?>
                          <span class="dot <?php echo $i == 0 ? 'active' : ''; ?>" onclick="currentSlide(<?php echo $i + 1; ?>)"></span>
                          <?php } ?>
                      </div>
                  </section>

                  <!-- Gallery Footer Text -->
                  <section class="gallery-footer-text">
                      <div class="footer-text-container">
                          <h2 class="footer-text-title editable-text"><?php echo $nt['stay_t'][$cl]; ?></h2>
                          <p class="footer-text-content editable-text"><?php echo $nt['stay_p'][$cl]; ?></p>
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
                <h4><?php echo $nt['contact'][$cl]; ?></h4>
                <p>Av. Brasil 3149, Montevideo</p>
                <p>(+598) 2621 4822 / 2622 1422</p>
                <p>info@scuolaitaliana.edu.uy</p>
            </div>
        </div>
        
        <div class="footer-right">
            <div class="footer-section">
                <h4><?php echo $nt['links'][$cl]; ?></h4>
                <?php foreach ($nt['link_items'][$cl] as $link) { ?>
                <p><?php echo $link; ?></p>
                <?php } ?>
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