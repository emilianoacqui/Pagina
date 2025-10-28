<!DOCTYPE html>
<?php if (session_status() === PHP_SESSION_NONE) { session_start(); } $cl = $_SESSION['lang'] ?? 'es'; ?>
<html lang="<?php echo $cl; ?>">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
  <title><?php $meta=['es'=>'Contacto de admisiones','en'=>'Admissions contact','it'=>'Contatto ammissioni']; echo $meta[$cl]; ?></title>
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
        'es'=>'Contacto de admisiones',
        'en'=>'Admissions contact',
        'it'=>'Contatto ammissioni'
      ],
      'hero_s' => [
        'es'=>'¿Consultas? Estamos para ayudarte en tu proceso.',
        'en'=>'Questions? We are here to help you through the process.',
        'it'=>'Domande? Siamo qui per aiutarti nel processo.'
      ],
      'sec1_t' => [
        'es'=>'Datos de contacto', 'en'=>'Contact details', 'it'=>'Dati di contatto'
      ],
      'sec1_items' => [
        'es'=>[
          'Departamento de Admisiones',
          'Tel.: (+598) 2621 4822 / 2622 1422',
          'Email: admisiones@scuolaitaliana.edu.uy',
          'Horario: Lun-Vie 9:00 a 16:00'
        ],
        'en'=>[
          'Admissions Department',
          'Phone: (+598) 2621 4822 / 2622 1422',
          'Email: admisiones@scuolaitaliana.edu.uy',
          'Hours: Mon-Fri 9:00 to 16:00'
        ],
        'it'=>[
          'Ufficio Ammissioni',
          'Tel.: (+598) 2621 4822 / 2622 1422',
          'Email: admisiones@scuolaitaliana.edu.uy',
          'Orario: Lun-Ven 9:00 - 16:00'
        ]
      ],
      'sec2_t' => [
        'es'=>'Escríbenos', 'en'=>'Write to us', 'it'=>'Scrivici'
      ],
      'sec2_p' => [
        'es'=>'Puedes enviarnos tu consulta y te responderemos a la brevedad.',
        'en'=>'Send us your query and we will get back to you shortly.',
        'it'=>'Inviaci la tua richiesta e ti risponderemo al più presto.'
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

  <!-- Contacto -->
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
          <img src="FOTOS/fotosPrincipales/ejemplo2.jpg" alt="Contacto de admisiones">
        </div>
      </div>
    </div>
  </section>

  <!-- Formulario simple (editable) -->
  <section class="offer-section">
    <div class="container offer-grid">
      <div class="offer-text">
        <h2 class="editable-text"><?php echo $copy['sec2_t'][$cl]; ?></h2>
        <p class="editable-text"><?php echo $copy['sec2_p'][$cl]; ?></p>
        <form class="editable-text" onsubmit="alert('Gracias por tu consulta'); return false;" style="display:grid; gap:10px; max-width:480px;">
          <input type="text" placeholder="Nombre" required>
          <input type="email" placeholder="Email" required>
          <textarea placeholder="Mensaje" rows="4" required></textarea>
          <button type="submit" class="btn">Enviar</button>
        </form>
      </div>
      <div class="offer-image editable-image">
        <img src="FOTOS/fotosPrincipales/ejemplo4.jpg" alt="Formulario de contacto">
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
