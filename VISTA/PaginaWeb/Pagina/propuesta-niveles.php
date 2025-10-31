<!DOCTYPE html>
<?php if (session_status() === PHP_SESSION_NONE) { session_start(); } $cl = $_SESSION['lang'] ?? 'es'; ?>
<html lang="<?php echo $cl; ?>">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
  <title><?php $meta=['es'=>'Niveles y áreas','en'=>'Levels and Areas','it'=>'Livelli e aree']; echo $meta[$cl]; ?></title>
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
        'es'=>'Niveles y áreas',
        'en'=>'Levels and Areas',
        'it'=>'Livelli e aree'
      ],
      'hero_s' => [
        'es'=>'Un recorrido continuo desde Inicial a Secundaria.',
        'en'=>'A continuous path from Early Childhood to Secondary.',
        'it'=>'Un percorso continuo dall’Infanzia alla Secondaria.'
      ],
      'sec1_t' => [
        'es'=>'Inicial', 'en'=>'Early Childhood', 'it'=>'Infanzia'
      ],
      'sec1_p' => [
        'es'=>'Primera infancia con enfoque en el juego, la curiosidad y la exploración.',
        'en'=>'Early years focused on play, curiosity and exploration.',
        'it'=>'Prima infanzia con focus su gioco, curiosità ed esplorazione.'
      ],
      'sec2_t' => [
        'es'=>'Primaria', 'en'=>'Primary', 'it'=>'Primaria'
      ],
      'sec2_p' => [
        'es'=>'Aprendizajes fundamentales, bilingüismo y proyectos integradores.',
        'en'=>'Foundational learning, bilingualism and integrative projects.',
        'it'=>'Apprendimenti fondamentali, bilinguismo e progetti integranti.'
      ],
      'sec3_t' => [
        'es'=>'Secundaria', 'en'=>'Secondary', 'it'=>'Secondaria'
      ],
      'sec3_p' => [
        'es'=>'Profundización académica, ciudadanía y experiencias internacionales.',
        'en'=>'Academic depth, citizenship and international experiences.',
        'it'=>'Approfondimento accademico, cittadinanza ed esperienze internazionali.'
      ],
      'links' => [
        'es'=>['Ir a Inicial','Ir a Primaria','Ir a Secundaria'],
        'en'=>['Go to Early Childhood','Go to Primary','Go to Secondary'],
        'it'=>['Vai a Infanzia','Vai a Primaria','Vai a Secondaria']
      ],
      'contact' => ['es'=>'Contacto','en'=>'Contact','it'=>'Contatto']
    ];
  ?>

  <!-- Hero -->
  <section class="hero-about editable-image" style="background-image: linear-gradient(rgba(0,0,0,0.35), rgba(0,0,0,0.35)), url('FOTOS/fotosPrincipales/ejemplo1.jpg');">
    <div class="hero-content">
      <h1 class="editable-text"><?php echo $copy['hero_t'][$cl]; ?></h1>
      <p class="editable-text"><?php echo $copy['hero_s'][$cl]; ?></p>
    </div>
  </section>

  <!-- Breadcrumbs -->
  <div id="breadcrumbs" class="breadcrumbs-container"></div>

  <!-- Inicial -->
  <section class="about-section">
    <div class="container">
      <div class="about-grid">
        <div class="about-text">
          <h2 class="editable-text"><?php echo $copy['sec1_t'][$cl]; ?></h2>
          <p class="editable-text"><?php echo $copy['sec1_p'][$cl]; ?></p>
          <div class="offer-links">
            <a href="menuInicial.php" class="btn"><?php echo $copy['links'][$cl][0]; ?></a>
          </div>
        </div>
        <div class="about-image editable-image">
          <img src="FOTOS/fotosPrincipales/ejemplo2.jpg" alt="Inicial">
        </div>
      </div>
    </div>
  </section>

  <!-- Primaria -->
  <section class="offer-section">
    <div class="container offer-grid">
      <div class="offer-text">
        <h2 class="editable-text"><?php echo $copy['sec2_t'][$cl]; ?></h2>
        <p class="editable-text"><?php echo $copy['sec2_p'][$cl]; ?></p>
        <div class="offer-links">
          <a href="Primaria.php" class="btn"><?php echo $copy['links'][$cl][1]; ?></a>
        </div>
      </div>
      <div class="offer-image editable-image">
        <img src="FOTOS/fotosPrincipales/ejemplo3.jpg" alt="Primaria">
      </div>
    </div>
  </section>

  <!-- Secundaria -->
  <section class="about-section">
    <div class="container">
      <div class="about-grid">
        <div class="about-text">
          <h2 class="editable-text"><?php echo $copy['sec3_t'][$cl]; ?></h2>
          <p class="editable-text"><?php echo $copy['sec3_p'][$cl]; ?></p>
          <div class="offer-links">
            <a href="menuSecundaria.php" class="btn"><?php echo $copy['links'][$cl][2]; ?></a>
          </div>
        </div>
        <div class="about-image editable-image">
          <img src="FOTOS/fotosPrincipales/ejemplo4.jpg" alt="Secundaria">
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
