<!DOCTYPE html>
<?php if (session_status() === PHP_SESSION_NONE) { session_start(); } $cl = $_SESSION['lang'] ?? 'es'; ?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php $tn_meta=['es'=>'Trabaja con Nosotros - Scuola Italiana di Montevideo','en'=>'Work with Us - Scuola Italiana di Montevideo','it'=>'Lavora con Noi - Scuola Italiana di Montevideo']; echo $tn_meta[$cl]; ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="breadcrumbs.css">
    <link rel="stylesheet" href="../css/trabaja-con-nosotros.css">
    <link rel="icon" type="image/png" href="/Pagina/VISTA/PaginaWeb/Pagina/FOTOS/fotosPrincipales/logotipo.png">
    <link rel="shortcut icon" href="/Pagina/favicon.ico">
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
            <?php 
                $tn = [
                    'form_t' => ['es'=>'Trabaja con Nosotros','en'=>'Work with Us','it'=>'Lavora con Noi'],
                    'form_s' => ['es'=>'Únete a nuestro equipo educativo y forma parte de una institución comprometida con la excelencia académica y los valores italianos.','en'=>'Join our educational team and be part of an institution committed to academic excellence and Italian values.','it'=>'Unisciti al nostro team educativo ed entra a far parte di un’istituzione impegnata nell’eccellenza accademica e nei valori italiani.'],
                    'lbl_name' => ['es'=>'Nombre y Apellido *','en'=>'Full Name *','it'=>'Nome e Cognome *'],
                    'lbl_email' => ['es'=>'E-mail *','en'=>'E-mail *','it'=>'E-mail *'],
                    'lbl_phone' => ['es'=>'Celular','en'=>'Phone','it'=>'Cellulare'],
                    'lbl_msg' => ['es'=>'Mensaje *','en'=>'Message *','it'=>'Messaggio *'],
                    'ph_msg' => ['es'=>'Cuéntanos sobre tu experiencia profesional, áreas de especialización y por qué te interesa trabajar en nuestra institución...','en'=>'Tell us about your professional experience, areas of expertise and why you are interested in working at our institution...','it'=>'Raccontaci della tua esperienza professionale, aree di specializzazione e perché ti interessa lavorare nella nostra istituzione...'],
                    'lbl_cv' => ['es'=>'Adjuntar CV','en'=>'Attach CV','it'=>'Allega CV'],
                    'btn_cv' => ['es'=>'Seleccionar Archivo CV','en'=>'Select CV File','it'=>'Seleziona File CV'],
                    'btn_submit' => ['es'=>'Enviar Solicitud','en'=>'Submit Application','it'=>'Invia Candidatura'],
                    'info_t' => ['es'=>'Información de Contacto','en'=>'Contact Information','it'=>'Informazioni di Contatto'],
                    'admissions' => ['es'=>'Admisiones','en'=>'Admissions','it'=>'Ammissioni'],
                    'cash' => ['es'=>'Caja | Horario','en'=>'Cashier | Hours','it'=>'Cassa | Orari'],
                    'work' => ['es'=>'Trabajar con nosotros','en'=>'Work with us','it'=>'Lavorare con noi'],
                    'f69' => ['es'=>'Solicitud de Fórmula 69','en'=>'Form 69 Request','it'=>'Richiesta Modulo 69'],
                    'general' => ['es'=>'Información General','en'=>'General Information','it'=>'Informazioni Generali'],
                    'contact' => ['es'=>'Contacto','en'=>'Contact','it'=>'Contatto'],
                    'links' => ['es'=>'Enlaces útiles','en'=>'Useful links','it'=>'Link utili'],
                    'link_items' => [
                        'es' => ['Política de privacidad','Requisitos técnicos','Accesibilidad'],
                        'en' => ['Privacy Policy','Technical Requirements','Accessibility'],
                        'it' => ['Informativa sulla privacy','Requisiti tecnici','Accessibilità'],
                    ],
                ];
            ?>
            <h1 class="form-title"><?php echo $tn['form_t'][$cl]; ?></h1>
            <p class="form-subtitle"><?php echo $tn['form_s'][$cl]; ?></p>

            <form action="../../../CONTROLADOR/Jobs/procesar_trabajo.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nombre"><?php echo $tn['lbl_name'][$cl]; ?></label>
                    <input type="text" id="nombre" name="nombre" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="email"><?php echo $tn['lbl_email'][$cl]; ?></label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="celular"><?php echo $tn['lbl_phone'][$cl]; ?></label>
                    <input type="tel" id="celular" name="celular" class="form-control">
                </div>

                <div class="form-group">
                    <label for="mensaje"><?php echo $tn['lbl_msg'][$cl]; ?></label>
                    <textarea id="mensaje" name="mensaje" class="form-control" placeholder="<?php echo $tn['ph_msg'][$cl]; ?>" required></textarea>
                </div>

                <div class="form-group">
                    <label for="cv"><?php echo $tn['lbl_cv'][$cl]; ?></label>
                    <div class="file-upload-container">
                        <input type="file" id="cv" name="cv" class="file-upload-input" accept=".pdf,.doc,.docx">
                        <label for="cv" class="file-upload-label">
                            <?php echo $tn['btn_cv'][$cl]; ?>
                        </label>
                    </div>
                </div>

                <button type="submit" class="submit-btn">
                    <?php echo $tn['btn_submit'][$cl]; ?>
                </button>
            </form>
        </div>

        <!-- Panel de Información -->
        <div class="info-panel">
            <h3 class="info-title"><?php echo $tn['info_t'][$cl]; ?></h3>

            <div class="contact-item">
                <div class="contact-label"><?php echo $tn['admissions'][$cl]; ?></div>
                <div class="contact-value">admisiones@scuolaitaliana.edu.uy</div>
            </div>

            <div class="contact-item">
                <div class="contact-label"><?php echo $tn['cash'][$cl]; ?></div>
                <div class="contact-value">
                    08:00 a 13:00 - 13:30 a 16:00<br>
                    caja@scuolaitaliana.edu.uy
                </div>
            </div>

            <div class="contact-item">
                <div class="contact-label"><?php echo $tn['work'][$cl]; ?></div>
                <div class="contact-value">trabajarconnosotros@scuolaitaliana.edu.uy</div>
            </div>

            <div class="contact-item">
                <div class="contact-label"><?php echo $tn['f69'][$cl]; ?></div>
                <div class="contact-value">secretariapreparatorio@scuolaitaliana.edu.uy</div>
            </div>

            <div class="contact-info">
                <h4><?php echo $tn['general'][$cl]; ?></h4>
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
                    <h4><?php echo $tn['contact'][$cl]; ?></h4>
                    <p>Av. Brasil 3149, Montevideo</p>
                    <p>(+598) 2621 4822 / 2622 1422</p>
                    <p>info@scuolaitaliana.edu.uy</p>
                </div>
            </div>
            
            <div class="footer-right">
                <div class="footer-section">
                    <h4><?php echo $tn['links'][$cl]; ?></h4>
                    <p><?php echo $tn['link_items'][$cl][0]; ?></p>
                    <p><?php echo $tn['link_items'][$cl][1]; ?></p>
                    <p><?php echo $tn['link_items'][$cl][2]; ?></p>
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