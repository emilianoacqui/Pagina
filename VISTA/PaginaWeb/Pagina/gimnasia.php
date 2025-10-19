<!DOCTYPE html>
<?php if (session_status() === PHP_SESSION_NONE) { session_start(); } if (isset($_GET['lang']) && in_array($_GET['lang'], ['es','en','it'])) { $_SESSION['lang'] = $_GET['lang']; } $cl = $_SESSION['lang'] ?? 'es'; ?>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php $gimnasia_meta=['es'=>'Gimnasia Artística - Scuola Italiana','en'=>'Artistic Gymnastics - Scuola Italiana','it'=>'Ginnastica Artistica - Scuola Italiana']; echo $gimnasia_meta[$cl]; ?></title>

    <link rel="stylesheet" href="breadcrumbs.css">
    <link rel="stylesheet" href="../css/gimnasia.css">
</head>
<div id="cms-root"></div>
<body>
    <div id="original-content">
    <!-- Navigation -->
    <nav class="navbar">
        <div class="nav-container">
            <div class="nav-logo">
                <a href="index.php">
                    <img src="FOTOS/fotosPrincipales/logotipo.png" alt="Scuola Italiana">
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
                $gimnasia_titles = [
                    'es' => 'Gimnasia Artística',
                    'en' => 'Artistic Gymnastics', 
                    'it' => 'Ginnastica Artistica'
                ];
            ?>
            <h1 class="sport-hero-title"><?php echo $gimnasia_titles[$cl]; ?></h1>
            <p class="sport-hero-subtitle">
                <?php 
                    $gimnasia_subtitles = [
                        'es' => 'Expresión corporal, flexibilidad y elegancia en movimiento',
                        'en' => 'Body expression, flexibility and elegance in movement',
                        'it' => 'Espressione corporea, flessibilità ed eleganza nel movimento'
                    ];
                    echo $gimnasia_subtitles[$cl]; 
                ?>
            </p>
        </div>
    </section>

    <div id="breadcrumbs" class="breadcrumbs-container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                <li class="breadcrumb-item"><a href="menudeportes.php"><?php echo ['es'=>'Deportes','en'=>'Sports','it'=>'Sport'][$cl]; ?></a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $gimnasia_titles[$cl]; ?></li>
            </ol>
        </nav>
    </div>

    <!-- Main Content -->
    <main class="sport-content">
        <div class="container">
            <!-- Sport Information -->
            <div class="sport-info-grid">
                <div class="sport-info-text">
                    <h2><?php echo $gimnasia_titles[$cl]; ?></h2>
                    <p>
                        <?php 
                            $gimnasia_descriptions = [
                                'es' => 'La gimnasia artística combina expresión corporal, flexibilidad y elegancia en movimiento. En nuestra institución fortalece la coordinación, la disciplina y el control postural.',
                                'en' => 'Artistic gymnastics combines body expression, flexibility and elegance in movement. At our school it strengthens coordination, discipline and postural control.',
                                'it' => 'La ginnastica artistica combina espressione corporea, flessibilità ed eleganza nel movimento. Nella nostra scuola rafforza coordinazione, disciplina e controllo posturale.'
                            ];
                            echo $gimnasia_descriptions[$cl]; 
                        ?>
                    </p>
                    <p>
                        <?php 
                            $gimnasia_descriptions2 = [
                                'es' => 'Nuestros equipos de gimnasia participan en competencias escolares y regionales, destacándose por su técnica depurada y elegancia en los movimientos.',
                                'en' => 'Our gymnastics teams participate in school and regional competitions, standing out for their refined technique and elegance in movements.',
                                'it' => 'Le nostre squadre di ginnastica partecipano a competizioni scolastiche e regionali, distinguendosi per la loro tecnica raffinata ed eleganza nei movimenti.'
                            ];
                            echo $gimnasia_descriptions2[$cl]; 
                        ?>
                    </p>
                </div>
                <div class="sport-info-image">
                    <img src="FOTOS/fotosDeportes/gimnacia.jpg" alt="<?php echo $gimnasia_titles[$cl]; ?>">
                </div>
            </div>

            <!-- Features Section -->
            <section class="sport-features">
                <div class="container">
                    <h2 style="text-align: center; font-size: 2.5rem; color: #0A2452; margin-bottom: 60px;">
                        <?php 
                            $features_titles = [
                                'es' => 'Características de la Gimnasia Artística',
                                'en' => 'Artistic Gymnastics Features',
                                'it' => 'Caratteristiche della Ginnastica Artistica'
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
                                        'es' => 'Flexibilidad',
                                        'en' => 'Flexibility',
                                        'it' => 'Flessibilità'
                                    ];
                                    echo $feature1_titles[$cl]; 
                                ?>
                            </h3>
                            <p class="feature-description">
                                <?php 
                                    $feature1_descriptions = [
                                        'es' => 'Desarrolla la elasticidad muscular y la amplitud de movimiento.',
                                        'en' => 'Develops muscle elasticity and range of motion.',
                                        'it' => 'Sviluppa l\'elasticità muscolare e l\'ampiezza del movimento.'
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
                                        'es' => 'Equilibrio y Control',
                                        'en' => 'Balance and Control',
                                        'it' => 'Equilibrio e Controllo'
                                    ];
                                    echo $feature2_titles[$cl]; 
                                ?>
                            </h3>
                            <p class="feature-description">
                                <?php 
                                    $feature2_descriptions = [
                                        'es' => 'Mejora la coordinación y el control corporal.',
                                        'en' => 'Improves coordination and body control.',
                                        'it' => 'Migliora la coordinazione e il controllo del corpo.'
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
                                        'es' => 'Expresión Artística',
                                        'en' => 'Artistic Expression',
                                        'it' => 'Espressione Artistica'
                                    ];
                                    echo $feature3_titles[$cl]; 
                                ?>
                            </h3>
                            <p class="feature-description">
                                <?php 
                                    $feature3_descriptions = [
                                        'es' => 'Fomenta la creatividad y la expresión a través del movimiento.',
                                        'en' => 'Fosters creativity and expression through movement.',
                                        'it' => 'Favorisce la creatività e l\'espressione attraverso il movimento.'
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
                                'es' => 'Galería de Gimnasia Artística',
                                'en' => 'Artistic Gymnastics Gallery',
                                'it' => 'Galleria Ginnastica Artistica'
                            ];
                            echo $gallery_titles[$cl]; 
                        ?>
                    </h2>
                    <div class="gallery-grid">
                        <div class="gallery-item">
                            <img src="FOTOS/fotosDeportes/gimnacia.jpg" alt="<?php echo $gimnasia_titles[$cl]; ?>">
                        </div>
                        <div class="gallery-item">
                            <img src="FOTOS/fotosDeportes/gimnacia2.jpg" alt="<?php echo $gimnasia_titles[$cl]; ?>">
                        </div>
                        <div class="gallery-item">
                            <img src="FOTOS/fotosDeportes/gimnacia3.jpg" alt="<?php echo $gimnasia_titles[$cl]; ?>">
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
                    <img src="FOTOS/fotosPrincipales/logotipo.png" alt="Scuola Italiana di Montevideo" style="height: 60px;">
                </div>
                <div class="footer-subtitle">
                    <p>Scuola Italiana di Montevideo</p>
                </div>
            </div>
            
            <div class="footer-center">
                <div class="footer-section">
                    <?php $footer_contact = ['es' => 'Contacto','en' => 'Contact','it' => 'Contatto']; ?>
                    <h4><?php echo $footer_contact[$cl]; ?></h4>
                    <p>Av. Brasil 3149, Montevideo</p>
                    <p>(+598) 2621 4822 / 2622 1422</p>
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
