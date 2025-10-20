<!DOCTYPE html>
<?php if (session_status() === PHP_SESSION_NONE) { session_start(); } if (isset($_GET['lang']) && in_array($_GET['lang'], ['es','en','it'])) { $_SESSION['lang'] = $_GET['lang']; } $cl = $_SESSION['lang'] ?? 'es'; ?>
<html lang="<?php echo $cl; ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php $handball_meta=['es'=>'Handball - Scuola Italiana','en'=>'Handball - Scuola Italiana','it'=>'Pallamano - Scuola Italiana']; echo $handball_meta[$cl]; ?></title>

    <link rel="stylesheet" href="breadcrumbs.css">
    <link rel="stylesheet" href="../css/handball.css">
</head>
<div id="cms-root"></div>
<body>
    <div id="original-content">
    <!-- Navigation -->
    <nav class="navbar">
        <div class="nav-container">
            <div class="nav-logo">
                <img src="FOTOS/fotosPrincipales/logo2.png" alt="Scuola Italiana di Montevideo">
            </div>
            <div class="nav-menu-button" onclick="window.location.href='menudeportes.php'">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </nav>

    <!-- Sport Hero Section -->
    <?php 
        $handball = [
            'hero_t' => ['es'=>'HANDBALL','en'=>'HANDBALL','it'=>'PALLAMANO'],
            'hero_s' => ['es'=>'Velocidad, estrategia y coordinación en movimiento','en'=>'Speed, strategy and coordination in motion','it'=>'Velocità, strategia e coordinazione in movimento'],
            'info_t' => ['es'=>'Sobre el Handball en Scuola Italiana','en'=>'About Handball at Scuola Italiana','it'=>'Sulla Pallamano alla Scuola Italiana'],
            'info_p1' => ['es'=>'El handball es un deporte dinámico que combina velocidad, estrategia y coordinación. En nuestra institución favorece la toma de decisiones rápidas, la coordinación y el trabajo en equipo.','en'=>'Handball is a dynamic sport that combines speed, strategy and coordination. At our school it fosters quick decision‑making, coordination and teamwork.','it'=>'La pallamano è uno sport dinamico che combina velocità, strategia e coordinazione. Nella nostra scuola favorisce decisioni rapide, coordinazione e lavoro di squadra.'],
            'info_p2' => ['es'=>'Nuestros equipos de handball participan en competencias escolares y regionales, destacándose por su técnica depurada y espíritu competitivo. Los entrenamientos se enfocan en el desarrollo de habilidades técnicas, tácticas y físicas específicas del deporte.','en'=>'Our handball teams participate in school and regional competitions, standing out for their refined technique and competitive spirit. Training focuses on developing technical, tactical and physical skills specific to the sport.','it'=>'Le nostre squadre di pallamano partecipano a competizioni scolastiche e regionali, distinguendosi per la loro tecnica raffinata e lo spirito competitivo. L\'allenamento si concentra sullo sviluppo di abilità tecniche, tattiche e fisiche specifiche dello sport.'],
            'feature1_t' => ['es'=>'Velocidad y Agilidad','en'=>'Speed and Agility','it'=>'Velocità e Agilità'],
            'feature1_d' => ['es'=>'Desarrollamos la rapidez de movimiento y la capacidad de cambio de dirección.','en'=>'We develop movement speed and the ability to change direction.','it'=>'Sviluppiamo la velocità di movimento e la capacità di cambiare direzione.'],
            'feature2_t' => ['es'=>'Estrategia Colectiva','en'=>'Collective Strategy','it'=>'Strategia Collettiva'],
            'feature2_d' => ['es'=>'Fomentamos el pensamiento táctico y la coordinación entre jugadores.','en'=>'We encourage tactical thinking and coordination between players.','it'=>'Incoraggiamo il pensiero tattico e la coordinazione tra i giocatori.'],
            'feature3_t' => ['es'=>'Precisión y Técnica','en'=>'Precision and Technique','it'=>'Precisione e Tecnica'],
            'feature3_d' => ['es'=>'Mejoramos la precisión en el lanzamiento y el control del balón.','en'=>'We improve shooting accuracy and ball control.','it'=>'Miglioriamo la precisione nel tiro e il controllo della palla.'],
            'gallery_t' => ['es'=>'Galería de Handball','en'=>'Handball Gallery','it'=>'Galleria Pallamano'],
            'contact' => ['es'=>'Contacto','en'=>'Contact','it'=>'Contatto'],
            'links' => ['es'=>'Enlaces útiles','en'=>'Useful links','it'=>'Link utili'],
            'link_items' => [
                'es' => ['Política de privacidad','Requisitos técnicos','Accesibilidad'],
                'en' => ['Privacy Policy','Technical Requirements','Accessibility'],
                'it' => ['Informativa sulla privacy','Requisiti tecnici','Accessibilità'],
            ],
        ];
        $cl = $_SESSION['lang'] ?? 'es';
    ?>
    <section class="sport-hero">
        <div class="sport-hero-bg"></div>
        <div class="sport-hero-overlay"></div>
        <div class="sport-hero-content">
            <h1 class="sport-hero-title"> <?php echo $handball['hero_t'][$cl]; ?></h1>
            <p class="sport-hero-subtitle"><?php echo $handball['hero_s'][$cl]; ?></p>
        </div>
    </section>

    <div id="breadcrumbs" class="breadcrumbs-container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                <li class="breadcrumb-item"><a href="menudeportes.php"><?php echo ['es'=>'Deportes','en'=>'Sports','it'=>'Sport'][$cl]; ?></a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $handball_titles[$cl]; ?></li>
            </ol>
        </nav>
    </div>

    <!-- Main Content -->
    <main class="sport-content">
        <div class="container">
            <!-- Sport Information -->
            <section class="sport-info">
                <div class="sport-info-grid">
                    <div class="sport-info-text">
                        <h2><?php echo $handball['info_t'][$cl]; ?></h2>
                        <p><?php echo $handball['info_p1'][$cl]; ?></p>
                        <p><?php echo $handball['info_p2'][$cl]; ?></p>
                    </div>
                    <div class="sport-info-image">
                        <img src="FOTOS/fotosDeportes/handball1.jpg" alt="Handball Scuola Italiana">
                    </div>
                </div>
            </section>

            <!-- Features Section -->
            <section class="sport-features">
                <div class="container">
                    <h2 style="text-align: center; font-size: 2.5rem; color: #0A2452; margin-bottom: 20px;"><?php echo $handball['hero_t'][$cl]; ?> - Características</h2>
                    <div class="features-grid">
                        <div class="feature-card">
                            <span class="feature-icon"></span>
                            <h3 class="feature-title"><?php echo $handball['feature1_t'][$cl]; ?></h3>
                            <p class="feature-description"><?php echo $handball['feature1_d'][$cl]; ?></p>
                        </div>
                        <div class="feature-card">
                            <span class="feature-icon"></span>
                            <h3 class="feature-title"><?php echo $handball['feature2_t'][$cl]; ?></h3>
                            <p class="feature-description"><?php echo $handball['feature2_d'][$cl]; ?></p>
                        </div>
                        <div class="feature-card">
                            <span class="feature-icon"></span>
                            <h3 class="feature-title"><?php echo $handball['feature3_t'][$cl]; ?></h3>
                            <p class="feature-description"><?php echo $handball['feature3_d'][$cl]; ?></p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Gallery Section -->
            <section class="sport-gallery">
                <h2 style="text-align: center; font-size: 2.5rem; color: #0A2452; margin-bottom: 20px;"><?php echo $handball['gallery_t'][$cl]; ?></h2>
                <div class="gallery-grid">
                    <div class="gallery-item">
                        <img src="FOTOS/fotosDeportes/handball1.jpg" alt="Handball 1">
                    </div>
                    <div class="gallery-item">
                        <img src="FOTOS/fotosDeportes/handball2.jpg" alt="Handball 2">
                    </div>
                    <div class="gallery-item">
                        <img src="FOTOS/fotosDeportes/handball1.jpg" alt="Handball 3">
                    </div>
                </div>
            </section>
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer-bottom-new">
        <div class="footer-container">
            <div class="footer-left">
                <div class="footer-logo">
                    <img src="FOTOS/fotosPrincipales/logo2.png" alt="Scuola Italiana di Montevideo" style="height: 60px;">
                </div>
                <div class="footer-subtitle">
                    <p>AMC Scuola Italiana di Montevideo</p>
                </div>
            </div>
            
            <div class="footer-center">
                <div class="footer-section">
                    <h4><?php echo $handball['contact'][$cl]; ?></h4>
                    <p>Gral. French 2380</p>
                    <p>CP 11500 - Montevideo, Uruguay</p>
                    <p>(+598) 2600 1527</p>
                    <p>info@scuolaitaliana.edu.uy</p>
                </div>
            </div>
            
            <div class="footer-right">
                <div class="footer-section">
                    <h4><?php echo $handball['links'][$cl]; ?></h4>
                    <p><?php echo $handball['link_items'][$cl][0]; ?></p>
                    <p><?php echo $handball['link_items'][$cl][1]; ?></p>
                    <p><?php echo $handball['link_items'][$cl][2]; ?></p>
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
