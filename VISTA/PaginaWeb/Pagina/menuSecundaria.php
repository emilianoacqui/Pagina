<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Secundaria - Scuola Italiana di Montevideo</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="breadcrumbs.css">
    <link rel="stylesheet" href="../css/menuSecundaria.css">
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
        <!-- Hero Section -->
        <section class="hero-inicial">
            <div class="hero-content">
                <h1 class="hero-title">Secundaria</h1>
            </div>
        </section>
        <div id="breadcrumbs" class="breadcrumbs-container"></div>

        <!-- Programs Section -->
        <section class="programs-section">
            <div class="programs-container">
                <!-- Casa dei Bambini -->
                <div class="program-section">
                    <div class="program-image">
                        <img src="FOTOS/fotosClases/Primerciclo1.jpg" alt="Casa dei Bambini">
                    </div>
                    <div class="program-info">
                        <h3>Primer Ciclo</h3>
<p>                        En los primeros años de Secundaria se continúa el trabajo iniciado en Primaria con las prácticas reflexivas, autónomas y de creciente rigor académico que permitan, finalizado el ciclo, continuar los estudios superiores. 
</p>
                            <a href="primerCiclo.php" class="program-button" style="display: inline-block; text-decoration: none;">
    Ver programa
</a>
                        
                    </div>
                </div>

                <!-- BBSIM -->
                <div class="program-section">
                    <div class="program-image">
                        <img src="FOTOS/fotosClases/bachillerato1.jpg" alt="BBSIM">
                    </div>
                    <div class="program-info">
                        <h3>Bachillerato</h3>
                        <p>En el Segundo Ciclo de Secundaria se continúa el trabajo iniciado en Primer Ciclo, consolidando métodos de estudio autónomo, 
mecanismos de búsqueda e investigación. Nuestro objetivo es formar personas cultas, críticas y creativas, capaces de enfrentar con actitud
racional las situaciones y los problemas que se les presenten.</p>
                        
                            <a href="Bachillerato.php" class="program-button" style="display: inline-block; text-decoration: none;">
    Ver programa
</a>
                        
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
    <script>
        let lastScrollTop = 0;

        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            
            if (scrollTop > lastScrollTop && scrollTop > 100) {
                // Scrolling down y ya bajó más de 100px
                navbar.style.transform = 'translateY(-100%)';
                navbar.style.opacity = '0';
            } else {
                // Scrolling up o está en el top
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