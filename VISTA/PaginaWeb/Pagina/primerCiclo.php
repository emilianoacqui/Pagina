<!DOCTYPE html>
<?php if (session_status() === PHP_SESSION_NONE) { session_start(); } $cl = $_SESSION['lang'] ?? 'es'; ?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php $pc_meta=['es'=>'Primer Ciclo - Scuola Italiana di Montevideo','en'=>'First Cycle - Scuola Italiana di Montevideo','it'=>'Primo Ciclo - Scuola Italiana di Montevideo']; echo $pc_meta[$cl]; ?></title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@400;700&family=Crimson+Pro:wght@400;600;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="breadcrumbs.css">
    <link rel="stylesheet" href="../css/primerCiclo.css">
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

    <!-- Main Content -->
    <main class="main-content">
        <!-- Color Header Bands -->
        <div class="color-bands">
            <div class="green-band"></div>
            <div class="red-band"></div>
        </div>

        <!-- Hero Image -->
        <section class="hero-section">
            <img src="FOTOS/fotosClases/Primerciclo1.jpg" alt="Casa dei Bambini" class="hero-image">
        </section>
        <div id="breadcrumbs" class="breadcrumbs-container"></div>

        <!-- Title Section -->
        <?php 
            $pc = [
                'title' => ['es'=>'Primer Ciclo','en'=>'First Cycle','it'=>'Primo Ciclo'],
                'subtitle' => [
                    'es' => 'En los primeros años de Secundaria se continúa el trabajo iniciado en Primaria con las prácticas reflexivas, autónomas y de creciente rigor académico que permitan, finalizado el ciclo, continuar los estudios superiores.',
                    'en' => 'In the first years of Secondary, we continue the work started in Primary with reflective and autonomous practices and increasing academic rigor that will allow students to pursue higher education upon completion of the cycle.',
                    'it' => 'Nei primi anni della Scuola Secondaria si prosegue il lavoro iniziato nella Scuola Primaria con pratiche riflessive, autonome e di crescente rigore accademico che consentano, al termine del ciclo, di proseguire gli studi superiori.'
                ],
                'sec1' => [
                    'es' => 'La estructura actual comprende un tercer ciclo de Educación Básica Integral (EBI) de tres años, seguido por tres años de Educación Media Superior. Este último nivel incluye un primer año común y dos años (segundo y tercero) diversificados, durante los cuales los estudiantes deben elegir su orientación de acuerdo con su vocación.',
                    'en' => 'The current structure includes a three-year Comprehensive Basic Education (EBI) cycle, followed by three years of Upper Secondary Education. This last level includes a common first year and two diversified years (second and third), during which students must choose their orientation according to their vocation.',
                    'it' => 'La struttura attuale comprende un terzo ciclo di Educazione di Base Integrale (EBI) di tre anni, seguito da tre anni di Istruzione Secondaria Superiore. Questo ultimo livello include un primo anno comune e due anni (secondo e terzo) diversificati, durante i quali gli studenti devono scegliere il loro orientamento in base alla loro vocazione.'
                ],
                'sec2' => [
                    'es' => 'Promovemos el trabajo cooperativo, la interdisciplinariedad, la reflexión, el desarrollo de estrategias meta-cognitivas y de las capacidades de autonomía en el estudio que permitan al alumno ser independiente en la adquisición de nuevos saberes.',
                    'en' => 'We promote cooperative work, interdisciplinarity, reflection, the development of meta-cognitive strategies, and study autonomy skills that allow students to be independent in acquiring new knowledge.',
                    'it' => 'Promuoviamo il lavoro cooperativo, l\'interdisciplinarietà, la riflessione, lo sviluppo di strategie metacognitive e delle capacità di autonomia nello studio che consentano allo studente di essere indipendente nell\'acquisizione di nuove conoscenze.'
                ],
                'objectives_h' => ['es'=>'Objetivos:','en'=>'Objectives:','it'=>'Obiettivi:'],
                'objectives' => [
                    'es' => [
                        'Promover el desarrollo integral (afectivo, cognitivo y vincular)',
                        'Potenciar las competencias comunicativas en las tres lenguas (español, italiano e inglés)',
                        'Promover la creatividad, la curiosidad y la autonomía',
                        'Favorecer el desarrollo de los aprendizajes teniendo en cuenta las características y la potencialidad de cada uno',
                        'Educar a la ciudadanía, a la convivencia democrática, a la paz',
                        'Educar a la interculturalidad y a la aceptación de la diversidad',
                        'Educar a la comunicación artístico-expresiva',
                        'Trabajar con el método científico: observar y analizar hechos, fenómenos, situaciones',
                        'Promover una conciencia ecologista y la defensa del medio ambiente'
                    ],
                    'en' => [
                        'Promote comprehensive development (affective, cognitive, and relational)',
                        'Enhance communication skills in the three languages (Spanish, Italian, and English)',
                        'Promote creativity, curiosity, and autonomy',
                        'Foster learning development considering each student\'s characteristics and potential',
                        'Educate for citizenship, democratic coexistence, and peace',
                        'Educate for interculturality and acceptance of diversity',
                        'Educate for artistic-expressive communication',
                        'Work with the scientific method: observe and analyze facts, phenomena, situations',
                        'Promote ecological awareness and environmental protection'
                    ],
                    'it' => [
                        'Promuovere lo sviluppo integrale (affettivo, cognitivo e relazionale)',
                        'Potenziare le competenze comunicative nelle tre lingue (spagnolo, italiano e inglese)',
                        'Promuovere la creatività, la curiosità e l\'autonomia',
                        'Favorire lo sviluppo degli apprendimenti tenendo conto delle caratteristiche e del potenziale di ciascuno',
                        'Educare alla cittadinanza, alla convivenza democratica, alla pace',
                        'Educare all\'interculturalità e all\'accettazione della diversità',
                        'Educare alla comunicazione artistico-espressiva',
                        'Lavorare con il metodo scientifico: osservare e analizzare fatti, fenomeni, situazioni',
                        'Promuovere una coscienza ecologista e la difesa dell\'ambiente'
                    ]
                ],
                'scuola_h' => ['es'=>'SCUOLA SECONDARIA DI I GRADO ITALIANA','en'=>'ITALIAN LOWER SECONDARY SCHOOL','it'=>'SCUOLA SECONDARIA DI I GRADO ITALIANA'],
                'scuola_p' => [
                    'es' => 'Nuestro Plan de Estudios Integrado, correspondiente a ambos sistemas, reconocido por Italia y Uruguay, permite continuar los estudios en nuestro Bachillerato Internacional Europeo. Al finalizar se obtiene doble titulación, nuestro Diploma habilita a continuar los estudios terciarios en Uruguay, Italia y en todos los países en que es reconocido.',
                    'en' => 'Our Integrated Curriculum, corresponding to both systems and recognized by Italy and Uruguay, allows students to continue their studies in our European International Baccalaureate. Upon completion, a double degree is obtained, and our Diploma enables students to continue tertiary education in Uruguay, Italy, and all countries where it is recognized.',
                    'it' => 'Il nostro Piano di Studi Integrato, corrispondente ad entrambi i sistemi e riconosciuto da Italia e Uruguay, consente di proseguire gli studi nel nostro Liceo Internazionale Europeo. Al termine si ottiene un doppio titolo, il nostro Diploma abilita a continuare gli studi terziari in Uruguay, Italia e in tutti i paesi in cui è riconosciuto.'
                ],
                'final_p' => [
                    'es' => 'La Secundaria de la Scuola italiana di Montevideo es Paritaria para Italia y Habilitada para Uruguay. Los alumnos que ingresan a la Scuola provenientes de otras Instituciones Educativas Públicas o Privadas, pueden incorporarse a la Scuola Paritaria, bajo ciertos requisitos.',
                    'en' => 'The Secondary School of Scuola Italiana di Montevideo is Paritaria for Italy and Authorized for Uruguay. Students entering the School from other Public or Private Educational Institutions can join the Paritaria School, subject to certain requirements.',
                    'it' => 'La Scuola Secondaria della Scuola Italiana di Montevideo è Paritaria per l\'Italia e Abilitata per l\'Uruguay. Gli studenti che entrano nella Scuola provenienti da altre Istituzioni Educative Pubbliche o Private possono iscriversi alla Scuola Paritaria, previa verifica di determinati requisiti.'
                ],
                'contact' => ['es'=>'Contacto','en'=>'Contact','it'=>'Contatto'],
                'links' => ['es'=>'Enlaces útiles','en'=>'Useful links','it'=>'Link utili'],
                'link_items' => [
                    'es' => ['Política de privacidad','Requisitos técnicos','Accesibilidad'],
                    'en' => ['Privacy Policy','Technical Requirements','Accessibility'],
                    'it' => ['Informativa sulla privacy','Requisiti tecnici','Accessibilità']
                ],
            ];
        ?>
        <section class="title-section">
            <h1 class="main-title">
                <span class="blue-text"><?php echo $pc['title'][$cl]; ?> </span>
                
            </h1>
            <p class="subtitle"><?php echo $pc['subtitle'][$cl]; ?></p>
        </section>

        <!-- Content Sections -->
        <section class="content-sections">
            <!-- Section 1 -->
            <div class="content-row">
                <div class="text-content left">
                    <p><?php echo $pc['sec1'][$cl]; ?></p>
                </div>

                <div class="image-content right">
                    <img src="FOTOS/fotosClases/primerciclo2.jpg" alt="Actividades Montessori">
                </div>
            </div>

            <!-- Section 2 -->
            <div class="content-row reverse">
                <div class="image-content left">
                    <img src="FOTOS/fotosClases/primerciclo3.jpg" alt="Psicomotricidad">
                </div>
                <div class="text-content right">
                    <p><strong><?php echo $pc['objectives_h'][$cl]; ?></strong><br>
                    <?php foreach ($pc['objectives'][$cl] as $idx => $item): ?>
                        <?php echo ($idx+1).'.&nbsp;&nbsp;'.$item; ?><br>
                    <?php endforeach; ?></p>
                </div>

            </div>

            <!-- Section 3 -->
            <div class="content-row">
                <div class="text-content left">
                    <p> <strong><?php echo $pc['scuola_h'][$cl]; ?></strong><br><br>
                    <?php echo $pc['scuola_p'][$cl]; ?></p>
                </div>

                <div class="image-content right">
                    <img src="FOTOS/fotosClases/primerciclo4.jpg" alt="Idiomas">
                </div>
            </div>

            <!-- Section 4 -->
            <div class="content-row reverse">
                <div class="image-content left">
                    <img src="FOTOS/fotosClases/primerciclo5.jpg" alt="Italiano">
                </div>
                <div class="text-content right">
                    <p><?php echo $pc['final_p'][$cl]; ?></p>
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
                <img src="FOTOS/fotosClases/Primerciclo1.jpg" alt="Galería 1">
                <img src="FOTOS/fotosClases/primerciclo2.jpg" alt="Galería 2">
                <img src="FOTOS/fotosClases/primerciclo3.jpg" alt="Galería 3">
                <img src="FOTOS/fotosClases/primerciclo4.jpg" alt="Galería 4">
                <img src="FOTOS/fotosClases/primerciclo5.jpg" alt="Galería 5">
                <img src="FOTOS/fotosClases/Primerciclo1.jpg" alt="Galería 6">
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
                    <h4><?php echo $pc['contact'][$cl]; ?></h4>
                    <p>Gral. French 2380</p>
                    <p>(+598) 2621 4822 / 2622 1422</p>
                    <p>info@scuolaitaliana.edu.uy</p>
                </div>
            </div>
            
            <div class="footer-right">
                <div class="footer-section">
                    <h4><?php echo $pc['links'][$cl]; ?></h4>
                    <p><?php echo $pc['link_items'][$cl][0]; ?></p>
                    <p><?php echo $pc['link_items'][$cl][1]; ?></p>
                    <p><?php echo $pc['link_items'][$cl][2]; ?></p>
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