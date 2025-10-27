<!DOCTYPE html>
<?php if (session_status() === PHP_SESSION_NONE) { session_start(); } $cl = $_SESSION['lang'] ?? 'es'; ?>
<html lang="<?php echo $cl; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <title><?php $meta=['es'=>'Acerca de la Scuola','en'=>'About the Scuola','it'=>'Chi siamo - Scuola']; echo $meta[$cl]; ?></title>
    <link rel="stylesheet" href="breadcrumbs.css">
    <link rel="stylesheet" href="../css/acerca-scuola.css">
    <link rel="icon" type="image/png" href="/Pagina/favicon.png">
    <link rel="shortcut icon" href="/Pagina/favicon.ico">
</head>
<div id="cms-root"></div>
<body>
<div id="original-content">
    <!-- Navigation -->
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
          'es'=>'Acerca de la Scuola Italiana de Montevideo',
          'en'=>'About Scuola Italiana di Montevideo',
          'it'=>'Chi siamo - Scuola Italiana di Montevideo'
        ],
        'hero_s' => [
          'es'=>'Tradición, innovación y una educación abierta al mundo.',
          'en'=>'Tradition, innovation and an education open to the world.',
          'it'=>'Tradizione, innovazione e un’educazione aperta al mondo.'
        ],
        'sec1_t' => [
          'es'=>'Nuestra Historia', 'en'=>'Our History', 'it'=>'La nostra storia'
        ],
        'sec1_p' => [
          'es'=>'Desde nuestros inicios, promovemos un proyecto educativo bilingüe con fuerte vínculo con la cultura italiana y una mirada internacional.',
          'en'=>'Since our beginnings, we have promoted a bilingual educational project with strong ties to Italian culture and an international outlook.',
          'it'=>'Dagli inizi promuoviamo un progetto educativo bilingue con forte legame alla cultura italiana e uno sguardo internazionale.'
        ],
        'sec2_t' => [
          'es'=>'Misión y Visión', 'en'=>'Mission & Vision', 'it'=>'Missione e Visione'
        ],
        'sec2_items' => [
          'es' => [
            ['Misión','Formar personas íntegras, críticas y creativas, en un ambiente de respeto y diversidad.'],
            ['Visión','Ser una comunidad educativa referente por su excelencia académica y humana.'],
            ['Valores','Identidad, cooperación, curiosidad, esfuerzo y compromiso social.']
          ],
          'en' => [
            ['Mission','Educate integral, critical and creative people in a respectful and diverse environment.'],
            ['Vision','Be an educational community known for academic and human excellence.'],
            ['Values','Identity, cooperation, curiosity, effort and social commitment.']
          ],
          'it' => [
            ['Missione','Formare persone integre, critiche e creative, in un ambiente di rispetto e diversità.'],
            ['Visione','Essere una comunità educativa di riferimento per eccellenza accademica e umana.'],
            ['Valori','Identità, cooperazione, curiosità, impegno e responsabilità sociale.']
          ]
        ],
        'sec3_t' => [
          'es'=>'Propuesta educativa', 'en'=>'Educational Offer', 'it'=>'Offerta formativa'
        ],
        'sec3_p' => [
          'es'=>'Un recorrido continuo desde Inicial a Secundaria, con programas bilingües y experiencias internacionales.',
          'en'=>'A continuous path from Early Childhood to Secondary, with bilingual programs and international experiences.',
          'it'=>'Un percorso continuo dall’Infanzia alla Secondaria, con programmi bilingui ed esperienze internazionali.'
        ],
        'contact' => ['es'=>'Contacto','en'=>'Contact','it'=>'Contatto'],
        'links' => ['es'=>'Enlaces útiles','en'=>'Useful links','it'=>'Link utili']
      ];
    ?>

    <!-- Hero editable -->
    <section class="hero-about editable-image" style="background-image: linear-gradient(rgba(0,0,0,0.35), rgba(0,0,0,0.35)), url('FOTOS/fotosPrincipales/portada1.jpg');">
        <div class="hero-content">
            <h1 class="editable-text"><?php echo $copy['hero_t'][$cl]; ?></h1>
            <p class="editable-text"><?php echo $copy['hero_s'][$cl]; ?></p>
        </div>
    </section>

    <div id="breadcrumbs" class="breadcrumbs-container"></div>

    <!-- Historia -->
    <section class="about-section">
        <div class="container">
            <div class="about-grid">
                <div class="about-text">
                    <h2 class="editable-text"><?php echo $copy['sec1_t'][$cl]; ?></h2>
                    <p class="editable-text"><?php echo $copy['sec1_p'][$cl]; ?></p>
                </div>
                <div class="about-image editable-image">
                    <img src="FOTOS/fotosPrincipales/historia.jpg" alt="Historia de la Scuola">
                </div>
            </div>
        </div>
    </section>

    <!-- Misión / Visión / Valores -->
    <section class="mv-section">
        <div class="container">
            <h2 class="editable-text"><?php echo $copy['sec2_t'][$cl]; ?></h2>
            <div class="mv-grid">
              <?php foreach ($copy['sec2_items'][$cl] as $i): ?>
                <div class="mv-card">
                    <h3 class="editable-text"><?php echo $i[0]; ?></h3>
                    <p class="editable-text"><?php echo $i[1]; ?></p>
                </div>
              <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Propuesta -->
    <section class="offer-section">
        <div class="container offer-grid">
            <div class="offer-text">
                <h2 class="editable-text"><?php echo $copy['sec3_t'][$cl]; ?></h2>
                <p class="editable-text"><?php echo $copy['sec3_p'][$cl]; ?></p>
                <div class="offer-links">
                    <a href="menuInicial.php" class="btn">Inicial</a>
                    <a href="Primaria.php" class="btn">Primaria</a>
                    <a href="menuSecundaria.php" class="btn">Secundaria</a>
                </div>
            </div>
            <div class="offer-image editable-image">
                <img src="FOTOS/fotosPrincipales/ejemplo2.jpg" alt="Nuestra propuesta">
            </div>
        </div>
    </section>

    <!-- Footer Bottom -->
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
