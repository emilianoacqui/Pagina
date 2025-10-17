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
            'intro_t' => ['es'=>'Introducción','en'=>'Introduction','it'=>'Introduzione'],
            'intro_p' => ['es'=>'Este párrafo introductorio explica el propósito de la lista que se presenta a continuación. Puedes usar este espacio para dar contexto o explicar la importancia de los elementos listados.','en'=>'This introductory paragraph explains the purpose of the list below. Use this space to provide context or explain the importance of the listed items.','it'=>'Questo paragrafo introduttivo spiega lo scopo dell’elenco seguente. Usa questo spazio per dare contesto o spiegare l’importanza degli elementi elencati.'],
            'info_h' => ['es'=>'Información adicional','en'=>'Additional information','it'=>'Informazioni aggiuntive'],
            'info_p' => ['es'=>'Aquí puedes agregar información específica para este elemento.','en'=>'Here you can add specific information for this item.','it'=>'Qui puoi aggiungere informazioni specifiche per questo elemento.'],
            'spec_h' => ['es'=>'Detalles específicos','en'=>'Specific details','it'=>'Dettagli specifici'],
            'more_h' => ['es'=>'Más información','en'=>'More information','it'=>'Maggiori informazioni'],
            'last_h' => ['es'=>'Última información','en'=>'Last information','it'=>'Ultime informazioni'],
            'items' => [
                't1' => ['es'=>'Primer elemento','en'=>'First item','it'=>'Primo elemento'],
                'd1' => ['es'=>'Descripción detallada del primer elemento de la lista. Aquí puedes explicar características, beneficios o detalles relevantes.','en'=>'Detailed description of the first list item. Explain features, benefits or relevant details here.','it'=>'Descrizione dettagliata del primo elemento. Spiega qui caratteristiche, benefici o dettagli rilevanti.'],
                't2' => ['es'=>'Segundo elemento','en'=>'Second item','it'=>'Secondo elemento'],
                'd2' => ['es'=>'Información sobre el segundo elemento, manteniendo consistencia de longitud y estilo.','en'=>'Information about the second item, keeping consistent length and style.','it'=>'Informazioni sul secondo elemento, mantenendo lunghezza e stile coerenti.'],
                't3' => ['es'=>'Tercer elemento','en'=>'Third item','it'=>'Terzo elemento'],
                'd3' => ['es'=>'Detalles del tercer elemento. Puedes agregar más elementos siguiendo la misma estructura.','en'=>'Details of the third item. You can add more items following the same structure.','it'=>'Dettagli del terzo elemento. Puoi aggiungere altri elementi seguendo la stessa struttura.'],
                't4' => ['es'=>'Cuarto elemento','en'=>'Fourth item','it'=>'Quarto elemento'],
                'd4' => ['es'=>'Descripción del cuarto elemento. La numeración mantiene el orden visual claro.','en'=>'Description of the fourth item. Numbering keeps visual order clear.','it'=>'Descrizione del quarto elemento. La numerazione mantiene chiaro l’ordine visivo.'],
                't5' => ['es'=>'Quinto elemento','en'=>'Fifth item','it'=>'Quinto elemento'],
                'd5' => ['es'=>'Información sobre el quinto elemento de esta lista de ejemplo.','en'=>'Information about the fifth item in this example list.','it'=>'Informazioni sul quinto elemento di questo elenco di esempio.'],
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
                    <p>Av. Brasil 3149, Montevideo</p>
                    <p>(+598) 2621 4822 / 2622 1422</p>
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