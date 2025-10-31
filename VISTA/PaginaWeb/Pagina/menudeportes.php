<!DOCTYPE html>
<?php if (session_status() === PHP_SESSION_NONE) { session_start(); } if (isset($_GET['lang']) && in_array($_GET['lang'], ['es','en','it'])) { $_SESSION['lang'] = $_GET['lang']; } $cl = $_SESSION['lang'] ?? 'es'; ?>
<html lang="<?php echo $cl; ?>">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php $md_meta=['es'=>'Deportes - Scuola Italiana','en'=>'Sports - Scuola Italiana','it'=>'Sport - Scuola Italiana']; echo $md_meta[$cl]; ?></title>

    <link rel="stylesheet" href="breadcrumbs.css">
  <link rel="stylesheet" href="../css/menudeportes.css">
  <style>
    .navbar { background: rgba(10, 36, 82, 0.5); }
  </style>
  <link rel="icon" type="image/png" href="/Pagina/favicon.png">
  <link rel="shortcut icon" href="/Pagina/favicon.ico">
</head>

<div id="cms-root"></div>
<body>
    <div id="original-content">
    <!-- Navigation -->
    <nav class="navbar">
        <div class="nav-container">
            <div class="nav-logo">
                <img src="FOTOS/fotosPrincipales/logo2.png" alt="Scuola Italiana di Montevideo" style="height: 120px;">
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
      $md = [
                'hero' => ['es' => 'Deportes', 'en' => 'Sports', 'it' => 'Sport'],
                'intro' => [
                    'es' => 'La práctica deportiva fomenta hábitos saludables, el trabajo en equipo y valores como el respeto y la constancia.',
                    'en' => 'Sports practice encourages healthy habits, teamwork and values such as respect and consistency.',
                    'it' => 'La pratica sportiva promuove abitudini salutari, il lavoro di squadra e valori come il rispetto e la costanza.'
                ],
                'futbol_h' => ['es' => 'Fútbol', 'en' => 'Football', 'it' => 'Calcio'],
                'futbol_p1' => [
                    'es' => 'El fútbol es uno de los deportes más populares y emocionantes que practicamos en nuestra institución. Este deporte no solo desarrolla las habilidades físicas de nuestros estudiantes, sino que también fomenta valores fundamentales como el trabajo en equipo, la disciplina y el respeto.',
                    'en' => 'Football is one of the most popular and exciting sports we practice at our institution. This sport not only develops our students\' physical skills, but also fosters fundamental values such as teamwork, discipline and respect.',
                    'it' => 'Il calcio è uno degli sport più popolari ed emozionanti che pratichiamo nella nostra istituzione. Questo sport non solo sviluppa le abilità fisiche dei nostri studenti, ma promuove anche valori fondamentali come il lavoro di squadra, la disciplina e il rispetto.'
                ],
                'futbol_p2' => [
                    'es' => 'Nuestros equipos participan activamente en competencias locales y regionales, representando con orgullo los colores de la Scuola Italiana. Los entrenamientos se realizan en nuestras modernas instalaciones deportivas. El equipo del colegio, Palermo, compite en la Liga Universitaria en categorías formativas (desde Sub 14).',
                    'en' => 'Our teams actively participate in local and regional competitions, proudly representing the colors of Scuola Italiana. Training takes place in our modern sports facilities. The school team, Palermo, competes in the University League in youth divisions (from U14).',
                    'it' => 'Le nostre squadre partecipano attivamente a competizioni locali e regionali, rappresentando con orgoglio i colori della Scuola Italiana. Gli allenamenti si svolgono nelle nostre moderne strutture sportive. La squadra della scuola, Palermo, compete nella Liga Universitaria nelle categorie giovanili (dalla Under 14).'
                ],
                'handball_h' => ['es' => 'Handball', 'en' => 'Handball', 'it' => 'Pallamano'],
                'handball_p1' => [
                    'es' => 'El handball es un deporte dinámico que combina velocidad, estrategia y coordinación. En nuestra institución favorece la toma de decisiones rápidas, la coordinación y el trabajo en equipo.',
                    'en' => 'Handball is a dynamic sport that combines speed, strategy and coordination. At our school it fosters quick decision‑making, coordination and teamwork.',
                    'it' => 'La pallamano è uno sport dinamico che combina velocità, strategia e coordinazione. Nella nostra scuola favorisce decisioni rapide, coordinazione e lavoro di squadra.'
                ],
                'handball_p2' => [
                    'es' => 'Nuestros equipos de handball participan en competencias escolares y regionales, destacándose por su técnica depurada y espíritu competitivo.',
                    'en' => 'Our handball teams participate in school and regional competitions, standing out for their refined technique and competitive spirit.',
                    'it' => 'Le nostre squadre di pallamano partecipano a competizioni scolastiche e regionali, distinguendosi per la loro tecnica raffinata e lo spirito competitivo.'
                ],
                'hockey_h' => ['es' => 'Hockey', 'en' => 'Hockey', 'it' => 'Hockey'],
                'hockey_p1' => [
                    'es' => 'El hockey sobre césped es un deporte de precisión y habilidad técnica que requiere coordinación, velocidad y estrategia. En nuestra institución favorece la concentración y el trabajo en equipo.',
                    'en' => 'Field hockey is a precision and technical skill sport that requires coordination, speed and strategy. At our school it fosters concentration and teamwork.',
                    'it' => 'L\'hockey su prato è uno sport di precisione e abilità tecnica che richiede coordinazione, velocità e strategia. Nella nostra scuola favorisce concentrazione e lavoro di squadra.'
                ],
                'hockey_p2' => [
                    'es' => 'Nuestros equipos de hockey participan en competencias locales y regionales, destacándose por su técnica depurada y disciplina táctica.',
                    'en' => 'Our hockey teams participate in local and regional competitions, standing out for their refined technique and tactical discipline.',
                    'it' => 'Le nostre squadre di hockey partecipano a competizioni locali e regionali, distinguendosi per la loro tecnica raffinata e disciplina tattica.'
                ],
                'voley_h' => ['es' => 'Vóley', 'en' => 'Volleyball', 'it' => 'Pallavolo'],
                'voley_p1' => [
                    'es' => 'El voleibol es un deporte que combina fuerza, agilidad y trabajo en equipo. En nuestra institución favorece la coordinación y la comunicación entre jugadores.',
                    'en' => 'Volleyball is a sport that combines strength, agility and teamwork. At our school it fosters coordination and communication between players.',
                    'it' => 'La pallavolo è uno sport che combina forza, agilità e lavoro di squadra. Nella nostra scuola favorisce coordinazione e comunicazione tra i giocatori.'
                ],
                'voley_p2' => [
                    'es' => 'Nuestros equipos de voleibol participan en competencias escolares y regionales, destacándose por su técnica depurada y espíritu competitivo.',
                    'en' => 'Our volleyball teams participate in school and regional competitions, standing out for their refined technique and competitive spirit.',
                    'it' => 'Le nostre squadre di pallavolo partecipano a competizioni scolastiche e regionali, distinguendosi per la loro tecnica raffinata e lo spirito competitivo.'
                ],
                'gimnasia_h' => ['es' => 'Gimnasia Artística', 'en' => 'Artistic Gymnastics', 'it' => 'Ginnastica Artistica'],
                'gimnasia_p1' => [
                    'es' => 'La gimnasia artística es un deporte que combina expresión corporal, flexibilidad y elegancia en movimiento. En nuestra institución fortalece la coordinación y la disciplina.',
                    'en' => 'Artistic gymnastics is a sport that combines body expression, flexibility and elegance in movement. At our school it strengthens coordination and discipline.',
                    'it' => 'La ginnastica artistica è uno sport che combina espressione corporea, flessibilità ed eleganza nel movimento. Nella nostra scuola rafforza coordinazione e disciplina.'
                ],
                'gimnasia_p2' => [
                    'es' => 'Nuestros equipos de gimnasia participan en competencias escolares y regionales, destacándose por su técnica depurada y elegancia en los movimientos.',
                    'en' => 'Our gymnastics teams participate in school and regional competitions, standing out for their refined technique and elegance in movements.',
                    'it' => 'Le nostre squadre di ginnastica partecipano a competizioni scolastiche e regionali, distinguendosi per la loro tecnica raffinata ed eleganza nei movimenti.'
                ],
                'atletismo_h' => ['es' => 'Atletismo', 'en' => 'Athletics', 'it' => 'Atletica'],
                'atletismo_p1' => [
                    'es' => 'El atletismo es un deporte base que desarrolla velocidad, resistencia y fuerza. En nuestra institución favorece la disciplina, la constancia y el esfuerzo personal.',
                    'en' => 'Athletics is a base sport that develops speed, endurance and strength. At our school it fosters discipline, consistency and personal effort.',
                    'it' => 'L\'atletica è uno sport di base che sviluppa velocità, resistenza e forza. Nella nostra scuola favorisce disciplina, costanza e impegno personale.'
                ],
                'atletismo_p2' => [
                    'es' => 'Nuestros equipos de atletismo participan en competencias escolares y regionales, destacándose por su técnica depurada y espíritu competitivo.',
                    'en' => 'Our athletics teams participate in school and regional competitions, standing out for their refined technique and competitive spirit.',
                    'it' => 'Le nostre squadre di atletica partecipano a competizioni scolastiche e regionali, distinguendosi per la loro tecnica raffinata e lo spirito competitivo.'
                ],
                'ver_programa' => ['es' => 'Ver programa', 'en' => 'See program', 'it' => 'Vedi programma'],
            ];
        ?>
        <section class="hero-inicial" style="background-image: linear-gradient(rgba(10, 36, 82, 0.7), rgba(27, 79, 114, 0.7)), url('FOTOS/fotosDeportes/futbol1.jpg'); background-size: cover; background-position: center;">
            <div class="hero-content">
                <h1 class="hero-title"><?php echo $md['hero'][$cl]; ?></h1>
                <p class="hero-subtitle" style="margin-top:10px; color:#fff; font-size:1rem;"><?php echo $md['intro'][$cl]; ?></p>
            </div>
        </section>
        <div id="breadcrumbs" class="breadcrumbs-container"></div>
        <!-- Programs Section -->
        <section class="programs-section">
            <div class="programs-container">
                <!-- Fútbol -->
                <div class="program-section">
                    <div class="program-image">
                        <img src="FOTOS/fotosDeportes/futbol1.jpg" alt="Fútbol">
        </div>
                    <div class="program-info">
                        <h3><?php echo $md['futbol_h'][$cl]; ?></h3>
                        <p><?php echo $md['futbol_p1'][$cl]; ?></p>
                        <p><?php echo $md['futbol_p2'][$cl]; ?></p>
                        <a href="futbol.php" class="program-button" style="display: inline-block; text-decoration: none;">
                            <?php echo $md['ver_programa'][$cl]; ?>
                        </a>
                    </div>
                </div>

                <!-- Handball -->
                <div class="program-section">
                    <div class="program-image">
                        <img src="FOTOS/fotosDeportes/volley1.jpg" alt="Handball">
        </div>
                    <div class="program-info">
                        <h3><?php echo $md['handball_h'][$cl]; ?></h3>
                        <p><?php echo $md['handball_p1'][$cl]; ?></p>
                        <p><?php echo $md['handball_p2'][$cl]; ?></p>
                        <a href="handball.php" class="program-button" style="display: inline-block; text-decoration: none;">
                            <?php echo $md['ver_programa'][$cl]; ?>
                        </a>
                    </div>
                </div>

                <!-- Hockey -->
                <div class="program-section">
                    <div class="program-image">
                        <img src="FOTOS/fotosPrincipales/hockey.jpg" alt="Hockey">
        </div>
                    <div class="program-info">
                        <h3><?php echo $md['hockey_h'][$cl]; ?></h3>
                        <p><?php echo $md['hockey_p1'][$cl]; ?></p>
                        <p><?php echo $md['hockey_p2'][$cl]; ?></p>
                        <a href="hockey.php" class="program-button" style="display: inline-block; text-decoration: none;">
                            <?php echo $md['ver_programa'][$cl]; ?>
                        </a>
                    </div>
                </div>

                <!-- Vóley -->
                <div class="program-section">
                    <div class="program-image">
                        <img src="FOTOS/fotosDeportes/volley1.jpg" alt="Vóley">
        </div>
                    <div class="program-info">
                        <h3><?php echo $md['voley_h'][$cl]; ?></h3>
                        <p><?php echo $md['voley_p1'][$cl]; ?></p>
                        <p><?php echo $md['voley_p2'][$cl]; ?></p>
                        <a href="voley.php" class="program-button" style="display: inline-block; text-decoration: none;">
                            <?php echo $md['ver_programa'][$cl]; ?>
                        </a>
                    </div>
                </div>

                <!-- Gimnasia Artística -->
                <div class="program-section">
                    <div class="program-image">
                        <img src="FOTOS/fotosDeportes/gimnacia.jpg" alt="Gimnasia Artística">
        </div>
                    <div class="program-info">
                        <h3><?php echo $md['gimnasia_h'][$cl]; ?></h3>
                        <p><?php echo $md['gimnasia_p1'][$cl]; ?></p>
                        <p><?php echo $md['gimnasia_p2'][$cl]; ?></p>
                        <a href="gimnasia.php" class="program-button" style="display: inline-block; text-decoration: none;">
                            <?php echo $md['ver_programa'][$cl]; ?>
                        </a>
                    </div>
                </div>

                <!-- Atletismo -->
                <div class="program-section">
                    <div class="program-image">
                        <img src="FOTOS/fotosDeportes/futbol2.jpg" alt="Atletismo">
        </div>
                    <div class="program-info">
                        <h3><?php echo $md['atletismo_h'][$cl]; ?></h3>
                        <p><?php echo $md['atletismo_p1'][$cl]; ?></p>
                        <p><?php echo $md['atletismo_p2'][$cl]; ?></p>
                        <a href="atletismo.php" class="program-button" style="display: inline-block; text-decoration: none;">
                            <?php echo $md['ver_programa'][$cl]; ?>
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
                    <img src="FOTOS/fotosPrincipales/logotipo.png" alt="Scuola Italiana di Montevideo" style="height: 60px;">
                </div>
                <div class="footer-subtitle">
                    <p>Scuola Italiana di Montevideo</p>
                </div>
            </div>
            
            <div class="footer-center">
                <div class="footer-section">
                    <?php $md_contact = ['es' => 'Contacto','en' => 'Contact','it' => 'Contatto']; ?>
                    <h4><?php echo $md_contact[$cl]; ?></h4>
                    <p>Gral. French 2380</p>
                    <p>CP 11500 - Montevideo, Uruguay</p>
                    <p>(+598) 2600 1527</p>
                    <p>info@scuolaitaliana.edu.uy</p>
                </div>
    </div>

            <div class="footer-right">
                <div class="footer-section">
                    <?php 
                        $md_linksTitle = ['es' => 'Enlaces útiles','en' => 'Useful links','it' => 'Link utili'];
                        $md_links = [
                            'es' => ['Política de privacidad','Requisitos técnicos','Accesibilidad'],
                            'en' => ['Privacy Policy','Technical Requirements','Accessibility'],
                            'it' => ['Informativa sulla privacy','Requisiti tecnici','Accessibilità'],
                        ];
                    ?>
                    <h4><?php echo $md_linksTitle[$cl]; ?></h4>
                    <p><?php echo $md_links[$cl][0]; ?></p>
                    <p><?php echo $md_links[$cl][1]; ?></p>
                    <p><?php echo $md_links[$cl][2]; ?></p>
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