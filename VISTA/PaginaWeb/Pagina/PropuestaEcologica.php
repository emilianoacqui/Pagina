<!DOCTYPE html>
<?php if (session_status() === PHP_SESSION_NONE) { session_start(); } $cl = $_SESSION['lang'] ?? 'es'; ?>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php $pe_meta=['es'=>'Propuesta Ecológica - Scuola Italiana','en'=>'Ecological Initiative - Scuola Italiana','it'=>'Proposta Ecologica - Scuola Italiana']; echo $pe_meta[$cl]; ?></title>

    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="breadcrumbs.css">
    <link rel="stylesheet" href="../css/PropuestaEcologica.css">
    
</head>
<div id="cms-root"></div>
<body>

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
        $pe = [
            'hero_t' => ['es'=>'Nuestra Propuesta Ecológica','en'=>'Our Ecological Initiative','it'=>'La nostra Proposta Ecologica'],
            'hero_s' => ['es'=>'Descubre todo lo que hace especial a la Scuola Italiana di Montevideo','en'=>'Discover what makes the Scuola Italiana di Montevideo special','it'=>'Scopri cosa rende speciale la Scuola Italiana di Montevideo'],
            'hist_h' => ['es'=>'Nuestra Historia y Tradición','en'=>'Our History and Tradition','it'=>'La nostra Storia e Tradizione'],
            'hist_p1' => ['es'=>'La Scuola Italiana di Montevideo tiene una rica tradición educativa con décadas de excelencia académica. Pioneros en educación bilingüe y multicultural en Uruguay.','en'=>'The Scuola Italiana di Montevideo has a rich educational tradition with decades of academic excellence. Pioneers in bilingual and multicultural education in Uruguay.','it'=>'La Scuola Italiana di Montevideo ha una ricca tradizione educativa con decenni di eccellenza accademica. Pionieri dell’educazione bilingue e multiculturale in Uruguay.'],
            'hist_p2' => ['es'=>'Formamos estudiantes con sólida preparación académica, valores humanos y compromiso comunitario, manteniendo vivos los lazos con la cultura italiana.','en'=>'We educate students with strong academics, human values and community engagement, keeping ties with Italian culture alive.','it'=>'Formiamo studenti con solida preparazione accademica, valori umani e impegno nella comunità, mantenendo vivi i legami con la cultura italiana.'],
            'feat_h' => ['es'=>'Lo que nos distingue','en'=>'What sets us apart','it'=>'Cosa ci distingue'],
            'f1_h' => ['es'=>'Educación Integral','en'=>'Integral Education','it'=>'Educazione Integrale'],
            'f1_p' => ['es'=>'Desarrollamos dimensiones intelectual, física, emocional y social.','en'=>'We develop intellectual, physical, emotional and social dimensions.','it'=>'Sviluppiamo le dimensioni intellettuale, fisica, emotiva e sociale.'],
            'f2_h' => ['es'=>'Tradición Cultural','en'=>'Cultural Tradition','it'=>'Tradizione Culturale'],
            'f2_p' => ['es'=>'Honramos la herencia italiana y la diversidad cultural en un ambiente de respeto.','en'=>'We honor Italian heritage and cultural diversity in a respectful environment.','it'=>'Onoriamo l’eredità italiana e la diversità culturale in un ambiente rispettoso.'],
            'f3_h' => ['es'=>'Excelencia Académica','en'=>'Academic Excellence','it'=>'Eccellenza Accademica'],
            'f3_p' => ['es'=>'Programas de calidad enfocados en pensamiento crítico e innovación.','en'=>'High‑quality programs focused on critical thinking and innovation.','it'=>'Programmi di qualità focalizzati sul pensiero critico e sull’innovazione.'],
            'campus_h' => ['es'=>'Nuestro Campus y Facilidades','en'=>'Our Campus and Facilities','it'=>'Il nostro Campus e le Strutture'],
            'campus_p1' => ['es'=>'Instalaciones modernas con aulas tecnológicas, laboratorios, biblioteca y espacios deportivos.','en'=>'Modern facilities with tech‑enabled classrooms, labs, library and sports areas.','it'=>'Strutture moderne con aule tecnologiche, laboratori, biblioteca e aree sportive.'],
            'campus_p2' => ['es'=>'13 hectáreas de espacios verdes que fomentan el aprendizaje al aire libre y el contacto con la naturaleza.','en'=>'13 hectares of green spaces that foster outdoor learning and contact with nature.','it'=>'13 ettari di spazi verdi che favoriscono l’apprendimento all’aperto e il contatto con la natura.'],
            'contact' => ['es'=>'Contacto','en'=>'Contact','it'=>'Contatto'],
            'links' => ['es'=>'Enlaces útiles','en'=>'Useful links','it'=>'Link utili'],
            'link_items' => [
                'es' => ['Política de privacidad','Requisitos técnicos','Accesibilidad'],
                'en' => ['Privacy Policy','Technical Requirements','Accessibility'],
                'it' => ['Informativa sulla privacy','Requisiti tecnici','Accessibilità'],
            ],
        ];
    ?>
    <section class="hero editable-image" style="background-image: url('FOTOS/fotosPrincipales/PropuestaEcologica1.jpg'); margin-top: 0px;">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1 class="hero-title editable-text"><?php echo $pe['hero_t'][$cl]; ?></h1>
            <p class="hero-subtitle editable-text"><?php echo $pe['hero_s'][$cl]; ?></p>
        </div>
    </section>
    <div id="breadcrumbs" class="breadcrumbs-container"></div>

    <!-- Main Content -->
    <main class="main-content">
        <div class="container">
            <!-- Text Introduction -->
            <section class="text-intro">
                <div class="intro-grid">
                    <div class="intro-text">
                        <h2 class="editable-text"><?php echo $pe['hist_h'][$cl]; ?></h2>
                        <p class="intro-description editable-text"><?php echo $pe['hist_p1'][$cl]; ?></p>
                        <p class="intro-description editable-text"><?php echo $pe['hist_p2'][$cl]; ?></p>
                    </div>

                    <div class="intro-visual">
                        <div class="visual-card">
                            <img class="editable-image" src="FOTOS/fotosPrincipales/PropuestaEcologica2.jpg" alt="Estudiantes en el aula">
                        </div>
                    </div>
                </div>
            </section>

            <!-- Features Section -->
            <section class="features">
                <div class="container">
                    <h2 class="section-title editable-text"><?php echo $pe['feat_h'][$cl]; ?></h2>

                    <div class="features-grid">
                        <div class="feature-card">
                            <h3 class="editable-text"><?php echo $pe['f1_h'][$cl]; ?></h3>
                            <p class="editable-text"><?php echo $pe['f1_p'][$cl]; ?></p>
                        </div>
                        <div class="feature-card">
                            <h3 class="editable-text"><?php echo $pe['f2_h'][$cl]; ?></h3>
                            <p class="editable-text"><?php echo $pe['f2_p'][$cl]; ?></p>
                        </div>
                        <div class="feature-card">
                            <h3 class="editable-text"><?php echo $pe['f3_h'][$cl]; ?></h3>
                            <p class="editable-text"><?php echo $pe['f3_p'][$cl]; ?></p>
                        </div>

                    </div>
                </div>
            </section>

            <!-- Content Section -->
            <section class="content-section">
                <div class="container">
                    <div class="content-grid">
                        <div class="content-text">
                            <h2 class="editable-text"><?php echo $pe['campus_h'][$cl]; ?></h2>
                            <p class="editable-text"><?php echo $pe['campus_p1'][$cl]; ?></p>
                            <p class="editable-text"><?php echo $pe['campus_p2'][$cl]; ?></p>

                        </div>
                        <div class="content-image">
                            <img class="editable-image" src="FOTOS/fotosPrincipales/PropuestaEcologica3.jpg.png" alt="Campus de la Scuola Italiana">
                        </div>
                    </div>
                </div>
            </section>
        </div>
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
                    <h4><?php echo $pe['contact'][$cl]; ?></h4>

                    <p>Av. Brasil 3149, Montevideo</p>
                    <p>(+598) 2621 4822 / 2622 1422</p>
                    <p>info@scuolaitaliana.edu.uy</p>
                </div>
            </div>
            
            <div class="footer-right">
                <div class="footer-section">
                    <h4><?php echo $pe['links'][$cl]; ?></h4>
                    <p><?php echo $pe['link_items'][$cl][0]; ?></p>
                    <p><?php echo $pe['link_items'][$cl][1]; ?></p>
                    <p><?php echo $pe['link_items'][$cl][2]; ?></p>

                </div>
            </div>
        </div>
        
        <div class="footer-info-bar">
            <p>Desarrollado por el equipo SGE | Proyecto de apoyo 2002 - EE Informática</p>
        </div>
    </footer>

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
    <script src="breadcrumbs.js"></script>
<script src="cms-admin.js"></script>
<script src="analytics.js"></script>
</body>
</html>