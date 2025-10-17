<!DOCTYPE html>
<?php if (session_status() === PHP_SESSION_NONE) { session_start(); } $cl = $_SESSION['lang'] ?? 'es'; ?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BBSIM - Scuola Italiana di Montevideo</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@400;700&family=Crimson+Pro:wght@400;600;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="breadcrumbs.css">
    <link rel="stylesheet" href="../css/BBSIM.css">
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
            <img src="FOTOS/fotosClases/BBSIM1.jpg" alt="BBSIM" class="hero-image">
        </section>
        <div id="breadcrumbs" class="breadcrumbs-container"></div>


        <!-- Title Section -->
        <?php 
            $bs = [
                'subtitle' => [
                    'es' => '¡Benvenuto! Estás conociendo el espacio educativo de estimulación temprana más completo y moderno del país.<br/>Acompañamos el crecimiento entre los 3 y 24 meses en un ambiente cuidadosamente preparado para satisfacer todas las necesidades de desarrollo de esta etapa.<br/>BBSIM cuenta con un equipo de profesionales altamente calificado, brindando experiencias que favorecen independencia y autonomía.',
                    'en' => 'Benvenuto! You are discovering one of the most complete and modern early‑stimulation educational spaces in the country.<br/>We accompany growth from 3 to 24 months in a carefully prepared environment that meets every developmental need of this stage.<br/>BBSIM has a highly qualified professional team, offering experiences that foster independence and autonomy.',
                    'it' => 'Benvenuto! Stai scoprendo uno degli spazi educativi di stimolazione precoce più completi e moderni del paese.<br/>Accompagniamo la crescita dai 3 ai 24 mesi in un ambiente accuratamente preparato per soddisfare i bisogni di sviluppo di questa fase.<br/>BBSIM conta su un team altamente qualificato che offre esperienze che favoriscono indipendenza e autonomia.',
                ],
                'sec1' => [
                    'es' => 'Una fortaleza del material Montessori es que todo tiene un propósito definido. Los niños aprenden con alegría explorando recursos que despiertan su curiosidad. Este material acompaña todos los procesos y les permite construir su propio aprendizaje, eligiendo libremente, desarrollando concentración y compartiendo la alegría de aprender. Los idiomas llegan de forma natural: italiano e inglés se asimilan como la lengua materna.',
                    'en' => 'A strength of Montessori materials is that everything has a clear purpose. Children learn joyfully by exploring resources that spark curiosity. These materials support all processes and allow children to build their own learning, choosing freely, developing focus and sharing the joy of learning. Languages come naturally: Italian and English are absorbed like the mother tongue.',
                    'it' => 'Un punto di forza dei materiali Montessori è che tutto ha uno scopo chiaro. I bambini imparano con gioia esplorando risorse che stimolano la curiosità. Questi materiali sostengono tutti i processi e consentono ai bambini di costruire il proprio apprendimento, scegliendo liberamente, sviluppando concentrazione e condividendo la gioia di imparare. Le lingue arrivano naturalmente: italiano e inglese si assimilano come la lingua madre.',
                ],
                'sec2' => [
                    'es' => 'En los primeros años se adquieren destrezas fundamentales. Contamos con espacios de estimulación, coordinación y equilibrio donde la práctica y el descubrimiento se hacen presentes. En el horario escolar se dictan psicomotricidad, educación física, danza y música, con opción de ballet. Aprender disfrutando y generando vínculos es nuestra consigna.',
                    'en' => 'Foundational skills are acquired in the early years. We offer spaces for stimulation, coordination and balance where practice and discovery are present. During school hours we include psychomotricity, physical education, dance and music, with optional ballet. Learning with joy and building bonds is our motto.',
                    'it' => 'Nei primi anni si acquisiscono abilità fondamentali. Offriamo spazi di stimolazione, coordinazione ed equilibrio dove pratica e scoperta sono presenti. In orario scolastico includiamo psicomotricità, educazione fisica, danza e musica, con balletto opzionale. Imparare divertendosi e creando legami è il nostro motto.',
                ],
                'sec3' => [
                    'es' => 'Comprender y comunicarse en más de una lengua es esencial desde temprana edad. La inmersión temprana en una segunda y tercera lengua replica el recorrido natural de la lengua materna y favorece un desarrollo comunicativo sólido.',
                    'en' => 'Understanding and communicating in more than one language is essential from an early age. Early immersion in a second and third language mirrors the natural path of the mother tongue and supports solid communication development.',
                    'it' => 'Comprendere e comunicare in più lingue è essenziale fin da piccoli. L’immersione precoce in una seconda e terza lingua ripercorre il percorso naturale della lingua madre e favorisce uno sviluppo comunicativo solido.',
                ],
                'sec4' => [
                    'es' => 'Aprender italiano en la Scuola es mucho más que una lengua: es identidad y cultura. Italia significa arte, música, moda, gastronomía y tradiciones; el italiano permite cerrar el círculo académico con una Maturità internacional.',
                    'en' => 'Learning Italian at the Scuola is more than a language: it is identity and culture. Italy means art, music, fashion, cuisine and traditions; Italian enables completing the academic journey with an international Maturità.',
                    'it' => 'Imparare l’italiano alla Scuola è molto più di una lingua: è identità e cultura. L’Italia significa arte, musica, moda, cucina e tradizioni; l’italiano permette di completare il percorso accademico con una Maturità internazionale.',
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
                <span class="blue-text">BBSIM</span>
                
            </h1>
            <p class="subtitle"><?php echo $bs['subtitle'][$cl]; ?></p>
        </section>

        <!-- Content Sections -->
        <section class="content-sections">
            <!-- Section 1 -->
            <div class="content-row">
                <div class="text-content left">
                    <p><?php echo $bs['sec1'][$cl]; ?></p>
                </div>

                <div class="image-content right">
                    <img src="FOTOS/fotosClases/BBSIM1.jpg" alt="Actividades Montessori">
                </div>
            </div>

            <!-- Section 2 -->
            <div class="content-row reverse">
                <div class="image-content left">
                    <img src="FOTOS/fotosClases/BBSIM2.jpg" alt="Psicomotricidad">
                </div>
                <div class="text-content right">
                    <p><?php echo $bs['sec2'][$cl]; ?></p>
                </div>

            </div>

            <!-- Section 3 -->
            <div class="content-row">
                <div class="text-content left">
                    <p><?php echo $bs['sec3'][$cl]; ?></p>
                </div>

                <div class="image-content right">
                    <img src="FOTOS/fotosClases/BBSIM3.jpg" alt="Idiomas">
                </div>
            </div>

            <!-- Section 4 -->
            <div class="content-row reverse">
                <div class="image-content left">
                    <img src="FOTOS/fotosClases/BBSIM4.jpg" alt="Italiano">
                </div>
                <div class="text-content right">
                    <p><?php echo $bs['sec4'][$cl]; ?></p>
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
                <img src="FOTOS/fotosClases/BBSIM5.jpg" alt="Galería 1">
                <img src="FOTOS/fotosClases/BBSIM1.jpg" alt="Galería 2">
                <img src="FOTOS/fotosClases/BBSIM2.jpg" alt="Galería 3">
                <img src="FOTOS/fotosClases/BBSIM3.jpg" alt="Galería 4">
                <img src="FOTOS/fotosClases/BBSIM4.jpg" alt="Galería 5">
                <img src="FOTOS/fotosClases/BBSIM5.jpg" alt="Galería 6">
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
                    <h4><?php echo $bs['contact'][$cl]; ?></h4>
                    <p>Av. Brasil 3149, Montevideo</p>
                    <p>(+598) 2621 4822 / 2622 1422</p>
                    <p>info@scuolaitaliana.edu.uy</p>
                </div>
            </div>
            
            <div class="footer-right">
                <div class="footer-section">
                    <h4><?php echo $bs['links'][$cl]; ?></h4>
                    <p><?php echo $bs['link_items'][$cl][0]; ?></p>
                    <p><?php echo $bs['link_items'][$cl][1]; ?></p>
                    <p><?php echo $bs['link_items'][$cl][2]; ?></p>
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