<!DOCTYPE html>
<?php if (session_status() === PHP_SESSION_NONE) { session_start(); } if (isset($_GET['lang']) && in_array($_GET['lang'], ['es','en','it'])) { $_SESSION['lang'] = $_GET['lang']; } $cl = $_SESSION['lang'] ?? 'es'; ?>
<html lang="<?php echo $cl; ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php $hockey_meta=['es'=>'Hockey - Scuola Italiana','en'=>'Hockey - Scuola Italiana','it'=>'Hockey - Scuola Italiana']; echo $hockey_meta[$cl]; ?></title>

    <link rel="stylesheet" href="breadcrumbs.css">
    <link rel="stylesheet" href="../css/hockey.css">
    <style>
        .navbar { background: rgba(10, 36, 82, 0.5) !important; }
    </style>
<link rel="icon" type="image/png" href="/Pagina/favicon.png">
<link rel="shortcut icon" href="/Pagina/favicon.ico">
</head>
<div id="cms-root"></div>
<body>
    <div id="original-content">
    <!-- Navigation -->
    <?php include 'includes/navbar.php'; ?>

    <!-- Sport Hero Section -->
    <?php 
        $hockey = [
            'hero_t' => ['es'=>'HOCKEY','en'=>'HOCKEY','it'=>'HOCKEY'],
            'hero_s' => ['es'=>'Precisión, habilidad técnica y estrategia sobre césped','en'=>'Precision, technical skill and strategy on grass','it'=>'Precisione, abilità tecnica e strategia su erba'],
            'info_t' => ['es'=>'Sobre el Hockey en Scuola Italiana','en'=>'About Hockey at Scuola Italiana','it'=>'Sull\'Hockey alla Scuola Italiana'],
            'info_p1' => ['es'=>'El hockey sobre césped es un deporte de precisión y habilidad técnica que requiere coordinación, velocidad y estrategia. En nuestra institución favorece la concentración y el trabajo en equipo.','en'=>'Field hockey is a precision and technical skill sport that requires coordination, speed and strategy. At our school it fosters concentration and teamwork.','it'=>'L\'hockey su prato è uno sport di precisione e abilità tecnica che richiede coordinazione, velocità e strategia. Nella nostra scuola favorisce concentrazione e lavoro di squadra.'],
            'info_p2' => ['es'=>'Nuestros equipos de hockey participan en competencias locales y regionales, destacándose por su técnica depurada y disciplina táctica. Los entrenamientos incluyen desarrollo de habilidades técnicas específicas, estrategia de juego y acondicionamiento físico especializado.','en'=>'Our hockey teams participate in local and regional competitions, standing out for their refined technique and tactical discipline. Training includes development of specific technical skills, game strategy and specialized physical conditioning.','it'=>'Le nostre squadre di hockey partecipano a competizioni locali e regionali, distinguendosi per la loro tecnica raffinata e disciplina tattica. L\'allenamento include lo sviluppo di abilità tecniche specifiche, strategia di gioco e condizionamento fisico specializzato.'],
            'feature1_t' => ['es'=>'Precisión y Control','en'=>'Precision and Control','it'=>'Precisione e Controllo'],
            'feature1_d' => ['es'=>'Desarrollamos la precisión en el manejo del stick y el control del balón.','en'=>'We develop precision in stick handling and ball control.','it'=>'Sviluppiamo la precisione nel maneggio del bastone e il controllo della palla.'],
            'feature2_t' => ['es'=>'Estrategia Táctica','en'=>'Tactical Strategy','it'=>'Strategia Tattica'],
            'feature2_d' => ['es'=>'Fomentamos el pensamiento estratégico y la coordinación colectiva.','en'=>'We encourage strategic thinking and collective coordination.','it'=>'Incoraggiamo il pensiero strategico e la coordinazione collettiva.'],
            'feature3_t' => ['es'=>'Velocidad y Resistencia','en'=>'Speed and Endurance','it'=>'Velocità e Resistenza'],
            'feature3_d' => ['es'=>'Mejoramos la velocidad de reacción y la resistencia física específica.','en'=>'We improve reaction speed and specific physical endurance.','it'=>'Miglioriamo la velocità di reazione e la resistenza fisica specifica.'],
            'gallery_t' => ['es'=>'Galería de Hockey','en'=>'Hockey Gallery','it'=>'Galleria Hockey'],
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
            <h1 class="sport-hero-title"> <?php echo $hockey['hero_t'][$cl]; ?></h1>
            <p class="sport-hero-subtitle"><?php echo $hockey['hero_s'][$cl]; ?></p>
        </div>
    </section>

    <div id="breadcrumbs" class="breadcrumbs-container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                <li class="breadcrumb-item"><a href="menudeportes.php"><?php echo ['es'=>'Deportes','en'=>'Sports','it'=>'Sport'][$cl]; ?></a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $hockey['hero_t'][$cl]; ?></li>
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
                        <h2><?php echo $hockey['info_t'][$cl]; ?></h2>
                        <p><?php echo $hockey['info_p1'][$cl]; ?></p>
                        <p><?php echo $hockey['info_p2'][$cl]; ?></p>
                    </div>
                    <div class="sport-info-image">
                        <img src="FOTOS/fotosDeportes/futbol1.jpg" alt="Hockey Scuola Italiana">
                    </div>
                </div>
            </section>

            <!-- Features Section -->
            <section class="sport-features">
                <div class="container">
                    <h2 style="text-align: center; font-size: 2.5rem; color: #0A2452; margin-bottom: 20px;"><?php echo $hockey['hero_t'][$cl]; ?> - Características</h2>
                    <div class="features-grid">
                        <div class="feature-card">
                            <span class="feature-icon"></span>
                            <h3 class="feature-title"><?php echo $hockey['feature1_t'][$cl]; ?></h3>
                            <p class="feature-description"><?php echo $hockey['feature1_d'][$cl]; ?></p>
                        </div>
                        <div class="feature-card">
                            <span class="feature-icon"></span>
                            <h3 class="feature-title"><?php echo $hockey['feature2_t'][$cl]; ?></h3>
                            <p class="feature-description"><?php echo $hockey['feature2_d'][$cl]; ?></p>
                        </div>
                        <div class="feature-card">
                            <span class="feature-icon"></span>
                            <h3 class="feature-title"><?php echo $hockey['feature3_t'][$cl]; ?></h3>
                            <p class="feature-description"><?php echo $hockey['feature3_d'][$cl]; ?></p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Gallery Section -->
            <section class="sport-gallery">
                <h2 style="text-align: center; font-size: 2.5rem; color: #0A2452; margin-bottom: 20px;"><?php echo $hockey['gallery_t'][$cl]; ?></h2>
                <div class="gallery-grid">
                    <div class="gallery-item">
                        <img src="FOTOS/fotosDeportes/futbol1.jpg" alt="Hockey 1">
                    </div>
                    <div class="gallery-item">
                        <img src="FOTOS/fotosDeportes/futbol2.jpg" alt="Hockey 2">
                    </div>
                    <div class="gallery-item">
                        <img src="FOTOS/fotosDeportes/volley1.jpg" alt="Hockey 3">
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
                    <img src="FOTOS/fotosPrincipales/logotipo.png" alt="Scuola Italiana di Montevideo" style="height: 60px;">
                </div>
                <div class="footer-subtitle">
                    <p>AMC Scuola Italiana di Montevideo</p>
                </div>
            </div>
            
            <div class="footer-center">
                <div class="footer-section">
                    <h4><?php echo $hockey['contact'][$cl]; ?></h4>
                    <p>Gral. French 2380</p>
                    <p>CP 11500 - Montevideo, Uruguay</p>
                    <p>(+598) 2600 1527</p>
                    <p>info@scuolaitaliana.edu.uy</p>
                </div>
            </div>
            
            <div class="footer-right">
                <div class="footer-section">
                    <h4><?php echo $hockey['links'][$cl]; ?></h4>
                    <p><?php echo $hockey['link_items'][$cl][0]; ?></p>
                    <p><?php echo $hockey['link_items'][$cl][1]; ?></p>
                    <p><?php echo $hockey['link_items'][$cl][2]; ?></p>
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
