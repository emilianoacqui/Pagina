<!DOCTYPE html>
<?php if (session_status() === PHP_SESSION_NONE) { session_start(); } $cl = $_SESSION['lang'] ?? 'es'; ?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php $ba_meta=['es'=>'Bachillerato - Scuola Italiana di Montevideo','en'=>'Upper Secondary - Scuola Italiana di Montevideo','it'=>'Liceo - Scuola Italiana di Montevideo']; echo $ba_meta[$cl]; ?></title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@400;700&family=Crimson+Pro:wght@400;600;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="breadcrumbs.css">
    <link rel="stylesheet" href="../css/bachillerato.css">
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
        <!-- Color Header Bands -->
        <div class="color-bands">
            <div class="green-band"></div>
            <div class="red-band"></div>
        </div>

        <!-- Hero Image -->
        <section class="hero-section">
            <img src="FOTOS/fotosClases/bachillerato1.jpg" alt="Casa dei Bambini" class="hero-image">
        </section>
        <div id="breadcrumbs" class="breadcrumbs-container"></div>

        <!-- Title Section -->
        <?php 
            $ba = [
                'title' => ['es'=>'Bachillerato','en'=>'Upper Secondary','it'=>'Liceo'],
                'subtitle' => [
                    'es' => 'En Bachillerato (Educación Media Superior) profundizamos el trabajo académico con mayores niveles de especialización por orientación y proyectos interdisciplinarios. Acompañamos la preparación para estudios terciarios y certificaciones internacionales, fortaleciendo autonomía, pensamiento crítico y competencias comunicativas en español, italiano e inglés.',
                    'en' => 'In Upper Secondary we deepen academic work with increasing specialization by track and interdisciplinary projects. We support preparation for tertiary studies and international certifications, strengthening autonomy, critical thinking and communication skills in Spanish, Italian and English.',
                    'it' => 'Nel Liceo approfondiamo il lavoro accademico con maggiore specializzazione per indirizzo e progetti interdisciplinari. Accompagniamo la preparazione agli studi terziari e alle certificazioni internazionali, rafforzando autonomia, pensiero critico e competenze comunicative in spagnolo, italiano e inglese.',
                ],
                'sec1' => [
                    'es' => 'Promovemos el trabajo cooperativo, la interdisciplinariedad, la reflexión, estrategias metacognitivas y la autonomía en el estudio, para que el alumno sea independiente en la adquisición de nuevos saberes.',
                    'en' => 'We promote cooperative work, interdisciplinarity, reflection, metacognitive strategies and study autonomy so that students become independent in acquiring new knowledge.',
                    'it' => 'Promuoviamo il lavoro cooperativo, l’interdisciplinarità, la riflessione, strategie metacognitive e l’autonomia nello studio affinché lo studente sia indipendente nell’acquisire nuove conoscenze.',
                ],
                'objectives_h' => ['es'=>'Objetivos:','en'=>'Objectives:','it'=>'Obiettivi:'],
                'objectives' => [
                    'es' => [
                        'Desarrollo integral: afectivo, cognitivo y vincular.',
                        'Potenciar competencias comunicativas en español, italiano e inglés.',
                        'Promover creatividad, curiosidad y autonomía.',
                        'Favorecer aprendizajes según características y potencial de cada estudiante.',
                        'Educar en ciudadanía, convivencia democrática y paz.',
                        'Educar en interculturalidad y aceptación de la diversidad.',
                        'Educar en comunicación artístico‑expresiva.',
                        'Trabajar con método científico: observar y analizar hechos y fenómenos.',
                        'Promover conciencia ecológica y defensa del medio ambiente.',
                    ],
                    'en' => [
                        'Integral development: affective, cognitive and relational.',
                        'Enhance communication skills in Spanish, Italian and English.',
                        'Promote creativity, curiosity and autonomy.',
                        'Foster learning according to each student’s traits and potential.',
                        'Educate for citizenship, democratic coexistence and peace.',
                        'Educate for interculturality and acceptance of diversity.',
                        'Educate for artistic‑expressive communication.',
                        'Work with the scientific method: observe and analyze facts and phenomena.',
                        'Promote ecological awareness and environmental protection.',
                    ],
                    'it' => [
                        'Sviluppo integrale: affettivo, cognitivo e relazionale.',
                        'Potenziare le competenze comunicative in spagnolo, italiano e inglese.',
                        'Promuovere creatività, curiosità e autonomia.',
                        'Favorire gli apprendimenti secondo caratteristiche e potenziale di ciascuno.',
                        'Educare alla cittadinanza, convivenza democratica e pace.',
                        'Educare all’interculturalità e all’accettazione della diversità.',
                        'Educare alla comunicazione artistico‑espressiva.',
                        'Lavorare con il metodo scientifico: osservare e analizzare fatti e fenomeni.',
                        'Promuovere la coscienza ecologica e la tutela dell’ambiente.',
                    ],
                ],
                'scuola_h' => ['es'=>'SCUOLA SECONDARIA DI I GRADO ITALIANA','en'=>'ITALIAN LOWER SECONDARY SCHOOL','it'=>'SCUOLA SECONDARIA DI I GRADO ITALIANA'],
                'scuola_p' => [
                    'es' => 'Nuestro Plan de Estudios Integrado, reconocido por Italia y Uruguay, permite continuar en el Bachillerato Internacional Europeo. Al finalizar se obtiene doble titulación, habilitando estudios terciarios en Uruguay, Italia y otros países donde es reconocido.',
                    'en' => 'Our Integrated Study Plan, recognized by Italy and Uruguay, enables continuation in the European International Baccalaureate. Upon completion, students obtain a dual diploma allowing tertiary studies in Uruguay, Italy and other countries where it is recognized.',
                    'it' => 'Il nostro Piano di Studi Integrato, riconosciuto da Italia e Uruguay, consente di proseguire nel Baccalaureato Internazionale Europeo. Al termine si ottiene una doppia titolazione che abilita agli studi terziari in Uruguay, Italia e in altri paesi dove è riconosciuta.',
                ],
                'final_p' => [
                    'es' => 'La Secundaria de la Scuola Italiana di Montevideo es Paritaria para Italia y Habilitada para Uruguay. Estudiantes de otras instituciones pueden incorporarse a la Scuola Paritaria bajo ciertos requisitos.',
                    'en' => 'The Secondary School of the Scuola Italiana di Montevideo is Paritaria for Italy and authorized for Uruguay. Students from other institutions may join the Paritaria School under certain requirements.',
                    'it' => 'La Scuola Secondaria della Scuola Italiana di Montevideo è Paritaria per l’Italia e Abilitata per l’Uruguay. Studenti di altre istituzioni possono inserirsi nella Scuola Paritaria a determinate condizioni.',
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
        <section class="title-section">
            <h1 class="main-title">
                <span class="blue-text"><?php echo $ba['title'][$cl]; ?> </span>
                
            </h1>
            <p class="subtitle"><?php echo $ba['subtitle'][$cl]; ?></p>
        </section>

        <!-- Content Sections -->
        <section class="content-sections">
            <!-- Section 1 -->
            <div class="content-row">
                <div class="text-content left">
                    <p><?php echo $ba['sec1'][$cl]; ?></p>
                </div>

                <div class="image-content right">
                    <img src="FOTOS/fotosClases/bachillerato2.jpg" alt="Actividades Montessori">
                </div>
            </div>

            <!-- Section 2 -->
            <div class="content-row reverse">
                <div class="image-content left">
                    <img src="FOTOS/fotosClases/bachillerato3.jpg" alt="Psicomotricidad">
                </div>
                <div class="text-content right">
                    <p><strong><?php echo $ba['objectives_h'][$cl]; ?></strong><br>
                    <?php foreach ($ba['objectives'][$cl] as $i => $obj): ?>
                        <?php echo ($i+1).'.&nbsp;&nbsp;'.$obj; ?><br>
                    <?php endforeach; ?></p>
                </div>

            </div>

            <!-- Section 3 -->
            <div class="content-row">
                <div class="text-content left">
                    <p> <strong><?php echo $ba['scuola_h'][$cl]; ?></strong><br><br>
                    <?php echo $ba['scuola_p'][$cl]; ?></p>
                </div>

                <div class="image-content right">
                    <img src="FOTOS/fotosClases/bachillerato4.jpg" alt="Idiomas">
                </div>
            </div>

            <!-- Section 4 -->
            <div class="content-row reverse">
                <div class="image-content left">
                    <img src="FOTOS/fotosClases/bachillerato5.jpg" alt="Italiano">
                </div>
                <div class="text-content right">
                    <p><?php echo $ba['final_p'][$cl]; ?></p>
                </div>

            </div>
        </section>

        <!-- Gallery Section -->
        <section class="gallery-section">
            <div class="gallery-separator">
                <div class="line left-line"></div>
                <div class="gallery-icon">
                    <i class="fas fa-camera"></i>
                </div>
                <div class="line right-line"></div>
            </div>
            <div class="gallery-grid">
                <img src="FOTOS/fotosClases/bachillerato1.jpg" alt="Galería 1">
                <img src="FOTOS/fotosClases/bachillerato2.jpg" alt="Galería 2">
                <img src="FOTOS/fotosClases/bachillerato3.jpg" alt="Galería 3">
                <img src="FOTOS/fotosClases/bachillerato4.jpg" alt="Galería 4">
                <img src="FOTOS/fotosClases/bachillerato5.jpg" alt="Galería 5">
                <img src="FOTOS/fotosClases/bachillerato1.jpg" alt="Galería 6">
            </div>
        </section>

        <!-- Footer Image -->
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
                    <h4><?php echo $ba['contact'][$cl]; ?></h4>

                    <p>Gral. French 2380</p>
                    <p>CP 11500 - Montevideo, Uruguay</p>
                    <p>(+598) 2600 1527</p>
                    <p>info@scuolaitaliana.edu.uy</p>
                </div>
            </div>
            
            <div class="footer-right">
                <div class="footer-section">
                    <h4><?php echo $ba['links'][$cl]; ?></h4>
                    <p><?php echo $ba['link_items'][$cl][0]; ?></p>
                    <p><?php echo $ba['link_items'][$cl][1]; ?></p>
                    <p><?php echo $ba['link_items'][$cl][2]; ?></p>

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

        // Tab functionality
        document.querySelectorAll('.tab-item').forEach(tab => {
            tab.addEventListener('click', function() {
                document.querySelectorAll('.tab-item').forEach(t => t.classList.remove('active'));
                this.classList.add('active');
            });
        });
    </script>
    <script src="breadcrumbs.js"></script>
    <script src="cms-admin.js"></script>
    <script src="analytics.js"></script>
</body>
</html>