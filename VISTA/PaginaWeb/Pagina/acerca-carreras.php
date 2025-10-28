<!DOCTYPE html>
<?php if (session_status() === PHP_SESSION_NONE) { session_start(); } $cl = $_SESSION['lang'] ?? 'es'; ?>
<html lang="<?php echo $cl; ?>">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
  <title><?php $meta=['es'=>'Carreras','en'=>'Careers','it'=>'Carriere']; echo $meta[$cl]; ?></title>
  <link rel="stylesheet" href="breadcrumbs.css">
  <link rel="stylesheet" href="../css/acerca-scuola.css">
  <link rel="icon" type="image/png" href="/Pagina/favicon.png">
  <link rel="shortcut icon" href="/Pagina/favicon.ico">
</head>
<div id="cms-root"></div>
<body>
<div id="original-content">
  <!-- Header -->
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

  <?php 
    $copy = [
      'hero_t' => [
        'es'=>'Carreras',
        'en'=>'Careers',
        'it'=>'Carriere'
      ],
      'hero_s' => [
        'es'=>'Sumate a nuestro equipo educativo y de gestión.',
        'en'=>'Join our educational and management team.',
        'it'=>'Unisciti al nostro team educativo e gestionale.'
      ],
      'sec1_t' => [
        'es'=>'Búsquedas abiertas', 'en'=>'Open positions', 'it'=>'Posizioni aperte'
      ],
      'sec1_p' => [
        'es'=>'Convocatorias para docentes, asistentes, administración y servicios.',
        'en'=>'Calls for teachers, assistants, administration and services.',
        'it'=>'Selezioni per docenti, assistenti, amministrazione e servizi.'
      ],
      'sec2_t' => [
        'es'=>'Cómo postular', 'en'=>'How to apply', 'it'=>'Come candidarsi'
      ],
      'sec2_p' => [
        'es'=>'Envíanos tu CV y carta de presentación a rrhh@scuolaitaliana.edu.uy.',
        'en'=>'Send your CV and cover letter to rrhh@scuolaitaliana.edu.uy.',
        'it'=>'Invia il tuo CV e lettera di presentazione a rrhh@scuolaitaliana.edu.uy.'
      ],
      'sec3_t' => [
        'es'=>'Nuestra propuesta laboral', 'en'=>'Our job offer', 'it'=>'La nostra offerta di lavoro'
      ],
      'sec3_p' => [
        'es'=>'Ambiente colaborativo, desarrollo profesional y compromiso con la educación bilingüe.',
        'en'=>'Collaborative environment, professional development and commitment to bilingual education.',
        'it'=>'Ambiente collaborativo, sviluppo professionale e impegno per l’educazione bilingue.'
      ],
      'contact' => ['es'=>'Contacto','en'=>'Contact','it'=>'Contatto']
    ];
  ?>

  <!-- Hero -->
  <section class="hero-about editable-image" style="background-image: linear-gradient(rgba(0,0,0,0.35), rgba(0,0,0,0.35)), url('FOTOS/fotosPrincipales/ejemplo5.jpg');">
    <div class="hero-content">
      <h1 class="editable-text"><?php echo $copy['hero_t'][$cl]; ?></h1>
      <p class="editable-text"><?php echo $copy['hero_s'][$cl]; ?></p>
    </div>
  </section>

  <!-- Breadcrumbs -->
  <div id="breadcrumbs" class="breadcrumbs-container"></div>

  <!-- Búsquedas abiertas -->
  <section class="about-section">
    <div class="container">
      <div class="about-grid">
        <div class="about-text">
          <h2 class="editable-text"><?php echo $copy['sec1_t'][$cl]; ?></h2>
          <p class="editable-text"><?php echo $copy['sec1_p'][$cl]; ?></p>
        </div>
        <div class="about-image editable-image">
          <img src="FOTOS/fotosPrincipales/portada1.jpg" alt="Búsquedas abiertas">
        </div>
      </div>
    </div>
  </section>

  <!-- Cómo postular -->
  <section class="offer-section">
    <div class="container offer-grid">
      <div class="offer-text">
        <h2 class="editable-text"><?php echo $copy['sec2_t'][$cl]; ?></h2>
        <p class="editable-text"><?php echo $copy['sec2_p'][$cl]; ?></p>
      </div>
      <div class="offer-image editable-image">
        <img src="FOTOS/fotosPrincipales/ejemplo2.jpg" alt="Cómo postular">
      </div>
    </div>
  </section>

  <!-- Nuestra propuesta laboral -->
  <section class="about-section">
    <div class="container">
      <div class="about-grid">
        <div class="about-text">
          <h2 class="editable-text"><?php echo $copy['sec3_t'][$cl]; ?></h2>
          <p class="editable-text"><?php echo $copy['sec3_p'][$cl]; ?></p>
        </div>
        <div class="about-image editable-image">
          <img src="FOTOS/fotosPrincipales/ejemplo3.jpg" alt="Nuestra propuesta laboral">
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
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
          <h4><?php echo $copy['contact'][$cl]; ?></h4>
          <p>Av. Brasil 3149, Montevideo</p>
          <p>(+598) 2621 4822 / 2622 1422</p>
          <p>info@scuolaitaliana.edu.uy</p>
        </div>
      </div>
      <div class="footer-right">
        <div class="footer-section">
          <h4>Links</h4>
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
</div>

<script src="breadcrumbs.js"></script>
<script src="cms-admin.js"></script>
<script src="analytics.js"></script>
</body>
</html>
