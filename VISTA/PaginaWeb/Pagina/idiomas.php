<!DOCTYPE html>
<?php if (session_status() === PHP_SESSION_NONE) { session_start(); } $cl = $_SESSION['lang'] ?? 'es'; ?>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php $id_meta=['es'=>'Idiomas','en'=>'Languages','it'=>'Lingue']; echo $id_meta[$cl]; ?></title>

    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="breadcrumbs.css">
    <link rel="stylesheet" href="../css/idiomas.css">
    
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
        $id = [
            'hero_t' => ['es'=>'Nuestros idiomas','en'=>'Our Languages','it'=>'Le nostre lingue'],
            'hero_s' => ['es'=>'Descubre todo lo que hace especial a la Scuola Italiana di Montevideo','en'=>'Discover what makes the Scuola Italiana di Montevideo special','it'=>'Scopri cosa rende speciale la Scuola Italiana di Montevideo'],
            'sect_t' => ['es'=>'Nuestros idiomas','en'=>'Our Languages','it'=>'Le nostre lingue'],
            'en_h' => ['es'=>'Inglés','en'=>'English','it'=>'Inglese'],
            'en_p' => ['es'=>'Programa de inglés con enfoque comunicativo y progresión por niveles; fortalecemos comprensión auditiva, producción oral, lectura y escritura.','en'=>'English program with a communicative approach and level progression; we strengthen listening, speaking, reading and writing.','it'=>'Programma di inglese con approccio comunicativo e progressione per livelli; potenziamo ascolto, produzione orale, lettura e scrittura.'],
            'it_h' => ['es'=>'Italiano','en'=>'Italian','it'=>'Italiano'],
            'it_p' => ['es'=>'Italiano como lengua de identidad y cultura; aprendizaje integrado con proyectos bilingües y preparación para certificaciones.','en'=>'Italian as a language of identity and culture; integrated learning with bilingual projects and preparation for certifications.','it'=>'L’italiano come lingua di identità e cultura; apprendimento integrato con progetti bilingui e preparazione alle certificazioni.'],
            'pt_h' => ['es'=>'Portugués','en'=>'Portuguese','it'=>'Portoghese'],
            'pt_p' => ['es'=>'Portugués orientado a contextos cotidianos y académicos, con práctica oral constante y actividades culturales.','en'=>'Portuguese oriented to everyday and academic contexts, with steady speaking practice and cultural activities.','it'=>'Portoghese orientato a contesti quotidiani e accademici, con pratica orale costante e attività culturali.'],
            'contact' => ['es'=>'Contacto','en'=>'Contact','it'=>'Contatto'],
            'links' => ['es'=>'Enlaces útiles','en'=>'Useful links','it'=>'Link utili'],
            'link_items' => [
                'es' => ['Política de privacidad','Requisitos técnicos','Accesibilidad'],
                'en' => ['Privacy Policy','Technical Requirements','Accessibility'],
                'it' => ['Informativa sulla privacy','Requisiti tecnici','Accessibilità'],
            ],
        ];
    ?>
    <section class="hero editable-image" style="background-image: url('FOTOS/fotosPrincipales/idiomas.jpg'); margin-top: 0px;">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1 class="hero-title editable-text"><?php echo $id['hero_t'][$cl]; ?></h1>
            <p class="hero-subtitle editable-text"><?php echo $id['hero_s'][$cl]; ?></p>
        </div>
    </section>

    <div id="breadcrumbs" class="breadcrumbs-container"></div>

    <!-- Main Content -->
    <main class="main-content">
            <section class="features">
                <div class="container">
                    <h2 class="section-title editable-text"><?php echo $id['sect_t'][$cl]; ?></h2>

                    <div class="features-grid">
                        <div class="feature-card">
                            <h3 class="editable-text"><?php echo $id['en_h'][$cl]; ?></h3>
                            <p class="editable-text"><?php echo $id['en_p'][$cl]; ?></p>

                        </div>
                        <div class="feature-card">
                            <h3 class="editable-text"><?php echo $id['it_h'][$cl]; ?></h3>
                            <p class="editable-text"><?php echo $id['it_p'][$cl]; ?></p>

                        </div>
                        <div class="feature-card">
                            <h3 class="editable-text"><?php echo $id['pt_h'][$cl]; ?></h3>
                            <p class="editable-text"><?php echo $id['pt_p'][$cl]; ?></p>

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
                    <h4><?php echo $id['contact'][$cl]; ?></h4>

                    <p>Av. Brasil 3149, Montevideo</p>
                    <p>(+598) 2621 4822 / 2622 1422</p>
                    <p>info@scuolaitaliana.edu.uy</p>
                </div>
            </div>
            
            <div class="footer-right">
                <div class="footer-section">
                    <h4><?php echo $id['links'][$cl]; ?></h4>
                    <p><?php echo $id['link_items'][$cl][0]; ?></p>
                    <p><?php echo $id['link_items'][$cl][1]; ?></p>
                    <p><?php echo $id['link_items'][$cl][2]; ?></p>

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