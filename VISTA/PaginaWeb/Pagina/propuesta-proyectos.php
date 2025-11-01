<!DOCTYPE html>
<?php if (session_status() === PHP_SESSION_NONE) { session_start(); } $cl = $_SESSION['lang'] ?? 'es'; ?>
<html lang="<?php echo $cl; ?>">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
  <title><?php $meta=['es'=>'Proyectos destacados','en'=>'Featured projects','it'=>'Progetti in evidenza']; echo $meta[$cl]; ?></title>
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
        'es'=>'Proyectos destacados',
        'en'=>'Featured projects',
        'it'=>'Progetti in evidenza'
      ],
      'hero_s' => [
        'es'=>'STEAM, arte, ciudadanía, deportes e intercambios.',
        'en'=>'STEAM, arts, citizenship, sports and exchanges.',
        'it'=>'STEAM, arte, cittadinanza, sport e scambi.'
      ],
      'sec1_t' => [
        'es'=>'Proyecto STEAM', 'en'=>'STEAM Project', 'it'=>'Progetto STEAM'
      ],
      'sec1_p' => [
        'es'=>'Desarrollo de competencias científicas, tecnológicas y creativas en todos los niveles.',
        'en'=>'Development of scientific, technological and creative skills across all levels.',
        'it'=>'Sviluppo di competenze scientifiche, tecnologiche e creative a tutti i livelli.'
      ],
      'sec2_t' => [
        'es'=>'Arte y cultura', 'en'=>'Arts and culture', 'it'=>'Arte e cultura'
      ],
      'sec2_p' => [
        'es'=>'Talleres, muestras y eventos que integran identidad y comunidad.',
        'en'=>'Workshops, exhibitions and events that integrate identity and community.',
        'it'=>'Laboratori, mostre ed eventi che integrano identità e comunità.'
      ],
      'sec3_t' => [
        'es'=>'Ciudadanía y deporte', 'en'=>'Citizenship and sport', 'it'=>'Cittadinanza e sport'
      ],
      'sec3_p' => [
        'es'=>'Participación, trabajo en equipo y hábitos saludables.',
        'en'=>'Participation, teamwork and healthy habits.',
        'it'=>'Partecipazione, lavoro di squadra e abitudini sane.'
      ],
      'contact' => ['es'=>'Contacto','en'=>'Contact','it'=>'Contatto']
    ];
  ?>

  <!-- Hero -->
  <section class="hero-about editable-image" style="background-image: linear-gradient(rgba(0,0,0,0.35), rgba(0,0,0,0.35)), url('FOTOS/fotosPrincipales/ejemplo2.jpg');">
    <div class="hero-content">
      <h1 class="editable-text"><?php echo $copy['hero_t'][$cl]; ?></h1>
      <p class="editable-text"><?php echo $copy['hero_s'][$cl]; ?></p>
    </div>
  </section>

  <!-- Breadcrumbs -->
  <div id="breadcrumbs" class="breadcrumbs-container"></div>

  <!-- STEAM -->
  <section class="about-section">
    <div class="container">
      <div class="about-grid">
        <div class="about-text">
          <h2 class="editable-text"><?php echo $copy['sec1_t'][$cl]; ?></h2>
          <p class="editable-text"><?php echo $copy['sec1_p'][$cl]; ?></p>
        </div>
        <div class="about-image editable-image">
          <img src="FOTOS/fotosPrincipales/ejemplo3.jpg" alt="Proyecto STEAM">
        </div>
      </div>
    </div>
  </section>

  <!-- Arte y cultura -->
  <section class="offer-section">
    <div class="container offer-grid">
      <div class="offer-text">
        <h2 class="editable-text"><?php echo $copy['sec2_t'][$cl]; ?></h2>
        <p class="editable-text"><?php echo $copy['sec2_p'][$cl]; ?></p>
      </div>
      <div class="offer-image editable-image">
        <img src="FOTOS/fotosPrincipales/ejemplo4.jpg" alt="Arte y cultura">
      </div>
    </div>
  </section>

  <!-- Ciudadanía y deporte -->
  <section class="about-section">
    <div class="container">
      <div class="about-grid">
        <div class="about-text">
          <h2 class="editable-text"><?php echo $copy['sec3_t'][$cl]; ?></h2>
          <p class="editable-text"><?php echo $copy['sec3_p'][$cl]; ?></p>
        </div>
        <div class="about-image editable-image">
          <img src="FOTOS/fotosPrincipales/ejemplo1.jpg" alt="Ciudadanía y deporte">
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
          <p>Gral. French 2380</p>
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
      <p>Desarrollado por el equipo SGE | Proyecto di supporto 2002 - EE Informatica</p>
    </div>
  </footer>
</div>

<script src="breadcrumbs.js"></script>
<script src="cms-admin.js"></script>
<script src="analytics.js"></script>
</body>
</html>
