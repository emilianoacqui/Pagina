<!DOCTYPE html>
<?php if (session_status() === PHP_SESSION_NONE) { session_start(); } $cl = $_SESSION['lang'] ?? 'es'; ?>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php 
        $ms_title = [
            'es' => 'Menú Secundaria - Scuola Italiana di Montevideo',
            'en' => 'Secondary Menu - Scuola Italiana di Montevideo',
            'it' => 'Menu Secondaria - Scuola Italiana di Montevideo',
        ];
        echo $ms_title[$cl];
    ?></title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="breadcrumbs.css">
    <link rel="stylesheet" href="../css/menuSecundaria.css">
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
        <?php 
            $ms = [
                'hero' => [ 'es' => 'Secundaria', 'en' => 'Secondary', 'it' => 'Secondaria' ],
                'pc_h' => [ 'es' => 'Primer Ciclo', 'en' => 'First Cycle', 'it' => 'Primo Ciclo' ],
                'pc_p' => [
                    'es' => 'En los primeros años de Secundaria se continúa el trabajo iniciado en Primaria con prácticas reflexivas, autonomía y creciente rigor académico para continuar estudios superiores.',
                    'en' => 'In the first years of Secondary, we continue the work started in Primary with reflective practices, autonomy and increasing academic rigor to pursue higher studies.',
                    'it' => 'Nei primi anni della Secondaria, proseguiamo il lavoro iniziato in Primaria con pratiche riflessive, autonomia e crescente rigore accademico per proseguire gli studi superiori.',
                ],
                'bach_h' => [ 'es' => 'bachillerato', 'en' => 'High School', 'it' => 'Liceo' ],
                'bach_p' => [
                    'es' => 'En el Segundo Ciclo se consolidan métodos de estudio autónomo e investigación. Buscamos formar personas cultas, críticas y creativas, capaces de enfrentar problemas con actitud racional.',
                    'en' => 'In the Second Cycle we consolidate autonomous study methods and research. We aim to form cultured, critical and creative people able to face problems with a rational mindset.',
                    'it' => 'Nel Secondo Ciclo consolidiamo metodi di studio autonomo e ricerca. Puntiamo a formare persone colte, critiche e creative, capaci di affrontare i problemi con mentalità razionale.',
                ],
                'see_program' => [ 'es' => 'Ver programa', 'en' => 'See program', 'it' => 'Vedi programma' ],
            ];
        ?>
        <section class="hero-inicial">
            <div class="hero-content">
                <h1 class="hero-title"><?php echo $ms['hero'][$cl]; ?></h1>
            </div>
        </section>

        <div id="breadcrumbs" class="breadcrumbs-container"></div>

        <!-- Programs Section -->
        <section class="programs-section">
            <div class="programs-container">
                <!-- Casa dei Bambini -->
                <div class="program-section">
                    <div class="program-image">
                        <img src="FOTOS/fotosClases/Primerciclo1.jpg" alt="Casa dei Bambini">
                    </div>
                    <div class="program-info">
                        <h3><?php echo $ms['pc_h'][$cl]; ?></h3>
                        <p><?php echo $ms['pc_p'][$cl]; ?></p>
                            <a href="primerCiclo.php" class="program-button" style="display: inline-block; text-decoration: none;">
    <?php echo $ms['see_program'][$cl]; ?>
</a>

                        
                    </div>
                </div>

                <!-- BBSIM -->
                <div class="program-section">
                    <div class="program-image">
                        <img src="FOTOS/fotosClases/bachillerato1.jpg" alt="BBSIM">
                    </div>
                    <div class="program-info">
                        <h3><?php echo $ms['pc_h'][$cl]; ?></h3>
                        <p><?php echo $ms['pc_p'][$cl]; ?></p>
                        
                            <a href="bachillerato.php" class="program-button" style="display: inline-block; text-decoration: none;">
    <?php echo $ms['see_program'][$cl]; ?>
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
                    <?php $ms_contact = ['es' => 'Contacto','en' => 'Contact','it' => 'Contatto']; ?>
                    <h4><?php echo $ms_contact[$cl]; ?></h4>

                    <p>Av. Brasil 3149, Montevideo</p>
                    <p>(+598) 2621 4822 / 2622 1422</p>
                    <p>info@scuolaitaliana.edu.uy</p>
                </div>
            </div>
            
            <div class="footer-right">
                <div class="footer-section">
                    <?php 
                        $ms_linksTitle = ['es' => 'Enlaces útiles','en' => 'Useful links','it' => 'Link utili'];
                        $ms_links = [
                            'es' => ['Política de privacidad','Requisitos técnicos','Accesibilidad'],
                            'en' => ['Privacy Policy','Technical Requirements','Accessibility'],
                            'it' => ['Informativa sulla privacy','Requisiti tecnici','Accessibilità'],
                        ];
                    ?>
                    <h4><?php echo $ms_linksTitle[$cl]; ?></h4>
                    <p><?php echo $ms_links[$cl][0]; ?></p>
                    <p><?php echo $ms_links[$cl][1]; ?></p>
                    <p><?php echo $ms_links[$cl][2]; ?></p>

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