<!DOCTYPE html>
<?php if (session_status() === PHP_SESSION_NONE) { session_start(); } $cl = $_SESSION['lang'] ?? 'es'; ?>
<html lang="<?php echo $cl; ?>">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
  <title><?php $meta=['es'=>'Explora nuestro campus','en'=>'Explore our campus','it'=>'Esplora il nostro campus']; echo $meta[$cl]; ?></title>
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
        'es'=>'Explora nuestro campus',
        'en'=>'Explore our campus',
        'it'=>'Esplora il nostro campus'
      ],
      'hero_s' => [
        'es'=>'Instalaciones académicas, deportivas y culturales en un entorno único.',
        'en'=>'Academic, sports and cultural facilities in a unique environment.',
        'it'=>'Strutture accademiche, sportive e culturali in un ambiente unico.'
      ],
      'sec1_t' => [
        'es'=>'Espacios académicos', 'en'=>'Academic spaces', 'it'=>'Spazi accademici'
      ],
      'sec1_p' => [
        'es'=>'Aulas, laboratorios, biblioteca y salas interdisciplinarias pensadas para aprender.',
        'en'=>'Classrooms, labs, library and interdisciplinary rooms designed for learning.',
        'it'=>'Aule, laboratori, biblioteca e sale interdisciplinari pensate per l’apprendimento.'
      ],
      'sec2_t' => [
        'es'=>'Deporte y convivencia', 'en'=>'Sports and community', 'it'=>'Sport e comunità'
      ],
      'sec2_p' => [
        'es'=>'Gimnasios, canchas y espacios abiertos que promueven el encuentro y la salud.',
        'en'=>'Gyms, fields and open spaces that promote community and health.',
        'it'=>'Palestre, campi e spazi aperti che promuovono comunità e salute.'
      ],
      'sec3_t' => [
        'es'=>'Recorrido sugerido', 'en'=>'Suggested route', 'it'=>'Percorso consigliato'
      ],
      'sec3_p' => [
        'es'=>'Comienza por el acceso principal, continúa por biblioteca y finaliza en áreas deportivas.',
        'en'=>'Start at the main entrance, continue through the library and finish at sports areas.',
        'it'=>'Inizia dall’ingresso principale, prosegui per la biblioteca e termina nelle aree sportive.'
      ],
      'links' => [
        'es'=>['Ver mapa del campus','Ver ubicaciones'],
        'en'=>['See campus map','See locations'],
        'it'=>['Vedi mappa del campus','Vedi posizioni']
      ],
      'contact' => ['es'=>'Contacto','en'=>'Contact','it'=>'Contatto']
    ];
  ?>

  <!-- Hero -->
  <section class="hero-about editable-image" style="background-image: linear-gradient(rgba(0,0,0,0.35), rgba(0,0,0,0.35)), url('FOTOS/fotosPrincipales/ejemplo6.jpg');">
    <div class="hero-content">
      <h1 class="editable-text"><?php echo $copy['hero_t'][$cl]; ?></h1>
      <p class="editable-text"><?php echo $copy['hero_s'][$cl]; ?></p>
    </div>
  </section>

  <!-- Breadcrumbs -->
  <div id="breadcrumbs" class="breadcrumbs-container"></div>

  <!-- Espacios académicos -->
  <section class="about-section">
    <div class="container">
      <div class="about-grid">
        <div class="about-text">
          <h2 class="editable-text"><?php echo $copy['sec1_t'][$cl]; ?></h2>
          <p class="editable-text"><?php echo $copy['sec1_p'][$cl]; ?></p>
          <div class="offer-links">
            <a class="btn" href="mapa-campus.php"><?php echo $copy['links'][$cl][0]; ?></a>
          </div>
        </div>
        <div class="about-image editable-image">
          <img src="FOTOS/fotosPrincipales/portada1.jpg" alt="Espacios académicos">
        </div>
      </div>
    </div>
  </section>

  <!-- Deporte y convivencia -->
  <section class="offer-section">
    <div class="container offer-grid">
      <div class="offer-text">
        <h2 class="editable-text"><?php echo $copy['sec2_t'][$cl]; ?></h2>
        <p class="editable-text"><?php echo $copy['sec2_p'][$cl]; ?></p>
        <div class="offer-links">
          <a class="btn" href="ubicaciones.php"><?php echo $copy['links'][$cl][1]; ?></a>
        </div>
      </div>
      <div class="offer-image editable-image">
        <img src="FOTOS/fotosPrincipales/ejemplo1.jpg" alt="Deporte y convivencia">
      </div>
    </div>
  </section>

  <!-- Recorrido sugerido -->
  <section class="about-section">
    <div class="container">
      <div class="about-grid">
        <div class="about-text">
          <h2 class="editable-text"><?php echo $copy['sec3_t'][$cl]; ?></h2>
          <p class="editable-text"><?php echo $copy['sec3_p'][$cl]; ?></p>
        </div>
        <div class="about-image editable-image">
          <img src="FOTOS/fotosPrincipales/ejemplo3.jpg" alt="Recorrido sugerido">
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
      <p>Desarrollado por el equipo SGE | Proyecto de apoyo 2002 - EE Informática</p>
    </div>
  </footer>
</div>

<script src="breadcrumbs.js"></script>
<script src="cms-admin.js"></script>
<script src="analytics.js"></script>
</body>
</html>
