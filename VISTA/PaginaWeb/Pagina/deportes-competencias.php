<!DOCTYPE html>
<?php if (session_status() === PHP_SESSION_NONE) { session_start(); } $cl = $_SESSION['lang'] ?? 'es'; ?>
<html lang="<?php echo $cl; ?>">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
  <title><?php $meta=['es'=>'Competencias deportivas','en'=>'Sports competitions','it'=>'Competizioni sportive']; echo $meta[$cl]; ?></title>
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
      'hero_t'=>['es'=>'Competencias deportivas','en'=>'Sports competitions','it'=>'Competizioni sportive'],
      'hero_s'=>['es'=>'Participación, juego limpio y crecimiento personal.','en'=>'Participation, fair play and personal growth.','it'=>'Partecipazione, fair play e crescita personale.'],
      'sec1_t'=>['es'=>'Torneos y ligas','en'=>'Tournaments and leagues','it'=>'Tornei e leghe'],
      'sec1_p'=>['es'=>'Participamos en encuentros internos y externos en múltiples disciplinas.','en'=>'We take part in internal and external events across multiple disciplines.','it'=>'Partecipiamo a incontri interni ed esterni in più discipline.'],
      'sec2_t'=>['es'=>'Calendario competitivo','en'=>'Competitive calendar','it'=>'Calendario competitivo'],
      'sec2_p'=>['es'=>'Fechas destacadas durante el año escolar.','en'=>'Key dates during the school year.','it'=>'Date chiave durante l’anno scolastico.'],
      'contact'=>['es'=>'Contacto','en'=>'Contact','it'=>'Contatto']
    ];
  ?>
  <section class="hero-about editable-image" style="background-image: linear-gradient(rgba(0,0,0,0.35), rgba(0,0,0,0.35)), url('FOTOS/fotosDeportes/futbol2.jpg');">
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
        </div>
        <div class="about-image editable-image">
          <img src="FOTOS/fotosDeportes/futbol1.jpg" alt="Torneos y ligas">
        </div>
      </div>
    </div>
  </section>
  <section class="offer-section">
    <div class="container offer-grid">
      <div class="offer-text">
        <h2 class="editable-text"><?php echo $copy['sec2_t'][$cl]; ?></h2>
        <p class="editable-text"><?php echo $copy['sec2_p'][$cl]; ?></p>
      </div>
      <div class="offer-image editable-image">
        <img src="FOTOS/fotosDeportes/volley1.jpg" alt="Calendario competitivo">
      </div>
    </div>
  </section>
  <footer class="footer-bottom-new">
    <div class="footer-container">
      <div class="footer-left"><div class="footer-logo"><img src="FOTOS/fotosPrincipales/logotipo.png" alt="Scuola Italiana di Montevideo" style="height: 60px;"></div><div class="footer-subtitle"><p>Scuola Italiana di Montevideo</p></div></div>
      <div class="footer-center"><div class="footer-section"><h4><?php echo $copy['contact'][$cl]; ?></h4><p>Av. Brasil 3149, Montevideo</p><p>(+598) 2621 4822 / 2622 1422</p><p>info@scuolaitaliana.edu.uy</p></div></div>
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
