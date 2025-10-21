<!DOCTYPE html>
<?php if (session_status() === PHP_SESSION_NONE) { session_start(); } if (isset($_GET['lang']) && in_array($_GET['lang'], ['es','en','it'])) { $_SESSION['lang'] = $_GET['lang']; } $cl = $_SESSION['lang'] ?? 'es'; ?>
<html lang="<?php echo $cl; ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php $pe_meta=['es'=>'Propuesta Ecológica - Scuola Italiana','en'=>'Ecological Initiative - Scuola Italiana','it'=>'Proposta Ecologica - Scuola Italiana']; echo $pe_meta[$cl]; ?></title>

    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="breadcrumbs.css">
    <link rel="stylesheet" href="../css/PropuestaEcologica.css">
    <link rel="icon" type="image/png" href="/Pagina/VISTA/PaginaWeb/Pagina/FOTOS/fotosPrincipales/logotipo.png">
    <link rel="shortcut icon" href="/Pagina/favicon.ico">
    
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
            'hero_s' => ['es'=>'Educación ambiental, hábitos sostenibles y proyectos con impacto real','en'=>'Environmental education, sustainable habits and projects with real impact','it'=>'Educazione ambientale, abitudini sostenibili e progetti con impatto reale'],
            'hist_h' => ['es'=>'Educación ambiental en la Scuola','en'=>'Environmental education at the Scuola','it'=>'Educazione ambientale alla Scuola'],
            'hist_p1' => ['es'=>'Integramos la sostenibilidad en la vida escolar mediante experiencias concretas: separación y reducción de residuos, compostaje, huertas y cuidado de la biodiversidad en el campus.','en'=>'We integrate sustainability into school life through concrete experiences: sorting and reducing waste, composting, school gardens and biodiversity care on campus.','it'=>'Integriamo la sostenibilità nella vita scolastica con esperienze concrete: raccolta differenziata e riduzione dei rifiuti, compostaggio, orti scolastici e cura della biodiversità nel campus.'],
            'hist_p2' => ['es'=>'Los proyectos ambientales se trabajan en equipo, articulando áreas curriculares y alianzas con la comunidad para generar aprendizajes significativos y cambios de hábito sostenidos.','en'=>'Environmental projects are team‑based, connecting curricular areas and community partnerships to generate meaningful learning and sustained habit changes.','it'=>'I progetti ambientali sono di squadra, collegano le aree curricolari e le partnership con la comunità per generare apprendimenti significativi e cambiamenti di abitudini duraturi.'],
            'feat_h' => ['es'=>'Lo que nos distingue','en'=>'What sets us apart','it'=>'Cosa ci distingue'],
            'f1_h' => ['es'=>'Educación Ambiental','en'=>'Environmental Education','it'=>'Educazione ambientale'],
            'f1_p' => ['es'=>'Integramos sostenibilidad en el currículo con proyectos sobre reciclaje, uso responsable del agua y biodiversidad.','en'=>'We integrate sustainability across the curriculum with projects on recycling, responsible water use and biodiversity.','it'=>'Integriamo la sostenibilità nel curriculum con progetti su riciclo, uso responsabile dell’acqua e biodiversità.'],
            'f2_h' => ['es'=>'Cultura Sostenible','en'=>'Sustainable Culture','it'=>'Cultura sostenibile'],
            'f2_p' => ['es'=>'Promovemos hábitos cotidianos que cuidan el ambiente y fortalecen la participación estudiantil.','en'=>'We promote daily habits that protect the environment and strengthen student participation.','it'=>'Promuoviamo abitudini quotidiane che tutelano l’ambiente e rafforzano la partecipazione degli studenti.'],
            'f3_h' => ['es'=>'Proyectos y Alianzas','en'=>'Projects and Partnerships','it'=>'Progetti e alleanze'],
            'f3_p' => ['es'=>'Desarrollamos acciones de mejora del entorno y articulamos con iniciativas comunitarias y académicas.','en'=>'We develop actions to improve our environment and collaborate with community and academic initiatives.','it'=>'Sviluppiamo azioni di miglioramento del territorio e collaboriamo con iniziative comunitarie e accademiche.'],
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
                    <img src="FOTOS/fotosPrincipales/logo2.png" alt="Scuola Italiana di Montevideo" style="height: 60px;">
                </div>
                <div class="footer-subtitle">
                    <p>Scuola Italiana di Montevideo</p>
                </div>
            </div>
            
            <div class="footer-center">
                <div class="footer-section">
                    <h4><?php echo $pe['contact'][$cl]; ?></h4>

                    <p>Gral. French 2380</p>
                    <p>CP 11500 - Montevideo, Uruguay</p>
                    <p>(+598) 2600 1527</p>
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