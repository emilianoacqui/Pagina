<!DOCTYPE html>
<?php if (session_status() === PHP_SESSION_NONE) { session_start(); } if (isset($_GET['lang']) && in_array($_GET['lang'], ['es','en','it'])) { $_SESSION['lang'] = $_GET['lang']; } $cl = $_SESSION['lang'] ?? 'es'; ?>
<html lang="<?php echo $cl; ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php $atletismo_meta=['es'=>'Atletismo - Scuola Italiana','en'=>'Athletics - Scuola Italiana','it'=>'Atletica - Scuola Italiana']; echo $atletismo_meta[$cl]; ?></title>

    <link rel="stylesheet" href="breadcrumbs.css">
    <link rel="stylesheet" href="../css/atletismo.css">
    <link rel="icon" type="image/png" href="/Pagina/VISTA/PaginaWeb/Pagina/FOTOS/fotosPrincipales/logotipo.png">
    <link rel="shortcut icon" href="/Pagina/favicon.ico">
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
                $atletismo_titles = [
                    'es' => 'Atletismo',
                    'en' => 'Athletics', 
                    'it' => 'Atletica'
                ];
            ?>
            <h1 class="sport-hero-title"><?php echo $atletismo_titles[$cl]; ?></h1>
            <p class="sport-hero-subtitle">
                <?php 
                    $atletismo_subtitles = [
                        'es' => 'Deporte base que desarrolla velocidad, resistencia y fuerza',
                        'en' => 'Base sport that develops speed, endurance and strength',
                        'it' => 'Sport di base che sviluppa velocità, resistenza e forza'
                    ];
                    echo $atletismo_subtitles[$cl]; 
                ?>
            </p>
        </div>
    </section>

    <div id="breadcrumbs" class="breadcrumbs-container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                <li class="breadcrumb-item"><a href="menudeportes.php"><?php echo ['es'=>'Deportes','en'=>'Sports','it'=>'Sport'][$cl]; ?></a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $atletismo_titles[$cl]; ?></li>
            </ol>
        </nav>
    </div>

    <!-- Main Content -->
    <main class="sport-content">
        <div class="container">
            <!-- Sport Information -->
            <div class="sport-info-grid">
                <div class="sport-info-text">
                    <h2><?php echo $atletismo_titles[$cl]; ?></h2>
                    <p>
                        <?php 
                            $atletismo_descriptions = [
                                'es' => 'El atletismo es un deporte base que desarrolla velocidad, resistencia y fuerza. En nuestra institución favorece la disciplina, la constancia y el esfuerzo personal.',
                                'en' => 'Athletics is a base sport that develops speed, endurance and strength. At our school it fosters discipline, consistency and personal effort.',
                                'it' => 'L\'atletica è uno sport di base che sviluppa velocità, resistenza e forza. Nella nostra scuola favorisce disciplina, costanza e impegno personale.'
                            ];
                            echo $atletismo_descriptions[$cl]; 
                        ?>
                    </p>
                    <p>
                        <?php 
                            $atletismo_descriptions2 = [
                                'es' => 'Nuestros equipos compiten a nivel escolar y regional, con preparación en velocidad, mediofondo, saltos y lanzamientos.',
                                'en' => 'Our teams compete at school and regional level, training across sprints, middle distance, jumps and throws.',
                                'it' => 'Le nostre squadre competono a livello scolastico e regionale, con preparazione su velocità, mezzofondo, salti e lanci.'
                            ];
                            echo $atletismo_descriptions2[$cl]; 
                        ?>
                    </p>
                </div>
                <div class="sport-info-image">
                    <img src="FOTOS/fotosDeportes/atletismo1.jpg" alt="<?php echo $atletismo_titles[$cl]; ?>">
                </div>
            </div>

            <!-- Features Section -->
            <section class="sport-features">
                <div class="container">
                    <h2 style="text-align: center; font-size: 2.5rem; color: #0A2452; margin-bottom: 60px;">
                        <?php 
                            $features_titles = [
                                'es' => 'Características del Atletismo',
                                'en' => 'Athletics Features',
                                'it' => 'Caratteristiche dell\'Atletica'
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
                                        'es' => 'Velocidad',
                                        'en' => 'Speed',
                                        'it' => 'Velocità'
                                    ];
                                    echo $feature1_titles[$cl]; 
                                ?>
                            </h3>
                            <p class="feature-description">
                                <?php 
                                    $feature1_descriptions = [
                                        'es' => 'Desarrolla la rapidez y los reflejos en diferentes disciplinas.',
                                        'en' => 'Develops quickness and reflexes in different disciplines.',
                                        'it' => 'Sviluppa rapidità e riflessi in diverse discipline.'
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
                                        'es' => 'Resistencia',
                                        'en' => 'Endurance',
                                        'it' => 'Resistenza'
                                    ];
                                    echo $feature2_titles[$cl]; 
                                ?>
                            </h3>
                            <p class="feature-description">
                                <?php 
                                    $feature2_descriptions = [
                                        'es' => 'Mejora la capacidad cardiovascular y la resistencia física.',
                                        'en' => 'Improves cardiovascular capacity and physical endurance.',
                                        'it' => 'Migliora la capacità cardiovascolare e la resistenza fisica.'
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
                                        'es' => 'Precisión',
                                        'en' => 'Precision',
                                        'it' => 'Precisione'
                                    ];
                                    echo $feature3_titles[$cl]; 
                                ?>
                            </h3>
                            <p class="feature-description">
                                <?php 
                                    $feature3_descriptions = [
                                        'es' => 'Desarrolla la concentración y la técnica en cada movimiento.',
                                        'en' => 'Develops concentration and technique in every movement.',
                                        'it' => 'Sviluppa concentrazione e tecnica in ogni movimento.'
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
                                'es' => 'Galería de Atletismo',
                                'en' => 'Athletics Gallery',
                                'it' => 'Galleria Atletica'
                            ];
                            echo $gallery_titles[$cl]; 
                        ?>
                    </h2>
                    <div class="gallery-grid">
                        <div class="gallery-item">
                            <img src="FOTOS/fotosDeportes/atletismo1.jpg" alt="<?php echo $atletismo_titles[$cl]; ?>">
                        </div>
                        <div class="gallery-item">
                            <img src="FOTOS/fotosDeportes/atletismo2.jpg" alt="<?php echo $atletismo_titles[$cl]; ?>">
                        </div>
                        <div class="gallery-item">
                            <img src="FOTOS/fotosDeportes/atletismo3.jpg" alt="<?php echo $atletismo_titles[$cl]; ?>">
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
