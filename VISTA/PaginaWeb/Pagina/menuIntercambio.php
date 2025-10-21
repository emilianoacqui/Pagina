<!DOCTYPE html>
<?php if (session_status() === PHP_SESSION_NONE) { session_start(); } if (isset($_GET['lang']) && in_array($_GET['lang'], ['es','en','it'])) { $_SESSION['lang'] = $_GET['lang']; } $cl = $_SESSION['lang'] ?? 'es'; ?>
<html lang="<?php echo $cl; ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php $mi_meta=['es'=>'Intercambios - Scuola Italiana','en'=>'Exchanges - Scuola Italiana','it'=>'Scambi - Scuola Italiana']; echo $mi_meta[$cl]; ?></title>

    <link rel="stylesheet" href="breadcrumbs.css">
    <link rel="stylesheet" href="../css/menuIntercambio.css">
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

    <!-- Hero Section -->
    <?php 
        $x = [
            'hero_t' => ['es'=>'INTERCAMBIOS','en'=>'EXCHANGES','it'=>'SCAMBI'],
            'hero_s' => ['es'=>'Programas de intercambio estudiantil','en'=>'Student exchange programs','it'=>'Programmi di scambio studenti'],
            'intro' => [
                'es' => 'Fortalecemos competencias interculturales, convivencia e idioma a través de experiencias en otros contextos educativos.',
                'en' => 'We strengthen intercultural competencies, coexistence and language through experiences in other educational contexts.',
                'it' => 'Rafforziamo le competenze interculturali, la convivenza e la lingua attraverso esperienze in altri contesti educativi.'
            ],
            'it_t' => ['es'=>'Italia','en'=>'Italy','it'=>'Italia'],
            'it_p' => [
                'es'=>'Intercambio en 4.º de liceo por 3 semanas con estudiantes de dos colegios italianos; al año siguiente ellos visitan nuestra escuela.',
                'en'=>'Exchange in 4th year of high school for 3 weeks with students from two Italian schools; the following year they visit our school.',
                'it'=>'Scambio in quarta liceo per 3 settimane con studenti di due scuole italiane; l’anno successivo visitano la nostra scuola.',
            ],
            'ar_t' => ['es'=>'Argentina','en'=>'Argentina','it'=>'Argentina'],
            'ar_p' => [
                'es'=>'Intercambio en 6.º de escuela con una institución de Argentina; los estudiantes asisten allí y al año siguiente los pares argentinos visitan Uruguay.',
                'en'=>'Exchange in 6th grade with a partner school in Argentina; students attend there and the following year the Argentine peers visit Uruguay.',
                'it'=>'Scambio in sesta classe con una scuola partner in Argentina; gli studenti frequentano lì e l’anno successivo i pari argentini visitano l’Uruguay.',
            ],
            'us_t' => ['es'=>'Estados Unidos','en'=>'United States','it'=>'Stati Uniti'],
            'us_p' => [
                'es'=>'Intercambio en 6.º de escuela; los estudiantes asisten a una escuela en Estados Unidos y, al año siguiente, los anfitriones viajan a Uruguay.',
                'en'=>'Exchange in 6th grade; students attend a school in the United States and, the following year, the hosts travel to Uruguay.',
                'it'=>'Scambio in sesta classe; gli studenti frequentano una scuola negli Stati Uniti e, l’anno successivo, i partner vengono in Uruguay.',
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
            <p class="hero-intro" style="margin-top:10px; color:#f7f7f7; font-size:1rem; max-width:900px;">
                <?php echo $x['intro'][$cl]; ?>
            </p>
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
                    <img src="FOTOS/fotosPrincipales/logo2.png" alt="Scuola Italiana di Montevideo" style="height: 60px;">
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