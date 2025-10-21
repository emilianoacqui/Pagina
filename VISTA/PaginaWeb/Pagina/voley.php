<!DOCTYPE html>
<?php if (session_status() === PHP_SESSION_NONE) { session_start(); } if (isset($_GET['lang']) && in_array($_GET['lang'], ['es','en','it'])) { $_SESSION['lang'] = $_GET['lang']; } $cl = $_SESSION['lang'] ?? 'es'; ?>
<html lang="<?php echo $cl; ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php $voley_meta=['es'=>'Vóley - Scuola Italiana','en'=>'Volleyball - Scuola Italiana','it'=>'Pallavolo - Scuola Italiana']; echo $voley_meta[$cl]; ?></title>

    <link rel="stylesheet" href="breadcrumbs.css">
    <link rel="stylesheet" href="../css/voley.css">
    <link rel="icon" type="image/png" href="/Pagina/VISTA/PaginaWeb/Pagina/FOTOS/fotosPrincipales/logotipo.png">
    <link rel="apple-touch-icon" href="/Pagina/VISTA/PaginaWeb/Pagina/FOTOS/fotosPrincipales/logotipo.png">
    <style>
        .navbar { background: rgba(10, 36, 82, 0.5) !important; }
    </style>
</head>
<div id="cms-root"></div>
<body>
    <div id="original-content">
    <!-- Navigation -->
    <nav class="navbar">
        <div class="nav-container">
            <div class="nav-logo">
                <a href="index.php">
                    <img src="FOTOS/fotosPrincipales/logo2.png" alt="Scuola Italiana">
                </a>
            </div>
            <div class="nav-menu-button">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </nav>

    <!-- Sport Hero Section -->
    <section class="sport-hero">
        <div class="sport-hero-bg"></div>
        <div class="sport-hero-overlay"></div>
        <div class="sport-hero-content">
            <?php 
                $voley_titles = [
                    'es' => 'Vóley',
                    'en' => 'Volleyball', 
                    'it' => 'Pallavolo'
                ];
            ?>
            <h1 class="sport-hero-title"><?php echo $voley_titles[$cl]; ?></h1>
            <p class="sport-hero-subtitle">
                <?php 
                    $voley_subtitles = [
                        'es' => 'Deporte de equipo que combina fuerza, agilidad y coordinación',
                        'en' => 'Team sport that combines strength, agility and coordination',
                        'it' => 'Sport di squadra che combina forza, agilità e coordinazione'
                    ];
                    echo $voley_subtitles[$cl]; 
                ?>
            </p>
        </div>
    </section>

    <div id="breadcrumbs" class="breadcrumbs-container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                <li class="breadcrumb-item"><a href="menudeportes.php"><?php echo ['es'=>'Deportes','en'=>'Sports','it'=>'Sport'][$cl]; ?></a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $voley_titles[$cl]; ?></li>
            </ol>
        </nav>
    </div>

    <!-- Main Content -->
    <main class="sport-content">
        <div class="container">
            <!-- Sport Information -->
            <div class="sport-info-grid">
                <div class="sport-info-text">
                    <h2><?php echo $voley_titles[$cl]; ?></h2>
                    <p>
                        <?php 
                            $voley_descriptions = [
                                'es' => 'El voleibol es un deporte que combina fuerza, agilidad y trabajo en equipo. En nuestra institución favorece la coordinación y la comunicación entre jugadores.',
                                'en' => 'Volleyball is a sport that combines strength, agility and teamwork. At our school it fosters coordination and communication between players.',
                                'it' => 'La pallavolo è uno sport che combina forza, agilità e lavoro di squadra. Nella nostra scuola favorisce coordinazione e comunicazione tra i giocatori.'
                            ];
                            echo $voley_descriptions[$cl]; 
                        ?>
                    </p>
                    <p>
                        <?php 
                            $voley_descriptions2 = [
                                'es' => 'Nuestros equipos de voleibol compiten a nivel escolar y regional, con énfasis en recepción, armado y definición en equipo.',
                                'en' => 'Our volleyball teams compete at school and regional level, with emphasis on reception, setting and team finishing.',
                                'it' => 'Le nostre squadre di pallavolo competono a livello scolastico e regionale, con enfasi su ricezione, alzata e finalizzazione di squadra.'
                            ];
                            echo $voley_descriptions2[$cl]; 
                        ?>
                    </p>
                </div>
                <div class="sport-info-image">
                    <img src="FOTOS/fotosDeportes/volley1.jpg" alt="<?php echo $voley_titles[$cl]; ?>">
                </div>
            </div>

            <!-- Features Section -->
            <section class="sport-features">
                <div class="container">
                    <h2 style="text-align: center; font-size: 2.5rem; color: #0A2452; margin-bottom: 60px;">
                        <?php 
                            $features_titles = [
                                'es' => 'Características del Vóley',
                                'en' => 'Volleyball Features',
                                'it' => 'Caratteristiche della Pallavolo'
                            ];
                            echo $features_titles[$cl]; 
                        ?>
                    </h2>
                    <div class="features-grid">
                        <div class="feature-card">
                            <span class="feature-icon"></span>
                            <h3 class="feature-title">
                                <?php 
                                    $feature1_titles = [
                                        'es' => 'Trabajo en Equipo',
                                        'en' => 'Teamwork',
                                        'it' => 'Lavoro di Squadra'
                                    ];
                                    echo $feature1_titles[$cl]; 
                                ?>
                            </h3>
                            <p class="feature-description">
                                <?php 
                                    $feature1_descriptions = [
                                        'es' => 'Desarrolla habilidades de comunicación y coordinación entre jugadores.',
                                        'en' => 'Develops communication and coordination skills between players.',
                                        'it' => 'Sviluppa abilità di comunicazione e coordinazione tra i giocatori.'
                                    ];
                                    echo $feature1_descriptions[$cl]; 
                                ?>
                            </p>
                        </div>
                        <div class="feature-card">
                            <span class="feature-icon"></span>
                            <h3 class="feature-title">
                                <?php 
                                    $feature2_titles = [
                                        'es' => 'Velocidad y Agilidad',
                                        'en' => 'Speed and Agility',
                                        'it' => 'Velocità e Agilità'
                                    ];
                                    echo $feature2_titles[$cl]; 
                                ?>
                            </h3>
                            <p class="feature-description">
                                <?php 
                                    $feature2_descriptions = [
                                        'es' => 'Mejora los reflejos y la capacidad de reacción rápida.',
                                        'en' => 'Improves reflexes and quick reaction ability.',
                                        'it' => 'Migliora i riflessi e la capacità di reazione rapida.'
                                    ];
                                    echo $feature2_descriptions[$cl]; 
                                ?>
                            </p>
                        </div>
                        <div class="feature-card">
                            <span class="feature-icon"></span>
                            <h3 class="feature-title">
                                <?php 
                                    $feature3_titles = [
                                        'es' => 'Fuerza Física',
                                        'en' => 'Physical Strength',
                                        'it' => 'Forza Fisica'
                                    ];
                                    echo $feature3_titles[$cl]; 
                                ?>
                            </h3>
                            <p class="feature-description">
                                <?php 
                                    $feature3_descriptions = [
                                        'es' => 'Fortalece la musculatura y mejora la resistencia física.',
                                        'en' => 'Strengthens muscles and improves physical endurance.',
                                        'it' => 'Rafforza la muscolatura e migliora la resistenza fisica.'
                                    ];
                                    echo $feature3_descriptions[$cl]; 
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Gallery Section -->
            <section class="sport-gallery">
                <div class="container">
                    <h2 style="text-align: center; font-size: 2.5rem; color: #0A2452; margin-bottom: 60px;">
                        <?php 
                            $gallery_titles = [
                                'es' => 'Galería de Vóley',
                                'en' => 'Volleyball Gallery',
                                'it' => 'Galleria Pallavolo'
                            ];
                            echo $gallery_titles[$cl]; 
                        ?>
                    </h2>
                    <div class="gallery-grid">
                        <div class="gallery-item">
                            <img src="FOTOS/fotosDeportes/volley1.jpg" alt="<?php echo $voley_titles[$cl]; ?>">
                        </div>
                        <div class="gallery-item">
                            <img src="FOTOS/fotosDeportes/volley2.jpg" alt="<?php echo $voley_titles[$cl]; ?>">
                        </div>
                        <div class="gallery-item">
                            <img src="FOTOS/fotosDeportes/volley3.jpg" alt="<?php echo $voley_titles[$cl]; ?>">
                        </div>
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
                    <p>Scuola Italiana di Montevideo</p>
                </div>
            </div>
            
            <div class="footer-center">
                <div class="footer-section">
                    <?php $footer_contact = ['es' => 'Contacto','en' => 'Contact','it' => 'Contatto']; ?>
                    <h4><?php echo $footer_contact[$cl]; ?></h4>
                    <p>Gral. French 2380</p>
                    <p>CP 11500 - Montevideo, Uruguay</p>
                    <p>(+598) 2600 1527</p>
                    <p>info@scuolaitaliana.edu.uy</p>
                </div>
            </div>
            
            <div class="footer-right">
                <div class="footer-section">
                    <?php 
                        $footer_links_title = ['es' => 'Enlaces útiles','en' => 'Useful links','it' => 'Link utili'];
                        $footer_links = [
                            'es' => ['Política de privacidad','Requisitos técnicos','Accesibilidad'],
                            'en' => ['Privacy Policy','Technical Requirements','Accessibility'],
                            'it' => ['Informativa sulla privacy','Requisiti tecnici','Accessibilità'],
                        ];
                    ?>
                    <h4><?php echo $footer_links_title[$cl]; ?></h4>
                    <p><?php echo $footer_links[$cl][0]; ?></p>
                    <p><?php echo $footer_links[$cl][1]; ?></p>
                    <p><?php echo $footer_links[$cl][2]; ?></p>
                </div>
            </div>
        </div>
        <div class="footer-info-bar">
            <p>Desarrollado por el equipo SGE | Proyecto de apoyo 2002 - EE Informática</p>
        </div>
    </footer>
    </div>
    
    <script>
        let lastScrollTop = 0;

        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            
            if (scrollTop > lastScrollTop && scrollTop > 100) {
                // Scrolling down y ya bajó más de 100px
                navbar.style.transform = 'translateY(-100%)';
                navbar.style.opacity = '0';
            } else {
                // Scrolling up o está en el top
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
