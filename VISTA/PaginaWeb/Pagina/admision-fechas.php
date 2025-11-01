<!DOCTYPE html>
<?php if (session_status() === PHP_SESSION_NONE) { session_start(); } $cl = $_SESSION['lang'] ?? 'es'; ?>
<html lang="<?php echo $cl; ?>">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
  <title><?php $meta=['es'=>'Fechas clave de admisión','en'=>'Admission key dates','it'=>'Date chiave di ammissione']; echo $meta[$cl]; ?></title>
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
        'es'=>'Fechas clave de admisión',
        'en'=>'Admission key dates',
        'it'=>'Date chiave di ammissione'
      ],
      'hero_s' => [
        'es'=>'Calendario de inscripciones, entrevistas y evaluaciones.',
        'en'=>'Calendar of enrollments, interviews and evaluations.',
        'it'=>'Calendario di iscrizioni, colloqui e valutazioni.'
      ],
      'sec1_t' => [
        'es'=>'Calendario', 'en'=>'Calendar', 'it'=>'Calendario'
      ],
      'sec1_items' => [
        'es'=>[
          'Apertura de inscripciones: 01/08',
          'Cierre de inscripciones: 30/11',
          'Entrevistas familiares: Agosto - Noviembre',
          'Evaluaciones diagnósticas: Según el nivel'
        ],
        'en'=>[
          'Enrollment opening: 01/08',
          'Enrollment closing: 30/11',
          'Family interviews: August - November',
          'Diagnostic evaluations: Depending on level'
        ],
        'it'=>[
          "Apertura iscrizioni: 01/08",
          'Chiusura iscrizioni: 30/11',
          'Colloqui familiari: Agosto - Novembre',
          'Valutazioni diagnostiche: Secondo il livello'
        ]
      ],
      'sec2_t' => [
        'es'=>'Recordatorios', 'en'=>'Reminders', 'it'=>'Promemoria'
      ],
      'sec2_p' => [
        'es'=>'Traer documentación completa y respetar los plazos indicados para asegurar tu lugar.',
        'en'=>'Bring complete documentation and respect the indicated deadlines to secure your place.',
        'it'=>'Portare la documentazione completa e rispettare le scadenze indicate per assicurarsi il posto.'
      ],
      'links' => [
        'es'=>['Requisitos','Contacto de admisiones'],
        'en'=>['Requirements','Admissions contact'],
        'it'=>['Requisiti','Contatto ammissioni']
      ],
      'contact' => ['es'=>'Contacto','en'=>'Contact','it'=>'Contatto']
    ];
  ?>

  <!-- Hero -->
  <section class="hero-about editable-image" style="background-image: linear-gradient(rgba(0,0,0,0.35), rgba(0,0,0,0.35)), url('FOTOS/fotosPrincipales/ejemplo3.jpg');">
    <div class="hero-content">
      <h1 class="editable-text"><?php echo $copy['hero_t'][$cl]; ?></h1>
      <p class="editable-text"><?php echo $copy['hero_s'][$cl]; ?></p>
    </div>
  </section>

  <!-- Breadcrumbs -->
  <div id="breadcrumbs" class="breadcrumbs-container"></div>

  <!-- Calendario -->
  <section class="about-section">
    <div class="container">
      <div class="about-grid">
        <div class="about-text">
          <h2 class="editable-text"><?php echo $copy['sec1_t'][$cl]; ?></h2>
          <ul class="editable-text">
            <?php foreach ($copy['sec1_items'][$cl] as $it): ?>
              <li><?php echo $it; ?></li>
            <?php endforeach; ?>
          </ul>
          <div class="offer-links" style="margin-top: 16px;">
            <a class="btn" href="admision-requisitos.php"><?php echo $copy['links'][$cl][0]; ?></a>
            <a class="btn" href="admision-contacto.php"><?php echo $copy['links'][$cl][1]; ?></a>
          </div>
        </div>
        <div class="about-image editable-image">
          <img src="FOTOS/fotosPrincipales/portada1.jpg" alt="Fechas de admisión">
        </div>
      </div>
    </div>
  </section>

  <!-- Recordatorios -->
  <section class="offer-section">
    <div class="container offer-grid">
      <div class="offer-text">
        <h2 class="editable-text"><?php echo $copy['sec2_t'][$cl]; ?></h2>
        <p class="editable-text"><?php echo $copy['sec2_p'][$cl]; ?></p>
      </div>
      <div class="offer-image editable-image">
        <img src="FOTOS/fotosPrincipales/ejemplo1.jpg" alt="Recordatorios">
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
      <p>Desarrollado por el equipo SGE | Proyecto de apoyo 2002 - EE Informática</p>
    </div>
  </footer>
</div>

<script src="breadcrumbs.js"></script>
<script src="cms-admin.js"></script>
<script src="analytics.js"></script>
</body>
</html>
