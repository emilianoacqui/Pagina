<!DOCTYPE html>
<?php if (session_status() === PHP_SESSION_NONE) { session_start(); } $cl = $_SESSION['lang'] ?? 'es'; ?>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php 
            $mi_texts = [
                'title' => ['es' => 'Inicial - Scuola Italiana di Montevideo', 'en' => 'Early Childhood - Scuola Italiana di Montevideo', 'it' => 'Infanzia - Scuola Italiana di Montevideo'],
            ];
        echo $mi_texts['title'][$cl]; ?></title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="breadcrumbs.css">
    <link rel="stylesheet" href="../css/menuInicial.css">
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
                <img src="FOTOS/fotosPrincipales/logo2.png" alt="Scuola Italiana di Montevideo">
            </div>
            <div class="nav-menu-button" onclick="window.location.href='menuScuola.php'">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Hero Section -->
        <section class="hero-inicial">
            <div class="hero-content">
                <h1 class="hero-title"><?php echo $mi_texts['title'][$cl]; ?></h1>
            </div>
        </section>
        <div id="breadcrumbs" class="breadcrumbs-container"></div>

        <!-- Programs Section -->
        <section class="programs-section">
            <div class="programs-container">
                <!-- BBSIM (moved first) -->
                <div class="program-section">
                    <div class="program-image">
                        <img src="FOTOS/fotosClases/BBSIM1.jpg" alt="BBSIM">
                    </div>
                    <div class="program-info">
                        <?php 
                            $mi_texts = [
                                'bbsim_h' => ['es' => 'BBSIM','en' => 'BBSIM','it' => 'BBSIM'],
                                'bbsim_p1' => [
                                    'es' => 'Montessori con más de 50 años de trayectoria, dedicada a niños de 2 a 6 años. Propuesta integral que fomenta autonomía e independencia.',
                                    'en' => 'Montessori with over 50 years of experience for children aged 2 to 6. An integral proposal that fosters autonomy and independence.',
                                    'it' => 'Montessori con oltre 50 anni di esperienza per bambini dai 2 ai 6 anni. Una proposta integrale che promuove autonomia e indipendenza.',
                                ],
                                'bbsim_p2' => [
                                    'es' => 'El “ambiente preparado” facilita autoconocimiento y autonomía, estimulando confianza, creatividad y empatía.',
                                    'en' => 'The “prepared environment” facilitates self‑knowledge and autonomy, encouraging confidence, creativity and empathy.',
                                    'it' => 'L’“ambiente preparato” facilita l’autoconoscenza e l’autonomia, stimolando fiducia, creatività ed empatia.',
                                ],
                                'bbsim_p3' => [
                                    'es' => 'La educación se enfoca en habilidades comprensivas con fundamentos intelectuales y constructivos.',
                                    'en' => 'Education focuses on comprehensive skills with solid intellectual and constructive foundations.',
                                    'it' => 'L’educazione si concentra su competenze comprensive con solide basi intellettuali e costruttive.',
                                ],
                                'ver_programa' => ['es' => 'Ver programa','en' => 'See program','it' => 'Vedi programma'],
                            ];
                        ?>
                        <h3><?php echo $mi_texts['bbsim_h'][$cl]; ?></h3>
                        <p><?php echo $mi_texts['bbsim_p1'][$cl]; ?></p>
                        <p><?php echo $mi_texts['bbsim_p2'][$cl]; ?></p>
                        <p><?php echo $mi_texts['bbsim_p3'][$cl]; ?></p>

                            <a href="BBSIM.php" class="program-button" style="display: inline-block; text-decoration: none;">
    <?php echo $mi_texts['ver_programa'][$cl]; ?>
</a>

                    </div>
                </div>

                <!-- Casa dei Bambini (moved second) -->
                <div class="program-section">
                    <div class="program-image">
                        <img src="FOTOS/fotosClases/Bambini1.jpg" alt="Casa dei Bambini">
                    </div>
                    <div class="program-info">
                        <?php 
                            $mi_texts = [
                                'bambini_h' => ['es' => 'Casa dei Bambini','en' => 'Casa dei Bambini','it' => 'Casa dei Bambini'],
                                'bambini_p1' => [
                                    'es' => 'Comenzamos el nuevo año con actividades extracurriculares que complementan el proceso educativo de los más pequeños.',
                                    'en' => 'We start the new year with extracurricular activities that complement the educational process of our youngest students.',
                                    'it' => 'Iniziamo il nuovo anno con attività extracurriculari che completano il percorso educativo dei più piccoli.',
                                ],
                                'bambini_p2' => [
                                    'es' => 'Acompañamos el crecimiento entre los 3 y 5 años fomentando creatividad, habilidades sociales e independencia a través del juego.',
                                    'en' => 'We support growth between ages 3 and 5, fostering creativity, social skills and independence through play.',
                                    'it' => 'Accompagniamo la crescita tra i 3 e i 5 anni promuovendo creatività, abilità sociali e indipendenza attraverso il gioco.',
                                ],
                                'bambini_p3' => [
                                    'es' => 'Un equipo especializado en primera infancia brinda experiencias que favorecen el conocimiento y la investigación personal.',
                                    'en' => 'A team specialized in early childhood provides experiences that foster knowledge and personal exploration.',
                                    'it' => 'Un team specializzato nella prima infanzia offre esperienze che favoriscono la conoscenza e la ricerca personale.',
                                ],
                                'ver_programa' => ['es' => 'Ver programa','en' => 'See program','it' => 'Vedi programma'],
                            ];
                        ?>
                        <h3><?php echo $mi_texts['bambini_h'][$cl]; ?></h3>
                        <p><?php echo $mi_texts['bambini_p1'][$cl]; ?></p>
                        <p><?php echo $mi_texts['bambini_p2'][$cl]; ?></p>
                        <p><strong><?php echo $mi_texts['bambini_p3'][$cl]; ?></strong></p>

                            <a href="Bambini.php" class="program-button" style="display: inline-block; text-decoration: none;">
    <?php echo $mi_texts['ver_programa'][$cl]; ?>
</a>

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
                    <img src="FOTOS/fotosPrincipales/logo2.png" alt="Scuola Italiana di Montevideo" style="height: 60px;">
                </div>
                <div class="footer-subtitle">
                    <p>Scuola Italiana di Montevideo</p>
                </div>
            </div>
            
            <div class="footer-center">
                <div class="footer-section">
                    <?php $mi_contact = ['es' => 'Contacto','en' => 'Contact','it' => 'Contatto']; ?>
                    <h4><?php echo $mi_contact[$cl]; ?></h4>

                    <p>Gral. French 2380</p>
                    <p>(+598) 2621 4822 / 2622 1422</p>
                    <p>info@scuolaitaliana.edu.uy</p>
                </div>
            </div>
            
            <div class="footer-right">
                <div class="footer-section">
                    <?php 
                        $mi_linksTitle = ['es' => 'Enlaces útiles','en' => 'Useful links','it' => 'Link utili'];
                        $mi_links = [
                            'es' => ['Política de privacidad','Requisitos técnicos','Accesibilidad'],
                            'en' => ['Privacy Policy','Technical Requirements','Accessibility'],
                            'it' => ['Informativa sulla privacy','Requisiti tecnici','Accessibilità'],
                        ];
                    ?>
                    <h4><?php echo $mi_linksTitle[$cl]; ?></h4>
                    <p><?php echo $mi_links[$cl][0]; ?></p>
                    <p><?php echo $mi_links[$cl][1]; ?></p>
                    <p><?php echo $mi_links[$cl][2]; ?></p>

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