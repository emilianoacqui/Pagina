<!DOCTYPE html>
<?php if (session_status() === PHP_SESSION_NONE) { session_start(); } $cl = $_SESSION['lang'] ?? 'es'; ?>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php $mi_meta=['es'=>'Intercambios - Scuola Italiana','en'=>'Exchanges - Scuola Italiana','it'=>'Scambi - Scuola Italiana']; echo $mi_meta[$cl]; ?></title>

    <link rel="stylesheet" href="breadcrumbs.css">
    <link rel="stylesheet" href="../css/menuIntercambio.css">
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

    <!-- Hero Section -->
    <?php 
        $x = [
            'hero_t' => ['es'=>'INTERCAMBIOS','en'=>'EXCHANGES','it'=>'SCAMBI'],
            'hero_s' => ['es'=>'Programas de intercambio estudiantil','en'=>'Student exchange programs','it'=>'Programmi di scambio studenti'],
            'it_t' => ['es'=>'Italia','en'=>'Italy','it'=>'Italia'],
            'it_p' => [
                'es'=>'Intercambio académico en colegios italianos. Duración de 6 meses con familias anfitrionas.',
                'en'=>'Academic exchange in Italian schools. Six-month stay with host families.',
                'it'=>'Scambio accademico in scuole italiane. Soggiorno di sei mesi con famiglie ospitanti.',
            ],
            'ar_t' => ['es'=>'Argentina','en'=>'Argentina','it'=>'Argentina'],
            'ar_p' => [
                'es'=>'Programa cultural y académico. Experiencia de 4 meses en Buenos Aires.',
                'en'=>'Cultural and academic program. Four-month experience in Buenos Aires.',
                'it'=>'Programma culturale e accademico. Esperienza di quattro mesi a Buenos Aires.',
            ],
            'us_t' => ['es'=>'Estados Unidos','en'=>'United States','it'=>'Stati Uniti'],
            'us_p' => [
                'es'=>'Intercambio en high schools americanas. Programa anual disponible.',
                'en'=>'Exchange in American high schools. Full-year program available.',
                'it'=>'Scambio in high school americane. Disponibile programma annuale.',
            ],
            'see_prog' => ['es'=>'Ver programa','en'=>'See program','it'=>'Vedi programma'],
            'contact' => ['es'=>'Contacto','en'=>'Contact','it'=>'Contatto'],
            'links' => ['es'=>'Enlaces útiles','en'=>'Useful links','it'=>'Link utili'],
            'link_items' => [
                'es' => ['Política de privacidad','Requisitos técnicos','Accesibilidad'],
                'en' => ['Privacy Policy','Technical Requirements','Accessibility'],
                'it' => ['Informativa sulla privacy','Requisiti tecnici','Accessibilità'],
            ],
        ];
    ?>
    <section class="hero">

        <div class="hero-background"></div>
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1 class="hero-title"><?php echo $x['hero_t'][$cl]; ?></h1>
            <p class="hero-subtitle"><?php echo $x['hero_s'][$cl]; ?></p>
        </div>
    </section>

    <div id="breadcrumbs" class="breadcrumbs-container"></div>
    <!-- Main Content -->
    <main class="main-content">
        <div class="container">
            <div class="intercambios-grid">
                
                <!-- Italia -->
                <div class="intercambio-card">
                    <div class="card-icon">
                        <span class="country-icon">🇮🇹</span>
                    </div>
                    <h3><?php echo $x['it_t'][$cl]; ?></h3>
                    <p><?php echo $x['it_p'][$cl]; ?></p>
                    <a href="IntercambioItalia.php" class="intercambio-btn" style="display: inline-block; text-decoration: none;">
    <?php echo $x['see_prog'][$cl]; ?>
</a>

                </div>

                <!-- Argentina -->
                <div class="intercambio-card">
                    <div class="card-icon">
                        <span class="country-icon">🇦🇷</span>
                    </div>
                    <h3><?php echo $x['ar_t'][$cl]; ?></h3>
                    <p><?php echo $x['ar_p'][$cl]; ?></p>
                    <a href="IntercambioArgentina.php" class="intercambio-btn" style="display: inline-block; text-decoration: none;">
    <?php echo $x['see_prog'][$cl]; ?>
</a>

                </div>

                <!-- Estados Unidos -->
                <div class="intercambio-card">
                    <div class="card-icon">
                        <span class="country-icon">🇺🇸</span>
                    </div>
                    <h3><?php echo $x['us_t'][$cl]; ?></h3>
                    <p><?php echo $x['us_p'][$cl]; ?></p>
                    <a href="IntercambioEEUU.php" class="intercambio-btn" style="display: inline-block; text-decoration: none;">
    <?php echo $x['see_prog'][$cl]; ?>
</a>

                </div>

            </div>
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
                    <h4><?php echo $x['contact'][$cl]; ?></h4>

                    <p>Av. Brasil 3149, Montevideo</p>
                    <p>(+598) 2621 4822 / 2622 1422</p>
                    <p>info@scuolaitaliana.edu.uy</p>
                </div>
            </div>
            
            <div class="footer-right">
                <div class="footer-section">
                    <h4><?php echo $x['links'][$cl]; ?></h4>
                    <p><?php echo $x['link_items'][$cl][0]; ?></p>
                    <p><?php echo $x['link_items'][$cl][1]; ?></p>
                    <p><?php echo $x['link_items'][$cl][2]; ?></p>

                </div>
            </div>
        </div>
        </div>
        <div class="footer-info-bar">
            <p>Desarrollado por el equipo SGE | Proyecto de apoyo 2002 - EE Informática</p>
        </div>
    </footer>

    <script src="breadcrumbs.js"></script>
    <script src="cms-admin.js"></script>
    <script src="analytics.js"></script>
</body>
</html>