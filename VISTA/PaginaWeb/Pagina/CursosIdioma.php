<!DOCTYPE html>
<?php if (session_status() === PHP_SESSION_NONE) { session_start(); } $cl = $_SESSION['lang'] ?? 'es'; ?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php 
        $ci_meta = [
            'es' => 'Cursos de Idioma - Scuola Italiana di Montevideo',
            'en' => 'Language Courses - Scuola Italiana di Montevideo',
            'it' => 'Corsi di Lingua - Scuola Italiana di Montevideo',
        ]; echo $ci_meta[$cl]; ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="breadcrumbs.css">
    <link rel="stylesheet" href="../css/CursosIdioma.css">
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
            $ci = [
                'hero_title' => [
                    'es' => 'Nuestros Cursos de Idioma',
                    'en' => 'Our Language Courses',
                    'it' => 'I nostri corsi di lingua',
                ],
                'hero_sub' => [
                    'es' => 'Cursos de italiano, inglés y portugués con foco comunicativo y certificaciones internacionales',
                    'en' => 'Italian, English and Portuguese courses focused on communication and international certifications',
                    'it' => 'Corsi di italiano, inglese e portoghese con focus comunicativo e certificazioni internazionali',
                ],
                'it_h' => ['es' => 'Italiano','en' => 'Italian','it' => 'Italiano'],
                'it_p1' => [
                    'es' => 'Tradición educativa con excelencia académica y enfoque bilingüe y multicultural.',
                    'en' => 'Educational tradition with academic excellence and a bilingual, multicultural focus.',
                    'it' => 'Tradizione educativa con eccellenza accademica e focus bilingue e multiculturale.',
                ],
                'it_p2' => [
                    'es' => 'Formamos estudiantes con valores humanos y compromiso, fortaleciendo los lazos con la cultura italiana.',
                    'en' => 'We form students with strong human values and commitment, strengthening ties with Italian culture.',
                    'it' => 'Formiamo studenti con solidi valori umani e impegno, rafforzando i legami con la cultura italiana.',
                ],
                'en_h' => ['es' => 'Inglés','en' => 'English','it' => 'Inglese'],
                'en_p1' => [
                    'es' => 'Programa orientado a la comunicación real, comprensión auditiva y producción oral/escrita según niveles.',
                    'en' => 'Program focused on real‑world communication, listening comprehension and spoken/written production by levels.',
                    'it' => 'Programma orientato alla comunicazione reale, comprensione orale e produzione orale/scritta per livelli.',
                ],
                'en_p2' => [
                    'es' => 'Preparación para certificaciones internacionales (según nivel) y trabajo por proyectos.',
                    'en' => 'Preparation for international certifications (by level) and project‑based work.',
                    'it' => 'Preparazione alle certificazioni internazionali (per livello) e lavoro per progetti.',
                ],
                'pt_h' => ['es' => 'Portugués','en' => 'Portuguese','it' => 'Portoghese'],
                'pt_p1' => [
                    'es' => 'Propuesta enfocada en comunicación efectiva y práctica real del idioma.',
                    'en' => 'A proposal focused on effective communication and real‑world language practice.',
                    'it' => 'Proposta incentrata sulla comunicazione efficace e sulla pratica reale della lingua.',
                ],
                'pt_p2' => [
                    'es' => 'Actividades que impulsan confianza y fluidez en contextos cotidianos y académicos.',
                    'en' => 'Activities that build confidence and fluency in everyday and academic contexts.',
                    'it' => 'Attività che sviluppano fiducia e fluidità in contesti quotidiani e accademici.',
                ],
                'features_title' => [
                    'es' => 'Las ventajas de nuestros cursos',
                    'en' => 'The advantages of our courses',
                    'it' => 'I vantaggi dei nostri corsi',
                ],
                'f1_h' => ['es' => 'Tiempo dedicado','en' => 'Dedicated time','it' => 'Tempo dedicato'],
                'f1_p' => [
                    'es' => 'Carga horaria adecuada por nivel con práctica equilibrada de comprensión y producción.',
                    'en' => 'Level‑appropriate workload with a balanced practice of comprehension and production.',
                    'it' => 'Carico orario adeguato al livello con pratica equilibrata di comprensione e produzione.',
                ],
                'f2_h' => ['es' => 'Atención particular','en' => 'Personal attention','it' => 'Attenzione personale'],
                'f2_p' => [
                    'es' => 'Grupos reducidos y seguimiento docente para alcanzar objetivos individuales.',
                    'en' => 'Small groups and teacher follow‑up to achieve individual goals.',
                    'it' => 'Gruppi ridotti e monitoraggio docente per raggiungere obiettivi individuali.',
                ],
                'f3_h' => ['es' => 'Profesores bien capacitados','en' => 'Well‑trained teachers','it' => 'Docenti ben qualificati'],
                'f3_p' => [
                    'es' => 'Docentes certificados y preparación para exámenes internacionales (según nivel).',
                    'en' => 'Certified teachers and preparation for international exams (by level).',
                    'it' => 'Docenti certificati e preparazione agli esami internazionali (in base al livello).',
                ],
            ];
        ?>
        <section class="hero editable-image" style="background-image: url('FOTOS/fotosPrincipales/CursosExtracurriculares1.jpg'); margin-top: 0px;">
            <div class="hero-overlay"></div>
            <div class="hero-content">
                <h1 class="hero-title editable-text"><?php echo $ci['hero_title'][$cl]; ?></h1>
                <p class="hero-subtitle editable-text"><?php echo $ci['hero_sub'][$cl]; ?></p>
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
                            <h2 class="editable-text"><?php echo $ci['it_h'][$cl]; ?></h2>
                            <p class="intro-description editable-text"><?php echo $ci['it_p1'][$cl]; ?></p>
                            <p class="intro-description editable-text"><?php echo $ci['it_p2'][$cl]; ?></p>

                        </div>
                        <div class="intro-visual">
                            <div class="visual-card">
                                <img class="editable-image" src="FOTOS/fotosPrincipales/CursosExtracurriculares2.jpg" alt="Estudiantes en el aula">
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Content Section -->
                <section class="content-section">
                    <div class="container">
                        <div class="content-grid">
                            <div class="content-text">
                                <h2 class="editable-text"><?php echo $ci['en_h'][$cl]; ?></h2>
                                <p class="editable-text"><?php echo $ci['en_p1'][$cl]; ?></p>
                                <p class="editable-text"><?php echo $ci['en_p2'][$cl]; ?></p>

                            </div>
                            <div class="content-image">
                                <img class="editable-image" src="FOTOS/fotosPrincipales/CursosExtracurriculares3.jpg" alt="Campus de la Scuola Italiana">
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </main>

        <section class="content-section">
            <div class="container">
                <div class="content-grid">
                    <div class="content-text">
                        <h2 class="editable-text"><?php echo $ci['pt_h'][$cl]; ?></h2>
                        <p class="editable-text"><?php echo $ci['pt_p1'][$cl]; ?></p>
                        <p class="editable-text"><?php echo $ci['pt_p2'][$cl]; ?></p>

                    </div>
                    <div class="content-image">
                        <img class="editable-image" src="FOTOS/fotosPrincipales/CursosExtracurriculares2.jpg" alt="Campus de la Scuola Italiana">
                    </div>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section class="features">
            <div class="container">
                <h2 class="section-title editable-text"><?php echo $ci['features_title'][$cl]; ?></h2>

                <div class="features-grid">
                    <div class="feature-card">
                        <h3 class="editable-text"><?php echo $ci['f1_h'][$cl]; ?></h3>
                        <p class="editable-text"><?php echo $ci['f1_p'][$cl]; ?></p>

                    </div>
                    <div class="feature-card">
                        <h3 class="editable-text"><?php echo $ci['f2_h'][$cl]; ?></h3>
                        <p class="editable-text"><?php echo $ci['f2_p'][$cl]; ?></p>

                    </div>
                    <div class="feature-card">
                        <h3 class="editable-text"><?php echo $ci['f3_h'][$cl]; ?></h3>
                        <p class="editable-text"><?php echo $ci['f3_p'][$cl]; ?></p>

                    </div>
                </div>
            </div>
        </section>

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
                        <?php $ci_contact = ['es' => 'Contacto','en' => 'Contact','it' => 'Contatto']; ?>
                        <h4><?php echo $ci_contact[$cl]; ?></h4>

                        <p>Gral. French 2380</p>
                        <p>CP 11500 - Montevideo, Uruguay</p>
                        <p>(+598) 2600 1527</p>
                        <p>info@scuolaitaliana.edu.uy</p>
                    </div>
                </div>

                <div class="footer-right">
                    <div class="footer-section">
                        <?php 
                            $ci_linksTitle = ['es' => 'Enlaces útiles','en' => 'Useful links','it' => 'Link utili'];
                            $ci_links = [
                                'es' => ['Política de privacidad','Requisitos técnicos','Accesibilidad'],
                                'en' => ['Privacy Policy','Technical Requirements','Accessibility'],
                                'it' => ['Informativa sulla privacy','Requisiti tecnici','Accessibilità'],
                            ];
                        ?>
                        <h4><?php echo $ci_linksTitle[$cl]; ?></h4>
                        <p><?php echo $ci_links[$cl][0]; ?></p>
                        <p><?php echo $ci_links[$cl][1]; ?></p>
                        <p><?php echo $ci_links[$cl][2]; ?></p>

                    </div>
                </div>
            </div>

            <div class="footer-info-bar">
                <p>Desarrollado por el equipo SGE | Proyecto de apoyo 2002 - EE Informática</p>
            </div>
        </footer>
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