<!DOCTYPE html>
<?php if (session_status() === PHP_SESSION_NONE) { session_start(); } $cl = $_SESSION['lang'] ?? 'es'; ?>
<html lang="<?php echo $cl; ?>">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
  <title><?php $meta=['es'=>'Documentos y recursos','en'=>'Documents and resources','it'=>'Documenti e risorse']; echo $meta[$cl]; ?></title>
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
        <span></span><span></span><span></span>
      </div>
    </div>
  </nav>
  <?php 
    $copy = [
      'hero_t'=>['es'=>'Documentos y recursos','en'=>'Documents and resources','it'=>'Documenti e risorse'],
      'hero_s'=>['es'=>'Accede a materiales institucionales y normativas.','en'=>'Access institutional materials and regulations.','it'=>'Accedi a materiali istituzionali e normative.'],
      'sec1_t'=>['es'=>'Documentos disponibles','en'=>'Available documents','it'=>'Documenti disponibili'],
      'sec1_p'=>['es'=>'Listado de documentos para consulta y descarga.','en'=>'List of documents for consultation and download.','it'=>'Elenco di documenti per consultazione e download.'],
      'sec2_t'=>['es'=>'Recursos útiles','en'=>'Useful resources','it'=>'Risorse utili'],
      'sec2_p'=>['es'=>'Enlaces a herramientas y referencias de interés.','en'=>'Links to tools and helpful references.','it':'Link a strumenti e riferimenti utili.'],
      'contact'=>['es'=>'Contacto','en'=>'Contact','it'=>'Contatto']
    ];
  ?>
  <section class="hero-about editable-image" style="background-image: linear-gradient(rgba(0,0,0,0.35), rgba(0,0,0,0.35)), url('FOTOS/fotosPrincipales/ejemplo4.jpg');">
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
          <ul class="editable-text">
            <li><a href="Documentos/calendario-escolar.pdf" target="_blank">Calendario escolar (PDF)</a></li>
            <li><a href="#" onclick="return false;">Reglamento de convivencia</a></li>
            <li><a href="#" onclick="return false;">Protocolos y comunicaciones</a></li>
          </ul>
        </div>
        <div class="about-image editable-image">
          <img src="FOTOS/fotosPrincipales/portada1.jpg" alt="Documentos disponibles">
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
          <a class="btn" href="https://www.gub.uy/ministerio-educacion-cultura/" target="_blank">MEC</a>
          <a class="btn" href="https://www.anep.edu.uy/" target="_blank">ANEP</a>
        </div>
      </div>
      <div class="offer-image editable-image">
        <img src="FOTOS/fotosPrincipales/ejemplo2.jpg" alt="Recursos útiles">
      </div>
    </div>
  </section>
  <footer class="footer-bottom-new">
    <div class="footer-container">
      <div class="footer-left"><div class="footer-logo"><img src="FOTOS/fotosPrincipales/logotipo.png" alt="Scuola Italiana di Montevideo" style="height: 60px;"></div><div class="footer-subtitle"><p>Scuola Italiana di Montevideo</p></div></div>
      <div class="footer-center"><div class="footer-section"><h4><?php echo $copy['contact'][$cl]; ?></h4><p>Gral. French 2380</p><p>(+598) 2621 4822 / 2622 1422</p><p>info@scuolaitaliana.edu.uy</p></div></div>
      <div class="footer-right"><div class="footer-section"><h4>Links</h4><p>Política de privacidad</p><p>Requisitos técnicos</p><p>Accesibilidad</p></div></div>
    </div>
    <div class="footer-info-bar"><p>Desarrollado por el equipo SGE | Proyecto de apoyo 2002 - EE Informática</p></div>
  </footer>
</div>
<script src="breadcrumbs.js"></script>
<script src="cms-admin.js"></script>
<script src="analytics.js"></script>
</body>
</html>
