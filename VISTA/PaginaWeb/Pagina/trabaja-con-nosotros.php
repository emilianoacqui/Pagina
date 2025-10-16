<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trabaja con Nosotros - Scuola Italiana di Montevideo</title>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="breadcrumbs.css">
    <link rel="stylesheet" href="../css/trabaja-con-nosotros.css">
</head>
<body>
    <div id="original-content">
    <!-- Navigation -->
    <nav class="navbar">
        <div class="nav-container">
            <div class="nav-logo">
                <img src="FOTOS/fotosPrincipales/logo2.png" alt="Scuola Italiana di Montevideo">
            </div>
            <div class="nav-menu-button" onclick="window.location.href='menuScuola.html'">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </nav>
    <div id="breadcrumbs" class="breadcrumbs-container"></div>

    <div class="main-container">
        <!-- Formulario -->
        <div class="form-section">
            <h1 class="form-title">Trabaja con Nosotros</h1>
            <p class="form-subtitle">
                Únete a nuestro equipo educativo y forma parte de una institución comprometida con la excelencia académica y los valores italianos.
            </p>

            <form action="../../../CONTROLADOR/Jobs/apply.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nombre">Nombre y Apellido *</label>
                    <input type="text" id="nombre" name="nombre" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="email">E-mail *</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="celular">Celular</label>
                    <input type="tel" id="celular" name="celular" class="form-control">
                </div>

                <div class="form-group">
                    <label for="mensaje">Mensaje *</label>
                    <textarea id="mensaje" name="mensaje" class="form-control" placeholder="Cuéntanos sobre tu experiencia profesional, áreas de especialización y por qué te interesa trabajar en nuestra institución..." required></textarea>
                </div>

                <div class="form-group">
                    <label for="cv">Adjuntar CV</label>
                    <div class="file-upload-container">
                        <input type="file" id="cv" name="cv" class="file-upload-input" accept=".pdf,.doc,.docx">
                        <label for="cv" class="file-upload-label">
                            Seleccionar Archivo CV
                        </label>
                    </div>
                </div>

                <button type="submit" class="submit-btn">
                    Enviar Solicitud
                </button>
            </form>
        </div>

        <!-- Panel de Información -->
        <div class="info-panel">
            <h3 class="info-title">Información de Contacto</h3>

            <div class="contact-item">
                <div class="contact-label">Admisiones</div>
                <div class="contact-value">admisiones@scuolaitaliana.edu.uy</div>
            </div>

            <div class="contact-item">
                <div class="contact-label">Caja | Horario</div>
                <div class="contact-value">
                    08:00 a 13:00 - 13:30 a 16:00<br>
                    caja@scuolaitaliana.edu.uy
                </div>
            </div>

            <div class="contact-item">
                <div class="contact-label">Trabajar con nosotros</div>
                <div class="contact-value">trabajarconnosotros@scuolaitaliana.edu.uy</div>
            </div>

            <div class="contact-item">
                <div class="contact-label">Solicitud de Fórmula 69</div>
                <div class="contact-value">secretariapreparatorio@scuolaitaliana.edu.uy</div>
            </div>

            <div class="contact-info">
                <h4>Información General</h4>
                <p>📍 Gral. French 2380 – Montevideo, CP: 11500</p>
                <p>📞 (+598) 2600 1527</p>
                <p>✉️ info@scuolaitaliana.edu.uy</p>
            </div>
        </div>
    </div>

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
                navbar.style.transform = 'translateY(-100%)';
                navbar.style.opacity = '0';
            } else {
                navbar.style.transform = 'translateY(0)';
                navbar.style.opacity = '1';
            }
            
            lastScrollTop = scrollTop;
        });

        // Mostrar nombre del archivo seleccionado
        document.getElementById('cv').addEventListener('change', function(e) {
            const label = document.querySelector('.file-upload-label');
            if (e.target.files.length > 0) {
                label.textContent = `📎 ${e.target.files[0].name}`;
                label.style.background = '#049B4C';
            } else {
                label.textContent = '📎 Seleccionar Archivo CV';
                label.style.background = '#0A2452';
            }
        });

        // Validación del formulario
        document.querySelector('form').addEventListener('submit', function(e) {
            const nombre = document.getElementById('nombre').value.trim();
            const email = document.getElementById('email').value.trim();
            const mensaje = document.getElementById('mensaje').value.trim();

            if (!nombre || !email || !mensaje) {
                e.preventDefault();
                alert('Por favor, complete todos los campos obligatorios.');
                return;
            }

            // Validar email
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                e.preventDefault();
                alert('Por favor, ingrese un email válido.');
                return;
            }
        });
    </script>
    <script>
document.querySelector("form").addEventListener("submit", function(e) {
    e.preventDefault(); // Evita que se recargue la página

    const form = e.target;
    const formData = new FormData(form); // Captura todos los datos del formulario

    fetch(form.action, {
        method: form.method,
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        // Mostrar mensaje de éxito sin recargar
        alert("✅ Tu solicitud se envió correctamente.");
        form.reset(); // Limpia los campos del formulario
        console.log("Respuesta del servidor:", data); // Útil para depurar
    })
    .catch(error => {
        alert("❌ Ocurrió un error al enviar la solicitud.");
        console.error("Error:", error);
    });
});
</script>

    <script src="breadcrumbs.js"></script>
    <script src="cms-admin.js"></script>
    <script src="analytics.js"></script>
</body>
</html>