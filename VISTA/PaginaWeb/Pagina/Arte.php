<!DOCTYPE html>
<?php if (session_status() === PHP_SESSION_NONE) { session_start(); } $cl = $_SESSION['lang'] ?? 'es'; ?>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php $ar_meta=['es'=>'Arte, Ciencia y tecnología','en'=>'Art, Science and Technology','it'=>'Arte, Scienza e Tecnologia']; echo $ar_meta[$cl]; ?></title>

    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="breadcrumbs.css">
    <link rel="stylesheet" href="../css/Arte.css">
    
</head>
<body>
    <div id="original-content"> 

    <!-- Navigation -->
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

    <!-- Hero Section -->
    <?php 
        $ar = [
            'hero_t' => [
                'es' => 'Arte, Ciencia y tecnología',
                'en' => 'Art, Science and Technology',
                'it' => 'Arte, Scienza e Tecnologia',
            ],
            'hero_s' => [
                'es' => 'Descubre todo lo que hace especial a la Scuola Italiana di Montevideo',
                'en' => 'Discover what makes the Scuola Italiana di Montevideo special',
                'it' => 'Scopri cosa rende speciale la Scuola Italiana di Montevideo',
            ],
            'sect_title' => [
                'es' => 'Nuestras cualidades',
                'en' => 'Our qualities',
                'it' => 'Le nostre qualità',
            ],
            'f1_h' => ['es'=>'Arte','en'=>'Art','it'=>'Arte'],
            'f1_p' => [
                'es'=>'Fomentamos la expresión artística desde edades tempranas, integrando plástica, música y teatro en proyectos interdisciplinarios.',
                'en'=>'We foster artistic expression from early ages, integrating visual arts, music and theatre in interdisciplinary projects.',
                'it'=>'Promuoviamo l’espressione artistica fin dalla tenera età, integrando arti visive, musica e teatro in progetti interdisciplinari.',
            ],
            'f2_h' => ['es'=>'Ciencia','en'=>'Science','it'=>'Scienza'],
            'f2_p' => [
                'es'=>'Promovemos el pensamiento científico mediante experiencias de laboratorio y proyectos de investigación escolar.',
                'en'=>'We promote scientific thinking through lab experiences and school research projects.',
                'it'=>'Promuoviamo il pensiero scientifico con esperienze di laboratorio e progetti di ricerca scolastica.',
            ],
            'f3_h' => ['es'=>'Tecnología','en'=>'Technology','it'=>'Tecnologia'],
            'f3_p' => [
                'es'=>'Incorporamos herramientas digitales y robótica educativa para desarrollar competencias del siglo XXI.',
                'en'=>'We integrate digital tools and educational robotics to develop 21st‑century skills.',
                'it'=>'Integramo strumenti digitali e robotica educativa per sviluppare competenze del XXI secolo.',
            ],
            'contact' => ['es'=>'Contacto','en'=>'Contact','it'=>'Contatto'],
            'links' => ['es'=>'Enlaces útiles','en'=>'Useful links','it'=>'Link utili'],
            'link_items' => [
                'es' => ['Política de privacidad','Requisitos técnicos','Accesibilidad'],
                'en' => ['Privacy Policy','Technical Requirements','Accessibility'],
                'it' => ['Informativa sulla privacy','Requisiti tecnici','Accessibilità'],
            ],
        ];
    ?>
    <section class="hero editable-image" style="background-image: url('FOTOS/fotosPrincipales/arte.jpg'); margin-top: 0px;">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1 class="hero-title editable-text"><?php echo $ar['hero_t'][$cl]; ?></h1>
            <p class="hero-subtitle editable-text"><?php echo $ar['hero_s'][$cl]; ?></p>
        </div>
    </section>
    <div id="breadcrumbs" class="breadcrumbs-container"></div>

    <!-- Main Content -->
    <main class="main-content">
            <section class="features">
                <div class="container">
                    <h2 class="section-title editable-text"><?php echo $ar['sect_title'][$cl]; ?></h2>

                    <div class="features-grid">
                        <div class="feature-card">
                            <h3 class="editable-text"><?php echo $ar['f1_h'][$cl]; ?></h3>
                            <p class="editable-text"><?php echo $ar['f1_p'][$cl]; ?></p>

                        </div>
                        <div class="feature-card">
                            <h3 class="editable-text"><?php echo $ar['f2_h'][$cl]; ?></h3>
                            <p class="editable-text"><?php echo $ar['f2_p'][$cl]; ?></p>

                        </div>
                        <div class="feature-card">
                            <h3 class="editable-text"><?php echo $ar['f3_h'][$cl]; ?></h3>
                            <p class="editable-text"><?php echo $ar['f3_p'][$cl]; ?></p>

                        </div>
                    </div>
                </div>
            </section>
    </main>

    <!-- Footer -->
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
                    <h4><?php echo $ar['contact'][$cl]; ?></h4>

                    <p>Av. Brasil 3149, Montevideo</p>
                    <p>(+598) 2621 4822 / 2622 1422</p>
                    <p>info@scuolaitaliana.edu.uy</p>
                </div>
            </div>
            
            <div class="footer-right">
                <div class="footer-section">
                    <h4><?php echo $ar['links'][$cl]; ?></h4>
                    <p><?php echo $ar['link_items'][$cl][0]; ?></p>
                    <p><?php echo $ar['link_items'][$cl][1]; ?></p>
                    <p><?php echo $ar['link_items'][$cl][2]; ?></p>

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
                navbar.style.transform = 'translateY(-100%)';
                navbar.style.opacity = '0';
            } else {
                navbar.style.transform = 'translateY(0)';
                navbar.style.opacity = '1';
            }
            
            lastScrollTop = scrollTop;
        });
    </script>
    <div id="cms-root"></div>
    <script src="breadcrumbs.js"></script>
<script src="cms-admin.js"></script>
<script src="analytics.js"></script>
</body>
</html>