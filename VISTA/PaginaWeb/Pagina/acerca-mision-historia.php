<!DOCTYPE html>
<?php if (session_status() === PHP_SESSION_NONE) { session_start(); } $cl = $_SESSION['lang'] ?? 'es'; ?>
<html lang="<?php echo $cl; ?>">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
  <title><?php $meta=['es'=>'Misión e Historia','en'=>'Mission & History','it'=>'Missione e Storia']; echo $meta[$cl]; ?></title>
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
        'es'=>'Misión e Historia',
        'en'=>'Mission & History',
        'it'=>'Missione e Storia'
      ],
      'hero_s' => [
        'es'=>'Una comunidad educativa con identidad, tradición e innovación.',
        'en'=>'An educational community with identity, tradition and innovation.',
        'it'=>'Una comunità educativa con identità, tradizione e innovazione.'
      ],
      'mision_t' => [
        'es'=>'Nuestra Misión', 'en'=>'Our Mission', 'it'=>'La nostra Missione'
      ],
      'mision_p' => [
        'es'=>'Formar personas íntegras, críticas y creativas en un ambiente de respeto, diversidad y cooperación.',
        'en'=>'Educate integral, critical and creative people in an environment of respect, diversity and cooperation.',
        'it'=>'Formare persone integre, critiche e creative in un ambiente di rispetto, diversità e cooperazione.'
      ],
      'vision_t' => [
        'es'=>'Nuestra Visión', 'en'=>'Our Vision', 'it'=>'La nostra Visione'
      ],
      'vision_p' => [
        'es'=>'Ser referente por su excelencia académica y humana, con mirada internacional y compromiso social.',
        'en'=>'Be a benchmark for academic and human excellence, with an international outlook and social commitment.',
        'it'=>'Essere un riferimento per eccellenza accademica e umana, con sguardo internazionale e impegno sociale.'
      ],
      'hist_t' => [
        'es'=>'Nuestra Historia', 'en'=>'Our History', 'it'=>'La nostra Storia'
      ],
      'hist_p' => [
        'es'=>'Desde nuestros orígenes, integramos la cultura italiana con una propuesta abierta al mundo.',
        'en'=>'Since our origins, we have integrated Italian culture with a proposal open to the world.',
        'it'=>'Dalle nostre origini, integriamo la cultura italiana con una proposta aperta al mondo.'
      ],
      'contact' => ['es'=>'Contacto','en'=>'Contact','it'=>'Contatto'],
      'links' => ['es'=>'Enlaces útiles','en'=>'Useful links','it'=>'Link utili']
    ];
  ?>

  <!-- Hero -->
  <section class="hero-about editable-image" style="background-image: linear-gradient(rgba(0,0,0,0.35), rgba(0,0,0,0.35)), url('FOTOS/fotosPrincipales/historia.jpg');">
    <div class="hero-content">
      <h1 class="editable-text"><?php echo $copy['hero_t'][$cl]; ?></h1>
      <p class="editable-text"><?php echo $copy['hero_s'][$cl]; ?></p>
    </div>
  </section>

  <!-- Breadcrumbs -->
  <div id="breadcrumbs" class="breadcrumbs-container"></div>

  <!-- Misión -->
  <section class="about-section">
    <div class="container">
      <div class="about-grid">
        <div class="about-text">
          <h2 class="editable-text"><?php echo $copy['mision_t'][$cl]; ?></h2>
          <p class="editable-text"><?php echo $copy['mision_p'][$cl]; ?></p>
        </div>
        <div class="about-image editable-image">
          <img src="FOTOS/fotosPrincipales/ejemplo1.jpg" alt="Misión">
        </div>
      </div>
    </div>
  </section>

  <!-- Visión -->
  <section class="offer-section">
    <div class="container offer-grid">
      <div class="offer-text">
        <h2 class="editable-text"><?php echo $copy['vision_t'][$cl]; ?></h2>
        <p class="editable-text"><?php echo $copy['vision_p'][$cl]; ?></p>
      </div>
      <div class="offer-image editable-image">
        <img src="FOTOS/fotosPrincipales/ejemplo2.jpg" alt="Visión">
      </div>
    </div>
  </section>

  <!-- Historia -->
  <section class="about-section">
    <div class="container">
      <div class="about-grid">
        <div class="about-text">
          <h2 class="editable-text"><?php echo $copy['hist_t'][$cl]; ?></h2>
          <p class="editable-text"><?php echo $copy['hist_p'][$cl]; ?></p>
        </div>
        <div class="about-image editable-image">
          <img src="FOTOS/fotosPrincipales/portada1.jpg" alt="Historia">
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
          <h4><?php echo $copy['links'][$cl]; ?></h4>
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
