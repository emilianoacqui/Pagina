<!DOCTYPE html>
<?php if (session_status() === PHP_SESSION_NONE) { session_start(); } $cl = $_SESSION['lang'] ?? 'es'; ?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casa dei Bambini - Scuola Italiana di Montevideo</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@400;700&family=Crimson+Pro:wght@400;600;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="breadcrumbs.css">
    <link rel="stylesheet" href="../css/Bambini.css">
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
            <img src="FOTOS/fotosClases/Bambini4.jpg" alt="Casa dei Bambini" class="hero-image">
        </section>
        <div id="breadcrumbs" class="breadcrumbs-container"></div>


        <!-- Title Section -->
        <?php 
            $bb = [
                'subtitle' => [
                    'es' => '¡Bienvenidos al espacio mundialmente conocido de María Montessori!<br/>En nuestra "Casa dei Bambini" acompañamos el crecimiento de niños entre 2 y 5 años.<br/>Salas amplias y luminosas, rodeadas de un parque natural, guían la propuesta pedagógica.<br/>Centro modelo Montessori desde hace más de 90 años, atendemos autoestima, autonomía y respeto.<br/>El ambiente preparado facilita el autodesarrollo, con docentes y técnicos en formación constante.',
                    'en' => 'Welcome to the world‑renowned space of Maria Montessori!<br/>At our "Casa dei Bambini" we accompany children from ages 2 to 5.<br/>Bright, spacious rooms surrounded by nature guide our pedagogy.<br/>A Montessori model center for over 90 years, we foster self‑esteem, autonomy and respect.<br/>The prepared environment enables self‑development, led by continuously trained educators.',
                    'it' => 'Benvenuti nello spazio riconosciuto in tutto il mondo di Maria Montessori!<br/>Nella nostra "Casa dei Bambini" accompagniamo i bambini dai 2 ai 5 anni.<br/>Aule ampie e luminose immerse nel verde guidano la proposta pedagogica.<br/>Centro modello Montessori da oltre 90 anni, curiamo autostima, autonomia e rispetto.<br/>L’ambiente preparato favorisce l’auto‑sviluppo, con educatori in formazione continua.',
                ],
                'sec1' => [
                    'es' => 'Una fortaleza del material Montessori es que todo tiene un propósito definido. Los niños aprenden con alegría investigando con recursos que despiertan su curiosidad. Este material acompaña todos los procesos en Casa dei Bambini y les permite construir su propio aprendizaje. Siguiendo sus intereses, eligen libremente, desarrollan concentración y comparten la alegría de aprender. Así, naturalmente, llegan los idiomas: italiano e inglés se asimilan como la lengua materna.',
                    'en' => 'A strength of Montessori materials is that everything has a clear purpose. Children learn joyfully by exploring resources that spark curiosity. These materials support every process at Casa dei Bambini, enabling children to build their own learning. Following their interests, they choose freely, develop focus and share the joy of learning. Languages come naturally: Italian and English are absorbed like the mother tongue.',
                    'it' => 'Un punto di forza dei materiali Montessori è che tutto ha uno scopo preciso. I bambini imparano con gioia esplorando risorse che stimolano la curiosità. Questi materiali sostengono ogni processo nella Casa dei Bambini, permettendo ai piccoli di costruire il proprio apprendimento. Seguendo i loro interessi, scelgono liberamente, sviluppano concentrazione e condividono la gioia di imparare. Le lingue arrivano naturalmente: italiano e inglese si assimilano come la lingua madre.',
                ],
                'sec2' => [
                    'es' => 'En los primeros años se adquieren destrezas fundamentales. Contamos con espacios de estimulación, coordinación y equilibrio donde la práctica y el descubrimiento se hacen presentes. Dentro del horario escolar se dictan psicomotricidad, educación física, danza y música, con opción de ballet. Aprender disfrutando y generando vínculos es nuestra consigna.',
                    'en' => 'In the early years, foundational skills are acquired. We offer spaces for stimulation, coordination and balance where practice and discovery are present. During school hours we include psychomotricity, physical education, dance and music, with optional ballet. Learning with joy and building bonds is our motto.',
                    'it' => 'Nei primi anni si acquisiscono abilità fondamentali. Offriamo spazi di stimolazione, coordinazione ed equilibrio dove pratica e scoperta sono presenti. In orario scolastico includiamo psicomotricità, educazione fisica, danza e musica, con balletto opzionale. Imparare divertendosi e creando legami è il nostro motto.',
                ],
                'sec3' => [
                    'es' => 'Comprender y comunicarse en más de una lengua es esencial desde temprana edad. La inmersión temprana en una segunda y tercera lengua replica el recorrido natural de la lengua materna. Este es el momento de acercarlos a un ambiente multicultural para adquirir herramientas comunicativas que se perfeccionarán con el tiempo.',
                    'en' => 'Understanding and communicating in more than one language is essential from an early age. Early immersion in a second and third language mirrors the natural path of the mother tongue. This is the time to introduce a multicultural environment and build communication tools that will mature over time.',
                    'it' => 'Comprendere e comunicare in più lingue è essenziale fin da piccoli. L’immersione precoce in una seconda e terza lingua ripercorre il percorso naturale della lingua madre. È il momento di introdurre un ambiente multiculturale e costruire strumenti comunicativi che si perfezioneranno nel tempo.',
                ],
                'sec4' => [
                    'es' => 'Aprender italiano en la Scuola es mucho más que una lengua: es identidad. Italia significa arte, música, moda, gastronomía y tradiciones, con el mayor número de sitios UNESCO del mundo. El italiano permitirá cerrar el círculo académico con una Maturità internacional en ese idioma.',
                    'en' => 'Learning Italian at the Scuola is more than a language: it is identity. Italy means art, music, fashion, cuisine and traditions, with the highest number of UNESCO sites in the world. Italian enables completing the academic journey with an international Maturità in that language.',
                    'it' => 'Imparare l’italiano alla Scuola è molto più di una lingua: è identità. L’Italia significa arte, musica, moda, cucina e tradizioni, con il maggior numero di siti UNESCO al mondo. L’italiano permette di completare il percorso accademico con una Maturità internazionale in quella lingua.',
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
                <span class="blue-text">Casa dei </span>
                <span class="red-text">Bambini</span>
            </h1>
            <p class="subtitle"><?php echo $bb['subtitle'][$cl]; ?></p>
        </section>

        <!-- Content Sections -->
        <section class="content-sections">
            <!-- Section 1 -->
            <div class="content-row">
                <div class="text-content left">
                    <p><?php echo $bb['sec1'][$cl]; ?></p>
                </div>

                <div class="image-content right">
                    <img src="FOTOS/fotosClases/bambini1.jpg" alt="Actividades Montessori">
                </div>
            </div>

            <!-- Section 2 -->
            <div class="content-row reverse">
                <div class="image-content left">
                    <img src="FOTOS/fotosClases/bambini2.jpg" alt="Psicomotricidad">
                </div>
                <div class="text-content right">
                    <p><?php echo $bb['sec2'][$cl]; ?></p>
                </div>

            </div>

            <!-- Section 3 -->
            <div class="content-row">
                <div class="text-content left">
                    <p><?php echo $bb['sec3'][$cl]; ?></p>
                </div>

                <div class="image-content right">
                    <img src="FOTOS/fotosClases/bambini3.jpg" alt="Idiomas">
                </div>
            </div>

            <!-- Section 4 -->
            <div class="content-row reverse">
                <div class="image-content left">
                    <img src="FOTOS/fotosClases/bambini4.jpg" alt="Italiano">
                </div>
                <div class="text-content right">
                    <p><?php echo $bb['sec4'][$cl]; ?></p>
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
                <img src="FOTOS/fotosClases/Bambini1.jpg" alt="Galería 1">
                <img src="FOTOS/fotosClases/bambini2.jpg" alt="Galería 2">
                <img src="FOTOS/fotosClases/Bambini3.jpg" alt="Galería 3">
                <img src="FOTOS/fotosClases/Bambini4.jpg" alt="Galería 4">
                <img src="FOTOS/fotosClases/Bambini1.jpg" alt="Galería 5">
                <img src="FOTOS/fotosClases/bambini2.jpg" alt="Galería 6">
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
                    <h4><?php echo $bb['contact'][$cl]; ?></h4>

                    <p>Av. Brasil 3149, Montevideo</p>
                    <p>(+598) 2621 4822 / 2622 1422</p>
                    <p>info@scuolaitaliana.edu.uy</p>
                </div>
            </div>
            
            <div class="footer-right">
                <div class="footer-section">
                    <h4><?php echo $bb['links'][$cl]; ?></h4>
                    <p><?php echo $bb['link_items'][$cl][0]; ?></p>
                    <p><?php echo $bb['link_items'][$cl][1]; ?></p>
                    <p><?php echo $bb['link_items'][$cl][2]; ?></p>

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