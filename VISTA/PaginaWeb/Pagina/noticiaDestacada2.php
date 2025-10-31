<!DOCTYPE html>
<?php if (session_status() === PHP_SESSION_NONE) { session_start(); } $cl = $_SESSION['lang'] ?? 'es'; ?>
<html lang="<?php echo $cl; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <title><?php $nd2_meta=['es'=>'Noticia: Último Primer Día','en'=>'News: Last First Day','it'=>'Notizia: Ultimo Primo Giorno']; echo $nd2_meta[$cl]; ?></title>
    <link rel="stylesheet" href="breadcrumbs.css">
    <link rel="stylesheet" href="../css/noticiaDestacada2.css">
<link rel="icon" type="image/png" href="/Pagina/favicon.png">
<link rel="shortcut icon" href="/Pagina/favicon.ico">
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
            $nd2 = [
              'hero_t' => ['es'=>'Scuola Italiana di Montevideo','en'=>'Scuola Italiana di Montevideo','it'=>'Scuola Italiana di Montevideo'],
              'hero_s' => ['es'=>'Ultimo Primer Día - Momentos especiales de nuestra comunidad educativa','en'=>'Last First Day - Special moments from our school community','it'=>'Ultimo Primo Giorno - Momenti speciali della nostra comunità scolastica'],
              'sec_t'  => ['es'=>'Nuestros Estudiantes en Acción','en'=>'Our Students in Action','it'=>'I nostri studenti in azione'],
              'sec_p'  => ['es'=>'Una mirada a los momentos más especiales, mostrando la alegría y el compañerismo que nos caracteriza.','en'=>'A look at special moments, showing the joy and camaraderie that define us.','it'=>'Uno sguardo ai momenti speciali, mostrando la gioia e la camaraderia che ci contraddistinguono.'],
              'badge'  => ['es'=>'Destacado','en'=>'Featured','it'=>'In evidenza'],
              'c1_t'   => ['es'=>'Compañerismo y Alegría','en'=>'Camaraderie and Joy','it'=>'Cameratismo e Gioia'],
              'c1_p'   => ['es'=>'Amistad, respeto y alegría de aprender juntos.','en'=>'Friendship, respect, and the joy of learning together.','it'=>'Amicizia, rispetto e gioia di imparare insieme.'],
              'c2_t'   => ['es'=>'Recreos Activos','en'=>'Active Breaks','it'=>'Intervalli Attivi'],
              'c2_p'   => ['es'=>'Esparcimiento y socialización en espacios verdes.','en'=>'Recreation and socializing in green spaces.','it'=>'Svago e socializzazione negli spazi verdi.'],
              'c3_t'   => ['es'=>'Trabajo en Equipo','en'=>'Teamwork','it'=>'Lavoro di Squadra'],
              'c3_p'   => ['es'=>'Colaboración y aprendizaje compartido.','en'=>'Collaboration and shared learning.','it'=>'Collaborazione e apprendimento condiviso.'],
              'c4_t'   => ['es'=>'Deporte y Salud','en'=>'Sports and Health','it'=>'Sport e Salute'],
              'c4_p'   => ['es'=>'Actividad física como parte fundamental.','en'=>'Physical activity as a fundamental part.','it'=>'Attività fisica come parte fondamentale.'],
              'c5_t'   => ['es'=>'Tradiciones Escolares','en'=>'School Traditions','it'=>'Tradizioni Scolastiche'],
              'c5_p'   => ['es'=>'Tradiciones que fortalecen la identidad.','en'=>'Traditions that strengthen identity.','it'=>'Tradizioni che rafforzano l’identità.'],
              'show_t' => ['es'=>'Una Educación Integral','en'=>'A Holistic Education','it'=>'Un’Educazione Integrale'],
              'show_p' => ['es'=>'Educación más allá del aula: desarrollo social, emocional y académico.','en'=>'Education beyond the classroom: social, emotional and academic development.','it'=>'Educazione oltre l’aula: sviluppo sociale, emotivo e accademico.'],
              'stat_years' => ['es'=>'Años de Historia','en'=>'Years of History','it'=>'Anni di Storia'],
              'stat_students' => ['es'=>'Estudiantes','en'=>'Students','it'=>'Studenti'],
              'stat_teachers' => ['es'=>'Docentes','en'=>'Teachers','it'=>'Docenti'],
              'contact' => ['es'=>'Contacto','en'=>'Contact','it'=>'Contatto'],
              'links' => ['es'=>'Enlaces útiles','en'=>'Useful links','it'=>'Link utili'],
              'link_items' => [
                'es' => ['Política de privacidad','Requisitos técnicos','Accesibilidad'],
                'en' => ['Privacy Policy','Technical Requirements','Accessibility'],
                'it' => ['Informativa sulla privacy','Requisiti tecnici','Accessibilità'],
              ],
            ];
          ?>
          <section class="hero-gallery" style="background-image: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.3)), url('fotosPrincipales/PrimerDia.jpg.png'); background-size: cover; background-position: center;">
              <div class="hero-overlay"></div>
              <div class="hero-content-gallery">
                  <h1 class="hero-title-gallery"><?php echo $nd2['hero_t'][$cl]; ?></h1>
                  <p class="hero-subtitle-gallery"><?php echo $nd2['hero_s'][$cl]; ?></p>
              </div>
          </section>

          <div id="breadcrumbs" class="breadcrumbs-container"></div>

          <!-- Student Cards Section -->
          <section class="student-cards-section">
              <div class="container">
                  <div class="section-header">
                      <h2 class="section-title"><?php echo $nd2['sec_t'][$cl]; ?></h2>
                      <p class="section-description"><?php echo $nd2['sec_p'][$cl]; ?></p>
                  </div>

                  <div class="student-grid">
                      <div class="student-card featured">
                          <div class="card-image">
                              <img src="FOTOS/fotosPrincipales/PrimerDia.jpg.png" alt="Estudiantes principales">
                              <div class="card-badge"><?php echo $nd2['badge'][$cl]; ?></div>

                          </div>
                          <div class="card-content">
                              <h3><?php echo $nd2['c1_t'][$cl]; ?></h3>
                              <p><?php echo $nd2['c1_p'][$cl]; ?></p>

                          </div>
                      </div>

                      <div class="student-card">
                          <div class="card-image">
                              <img src="FOTOS/fotosPrincipales/PrimerDia2.jpg.png" alt="Estudiantes en el patio">
                          </div>
                          <div class="card-content">
                              <h3><?php echo $nd2['c2_t'][$cl]; ?></h3>
                              <p><?php echo $nd2['c2_p'][$cl]; ?></p>

                          </div>
                      </div>

                      <div class="student-card">
                          <div class="card-image">
                              <img src="FOTOS/fotosPrincipales/PrimerDia3.jpg.png" alt="Actividades grupales">
                          </div>
                          <div class="card-content">
                              <h3><?php echo $nd2['c3_t'][$cl]; ?></h3>
                              <p><?php echo $nd2['c3_p'][$cl]; ?></p>

                          </div>
                      </div>

                      <div class="student-card">
                          <div class="card-image">
                              <img src="FOTOS/fotosPrincipales/PrimerDia4.jpg.png" alt="Actividades deportivas">
                          </div>
                          <div class="card-content">
                              <h3><?php echo $nd2['c4_t'][$cl]; ?></h3>
                              <p><?php echo $nd2['c4_p'][$cl]; ?></p>

                          </div>
                      </div>

                      <div class="student-card">
                          <div class="card-image">
                              <img src="FOTOS/fotosPrincipales/PrimerDia5.jpg.png" alt="Momentos especiales">
                          </div>
                          <div class="card-content">
                              <h3><?php echo $nd2['c5_t'][$cl]; ?></h3>
                              <p><?php echo $nd2['c5_p'][$cl]; ?></p>

                          </div>
                      </div>
                  </div>
              </div>
          </section>

          <!-- Gallery Showcase -->
          <section class="gallery-showcase">
              <div class="container">
                  <div class="showcase-content">
                      <div class="showcase-text">
                          <h2><?php echo $nd2['show_t'][$cl]; ?></h2>
                          <p><?php echo $nd2['show_p'][$cl]; ?></p>

                          <div class="stats-grid">
                              <div class="stat-item">
                                  <span class="stat-number">100+</span>
                                  <span class="stat-label"><?php echo $nd2['stat_years'][$cl]; ?></span>

                              </div>
                              <div class="stat-item">
                                  <span class="stat-number">500+</span>
                                  <span class="stat-label"><?php echo $nd2['stat_students'][$cl]; ?></span>

                              </div>
                              <div class="stat-item">
                                  <span class="stat-number">50+</span>
                                  <span class="stat-label"><?php echo $nd2['stat_teachers'][$cl]; ?></span>

                              </div>
                          </div>
                      </div>
                      <div class="showcase-image">
                          <img src="FOTOS/fotosPrincipales/PrimerDia.jpg.png" alt="Estudiantes de la Scuola">
                      </div>
                  </div>
              </div>
          </section>

        <footer class="footer-bottom-new">
    <div class="footer-container">
        <div class="footer-left">
            <div class="footer-logo">
                <img src="FOTOS/fotosPrincipales/logotipo.png" alt="Scuola Italiana di Montevideo" style="height: 60px;">
            </div>
            <div class="footer-subtitle">
                <p>Scuola Italiana di Montevideo</p>
            </div>
        </div>
        
        <div class="footer-center">
            <div class="footer-section">
                <h4><?php echo $nd2['contact'][$cl]; ?></h4>

                <p>Av. Brasil 3149, Montevideo</p>
                <p>(+598) 2621 4822 / 2622 1422</p>
                <p>info@scuolaitaliana.edu.uy</p>
            </div>
        </div>
        
        <div class="footer-right">
            <div class="footer-section">
                <h4><?php echo $nd2['links'][$cl]; ?></h4>
                <p><?php echo $nd2['link_items'][$cl][0]; ?></p>
                <p><?php echo $nd2['link_items'][$cl][1]; ?></p>
                <p><?php echo $nd2['link_items'][$cl][2]; ?></p>

            </div>
        </div>
    </div>
    
    <div class="footer-info-bar">
        <p>Desarrollado por el equipo SGE | Proyecto de apoyo 2002 - EE Informática</p>
    </div>
</footer>
</div>
<script src="breadcrumbs.js"></script>
<script src="cms-admin.js"></script>
<script src="analytics.js"></script>
</body>
</html>