<!DOCTYPE html>
<?php if (session_status() === PHP_SESSION_NONE) { session_start(); } if (isset($_GET['lang']) && in_array($_GET['lang'], ['es','en','it'])) { $_SESSION['lang'] = $_GET['lang']; } $cl = $_SESSION['lang'] ?? 'es'; ?>
<html lang="<?php echo $cl; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php $meta=['es'=>'Bienvenido a Scuola Italiana','en'=>'Welcome to Scuola Italiana','it'=>'Benvenuti alla Scuola Italiana']; echo $meta[$cl]; ?></title>

    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="breadcrumbs.css">
    <link rel="stylesheet" href="../css/acerca-bienvenido.css">
    <link rel="icon" type="image/png" href="/Pagina/favicon.png">
    <link rel="shortcut icon" href="/Pagina/favicon.ico">
</head>
<div id="cms-root"></div>
<body>
<div id="original-content">
    <!-- Navigation (igual que otras páginas) -->
    <nav class="navbar">
        <div class="nav-container">
            <div class="nav-logo">
                <img src="FOTOS/fotosPrincipales/logo2.png" alt="Scuola Italiana di Montevideo">
            </div>
            <div class="nav-menu-button" onclick="window.location.href='menuScuola.php'">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </nav>

    <?php 
      $t = [
        'hero_t' => [
          'es'=>'Bienvenido a la Scuola Italiana','en'=>'Welcome to the Scuola Italiana','it'=>'Benvenuti alla Scuola Italiana'
        ],
        'hero_s' => [
          'es'=>'Conoce nuestra identidad, comunidad y proyecto educativo.','en'=>'Get to know our identity, community and educational project.','it'=>'Scopri la nostra identità, comunità e progetto educativo.'
        ],
        'bc_home' => ['es'=>'Inicio','en'=>'Home','it'=>'Home'],
        'bc_acerca' => ['es'=>'Acerca','en'=>'About','it'=>'Chi siamo'],
        'bc_pagina' => ['es'=>'Bienvenido','en'=>'Welcome','it'=>'Benvenuti'],
        'sect_t' => ['es'=>'Nuestra comunidad','en'=>'Our community','it'=>'La nostra comunità'],
        'cta' => ['es'=>'Contactar','en'=>'Contact','it'=>'Contatto']
      ];
    ?>

    <!-- Hero editable -->
    <section class="hero editable-image" style="background-image: url('FOTOS/fotosPrincipales/hero-acerca.jpg'); margin-top: 0px;">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1 class="hero-title editable-text"><?php echo $t['hero_t'][$cl]; ?></h1>
            <p class="hero-subtitle editable-text"><?php echo $t['hero_s'][$cl]; ?></p>
        </div>
    </section>

    <!-- Breadcrumbs -->
    <div id="breadcrumbs" class="breadcrumbs-container" data-bc='[
      {"label":"<?php echo $t['bc_home'][$cl]; ?>","href":"index.php"},
      {"label":"<?php echo $t['bc_acerca'][$cl]; ?>","href":"acerca.php"},
      {"label":"<?php echo $t['bc_pagina'][$cl]; ?>","href":"#","active":true}
    ]'></div>

    <!-- Main Content editable -->
    <main class="main-content">
        <section class="intro-section container">
            <div class="intro-grid">
                <div class="intro-text editable-richtext">
                    <h2 class="editable-text"><?php echo $t['sect_t'][$cl]; ?></h2>
                    <p>La Scuola Italiana di Montevideo promueve una formación integral, plurilingüe y multicultural, con énfasis en valores, ciudadanía y aprendizaje significativo.</p>
                    <p>Nuestro proyecto combina tradición e innovación para que cada estudiante explore su potencial y construya conocimiento en comunidad.</p>
                </div>
                <div class="intro-card editable-image" style="background-image:url('FOTOS/fotosPrincipales/idiomas.jpg')"></div>
            </div>
        </section>

        <section class="features container">
            <div class="features-grid">
                <article class="feature editable-block">
                    <h3 class="editable-text">Identidad</h3>
                    <p class="editable-text">Compromiso con la cultura italo-uruguaya, con una propuesta abierta e inclusiva.</p>
                </article>
                <article class="feature editable-block">
                    <h3 class="editable-text">Excelencia</h3>
                    <p class="editable-text">Desarrollo académico con enfoque humano y tecnológico.</p>
                </article>
                <article class="feature editable-block">
                    <h3 class="editable-text">Comunidad</h3>
                    <p class="editable-text">Participación de familias, docentes y estudiantes en un entorno colaborativo.</p>
                </article>
            </div>
        </section>
    </main>

    <!-- Footer (igual que otras páginas) -->
    <footer class="footer-bottom-new">
        <div class="footer-container">
            <div class="footer-Aleft">
                <div class="footer-logo">
                    <img src="FOTOS/fotosPrincipales/logotipo.png" alt="Scuola Italiana di Montevideo" style="height: 60px;">
                </div>
                <div class="footer-subtitle">
                    <p>Scuola Italiana di Montevideo</p>
                </div>
            </div>
            <div class="footer-center">
                <div class="footer-section">
                    <h4>Contacto</h4>
                    <p>Gral. French 2380</p>
                    <p>CP 11500 - Montevideo, Uruguay</p>
                    <p>(+598) 2600 1527</p>
                    <p>info@scuolaitaliana.edu.uy</p>
                </div>
            </div>
            <div class="footer-right">
                <div class="footer-section">
                    <h4>Enlaces útiles</h4>
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

<script>
    // Misma animación de navbar que en otras páginas
    let lastScrollTop = 0;
    window.addEventListener('scroll', function() {
        const navbar = document.querySelector('.navbar');
        let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        if (scrollTop > lastScrollTop && scrollTop > 100) {
            navbar.style.transform = 'translateY(-100%)';
            navbar.style.opacity = '0';
        } else {
            navbar.style.transform = 'translateY(0)';
            navbar.style.opacity = '1';
        }
        lastScrollTop = scrollTop;
    });
</script>
<script src="breadcrumbs.js"></script>
<script src="cms-admin.js"></script>
<script src="analytics.js"></script>
</body>
</html>
