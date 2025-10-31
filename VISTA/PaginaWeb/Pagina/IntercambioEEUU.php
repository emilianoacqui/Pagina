<!DOCTYPE html>
<?php if (session_status() === PHP_SESSION_NONE) { session_start(); } $cl = $_SESSION['lang'] ?? 'es'; ?>
<html lang="<?php echo $cl; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php $ie_meta=['es'=>'Intercambio EEUU','en'=>'USA Exchange','it'=>'Scambio USA']; echo $ie_meta[$cl]; ?></title>
    <link rel="icon" type="image/png" href="/Pagina/VISTA/PaginaWeb/Pagina/FOTOS/fotosPrincipales/logotipo.png">
    <link rel="shortcut icon" href="/Pagina/favicon.ico">
    <link rel="stylesheet" href="breadcrumbs.css">
    <link rel="stylesheet" href="../css/IntercambioEEUU.css">
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
            $ie = [
              'hero_t' => ['es'=>'Estados Unidos','en'=>'United States','it'=>'Stati Uniti'],
              'hero_s' => ['es'=>'Intercambio scuola italiana','en'=>'Scuola Italiana exchange','it'=>'Scambio della Scuola Italiana'],
              'full_h' => ['es'=>'Encabezado Principal','en'=>'Main Heading','it'=>'Titolo principale'],
              'full_p' => [
                'es'=>'Intercambio en 6.º de escuela; los estudiantes asisten a una escuela en Estados Unidos y, al año siguiente, los anfitriones viajan a Uruguay. Experiencia académica y cultural con familias anfitrionas.',
                'en'=>'Exchange in 6th grade; students attend a school in the United States and, the following year, the hosts travel to Uruguay. Academic and cultural experience with host families.',
                'it'=>'Scambio in sesta classe; gli studenti frequentano una scuola negli Stati Uniti e, l’anno successivo, i partner vengono in Uruguay. Esperienza accademica e culturale con famiglie ospitanti.',
              ],
              'quote' => [
                'es'=>'"La mejor forma de aprender un idioma es vivirlo."',
                'en'=>'"The best way to learn a language is to live it."',
                'it'=>'"Il modo migliore per imparare una lingua è viverla."',
              ],
              'quote_author' => ['es'=>'- Programa de Intercambio','en'=>'- Exchange Program','it'=>'- Programma di Scambio'],
              'col1_h' => ['es'=>'Programa académico','en'=>'Academic program','it'=>'Programma accademico'],
              'col1_p' => [
                'es'=>'Plan académico, tutorías y actividades durante el año escolar.',
                'en'=>'Academic plan, mentoring and activities during the school year.',
                'it'=>'Piano accademico, tutoraggio e attività durante l’anno scolastico.',
              ],
              'col2_h' => ['es'=>'Alojamiento y cultura','en'=>'Lodging and culture','it'=>'Alloggio e cultura'],
              'col2_p' => [
                'es'=>'Alojamiento con familias anfitrionas y experiencias comunitarias.',
                'en'=>'Lodging with host families and community experiences.',
                'it'=>'Alloggio presso famiglie ospitanti ed esperienze comunitarie.',
              ],
              'final_h' => ['es'=>'Próximos pasos','en'=>'Next steps','it'=>'Prossimi passi'],
              'final_p' => [
                'es'=>'Beneficios del intercambio y pasos para la postulación.',
                'en'=>'Exchange benefits and application steps.',
                'it'=>'Benefici dello scambio e passi per la candidatura.',
              ],
              'see_photos' => ['es'=>'Ver Fotos','en'=>'See Photos','it'=>'Vedi foto'],
              'contact' => ['es'=>'Contacto','en'=>'Contact','it'=>'Contatto'],
              'links' => ['es'=>'Enlaces útiles','en'=>'Useful links','it'=>'Link utili'],
              'link_items' => [
                'es' => ['Política de privacidad','Requisitos técnicos','Accesibilidad'],
                'en' => ['Privacy Policy','Technical Requirements','Accessibility'],
                'it' => ['Informativa sulla privacy','Requisiti tecnici','Accessibilità'],
              ],
            ];
          ?>
          <section class="hero-centered editable-image" style="background-image: url('FOTOS/fotosIntercambio/EEUU.jpg'); background-size: cover; background-position: center;">
              <div class="hero-overlay"></div>
              <div class="hero-content-center">
                  <h1 class="hero-title-center editable-text"><?php echo $ie['hero_t'][$cl]; ?></h1>
                  <p class="hero-subtitle-center editable-text"><?php echo $ie['hero_s'][$cl]; ?></p>
              </div>
          </section>
          <div id="breadcrumbs" class="breadcrumbs-container"></div>

          <!-- Main Content -->
          <main class="main-centered">
              <div class="container">
                  <!-- Full Width Text -->
                  <section class="full-text">
                      <div class="text-container">
                          <h2 class="centered-title editable-text"><?php echo $ie['full_h'][$cl]; ?></h2>
                          <p class="centered-text editable-text"><?php echo $ie['full_p'][$cl]; ?></p>

                      </div>
                  </section>

                  <!-- Quote Section -->
                  <section class="quote-section">
                      <div class="quote-container">
                          <blockquote class="main-quote editable-text"><?php echo $ie['quote'][$cl]; ?></blockquote>
                          <cite class="quote-author editable-text"><?php echo $ie['quote_author'][$cl]; ?></cite>

                      </div>
                  </section>

                  <!-- Two Column Text -->
                  <section class="two-columns">
                      <div class="columns-container">
                          <div class="column">
                              <h3 class="column-title editable-text"><?php echo $ie['col1_h'][$cl]; ?></h3>
                              <p class="column-text editable-text"><?php echo $ie['col1_p'][$cl]; ?></p>

                          </div>
                          <div class="column">
                              <h3 class="column-title editable-text"><?php echo $ie['col2_h'][$cl]; ?></h3>
                              <p class="column-text editable-text"><?php echo $ie['col2_p'][$cl]; ?></p>

                          </div>
                      </div>
                  </section>

                  <!-- Final Text Section -->
                  <section class="final-text">
                      <div class="text-container">
                          <h2 class="centered-title editable-text"><?php echo $ie['final_h'][$cl]; ?></h2>
                          <p class="centered-text editable-text"><?php echo $ie['final_p'][$cl]; ?></p>

                      </div>
                  </section>

                  <section>
  <div class="boton-imagenes">
  <a href="EEUUFotos.php" class="intercambio-btn">
    <?php echo $ie['see_photos'][$cl]; ?>
  </a>

</div>
</section>

<style>
.boton-imagenes {
    text-align: center; /* centra el botón en la sección */
    margin: 40px 0;
}

.boton-imagenes button {
    background-color: #DC343C;   /* rojo */
    color: white;               /* texto blanco */
    border: none;               /* sin borde */
    padding: 12px 24px;         /* espacio interno */
    border-radius: 6px;         /* esquinas redondeadas */
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    transition: background 0.3s, transform 0.2s;
}

.boton-imagenes button:hover {
    background-color: #a50000;  /* rojo más oscuro al pasar el mouse */
    transform: scale(1.05);     /* efecto zoom suave */
}
</style>

              </div>
          </main>
        <style>
            * { margin: 0; padding: 0; box-sizing: border-box; }
          body { font-family: 'Merriweather Sans', sans-serif; line-height: 1.6; color: #333; }
          .container { max-width: 1200px; margin: 0 auto; padding: 0 20px; }
 
          .navbar { position: relative; background: rgba(10, 36, 82, 0.5); z-index: 1000; height: 80px; }
          .nav-container { display: flex; justify-content: space-between; align-items: center; padding: 15px 5%; max-width: 1200px; margin: 0 auto;  height: 100%; }
          .nav-logo img { height: 120px; width: auto; }
          .nav-menu-button { display: flex; flex-direction: column; cursor: pointer; padding: 8px; }
          .nav-menu-button span { width: 25px; height: 3px; background: white; margin: 3px 0; border-radius: 2px; }

            /* Navigation */
          .hero-centered { 
    position: relative;
    top: -80px;
    height: calc(70vh + 80px); 
    display: flex; 
    align-items: center; 
    justify-content: center; 
    margin-bottom: -80px;
}         

          .hero-overlay { position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(27, 47, 111, 0.3); }
          .hero-content-center { text-align: center; color: white; z-index: 2; position: relative; max-width: 800px; padding: 0 20px; }
          .hero-title-center { font-size: 3.5rem; font-weight: 700; margin-bottom: 20px; }
          .hero-subtitle-center { font-size: 1.3rem; opacity: 0.95; }

          /* Main Content Centered */
          .main-centered { padding: 80px 0; }
          
          .full-text, .final-text { margin: 60px 0; }
          .text-container { max-width: 800px; margin: 0 auto; text-align: center; }
          .centered-title { font-size: 2.2rem; color: #1B2F6F; margin-bottom: 30px; }
          .centered-text { font-size: 1.1rem; color: #555; line-height: 1.8; }

          /* Quote Section */
          .quote-section { background: #f8f9fa; padding: 60px 0; margin: 60px 0; }
          .quote-container { max-width: 700px; margin: 0 auto; text-align: center; }
          .main-quote { font-size: 1.5rem; font-style: italic; color: #1B2F6F; line-height: 1.6; border: none; margin-bottom: 20px; }
          .quote-author { font-size: 1rem; color: #DC343C; font-weight: 600; }

          /* Two Columns */
          .two-columns { margin: 60px 0; }
          .columns-container { display: grid; grid-template-columns: 1fr 1fr; gap: 60px; max-width: 900px; margin: 0 auto; }
          .column-title { font-size: 1.4rem; color: #1B2F6F; margin-bottom: 20px; }
          .column-text { color: #555; line-height: 1.7; }

          /* Footer */
          .footer { background: #1B2F6F; color: white; padding: 40px 0; text-align: center; }
          .footer-logo { height: 60px; margin-bottom: 15px; }

          @media (max-width: 768px) {
              .columns-container { grid-template-columns: 1fr; gap: 40px; }
              .hero-title-center { font-size: 2.5rem; }
          }
        </style>
        <footer class="footer-bottom-new">
    <div class="footer-container">
        <div class="footer-left">
            <div class="footer-logo">
                <img src="FOTOS/fotosPrincipales/logo2.png" alt="Scuola Italiana di Montevideo" style="height: 60px;">
            </div>
            <div class="footer-subtitle">
                <p>AMC Scuola Italiana di Montevideo</p>
            </div>
        </div>
        
        <div class="footer-center">
            <div class="footer-section">
                <h4><?php echo $ie['contact'][$cl]; ?></h4>
                <p>Gral. French 2380</p>
                <p>CP 11500 - Montevideo, Uruguay</p>
                <p>(+598) 2600 1527</p>
                <p>info@scuolaitaliana.edu.uy</p>
            </div>
        </div>
        
        <div class="footer-right">
            <div class="footer-section">
                <h4><?php echo $ie['links'][$cl]; ?></h4>
                <p><?php echo $ie['link_items'][$cl][0]; ?></p>
                <p><?php echo $ie['link_items'][$cl][1]; ?></p>
                <p><?php echo $ie['link_items'][$cl][2]; ?></p>
            </div>
        </div>
    </div>
    
    <div class="footer-info-bar">
        <p>Desarrollado por el equipo SGE | Proyecto de apoyo 2002 - EE Informática</p>
    </div>
</footer>

</div>
<script src="breadcrumbs.js"></script>
<script src="cms-admin.js"></script>
<script src="analytics.js"></script>
</body>
</html>