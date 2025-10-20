<!DOCTYPE html>
<?php
if (session_status() === PHP_SESSION_NONE) { session_start(); }
$cl = $_SESSION['lang'] ?? 'es'; // 'es' | 'en' | 'it'
?>
<html lang="<?php echo $cl; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casa dei Bambini - Scuola Italiana di Montevideo</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@400;700&family=Crimson+Pro:wght@400;600;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/Primaria.css">
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
            <img src="FOTOS/fotosClases/Primaria1.jpg" alt="Casa dei Bambini" class="hero-image">
        </section>
        <div id="breadcrumbs" class="breadcrumbs-container"></div>

        <!-- Title Section -->
        <?php 
            $p_texts = [
                'title' => [
                    'es' => 'Primaria',
                    'en' => 'Primary',
                    'it' => 'Primaria',
                ],
                'subtitle' => [
                    'es' => 'Padres y maestros queremos para nuestros niños una escuela que les brinde opciones globales para su futuro, en un ambiente de alto nivel académico y en el que todos tengan la oportunidad de aprender, con técnicos capacitados y vocación de enseñar.',
                    'en' => 'Parents and teachers want a school that offers our children global opportunities for their future, with high academic standards and equal chances to learn, guided by trained educators with a true vocation to teach.',
                    'it' => 'Genitori e insegnanti desideriamo una scuola che offra ai nostri bambini opportunità globali per il loro futuro, con alto livello accademico e pari possibilità di apprendere, guidati da educatori formati e con vera vocazione all’insegnamento.',
                ],
            ];
        ?>
        <section class="title-section">
            <h1 class="main-title">
                <span class="blue-text"><?php echo $p_texts['title'][$cl]; ?> </span>
            </h1>
            <p class="subtitle"><?php echo $p_texts['subtitle'][$cl]; ?></p>
        </section>

        <!-- Content Sections -->
        <section class="content-sections">
            <!-- Section 1 -->
            <div class="content-row">
                <div class="text-content left">
                    <?php 
                        $p_sec1 = [
                            'es' => 'En Primaria somos un equipo de profesionales que trabaja formando personas capaces de interpelar y crear conciencia sobre el mundo que los rodea, frente a los cambios que se perciben día a día en la sociedad.',
                            'en' => 'In Primary we are a team of professionals shaping students who question and understand the world around them, ready to face the everyday changes of society.',
                            'it' => 'Alla Primaria siamo un team di professionisti che forma persone capaci di interrogarsi e comprendere il mondo che le circonda, di fronte ai cambiamenti quotidiani della società.',
                        ];
                    ?>
                    <p><?php echo $p_sec1[$cl]; ?></p>
                </div>

                <div class="image-content right">
                    <img src="FOTOS/fotosClases/Primaria2.jpg" alt="Actividades Montessori">
                </div>
            </div>

            <!-- Section 2 -->
            <div class="content-row reverse">
                <div class="image-content left">
                    <img src="FOTOS/fotosClases/Primaria3.jpg" alt="Psicomotricidad">
                </div>
                <div class="text-content right">
                    <?php 
                        $p_sec2 = [
                            'es' => 'Renovamos año a año ese desafío convencidos de ofrecer una enseñanza con altas expectativas, formando personas comprensivas y competentes, priorizando valores, actitudes y sentimientos de auténticos ciudadanos del mundo. La educación es motor de innovación y la mejor herramienta para construir un futuro mejor.',
                            'en' => 'We renew this challenge every year, offering high‑expectation teaching to form understanding and competent individuals, prioritizing values, attitudes and a global citizenship mindset. Education drives innovation and is the best tool to build a better future.',
                            'it' => 'Rinnoviamo ogni anno questa sfida, offrendo un insegnamento ad alte aspettative per formare persone comprensive e competenti, dando priorità ai valori, alle attitudini e a una mentalità di cittadinanza globale. L’educazione è motore d’innovazione e la migliore leva per costruire un futuro migliore.',
                        ];
                    ?>
                    <p><?php echo $p_sec2[$cl]; ?></p>
                </div>

            </div>

            <!-- Section 3 -->
            <div class="content-row">
                <div class="text-content left">
                    <?php 
                        $p_quote = [
                            'es' => '“Sembrad en los niños ideas buenas, aunque no las entiendan: los años se encargarán de descifrarlas y de hacerlas florecer en su corazón.” — M. Montessori',
                            'en' => '“Plant good ideas in children, even if they do not understand them: years will decode them and make them flourish in their hearts.” — M. Montessori',
                            'it' => '“Seminate nei bambini buone idee, anche se non le comprendono: gli anni le decifreranno e le faranno fiorire nei loro cuori.” — M. Montessori',
                        ];
                    ?>
                    <p><?php echo $p_quote[$cl]; ?></p>
                </div>

                <div class="image-content right">
                    <img src="FOTOS/fotosClases/Primaria4.jpeg" alt="Idiomas">
                </div>
            </div>

            <!-- Section 4 -->
            <div class="content-row reverse">
                <div class="image-content left">
                    <img src="FOTOS/fotosClases/Primaria5.jpg" alt="Italiano">
                </div>
                <div class="text-content right">
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
                <img src="FOTOS/fotosClases/Primaria1.jpg" alt="Galería 1">
                <img src="FOTOS/fotosClases/Primaria2.jpg" alt="Galería 2">
                <img src="FOTOS/fotosClases/Primaria3.jpg" alt="Galería 3">
                <img src="FOTOS/fotosClases/Primaria4.jpeg" alt="Galería 4">
                <img src="FOTOS/fotosClases/Primaria5.jpg" alt="Galería 5">
                <img src="FOTOS/fotosClases/Primaria1.jpg" alt="Galería 6">
            </div>
        </section>

        <!-- Footer Image -->
    </main>

    <!-- Footer -->
    <footer class="footer-bottom-new">
        <div class="footer-container">
            <div class="footer-Aleft">
                <div class="footer-logo">
                    <img src="fotosPrincipales/logotipo.png" alt="Scuola Italiana di Montevideo" style="height: 60px;">
                </div>
                <div class="footer-subtitle">
                    <p>Scuola Italiana di Montevideo</p>
                </div>
            </div>
            
            <div class="footer-center">
                <div class="footer-section">
                    <?php $p_contact = ['es' => 'Contacto','en' => 'Contact','it' => 'Contatto']; ?>
                    <h4><?php echo $p_contact[$cl]; ?></h4>

                    <p>Gral. French 2380</p>
                    <p>CP 11500 - Montevideo, Uruguay</p>
                    <p>(+598) 2600 1527</p>
                    <p>info@scuolaitaliana.edu.uy</p>
                </div>
            </div>
            
            <div class="footer-right">
                <div class="footer-section">
                    <?php 
                        $p_linksTitle = ['es' => 'Enlaces útiles','en' => 'Useful links','it' => 'Link utili'];
                        $p_links = [
                            'es' => ['Política de privacidad','Requisitos técnicos','Accesibilidad'],
                            'en' => ['Privacy Policy','Technical Requirements','Accessibility'],
                            'it' => ['Informativa sulla privacy','Requisiti tecnici','Accessibilità'],
                        ];
                    ?>
                    <h4><?php echo $p_linksTitle[$cl]; ?></h4>
                    <p><?php echo $p_links[$cl][0]; ?></p>
                    <p><?php echo $p_links[$cl][1]; ?></p>
                    <p><?php echo $p_links[$cl][2]; ?></p>

                </div>
            </div>
        </div>
        
        <div class="footer-info-bar">
            <p>Desarrollado por el equipo SGE | Proyecto de apoyo 2002 - EE Informática</p>
        </div>
    </footer>
<link rel="stylesheet" href="breadcrumbs.css">

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