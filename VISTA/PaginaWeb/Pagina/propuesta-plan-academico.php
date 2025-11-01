<!DOCTYPE html>
<?php if (session_status() === PHP_SESSION_NONE) { session_start(); } $cl = $_SESSION['lang'] ?? 'es'; ?>
<html lang="<?php echo $cl; ?>">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
  <title><?php $meta=['es'=>'Plan académico','en'=>'Academic plan','it'=>'Piano accademico']; echo $meta[$cl]; ?></title>
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
        'es'=>'Plan académico',
        'en'=>'Academic plan',
        'it'=>'Piano accademico'
      ],
      'hero_s' => [
        'es'=>'Currículos actualizados, bilingüismo y estándares internacionales.',
        'en'=>'Updated curricula, bilingualism and international standards.',
        'it'=>'Curricoli aggiornati, bilinguismo e standard internazionali.'
      ],
      'sec1_t' => [
        'es'=>'Estructura por niveles', 'en'=>'Structure by levels', 'it'=>'Struttura per livelli'
      ],
      'sec1_p' => [
        'es'=>'Secuencias didácticas articuladas entre Inicial, Primaria y Secundaria.',
        'en'=>'Articulated didactic sequences across Early Years, Primary and Secondary.',
        'it'=>'Sequenze didattiche articolate tra Infanzia, Primaria e Secondaria.'
      ],
      'sec2_t' => [
        'es'=>'Idiomas y certificaciones', 'en'=>'Languages and certifications', 'it'=>'Lingue e certificazioni'
      ],
      'sec2_p' => [
        'es'=>'Enseñanza de español e italiano, con certificaciones reconocidas.',
        'en'=>'Spanish and Italian instruction with recognized certifications.',
        'it'=>'Insegnamento di spagnolo e italiano con certificazioni riconosciute.'
      ],
      'sec3_t' => [
        'es'=>'Evaluación y seguimiento', 'en'=>'Assessment and follow-up', 'it'=>'Valutazione e monitoraggio'
      ],
      'sec3_p' => [
        'es'=>'Evaluaciones formativas y sumativas, con retroalimentación continua.',
        'en'=>'Formative and summative assessments with continuous feedback.',
        'it'=>'Valutazioni formative e sommative, con feedback continuo.'
      ],
      'links' => [
        'es'=>['Ver proyectos destacados'],
        'en'=>['See featured projects'],
        'it'=>['Vedi progetti in evidenza']
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

  <!-- Estructura por niveles -->
  <section class="about-section">
    <div class="container">
      <div class="about-grid">
        <div class="about-text">
          <h2 class="editable-text"><?php echo $copy['sec1_t'][$cl]; ?></h2>
          <p class="editable-text"><?php echo $copy['sec1_p'][$cl]; ?></p>
        </div>
        <div class="about-image editable-image">
          <img src="FOTOS/fotosPrincipales/portada1.jpg" alt="Estructura por niveles">
        </div>
      </div>
    </div>
  </section>

  <!-- Idiomas y certificaciones -->
  <section class="offer-section">
    <div class="container offer-grid">
      <div class="offer-text">
        <h2 class="editable-text"><?php echo $copy['sec2_t'][$cl]; ?></h2>
        <p class="editable-text"><?php echo $copy['sec2_p'][$cl]; ?></p>
        <div class="offer-links">
          <a class="btn" href="propuesta-proyectos.php"><?php echo $copy['links'][$cl][0]; ?></a>
        </div>
      </div>
      <div class="offer-image editable-image">
        <img src="FOTOS/fotosPrincipales/ejemplo3.jpg" alt="Idiomas y certificaciones">
      </div>
    </div>
  </section>

  <!-- Evaluación y seguimiento -->
  <section class="about-section">
    <div class="container">
      <div class="about-grid">
        <div class="about-text">
          <h2 class="editable-text"><?php echo $copy['sec3_t'][$cl]; ?></h2>
          <p class="editable-text"><?php echo $copy['sec3_p'][$cl]; ?></p>
        </div>
        <div class="about-image editable-image">
          <img src="FOTOS/fotosPrincipales/ejemplo4.jpg" alt="Evaluación y seguimiento">
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
