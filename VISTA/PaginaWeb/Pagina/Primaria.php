<!DOCTYPE html>
<html lang="es">
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
        <section class="title-section">
            <h1 class="main-title">
                <span class="blue-text">Primaria </span>
                
            </h1>
            <p class="subtitle">
                Padres y maestros queremos para nuestros niños una escuela que les brinde opciones globales para su futuro <br>
                , en un ambiente de alto nivel académico y en el que todos tengan la oportunidad de aprender. <br>
                técnicos capacitados de manera constante y comprometidos con su vocación de enseñar.
            </p>
        </section>

        <!-- Content Sections -->
        <section class="content-sections">
            <!-- Section 1 -->
            <div class="content-row">
                <div class="text-content left">
                    <p>En Primaria somos un equipo de profesionales que trabaja formando personas capaces de interpelar y crear conciencia sobre el mundo que los rodea, enfrentados a los cambios que se perciben día a día en la sociedad.

</p>
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
                    <p>Renovamos año a año ese desafío con el convencimiento de ofrecer una enseñanza con altas expectativas hacia el logro de personas comprensivas y competentes, priorizando los valores humanos, actitudes y sentimientos de auténticos ciudadanos del mundo. La Educación constituye el principal motor de innovación tecnológica, de modernización y representa la mejora herramienta para construir un mundo mejor.</p>
                </div>
            </div>

            <!-- Section 3 -->
            <div class="content-row">
                <div class="text-content left">
                    <p>“Sembrad en los niños ideas buenas, aunque no las entiendan: los años se encargarán de descifrarlas en su entendimiento y de hacerlas florecer en su corazón” M. Montessori</p>
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
                    <h4>Contacto</h4>
                    <p>Av. Brasil 3149, Montevideo</p>
                    <p>(+598) 2621 4822 / 2622 1422</p>
                    <p>info@scuolaitaliana.edu.uy</p>
                </div>
            </div>
            
            <div class="footer-right">
                <div class="footer-section">
                    <h4>Enlaces útiles</h4>
                    <p>Política de privacidad</p>
                    <p>Requisitos técnicos</p>
                    <p>Accesibilidad</p>
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