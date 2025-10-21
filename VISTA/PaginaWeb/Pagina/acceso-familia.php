<!DOCTYPE html>
<?php if (session_status() === PHP_SESSION_NONE) { session_start(); } $cl = $_SESSION['lang'] ?? 'es'; ?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php $af_meta=['es'=>'Acceso a familia - Scuola Italiana','en'=>'Family Access - Scuola Italiana','it'=>'Accesso Famiglia - Scuola Italiana']; echo $af_meta[$cl]; ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="breadcrumbs.css">
    <link rel="stylesheet" href="../css/acceso-familia.css">
    <link rel="icon" type="image/png" href="/Pagina/favicon.png">
    <link rel="shortcut icon" href="/Pagina/favicon.ico">
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
        $af = [
            'hero_t' => ['es'=>'Acceso a familia','en'=>'Family Access','it'=>'Accesso Famiglia'],
            'hero_s' => ['es'=>'Una colección organizada de elementos o información','en'=>'An organized collection of items or information','it'=>'Una raccolta organizzata di elementi o informazioni'],
            'intro_t' => ['es'=>'Servicios para familias','en'=>'Family services','it'=>'Servizi per le famiglie'],
            'intro_p' => ['es'=>'Acceso directo a herramientas y recursos frecuentes: calificaciones, calendario, pagos, comunicaciones y materiales.','en'=>'Direct access to frequent tools and resources: grades, calendar, payments, communications and materials.','it'=>'Accesso diretto a strumenti e risorse frequenti: voti, calendario, pagamenti, comunicazioni e materiali.'],
            'info_h' => ['es'=>'Acceso rápido','en'=>'Quick access','it'=>'Accesso rapido'],
            'info_p' => ['es'=>'Disponible con usuario institucional. Ante dudas, contacte secretaría.','en'=>'Available with institutional account. For questions, contact the office.','it'=>'Disponibile con account istituzionale. Per dubbi, contattare la segreteria.'],
            'spec_h' => ['es'=>'Detalle','en'=>'Detail','it'=>'Dettaglio'],
            'more_h' => ['es'=>'Enlaces relacionados','en'=>'Related links','it'=>'Link correlati'],
            'last_h' => ['es'=>'Soporte','en'=>'Support','it'=>'Supporto'],
        ,
            'items' => [
                't1' => ['es'=>'Boletines y calificaciones','en'=>'Report cards and grades','it'=>'Pagelle e voti'],
                'd1' => ['es'=>'Consulta de calificaciones por período, histórico y observaciones de los docentes.','en'=>'Check term grades, history and teacher comments.','it'=>'Consulta voti per periodo, storico e osservazioni dei docenti.'],
                't2' => ['es'=>'Calendario escolar','en'=>'School calendar','it'=>'Calendario scolastico'],
                'd2' => ['es'=>'Fechas de evaluaciones, reuniones, eventos y actividades institucionales.','en'=>'Dates for exams, meetings, events and institutional activities.','it'=>'Date di verifiche, riunioni, eventi e attività istituzionali.'],
                't3' => ['es'=>'Pagos y aranceles','en'=>'Payments and fees','it'=>'Pagamenti e tasse'],
                'd3' => ['es'=>'Información de facturación, medios de pago habilitados y comprobantes.','en'=>'Billing information, accepted payment methods and receipts.','it'=>'Informazioni di fatturazione, metodi di pagamento accettati e ricevute.'],
                't4' => ['es'=>'Comunicaciones','en'=>'Communications','it'=>'Comunicazioni'],
                'd4' => ['es'=>'Circulares, avisos del colegio y mensajes de coordinación y docentes.','en'=>'Circulars, school notices and messages from coordination and teachers.','it'=>'Circolari, avvisi della scuola e messaggi di coordinamento e docenti.'],
                't5' => ['es'=>'Recursos pedagógicos','en'=>'Learning resources','it'=>'Risorse didattiche'],
                'd5' => ['es'=>'Materiales de estudio, bibliografía, plataformas y tutoriales de apoyo.','en'=>'Study materials, bibliography, platforms and support tutorials.','it'=>'Materiali di studio, bibliografia, piattaforme e tutorial di supporto.'],
            ],

            'conclusion_t' => ['es'=>'Conclusión','en'=>'Conclusion','it'=>'Conclusione'],
            'conclusion_p' => ['es'=>'Párrafo de cierre que resume los puntos clave de la lista o brinda una reflexión final.','en'=>'Closing paragraph summarizing key points of the list or providing a final reflection.','it'=>'Paragrafo conclusivo che riassume i punti chiave dell’elenco o offre una riflessione finale.'],
            'contact' => ['es'=>'Contacto','en'=>'Contact','it'=>'Contatto'],
            'links' => ['es'=>'Enlaces útiles','en'=>'Useful links','it'=>'Link utili'],
            'link_items' => [
                'es' => ['Política de privacidad','Requisitos técnicos','Accesibilidad'],
                'en' => ['Privacy Policy','Technical Requirements','Accessibility'],
                'it' => ['Informativa sulla privacy','Requisiti tecnici','Accessibilità'],
            ],
        ];
    ?>
    <section class="hero-list">
        <div class="hero-overlay"></div>
        <div class="hero-content-left">
            <h1 class="hero-title-left"><?php echo $af['hero_t'][$cl]; ?></h1>
            <p class="hero-subtitle-left"><?php echo $af['hero_s'][$cl]; ?></p>
        </div>
    </section>
    <div id="breadcrumbs" class="breadcrumbs-container"></div>
    <!-- Main Content -->
    <main class="main-list">
        <div class="container">
            <!-- Introduction -->
            <section class="list-intro">
                <h2 class="intro-title"><?php echo $af['intro_t'][$cl]; ?></h2>
                <p class="intro-text"><?php echo $af['intro_p'][$cl]; ?></p>
            </section>
            <!-- Main List -->
            <section class="main-list-section">
                <div class="list-container">
                    <article class="list-item">
                        <div class="item-number">01</div>
                        <div class="item-content">
                            <h3 class="item-title"><?php echo $af['items']['t1'][$cl]; ?></h3>
                            <p class="item-description"><?php echo $af['items']['d1'][$cl]; ?></p>
                        </div>
                        <div class="item-info-panel">
                            <h4><?php echo $af['info_h'][$cl]; ?></h4>
                            <p><?php echo $af['info_p'][$cl]; ?></p>
                        </div>
                    </article>
                    <article class="list-item">
                        <div class="item-number">02</div>
                        <div class="item-content">
                            <h3 class="item-title"><?php echo $af['items']['t2'][$cl]; ?></h3>
                            <p class="item-description"><?php echo $af['items']['d2'][$cl]; ?></p>
                        </div>
                        <div class="item-info-panel">
                            <h4><?php echo $af['spec_h'][$cl]; ?></h4>
                            <p><?php echo $af['info_p'][$cl]; ?></p>
                        </div>
                    </article>
                    <article class="list-item">
                        <div class="item-number">03</div>
                        <div class="item-content">
                            <h3 class="item-title"><?php echo $af['items']['t3'][$cl]; ?></h3>
                            <p class="item-description"><?php echo $af['items']['d3'][$cl]; ?></p>
                        </div>
                        <div class="item-info-panel">
                            <h4><?php echo $af['more_h'][$cl]; ?></h4>
                            <p><?php echo $af['info_p'][$cl]; ?></p>
                        </div>
                    </article>
                    <article class="list-item">
                        <div class="item-number">04</div>
                        <div class="item-content">
                            <h3 class="item-title"><?php echo $af['items']['t4'][$cl]; ?></h3>
                            <p class="item-description"><?php echo $af['items']['d4'][$cl]; ?></p>
                        </div>
                        <div class="item-info-panel">
                            <h4><?php echo $af['info_h'][$cl]; ?></h4>
                            <p><?php echo $af['info_p'][$cl]; ?></p>
                        </div>
                    </article>
                    <article class="list-item">
                        <div class="item-number">05</div>
                        <div class="item-content">
                            <h3 class="item-title"><?php echo $af['items']['t5'][$cl]; ?></h3>
                            <p class="item-description"><?php echo $af['items']['d5'][$cl]; ?></p>
                        </div>
                        <div class="item-info-panel">
                            <h4><?php echo $af['last_h'][$cl]; ?></h4>
                            <p><?php echo $af['info_p'][$cl]; ?></p>
                        </div>
                    </article>
                    <article class="list-item">
                        <div class="item-number">06</div>
                        <div class="item-content">
                            <h3 class="item-title"><?php echo $af['items']['t5'][$cl]; ?></h3>
                            <p class="item-description"><?php echo $af['items']['d5'][$cl]; ?></p>
                        </div>
                        <div class="item-info-panel">
                            <h4><?php echo $af['last_h'][$cl]; ?></h4>
                            <p><?php echo $af['info_p'][$cl]; ?></p>
                        </div>
                    </article>
                    <article class="list-item">
                        <div class="item-number">07</div>
                        <div class="item-content">
                            <h3 class="item-title"><?php echo $af['items']['t5'][$cl]; ?></h3>
                            <p class="item-description"><?php echo $af['items']['d5'][$cl]; ?></p>
                        </div>
                        <div class="item-info-panel">
                            <h4><?php echo $af['last_h'][$cl]; ?></h4>
                            <p><?php echo $af['info_p'][$cl]; ?></p>
                        </div>
                    </article>
                    <article class="list-item">
                        <div class="item-number">08</div>
                        <div class="item-content">
                            <h3 class="item-title"><?php echo $af['items']['t5'][$cl]; ?></h3>
                            <p class="item-description"><?php echo $af['items']['d5'][$cl]; ?></p>
                        </div>
                        <div class="item-info-panel">
                            <h4><?php echo $af['last_h'][$cl]; ?></h4>
                            <p><?php echo $af['info_p'][$cl]; ?></p>
                        </div>
                    </article>
                    <article class="list-item">
                        <div class="item-number">09</div>
                        <div class="item-content">
                            <h3 class="item-title"><?php echo $af['items']['t5'][$cl]; ?></h3>
                            <p class="item-description"><?php echo $af['items']['d5'][$cl]; ?></p>
                        </div>
                        <div class="item-info-panel">
                            <h4><?php echo $af['last_h'][$cl]; ?></h4>
                            <p><?php echo $af['info_p'][$cl]; ?></p>
                        </div>
                    </article>
                    <article class="list-item">
                        <div class="item-number">10</div>
                        <div class="item-content">
                            <h3 class="item-title"><?php echo $af['items']['t5'][$cl]; ?></h3>
                            <p class="item-description"><?php echo $af['items']['d5'][$cl]; ?></p>
                        </div>
                        <div class="item-info-panel">
                            <h4><?php echo $af['last_h'][$cl]; ?></h4>
                            <p><?php echo $af['info_p'][$cl]; ?></p>
                        </div>
                    </article>
                    <article class="list-item">
                        <div class="item-number">11</div>
                        <div class="item-content">
                            <h3 class="item-title"><?php echo $af['items']['t5'][$cl]; ?></h3>
                            <p class="item-description"><?php echo $af['items']['d5'][$cl]; ?></p>
                        </div>
                        <div class="item-info-panel">
                            <h4><?php echo $af['last_h'][$cl]; ?></h4>
                            <p><?php echo $af['info_p'][$cl]; ?></p>
                        </div>
                    </article>
                    <article class="list-item">
                        <div class="item-number">12</div>
                        <div class="item-content">
                            <h3 class="item-title"><?php echo $af['items']['t5'][$cl]; ?></h3>
                            <p class="item-description"><?php echo $af['items']['d5'][$cl]; ?></p>
                        </div>
                        <div class="item-info-panel">
                            <h4><?php echo $af['last_h'][$cl]; ?></h4>
                            <p><?php echo $af['info_p'][$cl]; ?></p>
                        </div>
                    </article>
                    <article class="list-item">
                        <div class="item-number">13</div>
                        <div class="item-content">
                            <h3 class="item-title"><?php echo $af['items']['t5'][$cl]; ?></h3>
                            <p class="item-description"><?php echo $af['items']['d5'][$cl]; ?></p>
                        </div>
                        <div class="item-info-panel">
                            <h4><?php echo $af['last_h'][$cl]; ?></h4>
                            <p><?php echo $af['info_p'][$cl]; ?></p>
                        </div>
                    </article>
                    <article class="list-item">
                        <div class="item-number">14</div>
                        <div class="item-content">
                            <h3 class="item-title"><?php echo $af['items']['t5'][$cl]; ?></h3>
                            <p class="item-description"><?php echo $af['items']['d5'][$cl]; ?></p>
                        </div>
                        <div class="item-info-panel">
                            <h4><?php echo $af['last_h'][$cl]; ?></h4>
                            <p><?php echo $af['info_p'][$cl]; ?></p>
                        </div>
                    </article>
                    <article class="list-item">
                        <div class="item-number">15</div>
                        <div class="item-content">
                            <h3 class="item-title"><?php echo $af['items']['t5'][$cl]; ?></h3>
                            <p class="item-description"><?php echo $af['items']['d5'][$cl]; ?></p>
                        </div>
                        <div class="item-info-panel">
                            <h4><?php echo $af['last_h'][$cl]; ?></h4>
                            <p><?php echo $af['info_p'][$cl]; ?></p>
                        </div>
                    </article>
                </div>
            </section>
            <!-- Conclusion -->
            <section class="list-conclusion">
                <div class="conclusion-box">
                    <h2 class="conclusion-title"><?php echo $af['conclusion_t'][$cl]; ?></h2>
                    <p class="conclusion-text"><?php echo $af['conclusion_p'][$cl]; ?></p>
                </div>
            </section>
        </div>
    </main>
    <!-- Footer -->
    <footer class="footer-bottom-new">
        <div class="footer-container">
            <div class="footer-Aleft">
                <div class="footer-logo">
                    <img src="https://via.placeholder.com/120x60/1B2F6F/white?text=SCUOLA" alt="Scuola Italiana di Montevideo" style="height: 60px;">
                </div>
                <div class="footer-subtitle">
                    <p>Scuola Italiana di Montevideo</p>
                </div>
            </div>
            <div class="footer-center">
                <div class="footer-section">
                    <h4><?php echo $af['contact'][$cl]; ?></h4>
                    <p>Gral. French 2380</p>
                    <p>CP 11500 - Montevideo, Uruguay</p>
                    <p>(+598) 2600 1527</p>
                    <p>info@scuolaitaliana.edu.uy</p>
                </div>
            </div>
            <div class="footer-right">
                <div class="footer-section">
                    <h4><?php echo $af['links'][$cl]; ?></h4>
                    <p><?php echo $af['link_items'][$cl][0]; ?></p>
                    <p><?php echo $af['link_items'][$cl][1]; ?></p>
                    <p><?php echo $af['link_items'][$cl][2]; ?></p>
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