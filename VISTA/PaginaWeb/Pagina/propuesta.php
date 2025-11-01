<!DOCTYPE html>
<?php if (session_status() === PHP_SESSION_NONE) { session_start(); } $cl = $_SESSION['lang'] ?? 'es'; ?>
<html lang="<?php echo $cl; ?>">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
  <title><?php $meta=['es'=>'Propuesta Educativa','en'=>'Educational Offer','it'=>'Offerta formativa']; echo $meta[$cl]; ?></title>
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
        'es'=>'Propuesta Educativa',
        'en'=>'Educational Offer',
        'it'=>'Offerta formativa'
      ],
      'hero_s' => [
        'es'=>'Un camino continuo, bilingüe y con experiencias internacionales.',
        'en'=>'A continuous, bilingual path with international experiences.',
        'it'=>'Un percorso continuo, bilingue e con esperienze internazionali.'
      ],
      'sec1_t' => [
        'es'=>'Niveles y áreas', 'en'=>'Levels and Areas', 'it'=>'Livelli e aree'
      ],
      'sec1_p' => [
        'es'=>'Inicial, Primaria y Secundaria con programas integrados en español e italiano, y énfasis en proyectos interdisciplinarios.',
        'en'=>'Early Years, Primary and Secondary with integrated Spanish-Italian programs and focus on interdisciplinary projects.',
        'it'=>'Infanzia, Primaria e Secondaria con programmi integrati in spagnolo e italiano e focus su progetti interdisciplinari.'
      ],
      'sec2_t' => [
        'es'=>'Plan académico', 'en'=>'Academic Plan', 'it'=>'Piano accademico'
      ],
      'sec2_p' => [
        'es'=>'Currículos actualizados, certificaciones internacionales y una educación centrada en competencias.',
        'en'=>'Updated curricula, international certifications and competency-based education.',
        'it'=>'Curricula aggiornati, certificazioni internazionali ed educazione basata sulle competenze.'
      ],
      'sec3_t' => [
        'es'=>'Proyectos destacados', 'en'=>'Featured Projects', 'it'=>'Progetti in evidenza'
      ],
      'sec3_p' => [
        'es'=>'Intercambios, proyectos STEAM, arte, deporte y ciudadanía.',
        'en'=>'Exchanges, STEAM projects, arts, sports and citizenship.',
        'it'=>'Scambi, progetti STEAM, arte, sport e cittadinanza.'
      ],
      'links' => [
        'es'=>['Ver niveles y áreas','Ver plan académico','Ver proyectos'],
        'en'=>['See levels and areas','See academic plan','See projects'],
        'it'=>['Vedi livelli e aree','Vedi piano accademico','Vedi progetti']
      ],
      'contact' => ['es'=>'Contacto','en'=>'Contact','it'=>'Contatto']
    ];
  ?>

  <section class="hero-about editable-image" style="background-image: linear-gradient(rgba(0,0,0,0.35), rgba(0,0,0,0.35)), url('FOTOS/fotosPrincipales/ejemplo3.jpg');">
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
            <a href="propuesta-niveles.php" class="btn"><?php echo $copy['links'][$cl][0]; ?></a>
          </div>
        </div>
        <div class="about-image editable-image">
          <img src="FOTOS/fotosPrincipales/portada1.jpg" alt="Niveles y áreas">
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
          <a href="propuesta-plan-academico.php" class="btn"><?php echo $copy['links'][$cl][1]; ?></a>
        </div>
      </div>
      <div class="offer-image editable-image">
        <img src="FOTOS/fotosPrincipales/ejemplo2.jpg" alt="Plan académico">
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
            <a href="propuesta-proyectos.php" class="btn"><?php echo $copy['links'][$cl][2]; ?></a>
          </div>
        </div>
        <div class="about-image editable-image">
          <img src="FOTOS/fotosPrincipales/ejemplo4.jpg" alt="Proyectos">
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
