<!DOCTYPE html>
<?php if (session_status() === PHP_SESSION_NONE) { session_start(); } if (isset($_GET['lang']) && in_array($_GET['lang'], ['es','en','it'])) { $_SESSION['lang'] = $_GET['lang']; } ?>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php $futbol_meta=['es'=>'Fútbol - Scuola Italiana','en'=>'Football - Scuola Italiana','it'=>'Calcio - Scuola Italiana']; echo $futbol_meta[$cl]; ?></title>

    <link rel="stylesheet" href="breadcrumbs.css">
    <link rel="stylesheet" href="../css/futbol.css">
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
        $futbol = [
            'hero_t' => ['es'=>'FÚTBOL','en'=>'FOOTBALL','it'=>'CALCIO'],
            'hero_s' => ['es'=>'El deporte rey que une pasión y disciplina','en'=>'The king of sports that unites passion and discipline','it'=>'Lo sport re che unisce passione e disciplina'],
            'info_t' => ['es'=>'Sobre el Fútbol en Scuola Italiana','en'=>'About Football at Scuola Italiana','it'=>'Sul Calcio alla Scuola Italiana'],
            'info_p1' => ['es'=>'El fútbol es uno de los deportes más populares y emocionantes que practicamos en nuestra institución. Este deporte no solo desarrolla las habilidades físicas de nuestros estudiantes, sino que también fomenta valores fundamentales como el trabajo en equipo, la disciplina y el respeto.','en'=>'Football is one of the most popular and exciting sports we practice at our institution. This sport not only develops our students\' physical skills, but also fosters fundamental values such as teamwork, discipline and respect.','it'=>'Il calcio è uno degli sport più popolari ed emozionanti che pratichiamo nella nostra istituzione. Questo sport non solo sviluppa le abilità fisiche dei nostri studenti, ma promuove anche valori fondamentali come il lavoro di squadra, la disciplina e il rispetto.'],
            'info_p2' => ['es'=>'Nuestros equipos participan activamente en competencias locales y regionales, representando con orgullo los colores de la Scuola Italiana. Los entrenamientos se realizan en nuestras modernas instalaciones deportivas, donde los estudiantes pueden desarrollar su técnica y táctica bajo la supervisión de entrenadores calificados. El equipo del colegio, Palermo, compite en la Liga Universitaria en categorías formativas (desde Sub 14), representando a la institución en torneos oficiales.','en'=>'Our teams actively participate in local and regional competitions, proudly representing the colors of Scuola Italiana. Training sessions are held in our modern sports facilities, where students can develop their technique and tactics under the supervision of qualified coaches. The school team, Palermo, competes in the University League in youth divisions (from U14), representing the school in official tournaments.','it'=>'Le nostre squadre partecipano attivamente a competizioni locali e regionali, rappresentando con orgoglio i colori della Scuola Italiana. Gli allenamenti si svolgono nelle nostre moderne strutture sportive, dove gli studenti possono sviluppare la loro tecnica e tattica sotto la supervisione di allenatori qualificati. La squadra della scuola, Palermo, compete nella Liga Universitaria nelle categorie giovanili (dalla Under 14), rappresentando l’istituto in tornei ufficiali.'],
            'feature1_t' => ['es'=>'Trabajo en Equipo','en'=>'Teamwork','it'=>'Lavoro di Squadra'],
            'feature1_d' => ['es'=>'Desarrollamos la capacidad de colaborar y comunicarse efectivamente con compañeros de equipo.','en'=>'We develop the ability to collaborate and communicate effectively with teammates.','it'=>'Sviluppiamo la capacità di collaborare e comunicare efficacemente con i compagni di squadra.'],
            'feature2_t' => ['es'=>'Disciplina y Constancia','en'=>'Discipline and Consistency','it'=>'Disciplina e Costanza'],
            'feature2_d' => ['es'=>'Fomentamos la constancia en los entrenamientos y el respeto por las reglas del juego.','en'=>'We encourage consistency in training and respect for the rules of the game.','it'=>'Incoraggiamo la costanza negli allenamenti e il rispetto per le regole del gioco.'],
            'feature3_t' => ['es'=>'Desarrollo Físico','en'=>'Physical Development','it'=>'Sviluppo Fisico'],
            'feature3_d' => ['es'=>'Mejoramos la resistencia, velocidad y coordinación a través del entrenamiento regular.','en'=>'We improve endurance, speed and coordination through regular training.','it'=>'Miglioriamo resistenza, velocità e coordinazione attraverso l\'allenamento regolare.'],
            'gallery_t' => ['es'=>'Galería de Fútbol','en'=>'Football Gallery','it'=>'Galleria Calcio'],
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
            <h1 class="sport-hero-title"> <?php echo $futbol['hero_t'][$cl]; ?></h1>
            <p class="sport-hero-subtitle"><?php echo $futbol['hero_s'][$cl]; ?></p>
        </div>
    </section>

    <div id="breadcrumbs" class="breadcrumbs-container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                <li class="breadcrumb-item"><a href="menudeportes.php"><?php echo ['es'=>'Deportes','en'=>'Sports','it'=>'Sport'][$cl]; ?></a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $futbol_titles[$cl]; ?></li>
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
                        <h2><?php echo $futbol['info_t'][$cl]; ?></h2>
                        <p><?php echo $futbol['info_p1'][$cl]; ?></p>
                        <p><?php echo $futbol['info_p2'][$cl]; ?></p>
                    </div>
                    <div class="sport-info-image">
                        <img src="FOTOS/fotosDeportes/futbol2.jpg" alt="Fútbol Scuola Italiana">
                    </div>
                </div>
            </section>

            <!-- Features Section -->
            <section class="sport-features">
                <div class="container">
                    <h2 style="text-align: center; font-size: 2.5rem; color: #0A2452; margin-bottom: 20px;"><?php echo $futbol['hero_t'][$cl]; ?> - Características</h2>
                    <div class="features-grid">
                        <div class="feature-card">
                            <span class="feature-icon"></span>
                            <h3 class="feature-title"><?php echo $futbol['feature1_t'][$cl]; ?></h3>
                            <p class="feature-description"><?php echo $futbol['feature1_d'][$cl]; ?></p>
                        </div>
                        <div class="feature-card">
                            <span class="feature-icon"></span>
                            <h3 class="feature-title"><?php echo $futbol['feature2_t'][$cl]; ?></h3>
                            <p class="feature-description"><?php echo $futbol['feature2_d'][$cl]; ?></p>
                        </div>
                        <div class="feature-card">
                            <span class="feature-icon"></span>
                            <h3 class="feature-title"><?php echo $futbol['feature3_t'][$cl]; ?></h3>
                            <p class="feature-description"><?php echo $futbol['feature3_d'][$cl]; ?></p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Gallery Section -->
            <section class="sport-gallery">
                <h2 style="text-align: center; font-size: 2.5rem; color: #0A2452; margin-bottom: 20px;"><?php echo $futbol['gallery_t'][$cl]; ?></h2>
                <div class="gallery-grid">
                    <div class="gallery-item">
                        <img src="FOTOS/fotosDeportes/futbol1.jpg" alt="Fútbol 1">
                    </div>
                    <div class="gallery-item">
                        <img src="FOTOS/fotosDeportes/futbol2.jpg" alt="Fútbol 2">
                    </div>
                    <div class="gallery-item">
                        <img src="FOTOS/fotosDeportes/futbol1.jpg" alt="Fútbol 3">
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
                    <h4><?php echo $futbol['contact'][$cl]; ?></h4>
                    <p>Av. Brasil 3149, Montevideo</p>
                    <p>(+598) 2621 4822 / 2622 1422</p>
                    <p>info@scuolaitaliana.edu.uy</p>
                </div>
            </div>
            
            <div class="footer-right">
                <div class="footer-section">
                    <h4><?php echo $futbol['links'][$cl]; ?></h4>
                    <p><?php echo $futbol['link_items'][$cl][0]; ?></p>
                    <p><?php echo $futbol['link_items'][$cl][1]; ?></p>
                    <p><?php echo $futbol['link_items'][$cl][2]; ?></p>
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
