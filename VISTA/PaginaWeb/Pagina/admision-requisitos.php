<!DOCTYPE html>
<?php if (session_status() === PHP_SESSION_NONE) { session_start(); } $cl = $_SESSION['lang'] ?? 'es'; ?>
<html lang="<?php echo $cl; ?>">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
  <title><?php $meta=['es'=>'Requisitos de admisión','en'=>'Admission requirements','it'=>'Requisiti di ammissione']; echo $meta[$cl]; ?></title>
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
        'es'=>'Requisitos de admisión',
        'en'=>'Admission requirements',
        'it'=>'Requisiti di ammissione'
      ],
      'hero_s' => [
        'es'=>'Información esencial para tu postulación.',
        'en'=>'Essential information for your application.',
        'it'=>'Informazioni essenziali per la tua candidatura.'
      ],
      'sec1_t' => [
        'es'=>'Documentación requerida', 'en'=>'Required documentation', 'it'=>'Documentazione richiesta'
      ],
      'sec1_items' => [
        'es'=>[
          'Formulario de inscripción completo.',
          'Documento de identidad del estudiante y responsables.',
          'Certificados de estudios anteriores y/o pase escolar.',
          'Carné de salud y esquema de vacunación.'
        ],
        'en'=>[
          'Completed enrollment form.',
          'ID of the student and guardians.',
          'Previous school certificates and/or school transfer.',
          'Health card and vaccination schedule.'
        ],
        'it'=>[
          'Modulo di iscrizione compilato.',
          "Documento d'identità dello studente e dei tutori.",
          'Certificati scolastici precedenti e/o trasferimento.',
          'Tessera sanitaria e calendario delle vaccinazioni.'
        ]
      ],
      'sec2_t' => [
        'es'=>'Proceso', 'en'=>'Process', 'it'=>'Processo'
      ],
      'sec2_p' => [
        'es'=>'Postulación online o presencial, entrevista familiar y evaluación diagnóstica según el nivel.',
        'en'=>'Online or on-site application, family interview and diagnostic evaluation depending on the level.',
        'it'=>'Domanda online o in sede, colloquio familiare e valutazione diagnostica a seconda del livello.'
      ],
      'links' => [
        'es'=>['Fechas clave','Contacto de admisiones'],
        'en'=>['Key dates','Admissions contact'],
        'it'=>['Date chiave','Contatto ammissioni']
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

  <!-- Documentación -->
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
        </div>
        <div class="about-image editable-image">
          <img src="FOTOS/fotosPrincipales/portada1.jpg" alt="Requisitos">
        </div>
      </div>
    </div>
  </section>

  <!-- Proceso -->
  <section class="offer-section">
    <div class="container offer-grid">
      <div class="offer-text">
        <h2 class="editable-text"><?php echo $copy['sec2_t'][$cl]; ?></h2>
        <p class="editable-text"><?php echo $copy['sec2_p'][$cl]; ?></p>
        <div class="offer-links">
          <a class="btn" href="admision-fechas.php"><?php echo $copy['links'][$cl][0]; ?></a>
          <a class="btn" href="admision-contacto.php"><?php echo $copy['links'][$cl][1]; ?></a>
        </div>
      </div>
      <div class="offer-image editable-image">
        <img src="FOTOS/fotosPrincipales/ejemplo4.jpg" alt="Proceso de admisión">
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
