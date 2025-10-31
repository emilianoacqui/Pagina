<!DOCTYPE html>
<?php if (session_status() === PHP_SESSION_NONE) { session_start(); } $cl = $_SESSION['lang'] ?? 'es'; ?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>[SPORT_NAME] - Scuola Italiana di Montevideo</title>
    <link rel="icon" type="image/png" href="/Pagina/VISTA/PaginaWeb/Pagina/FOTOS/fotosPrincipales/logotipo.png">
    <link rel="shortcut icon" href="/Pagina/favicon.ico">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Merriweather:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/plantillaDeportes.css">
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
        $pd = [
            'crumb_sports' => ['es'=>'Deportes','en'=>'Sports','it'=>'Sport'],
            'section_tag' => ['es'=>'DEPORTE DESTACADO','en'=>'FEATURED SPORT','it'=>'SPORT IN EVIDENZA'],
            'enfoque_title' => ['es'=>'Nuestro enfoque deportivo','en'=>'Our sports approach','it'=>'Il nostro approccio sportivo'],
            'feat1_h' => ['es'=>'Excelencia deportiva','en'=>'Sports excellence','it'=>'Eccellenza sportiva'],
            'feat1_p' => ['es'=>'Fomentamos la mejora personal y el logro de metas.','en'=>'We foster personal improvement and goal achievement.','it'=>'Promuoviamo il miglioramento personale e il raggiungimento degli obiettivi.'],
            'feat2_h' => ['es'=>'Trabajo en equipo','en'=>'Teamwork','it'=>'Lavoro di squadra'],
            'feat2_p' => ['es'=>'Desarrollamos habilidades sociales y de colaboración.','en'=>'We develop social and collaboration skills.','it'=>'Sviluppiamo abilità sociali e di collaborazione.'],
            'feat3_h' => ['es'=>'Bienestar integral','en'=>'Integral wellbeing','it'=>'Benessere integrale'],
            'feat3_p' => ['es'=>'Impulsamos la salud física y mental de nuestros estudiantes.','en'=>'We promote students’ physical and mental health.','it'=>'Promuoviamo la salute fisica e mentale degli studenti.'],
            'gallery_title' => ['es'=>'Momentos destacados','en'=>'Highlights','it'=>'Momenti salienti'],
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
        <div class="hero-overlay"></div>
        <div class="hero-background">
            <img src="https://placehold.co/1920x800/E8E8E8/666?text=HERO+IMAGE" alt="Atletismo Hero" class="hero-image">
        </div>
        <div class="hero-content">
                <span><?php echo $pd['crumb_sports'][$cl]; ?></span>
                <i class="fas fa-chevron-right"></i>
                <span class="current">[SPORT_NAME]</span>
            </div>
            <h1 class="hero-title">[SPORT_NAME]</h1>
            <p class="hero-subtitle">[SPORT_DESCRIPTION]</p>
        </div>
    </section>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Sport Introduction -->
        <section class="sport-intro">
            <div class="container">
                <div class="intro-grid">
                    <div class="intro-text">
                        <div class="section-tag">
                            <span><?php echo $pd['section_tag'][$cl]; ?></span>
                        </div>
                        <h2>[SPORT_INTRO_TITLE]</h2>
                        <p class="intro-description">
                            [SPORT_INTRO_TEXT]
                        </p>
                        <!-- Opcional: Estadísticas del deporte -->
                        <div class="intro-stats" style="display: none;">
                            <div class="stat">
                                <div class="stat-number">[STAT_1_NUMBER]</div>
                                <div class="stat-label">[STAT_1_LABEL]</div>
                            </div>
                            <div class="stat">
                                <div class="stat-number">[STAT_2_NUMBER]</div>
                                <div class="stat-label">[STAT_2_LABEL]</div>
                            </div>
                            <div class="stat">
                                <div class="stat-number">[STAT_3_NUMBER]</div>
                                <div class="stat-label">[STAT_3_LABEL]</div>
                            </div>
                        </div>
                    </div>
                    <div class="intro-visual">
                        <div class="visual-card">
                            <!-- AQUÍ VA LA IMAGEN ESPECÍFICA DEL DEPORTE -->
                            <img src="[SPORT_IMAGE_URL]" alt="[SPORT_NAME] en acción">
                            <div class="visual-overlay">
                                <i class="[SPORT_ICON]"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section class="features">
            <div class="container">
                <h2 class="section-title"><?php echo $pd['enfoque_title'][$cl]; ?></h2>
                <div class="features-grid">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-trophy"></i>
                        </div>
                        <h3><?php echo $pd['feat1_h'][$cl]; ?></h3>
                        <p><?php echo $pd['feat1_p'][$cl]; ?></p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <h3><?php echo $pd['feat2_h'][$cl]; ?></h3>
                        <p><?php echo $pd['feat2_p'][$cl]; ?></p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-heart"></i>
                        </div>
                        <h3><?php echo $pd['feat3_h'][$cl]; ?></h3>
                        <p><?php echo $pd['feat3_p'][$cl]; ?></p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Gallery Section -->
        <section class="gallery">
            <div class="container">
                <h2 class="section-title"><?php echo $pd['gallery_title'][$cl]; ?></h2>
                <div class="gallery-grid">
                    <div class="gallery-item large">
                        <img src="[GALLERY_IMAGE_1]" alt="[SPORT_NAME] 1">
                        <div class="gallery-overlay">
                            <h4>[GALLERY_TITLE_1]</h4>
                            <p>[GALLERY_DESC_1]</p>
                        </div>
                    </div>
                    <div class="gallery-item">
                        <img src="[GALLERY_IMAGE_2]" alt="[SPORT_NAME] 2">
                        <div class="gallery-overlay">
                            <h4>[GALLERY_TITLE_2]</h4>
                        </div>
                    </div>
                    <div class="gallery-item">
                        <img src="[GALLERY_IMAGE_3]" alt="[SPORT_NAME] 3">
                        <div class="gallery-overlay">
                            <h4>[GALLERY_TITLE_3]</h4>
                        </div>
                    </div>
                    <div class="gallery-item">
                        <img src="[GALLERY_IMAGE_4]" alt="[SPORT_NAME] 4">
                        <div class="gallery-overlay">
                            <h4>[GALLERY_TITLE_4]</h4>
                        </div>
                    </div>
                    <div class="gallery-item">
                        <img src="[GALLERY_IMAGE_5]" alt="[SPORT_NAME] 5">
                        <div class="gallery-overlay">
                            <h4>[GALLERY_TITLE_5]</h4>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section - REMOVIDO según solicitud -->
        <!-- 
        <section class="cta">
            <div class="container">
                <div class="cta-content">
                    <h2>¿Interesado en formar parte de nuestro programa deportivo?</h2>
                    <p>Únete a nuestra comunidad atlética y descubre tu potencial deportivo</p>
                    <div class="cta-buttons">
                        <a href="#" class="btn btn-primary">Inscribirse ahora</a>
                        <a href="#" class="btn btn-secondary">Más información</a>
                    </div>
                </div>
            </div>
        </section>
        -->
    </main>

    <!-- Footer (using your provided footer) -->
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
                    <h4><?php echo $pd['contact'][$cl]; ?></h4>
                    <p>Av. Brasil 3149, Montevideo</p>
                    <p>(+598) 2621 4822 / 2622 1422</p>
                    <p>info@scuolaitaliana.edu.uy</p>
                </div>
            </div>
            
            <div class="footer-right">
                <div class="footer-section">
                    <h4><?php echo $pd['links'][$cl]; ?></h4>
                    <p><?php echo $pd['link_items'][$cl][0]; ?></p>
                    <p><?php echo $pd['link_items'][$cl][1]; ?></p>
                    <p><?php echo $pd['link_items'][$cl][2]; ?></p>
                </div>
            </div>
        </div>
        
        <div class="footer-info-bar">
            <p>Desarrollado por el equipo SGE | Proyecto de apoyo 2002 - EE Informática</p>
        </div>
    </footer>
<link rel="stylesheet" href="breadcrumbs.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            line-height: 1.6;
            color: #333;
            overflow-x: hidden;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Navigation */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            background: rgba(10, 36, 82, 0.5);
            z-index: 1000;
            transition: all 0.3s ease;
        }

        .nav-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 5%;
            max-width: 1200px;
            margin: 0 auto;
        }

        .nav-logo img {
            height: 50px;
            width: auto;
        }

        .nav-menu-button {
            display: flex;
            flex-direction: column;
            cursor: pointer;
            padding: 8px;
            transition: all 0.3s ease;
        }

        .nav-menu-button span {
            width: 25px;
            height: 3px;
            background-color: white;
            margin: 3px 0;
            transition: 0.3s;
            border-radius: 2px;
        }

        .nav-menu-button:hover span {
            background-color: #F39C12;
        }

        /* Hero Section */
        .hero {
            position: relative;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .hero-background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
        }

        .hero-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(59, 105, 186, 0.8), rgba(220, 52, 60, 0.6));
            z-index: 2;
        }

        .hero-content {
            position: relative;
            z-index: 3;
            text-align: center;
            color: white;
            animation: fadeInUp 1s ease-out;
        }

        .hero-breadcrumb {
            font-size: 14px;
            margin-bottom: 20px;
            opacity: 0.9;
        }

        .hero-breadcrumb .current {
            color: #F39C12;
            font-weight: 600;
        }

        .hero-title {
            font-size: clamp(3rem, 8vw, 6rem);
            font-weight: 700;
            margin-bottom: 20px;
            font-family: 'Merriweather', serif;
        }

        .hero-subtitle {
            font-size: 1.2rem;
            max-width: 600px;
            margin: 0 auto;
            opacity: 0.9;
        }

        /* Main Content */
        .main-content {
            position: relative;
            z-index: 10;
        }

        /* Sport Introduction */
        .sport-intro {
            padding: 100px 0;
            background: white;
        }

        .intro-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 80px;
            align-items: center;
        }

        .section-tag {
            display: inline-block;
            background: linear-gradient(135deg, #3B69BA, #DC343C);
            color: white;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: 1px;
            margin-bottom: 20px;
        }

        .intro-text h2 {
            font-size: 2.5rem;
            font-weight: 700;
            color: #3B69BA;
            margin-bottom: 30px;
            font-family: 'Merriweather', serif;
            line-height: 1.2;
        }

        .intro-description {
            font-size: 1.1rem;
            color: #666;
            margin-bottom: 40px;
            line-height: 1.8;
        }

        .intro-stats {
            display: flex;
            gap: 40px;
        }

        .stat {
            text-align: center;
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: #DC343C;
            margin-bottom: 5px;
        }

        .stat-label {
            font-size: 0.9rem;
            color: #666;
            font-weight: 500;
        }

        .visual-card {
            position: relative;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }

        .visual-card:hover {
            transform: translateY(-10px);
        }

        .visual-card img {
            width: 100%;
            height: 400px;
            object-fit: cover;
        }

        .visual-overlay {
            position: absolute;
            top: 20px;
            right: 20px;
            width: 60px;
            height: 60px;
            background: rgba(243, 156, 18, 0.9);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .visual-overlay i {
            color: white;
            font-size: 24px;
        }

        /* Features Section */
        .features {
            padding: 100px 0;
            background: #f8f9fa;
        }

        .section-title {
            text-align: center;
            font-size: 2.5rem;
            font-weight: 700;
            color: #3B69BA;
            margin-bottom: 60px;
            font-family: 'Merriweather', serif;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 40px;
        }

        .feature-card {
            background: white;
            padding: 40px;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            border-top: 4px solid transparent;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            border-top-color: #F39C12;
            box-shadow: 0 20px 60px rgba(0,0,0,0.15);
        }

        .feature-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #3B69BA, #DC343C);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            transition: all 0.3s ease;
        }

        .feature-card:hover .feature-icon {
            transform: scale(1.1);
        }

        .feature-icon i {
            color: white;
            font-size: 32px;
        }

        .feature-card h3 {
            font-size: 1.3rem;
            font-weight: 600;
            color: #3B69BA;
            margin-bottom: 15px;
        }

        .feature-card p {
            color: #666;
            line-height: 1.6;
        }

        /* Gallery Section */
        .gallery {
            padding: 100px 0;
            background: white;
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }

        .gallery-item {
            position: relative;
            border-radius: 15px;
            overflow: hidden;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .gallery-item.large {
            grid-column: span 2;
            grid-row: span 2;
        }

        .gallery-item:hover {
            transform: scale(1.02);
        }

        .gallery-item img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            transition: all 0.3s ease;
        }

        .gallery-item.large img {
            height: 520px;
        }

        .gallery-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(transparent, rgba(0,0,0,0.8));
            color: white;
            padding: 30px 20px 20px;
            transform: translateY(100%);
            transition: all 0.3s ease;
        }

        .gallery-item:hover .gallery-overlay {
            transform: translateY(0);
        }

        .gallery-overlay h4 {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 5px;
        }

        /* CTA Section */
        .cta {
            padding: 100px 0;
            background: linear-gradient(135deg, #1B4F72, #049B4C);
            color: white;
            text-align: center;
        }

        .cta-content h2 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 20px;
            font-family: 'Merriweather', serif;
        }

        .cta-content p {
            font-size: 1.2rem;
            margin-bottom: 40px;
            opacity: 0.9;
        }

        .cta-buttons {
            display: flex;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-block;
            padding: 15px 30px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .btn-primary {
            background: white;
            color: #1B4F72;
        }

        .btn-primary:hover {
            background: transparent;
            color: white;
            border-color: white;
        }

        .btn-secondary {
            background: transparent;
            color: white;
            border-color: white;
        }

        .btn-secondary:hover {
            background: white;
            color: #1B4F72;
        }

        /* Footer Styles (using your Pantone colors) */
        .footer-bottom-new {
            background: #3B69BA;
            color: white;
            padding: 0;
            margin: 0;
        }

        .footer-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 30px 5%;
            max-width: 1200px;
            margin: 0 auto;
        }

        .footer-left {
            flex: 1;
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .footer-logo img {
            height: 60px;
            width: auto;
        }

        .footer-subtitle p {
            margin: 0;
            font-size: 14px;
            color: #E8E8E8;
        }

        .footer-center,
        .footer-right {
            flex: 1;
            padding: 0 20px;
        }

        .footer-section h4 {
            color: white;
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 10px;
            border-bottom: 1px solid rgba(255,255,255,0.2);
            padding-bottom: 5px;
        }

        .footer-section p {
            margin: 8px 0;
            font-size: 14px;
            color: #E8E8E8;
            line-height: 1.4;
        }

        .footer-info-bar {
            background: #253B80;
            text-align: center;
            padding: 15px 5%;
            border-top: 1px solid rgba(255,255,255,0.1);
        }

        .footer-info-bar p {
            margin: 0;
            font-size: 12px;
            color: #BDC3C7;
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .nav-menu-button {
                display: flex;
            }

            .hero-title {
                font-size: 2.5rem;
            }

            .intro-grid {
                grid-template-columns: 1fr;
                gap: 40px;
            }

            .intro-stats {
                justify-content: space-between;
                gap: 20px;
            }

            .features-grid {
                grid-template-columns: 1fr;
            }

            .gallery-item.large {
                grid-column: span 1;
                grid-row: span 1;
            }

            .gallery-item.large img {
                height: 250px;
            }

            .cta-content h2 {
                font-size: 2rem;
            }

            .cta-buttons {
                flex-direction: column;
                align-items: center;
            }

            .footer-container {
                flex-direction: column;
                gap: 30px;
                text-align: center;
            }
            
            .footer-left {
                flex-direction: column;
                gap: 10px;
            }
            
            .footer-center,
            .footer-right {
                padding: 0;
                width: 100%;
            }
            
            .footer-section {
                margin-bottom: 20px;
            }
        }

        @media (max-width: 480px) {
            .hero {
                height: 70vh;
            }

            .sport-intro,
            .features,
            .gallery,
            .cta {
                padding: 60px 0;
            }

            .section-title {
                font-size: 2rem;
            }
        }
    </style>

    <script>
        // Navbar scroll effect removed since it's now transparent
        // Add intersection observer for animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.animation = 'fadeInUp 0.8s ease-out forwards';
                }
            });
        }, observerOptions);

        // Observe elements for animation
        document.addEventListener('DOMContentLoaded', function() {
            const animateElements = document.querySelectorAll('.feature-card, .gallery-item, .intro-text, .visual-card');
            animateElements.forEach(el => {
                el.style.opacity = '0';
                el.style.transform = 'translateY(30px)';
                observer.observe(el);
            });
        });
    </script>
    <script src="cms-admin.js"></script>
</body>
</html>