<!DOCTYPE html>
<?php if (session_status() === PHP_SESSION_NONE) { session_start(); } if (isset($_GET['lang']) && in_array($_GET['lang'], ['es','en','it'])) { $_SESSION['lang'] = $_GET['lang']; } $cl = $_SESSION['lang'] ?? 'es'; ?>
<html lang="<?php echo $cl; ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php $vo_meta=['es'=>'Voluntariado - Scuola Italiana','en'=>'Volunteering - Scuola Italiana','it'=>'Volontariato - Scuola Italiana']; echo $vo_meta[$cl]; ?></title>

    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="breadcrumbs.css">
    <link rel="stylesheet" href="../css/Voluntariado.css">
    
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
        $vo = [
            'hero_t' => ['es'=>'Nuestro Voluntariado','en'=>'Our Volunteering','it'=>'Il nostro Volontariato'],
            'hero_s' => ['es'=>'Descubre todo lo que hace especial a la Scuola Italiana di Montevideo','en'=>'Discover what makes the Scuola Italiana di Montevideo special','it'=>'Scopri cosa rende speciale la Scuola Italiana di Montevideo'],
            'hist_h' => ['es'=>'Nuestra Historia y Tradición','en'=>'Our History and Tradition','it'=>'La nostra Storia e Tradizione'],
            'hist_p1' => ['es'=>'Décadas de excelencia académica y compromiso comunitario.','en'=>'Decades of academic excellence and community engagement.','it'=>'Decenni di eccellenza accademica e impegno nella comunità.'],
            'hist_p2' => ['es'=>'Promovemos valores humanos y ciudadanía activa junto a lazos con la cultura italiana.','en'=>'We promote human values and active citizenship while keeping ties to Italian culture.','it'=>'Promuoviamo valori umani e cittadinanza attiva, mantenendo i legami con la cultura italiana.'],
            'feat_h' => ['es'=>'Lo que nos distingue','en'=>'What sets us apart','it'=>'Cosa ci distingue'],
            'f1_h' => ['es'=>'Participación Estudiantil','en'=>'Student Participation','it'=>'Partecipazione degli studenti'],
            'f1_p' => ['es'=>'Promovemos proyectos de voluntariado con impacto real en la comunidad educativa y el entorno.','en'=>'We promote volunteering projects with real impact on the school community and its environment.','it'=>'Promuoviamo progetti di volontariato con impatto reale sulla comunità scolastica e sul territorio.'],
            'f2_h' => ['es'=>'Ciudadanía Activa','en'=>'Active Citizenship','it'=>'Cittadinanza attiva'],
            'f2_p' => ['es'=>'Desarrollamos liderazgo, trabajo en equipo y responsabilidad social a través de acciones solidarias.','en'=>'We develop leadership, teamwork and social responsibility through solidarity actions.','it'=>'Sviluppiamo leadership, lavoro di squadra e responsabilità sociale attraverso azioni solidali.'],
            'f3_h' => ['es'=>'Aprendizaje con Sentido','en'=>'Purposeful Learning','it'=>'Apprendimento con senso'],
            'f3_p' => ['es'=>'El voluntariado integra contenidos curriculares con experiencias de servicio y reflexión.','en'=>'Volunteering integrates curricular content with service experiences and reflection.','it'=>'Il volontariato integra i contenuti curricolari con esperienze di servizio e riflessione.'],
            'contact' => ['es'=>'Contacto','en'=>'Contact','it'=>'Contatto'],
            'links' => ['es'=>'Enlaces útiles','en'=>'Useful links','it'=>'Link utili'],
            'link_items' => [
                'es' => ['Política de privacidad','Requisitos técnicos','Accesibilidad'],
                'en' => ['Privacy Policy','Technical Requirements','Accessibility'],
                'it' => ['Informativa sulla privacy','Requisiti tecnici','Accessibilità'],
            ],
        ];
    ?>
    <section class="hero editable-image" style="background-image: url('FOTOS/fotosPrincipales/Voluntariado1.jpg'); margin-top: 0px;">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1 class="hero-title editable-text"><?php echo $vo['hero_t'][$cl]; ?></h1>
            <p class="hero-subtitle editable-text"><?php echo $vo['hero_s'][$cl]; ?></p>
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
                        <h2 class="editable-text"><?php echo $vo['hist_h'][$cl]; ?></h2>
                        <p class="intro-description editable-text"><?php echo $vo['hist_p1'][$cl]; ?></p>
                        <p class="intro-description editable-text"><?php echo $vo['hist_p2'][$cl]; ?></p>
                    </div>

                    <div class="intro-visual">
                        <div class="visual-card">
                            <img class="editable-image" src="FOTOS/fotosPrincipales/Voluntariado2.jpg" alt="Estudiantes en el aula">
                        </div>
                    </div>
                </div>
            </section>

            <!-- Features Section -->
            <section class="features">
                <div class="container">
                    <h2 class="section-title editable-text"><?php echo $vo['feat_h'][$cl]; ?></h2>

                    <div class="features-grid">
                        <div class="feature-card">
                            <h3 class="editable-text"><?php echo $vo['f1_h'][$cl]; ?></h3>
                            <p class="editable-text"><?php echo $vo['f1_p'][$cl]; ?></p>
                        </div>
                        <div class="feature-card">
                            <h3 class="editable-text"><?php echo $vo['f2_h'][$cl]; ?></h3>
                            <p class="editable-text"><?php echo $vo['f2_p'][$cl]; ?></p>
                        </div>
                        <div class="feature-card">
                            <h3 class="editable-text"><?php echo $vo['f3_h'][$cl]; ?></h3>
                            <p class="editable-text"><?php echo $vo['f3_p'][$cl]; ?></p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Content Section -->
            <section class="content-section">
                <div class="container">
                    <div class="content-grid">
                        
                        
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
                    <h4><?php echo $vo['contact'][$cl]; ?></h4>

                    <p>Gral. French 2380</p>
                    <p>CP 11500 - Montevideo, Uruguay</p>
                    <p>(+598) 2600 1527</p>
                    <p>info@scuolaitaliana.edu.uy</p>
                </div>
            </div>
            
            <div class="footer-right">
                <div class="footer-section">
                    <h4><?php echo $vo['links'][$cl]; ?></h4>
                    <p><?php echo $vo['link_items'][$cl][0]; ?></p>
                    <p><?php echo $vo['link_items'][$cl][1]; ?></p>
                    <p><?php echo $vo['link_items'][$cl][2]; ?></p>
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
    <script src="breadcrumbs.js"></script>
<script src="cms-admin.js"></script>
<script src="analytics.js"></script>
</body>
</html>