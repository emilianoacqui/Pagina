<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Convivencia</title>
    <link rel="stylesheet" href="breadcrumbs.css">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/convivencia.css">
</head>
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
    <section class="hero editable-image" style="background-image: url('FOTOS/fotosPrincipales/Convivencia1.jpg'); margin-top: 0px;">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1 class="hero-title editable-text">Convivencia en el Colegio</h1>
            <p class="hero-subtitle editable-text">Descubre todo lo que hace especial a la Scuola Italiana di Montevideo</p>
        </div>
    </section>
    <div id="breadcrumbs" class="breadcrumbs-container"></div>
        
        <section class="content-section">
    <div class="container">      
        <div class="content-text">
            <h2 class="editable-text">Nuestro Campus y Facilidades</h2>
            <p class="editable-text">Bienvenidos ...</p>
            <p class="editable-text">En esta sección ...</p>
        </div>
    </div>
</section>


    <!-- Main Content -->
    <main class="main-content">
        <div class="container">
            <!-- Text Introduction -->
            <section class="text-intro">
                <div class="intro-grid">
                    <div class="intro-text">
                        <h2 class="editable-text">Protocolo anti bullying</h2>
                        <a href="PROTOCOLO_ANTI_BULLYING_SCUOLA_1_compressed.pdf" target="_blank">Abrir Protocolo en nueva pestaña</a>    
                    </div>
                    <div class="intro-visual">
                        <div class="visual-card">
                            <img class="editable-image" src="FOTOS/fotosPrincipales/convivencia2.jpg" alt="Estudiantes en el aula">
                        </div>
                    </div>
                </div>
            </section>

            <!-- Content Section -->
            <section class="content-section">
                <div class="container">
                    <div class="content-grid">
                        <div class="content-text">
                            <h2 class="editable-text">Articulos</h2>
                            <a href="PROTOCOLO_ANTI_BULLYING_SCUOLA_2.pdf" target="_blank">Articulo 1</a> <br>
                            <a href="PROTOCOLO_ANTI_BULLYING_SCUOLA_3_compressed.pdf" target="_blank">Articulo 2</a><br>
                            <a href="PR.IBA_WEB_compressed_compressed.pdf" target="_blank"> Articulo 3</a><br>
                            <a href="Mensaje_Ana_Maria_bulliyng.pdf" target="_blank">Articulo 4</a>
                            </div>
                        <div class="content-image">
                            <img class="editable-image" src="FOTOS/fotosPrincipales/convivencia3.jpg" alt="Campus de la Scuola Italiana">
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
    </div>
    <div id="cms-root"></div>
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