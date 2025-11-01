<!DOCTYPE html>
<?php if (session_status() === PHP_SESSION_NONE) { session_start(); } $cl = $_SESSION['lang'] ?? 'es'; ?>
<html lang="<?php echo $cl; ?>">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
  <title><?php $meta=['es'=>'Otra sección','en'=>'Other section','it'=>'Altra sezione']; echo $meta[$cl]; ?></title>
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
        'es'=>'Nuestra comunidad y legado',
        'en'=>'Our community and legacy',
        'it'=>'La nostra comunità e il lascito'
      ],
      'hero_s' => [
        'es'=>'Historias, valores e información institucional en un solo lugar.',
        'en'=>'Stories, values and institutional information in one place.',
        'it'=>'Storie, valori e informazioni istituzionali in un unico posto.'
      ],
      'sec1_t' => [
        'es'=>'Historia institucional', 'en'=>'Institutional history', 'it'=>'Storia istituzionale'
      ],
      'sec1_p' => [
        'es'=>'Una trayectoria de identidad, apertura e integración cultural.',
        'en'=>'A path of identity, openness and cultural integration.',
        'it'=>'Un percorso di identità, apertura e integrazione culturale.'
      ],
      'sec2_t' => [
        'es'=>'Legado y valores', 'en'=>'Legacy and values', 'it'=>'Lascito e valori'
      ],
      'sec2_p' => [
        'es'=>'Los principios que orientan nuestra vida escolar y comunitaria.',
        'en'=>'The principles that guide our school and community life.',
        'it'=>'I principi che guidano la nostra vita scolastica e comunitaria.'
      ],
      'sec3_t' => [
        'es'=>'Documentos y recursos', 'en'=>'Documents and resources', 'it'=>'Documenti e risorse'
      ],
      'sec3_p' => [
        'es'=>'Acceso a materiales institucionales y normativas vigentes.',
        'en'=>'Access to institutional materials and current regulations.',
        'it'=>'Accesso a materiali istituzionali e normative vigenti.'
      ],
      'links' => [
        'es'=>['Ver historia','Ver legado','Ver documentos'],
        'en'=>['See history','See legacy','See documents'],
        'it'=>['Vedi storia','Vedi lascito','Vedi documenti']
      ],
      'contact' => ['es'=>'Contacto','en'=>'Contact','it'=>'Contatto']
    ];
  ?>

  <section class="hero-about editable-image" style="background-image: linear-gradient(rgba(0,0,0,0.35), rgba(0,0,0,0.35)), url('FOTOS/fotosPrincipales/ejemplo6.jpg');">
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
            <a href="otra-historia.php" class="btn"><?php echo $copy['links'][$cl][0]; ?></a>
          </div>
        </div>
        <div class="about-image editable-image">
          <img src="FOTOS/fotosPrincipales/portada1.jpg" alt="Historia institucional">
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
          <a href="otra-legado.php" class="btn"><?php echo $copy['links'][$cl][1]; ?></a>
        </div>
      </div>
      <div class="offer-image editable-image">
        <img src="FOTOS/fotosPrincipales/ejemplo2.jpg" alt="Legado y valores">
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
            <a href="otra-documentos.php" class="btn"><?php echo $copy['links'][$cl][2]; ?></a>
          </div>
        </div>
        <div class="about-image editable-image">
          <img src="FOTOS/fotosPrincipales/ejemplo4.jpg" alt="Documentos y recursos">
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
