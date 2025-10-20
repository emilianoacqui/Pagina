<!DOCTYPE html>
<?php if (session_status() === PHP_SESSION_NONE) { session_start(); } $cl = $_SESSION['lang'] ?? 'es'; ?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php $vm_meta=['es'=>'Acerca de la Scuola Italiana','en'=>'About Scuola Italiana','it'=>'Informazioni sulla Scuola Italiana']; echo $vm_meta[$cl]; ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Crimson+Pro:ital,wght@0,400;0,600;0,700;1,400&family=Merriweather+Sans:wght@400;700;800&family=Red+Hat+Text:wght@400;600;700&family=Ruwudu:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="breadcrumbs.css">
    <link rel="stylesheet" href="../css/verMas.css">
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar">
        <div class="nav-container">
            <div class="nav-logo">
                <img src="FOTOS/fotosPrincipales/logo2.png" alt="Scuola Italiana di Montevideo">
            </div>
            <div class="nav-menu-button" onclick="alert('Navegación al menú')">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <?php 
        $vm = [
            'hero_t' => ['es'=>'Acerca de la Scuola italiana','en'=>'About the Scuola Italiana','it'=>'Informazioni sulla Scuola Italiana'],
            'welcome_t' => ['es'=>'Bienvenido a la <span class="italic-red">Scuola Italiana</span>','en'=>'Welcome to the <span class="italic-red">Scuola Italiana</span>','it'=>'Benvenuto alla <span class="italic-red">Scuola Italiana</span>'],
            'welcome_p' => [
                'es' => 'La Scuola Italiana di Montevideo ofrece una propuesta educativa nacional e internacional que promueve el plurilingüismo, la multiculturalidad y el contacto directo con la naturaleza en un entorno de 13 hectáreas. Nuestro campus incluye instalaciones modernas, como polideportivo, pistas y canchas, que permiten integrar el aprendizaje y la vida escolar en un mismo espacio. Nos enfocamos en desarrollar la autonomía y la ciudadanía responsable desde edades tempranas, fomentando la participación estudiantil activa y el aprendizaje basado en proyectos. Esto impulsa habilidades clave como el trabajo en equipo, el liderazgo, el pensamiento crítico y la creatividad.',
                'en' => 'The Scuola Italiana di Montevideo offers a national and international educational proposal that promotes multilingualism, multiculturalism and direct contact with nature on a 13‑hectare campus. Our facilities include a sports center, tracks and courts, integrating learning and school life in one place. We focus on autonomy and responsible citizenship from an early age, encouraging active student participation and project‑based learning, which builds teamwork, leadership, critical thinking and creativity.',
                'it' => 'La Scuola Italiana di Montevideo offre una proposta educativa nazionale e internazionale che promuove il plurilinguismo, l’interculturalità e il contatto diretto con la natura in un campus di 13 ettari. Il nostro campus include impianti moderni come polisportivo, piste e campi, integrando apprendimento e vita scolastica in un unico spazio. Puntiamo su autonomia e cittadinanza responsabile fin dalla tenera età, favorendo la partecipazione attiva e l’apprendimento basato su progetti, sviluppando lavoro di squadra, leadership, pensiero critico e creatività.',
            ],
            'quote_lbl' => ['es'=>'Consejo didáctico','en'=>'Didactic Council','it'=>'Consiglio didattico'],
            'cards' => [
                'c1_t' => ['es'=>'Nuestra misión','en'=>'Our Mission','it'=>'La nostra missione'],
                'c1_p' => ['es'=>'Diseñamos soluciones digitales innovadoras que optimizan la gestión educativa y fortalecen la comunicación entre instituciones, docentes, estudiantes y familias, contribuyendo activamente a la transformación digital y modernización del sector educativo.','en'=>'To accompany and guide students in their learning so they grow as autonomous, creative and caring people, committed to responsible citizenship in a multicultural, multilingual environment. We work to keep the Italian language and culture alive in our country.','it'=>'Accompagnare e guidare gli studenti nel loro apprendimento affinché crescano come persone autonome, creative e solidali, impegnate in una cittadinanza responsabile in un ambiente multiculturale e plurilingue. Lavoriamo per mantenere viva la lingua e la cultura italiana nel nostro paese.'],
                'c2_t' => ['es'=>'Nuestra visión','en'=>'Our Vision','it'=>'La nostra visione'],
                'c2_p' => ['es'=>'Ser la empresa referente en el desarrollo de plataformas tecnológicas educativas en Uruguay y América Latina, reconocidos por nuestra calidad, accesibilidad, innovación y compromiso con las comunidades educativas.','en'=>'To be a cultural and educational benchmark that, from a humanist, innovative and dynamic perspective, supports students in building their personal identity, promoting cooperation, continuous learning and values such as respect, responsibility, honesty and effort.','it'=>'Essere un punto di riferimento culturale ed educativo che, con una prospettiva umanista, innovativa e dinamica, accompagni gli studenti nella costruzione della loro identità personale, promuovendo cooperazione, apprendimento continuo e valori come rispetto, responsabilità, onestà e impegno.'],
                'c3_t' => ['es'=>'Nuestra comunidad','en'=>'Our Community','it'=>'La nostra comunità'],
                'c3_p' => ['es'=>'Fomentamos una cultura donde todas las diferencias e identidades son valoradas y celebradas como cualidad esencial de la educación en nuestro entorno de aprendizaje.','en'=>'We foster a culture where all differences and identities are valued and celebrated as an essential quality of education in our learning environment.','it'=>'Promuoviamo una cultura in cui tutte le differenze e identità sono valorizzate e celebrate come qualità essenziale dell’educazione nel nostro ambiente di apprendimento.'],
            ],
            'stats_t' => ['es'=>'<span class="red-italic">Datos sobre</span> <span class="blue">la Scuola italiana</span>','en'=>'<span class="red-italic">Facts about</span> <span class="blue">the Scuola Italiana</span>','it'=>'<span class="red-italic">Dati sulla</span> <span class="blue">Scuola Italiana</span>'],
            'stat_students' => ['es'=>'Estudiantes','en'=>'Students','it'=>'Studenti'],
            'stat_students_desc' => ['es'=>'estudiantes en todo el colegio','en'=>'students across the school','it'=>'studenti in tutta la scuola'],
            'stat_diverse' => ['es'=>'racial/étnicamente diversos','en'=>'racially/ethnically diverse','it'=>'diversi per razza/etnia'],
            'stat_acad' => ['es'=>'Academia','en'=>'Academics','it'=>'Accademia'],
            'stat_orient' => ['es'=>'Más de 5','en'=>'> 5','it'=>'> 5'],
            'stat_orient_desc' => ['es'=>'orientaciones','en'=>'tracks','it'=>'indirizzi'],
            'stat_aid' => ['es'=>'Ayuda Financiera','en'=>'Financial Aid','it'=>'Assistenza Finanziaria'],
            'stat_aid_avail' => ['es'=>'Disponible','en'=>'Available','it'=>'Disponibile'],
            'stat_aid_desc' => ['es'=>'para familias que califican','en'=>'for qualifying families','it'=>'per famiglie idonee'],
            'prop_t' => ['es'=>'<span class="blue">Propuesta</span> <span class="red">Educativa</span>','en'=>'<span class="blue">Educational</span> <span class="red">Proposal</span>','it'=>'<span class="blue">Proposta</span> <span class="red">Educativa</span>'],
            'prop_p' => [
                'es' => [
                    'Guiar a nuestros alumnos para que logren una formación sólida y abierta al mundo.',
                    'Promover una educación integral que abarque la dimensión cognitiva, física, social y emocional de cada persona.',
                    'Actuar con compromiso, profesionalismo y convicción para que cada persona pueda lograr su máximo potencial.',
                    'Valorar el vínculo familia-institución para acompañar a nuestros niños y jóvenes.',
                    'Inspirar amor por la lengua y cultura italiana.',
                    'Respetar el espacio que nos rodea y educar para su preservación.',
                    'Fomentar el valor del compromiso, el trabajo en equipo y la iniciativa.',
                    'Ayudar a nuestros alumnos a crecer felices.',
                ],
                'en' => [
                    'Guide our students toward a solid, world‑open education.',
                    'Promote holistic education spanning cognitive, physical, social and emotional dimensions.',
                    'Act with commitment and professionalism so each person reaches their potential.',
                    'Value the family‑school bond to support children and youth.',
                    'Inspire love for the Italian language and culture.',
                    'Respect the environment and educate for its preservation.',
                    'Foster commitment, teamwork and initiative.',
                    'Help our students grow happy.',
                ],
                'it' => [
                    'Guidare gli studenti verso una formazione solida e aperta al mondo.',
                    'Promuovere un’educazione integrale che abbracci dimensioni cognitive, fisiche, sociali ed emotive.',
                    'Agire con impegno e professionalità affinché ciascuno raggiunga il proprio potenziale.',
                    'Valorizzare il legame famiglia‑scuola per sostenere bambini e ragazzi.',
                    'Ispirare amore per la lingua e la cultura italiana.',
                    'Rispettare l’ambiente ed educare alla sua tutela.',
                    'Favorire impegno, lavoro di squadra e iniziativa.',
                    'Aiutare i nostri studenti a crescere felici.',
                ],
            ],
            'contact' => ['es'=>'Contacto','en'=>'Contact','it'=>'Contatto'],
            'links' => ['es'=>'Enlaces útiles','en'=>'Useful links','it'=>'Link utili'],
            'link_items' => [
                'es' => ['Política de privacidad','Requisitos técnicos','Accesibilidad'],
                'en' => ['Privacy Policy','Technical Requirements','Accessibility'],
                'it' => ['Informativa sulla privacy','Requisiti tecnici','Accessibilità'],
            ],
        ];
    ?>
    <section class="hero-section">
        <div class="hero-overlay">
            <h1 class="hero-title"><?php echo $vm['hero_t'][$cl]; ?></h1>
        </div>
    </section>

    <div id="breadcrumbs" class="breadcrumbs-container"></div>

    <!-- Welcome Section -->
    <section class="welcome-section">
        <h2 class="welcome-title"><?php echo $vm['welcome_t'][$cl]; ?></h2>

        <p class="welcome-description"><?php echo $vm['welcome_p'][$cl]; ?></p>

        <div class="welcome-content">
            <div class="welcome-image">
                <img src="FOTOS/fotosClases/primerciclo3.jpg" alt="Estudiantes de la Scuola Italiana">
            </div>

            <div class="welcome-text">
                <div class="quote-mark">"</div>
                <p><?php echo [
                    'es' => '¡Gracias por su interés en la Scuola Italiana! Somos una comunidad de estudiantes vibrante e inclusiva, compuesta por estudiantes y educadores comprometidos, curiosos, creativos, decididos y amables. A través de nuestros programas <span class="highlight">académicos</span>, <span class="highlight">extracurriculares</span> y <span class="highlight">deportivos</span>, apoyamos activamente la búsqueda de la excelencia de nuestros estudiantes, reconociendo que este proceso les ayuda a descubrir sus pasiones individuales, a construir un sentido de comunidad y a prepararse para una vida plena y autodeterminada.',
                    'en' => 'Thank you for your interest in the Scuola Italiana! We are a vibrant and inclusive community of students and educators who are committed, curious, creative, determined and kind. Through our <span class="highlight">academic</span>, <span class="highlight">extracurricular</span> and <span class="highlight">sports</span> programs, we actively support our students’ pursuit of excellence, helping them discover their passions, build a sense of community and prepare for a full, self‑determined life.',
                    'it' => 'Grazie per il vostro interesse per la Scuola Italiana! Siamo una comunità vivace e inclusiva di studenti ed educatori, impegnati, curiosi, creativi, determinati e gentili. Attraverso i nostri programmi <span class="highlight">accademici</span>, <span class="highlight">extracurricolari</span> e <span class="highlight">sportivi</span>, sosteniamo attivamente la ricerca dell’eccellenza, aiutando gli studenti a scoprire le proprie passioni, a costruire senso di comunità e a prepararsi a una vita piena e autodeterminata.',
                ][$cl]; ?></p>
                <div class="consejo-text"><?php echo $vm['quote_lbl'][$cl]; ?></div>

            </div>
        </div>
    </section>

    <!-- Three Cards Section -->
    <section class="cards-section">
        <div class="cards-container">
            <div class="card">
                <div class="card-image" style="background-image: url('FOTOS/fotosPrincipales/FotoScuola3.jpg')"></div>
                <div class="card-content">
                    <h3 class="card-title"><?php echo $vm['cards']['c1_t'][$cl]; ?></h3>
                    <p class="card-text"><?php echo $vm['cards']['c1_p'][$cl]; ?></p>

                </div>
            </div>

            <div class="card">
                <div class="card-image" style="background-image: url('FOTOS/fotosPrincipales/FotoScuola2.jpg')"></div>
                <div class="card-content">
                    <h3 class="card-title"><?php echo $vm['cards']['c2_t'][$cl]; ?></h3>
                    <p class="card-text"><?php echo $vm['cards']['c2_p'][$cl]; ?></p>

                </div>
            </div>

            <div class="card">
                <div class="card-image" style="background-image: url('FOTOS/fotosPrincipales/Comunidad.jpg')"></div>
                <div class="card-content">
                    <h3 class="card-title"><?php echo $vm['cards']['c3_t'][$cl]; ?></h3>
                    <p class="card-text"><?php echo $vm['cards']['c3_p'][$cl]; ?></p>

                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section">
        <h2 class="stats-title"><?php echo $vm['stats_t'][$cl]; ?></h2>

        <div class="stats-container">
            <div class="stat-card">
                <div class="stat-category"><?php echo $vm['stat_students'][$cl]; ?></div>

                <div class="stat-number">1000</div>
                <div class="stat-description"><?php echo $vm['stat_students_desc'][$cl]; ?></div>

                <div class="stat-number">33%</div>
                <div class="stat-description"><?php echo $vm['stat_diverse'][$cl]; ?></div>

            </div>

            <div class="stat-card">
                <div class="stat-category"><?php echo $vm['stat_acad'][$cl]; ?></div>

                <div class="stat-number"><?php echo $vm['stat_orient'][$cl]; ?></div>

                <div class="stat-description"><?php echo $vm['stat_orient_desc'][$cl]; ?></div>

            </div>

            <div class="stat-card">
                <div class="stat-category"><?php echo $vm['stat_aid'][$cl]; ?></div>

                <div class="stat-number"><?php echo $vm['stat_aid_avail'][$cl]; ?></div>

                <div class="stat-description"><?php echo $vm['stat_aid_desc'][$cl]; ?></div>

            </div>
        </div>
    </section>

    <!-- Educational Proposal Section -->
    <section class="proposal-section">
        <h2 class="proposal-title"><?php echo $vm['prop_t'][$cl]; ?></h2>

        <div class="proposal-content">
            <div class="proposal-image">
                <img src="FOTOS/fotosPrincipales/propuesta.jpg" alt="Campus de la Scuola Italiana">
            </div>

            <div class="proposal-text-box">
                <div class="proposal-text">
                    <?php foreach ($vm['prop_p'][$cl] as $pp): ?>
                        <p><?php echo $pp; ?></p>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer-bottom-new">
        <div class="footer-container">
            <div class="footer-Aleft">
                <div class="footer-logo">
                    <img src="https://images.unsplash.com/photo-1599742744838-c3f7a6d0d8b0?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=100&q=80" alt="Scuola Italiana di Montevideo" style="height: 60px;">
                </div>
                <div class="footer-subtitle">
                    <p>Scuola Italiana di Montevideo</p>
                </div>
            </div>

            <div class="footer-center">
                <div class="footer-section">
                    <h4><?php echo $vm['contact'][$cl]; ?></h4>

                    <p>Gral. French 2380</p>
                    <p>CP 11500 - Montevideo, Uruguay</p>
                    <p>(+598) 2600 1527</p>
                    <p>info@scuolaitaliana.edu.uy</p>
                </div>
            </div>

            <div class="footer-right">
                <div class="footer-section">
                    <h4><?php echo $vm['links'][$cl]; ?></h4>
                    <p><?php echo $vm['link_items'][$cl][0]; ?></p>
                    <p><?php echo $vm['link_items'][$cl][1]; ?></p>
                    <p><?php echo $vm['link_items'][$cl][2]; ?></p>

                </div>
            </div>
        </div>

        <div class="footer-info-bar">
            <p>Desarrollado por el equipo SGE | Proyecto de apoyo 2002 - EE Informática</p>
        </div>
    </footer>

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