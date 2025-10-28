<!DOCTYPE html>
<?php if (session_status() === PHP_SESSION_NONE) { session_start(); } $cl = $_SESSION['lang'] ?? 'es'; ?>
<html lang="<?php echo $cl; ?>">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
  <title><?php $meta=['es'=>'Deportes','en'=>'Sports','it'=>'Sport']; echo $meta[$cl]; ?></title>
  <link rel="stylesheet" href="breadcrumbs.css">
  <link rel="stylesheet" href="../css/acerca-scuola.css">
  <link rel="icon" type="image/png" href="/Pagina/favicon.png">
  <link rel="shortcut icon" href="/Pagina/favicon.ico">
</head>
<div id="cms-root"></div>
<body>
<div id="original-content">
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
        'es'=>'Deportes en la Scuola',
        'en'=>'Sports at the Scuola',
        'it'=>'Sport alla Scuola'
      ],
      'hero_s' => [
        'es'=>'Formación integral a través del movimiento, el equipo y el esfuerzo.',
        'en'=>'Integral education through movement, teamwork and effort.',
        'it'=>'Formazione integrale attraverso movimento, lavoro di squadra e impegno.'
      ],
      'sec1_t' => [
        'es'=>'Actividades deportivas', 'en'=>'Sports activities', 'it'=>'Attività sportive'
      ],
      'sec1_p' => [
        'es'=>'Amplia propuesta en atletismo, fútbol, handball, hockey, vóley y gimnasia.',
        'en'=>'Broad offer in athletics, soccer, handball, hockey, volleyball and gymnastics.',
        'it'=>'Ampia offerta in atletica, calcio, pallamano, hockey, pallavolo e ginnastica.'
      ],
      'sec2_t' => [
        'es'=>'Competencias', 'en'=>'Competitions', 'it'=>'Competizioni'
      ],
      'sec2_p' => [
        'es'=>'Participamos en torneos internos y externos, promoviendo el juego limpio y el crecimiento personal.',
        'en'=>'We participate in internal and external tournaments, promoting fair play and personal growth.',
        'it'=>'Partecipiamo a tornei interni ed esterni, promuovendo fair play e crescita personale.'
      ],
      'sec3_t' => [
        'es'=>'Talleres', 'en'=>'Workshops', 'it'=>'Laboratori'
      ],
      'sec3_p' => [
        'es'=>'Espacios de iniciación y perfeccionamiento para todas las edades.',
        'en'=>'Initiation and improvement spaces for all ages.',
        'it'=>'Spazi di avviamento e perfezionamento per tutte le età.'
      ],
      'links' => [
        'es'=>['Ver actividades','Ver competencias','Ver talleres'],
        'en'=>['See activities','See competitions','See workshops'],
        'it'=>['Vedi attività','Vedi competizioni','Vedi laboratori']
      ],
      'contact' => ['es'=>'Contacto','en'=>'Contact','it'=>'Contatto']
    ];
  ?>

  <section class="hero-about editable-image" style="background-image: linear-gradient(rgba(0,0,0,0.35), rgba(0,0,0,0.35)), url('FOTOS/fotosPrincipales/ejemplo5.jpg');">
    <div class="hero-content">
      <h1 class="editable-text"><?php echo $copy['hero_t'][$cl]; ?></h1>
      <p class="editable-text"><?php echo $copy['hero_s'][$cl]; ?></p>
    </div>
  </section>

  <div id="breadcrumbs" class="breadcrumbs-container"></div>

  <section class="about-section">
    <div class="container">
      <div class="about-grid">
        <div class="about-text">
          <h2 class="editable-text"><?php echo $copy['sec1_t'][$cl]; ?></h2>
          <p class="editable-text"><?php echo $copy['sec1_p'][$cl]; ?></p>
          <div class="offer-links">
            <a href="deportes-actividades.php" class="btn"><?php echo $copy['links'][$cl][0]; ?></a>
          </div>
        </div>
        <div class="about-image editable-image">
          <img src="FOTOS/fotosPrincipales/ejemplo2.jpg" alt="Actividades deportivas">
        </div>
      </div>
    </div>
  </section>

  <section class="offer-section">
    <div class="container offer-grid">
      <div class="offer-text">
        <h2 class="editable-text"><?php echo $copy['sec2_t'][$cl]; ?></h2>
        <p class="editable-text"><?php echo $copy['sec2_p'][$cl]; ?></p>
        <div class="offer-links">
          <a href="deportes-competencias.php" class="btn"><?php echo $copy['links'][$cl][1]; ?></a>
        </div>
      </div>
      <div class="offer-image editable-image">
        <img src="FOTOS/fotosPrincipales/ejemplo4.jpg" alt="Competencias">
      </div>
    </div>
  </section>

  <section class="about-section">
    <div class="container">
      <div class="about-grid">
        <div class="about-text">
          <h2 class="editable-text"><?php echo $copy['sec3_t'][$cl]; ?></h2>
          <p class="editable-text"><?php echo $copy['sec3_p'][$cl]; ?></p>
          <div class="offer-links">
            <a href="deportes-talleres.php" class="btn"><?php echo $copy['links'][$cl][2]; ?></a>
          </div>
        </div>
        <div class="about-image editable-image">
          <img src="FOTOS/fotosPrincipales/portada1.jpg" alt="Talleres">
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
