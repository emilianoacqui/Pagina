<!DOCTYPE html>
<?php if (session_status() === PHP_SESSION_NONE) { session_start(); } $cl = $_SESSION['lang'] ?? 'es'; ?>
<html lang="<?php echo $cl; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php $ii_meta=['es'=>'Intercambio Italia','en'=>'Italy Exchange','it'=>'Scambio Italia']; echo $ii_meta[$cl]; ?></title>
    <link rel="icon" type="image/png" href="/Pagina/VISTA/PaginaWeb/Pagina/FOTOS/fotosPrincipales/logotipo.png">
    <link rel="shortcut icon" href="/Pagina/favicon.ico">
    <link rel="stylesheet" href="breadcrumbs.css">
    <link rel="stylesheet" href="../css/IntercambioItalia.css">
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
            $ii = [
              'hero_t' => ['es'=>'Italia','en'=>'Italy','it'=>'Italia'],
              'hero_s' => ['es'=>'Intercambio a Italia','en'=>'Exchange to Italy','it'=>'Scambio in Italia'],
              'full_h' => ['es'=>'Encabezado Principal','en'=>'Main Heading','it'=>'Titolo principale'],
              'full_p' => [
                'es'=>'Intercambio en 4.º de liceo por 3 semanas con estudiantes de dos colegios italianos; al año siguiente ellos visitan nuestra escuela. Experiencia académica y cultural con familias anfitrionas.',
                'en'=>'Exchange in 4th year of high school for 3 weeks with students from two Italian schools; the following year they visit our school. Academic and cultural experience with host families.',
                'it'=>'Scambio in quarta liceo per 3 settimane con studenti di due scuole italiane; l’anno successivo visitano la nostra scuola. Esperienza accademica e culturale con famiglie ospitanti.',
              ],
              'quote' => [
                'es'=>'"Aprender otro idioma es abrir nuevas puertas al mundo."',
                'en'=>'"Learning another language opens new doors to the world."',
                'it'=>'"Imparare un’altra lingua apre nuove porte sul mondo."',
              ],
              'quote_author' => ['es'=>'- Programa de Intercambio','en'=>'- Exchange Program','it'=>'- Programma di Scambio'],
              'col1_h' => ['es'=>'Programa académico','en'=>'Academic program','it'=>'Programma accademico'],
              'col1_p' => [
                'es'=>'Detalles del plan de estudios, acompañamiento y actividades académicas previstas durante la estadía.',
                'en'=>'Details on curriculum, mentoring, and academic activities planned during the stay.',
                'it'=>'Dettagli sul curriculum, tutoraggio e attività accademiche previste durante il soggiorno.',
              ],
              'col2_h' => ['es'=>'Alojamiento y cultura','en'=>'Lodging and culture','it'=>'Alloggio e cultura'],
              'col2_p' => [
                'es'=>'Información sobre alojamiento, familias anfitrionas y experiencias culturales.',
                'en'=>'Information about lodging, host families, and cultural experiences.',
                'it'=>'Informazioni su alloggio, famiglie ospitanti ed esperienze culturali.',
              ],
              'final_h' => ['es'=>'Próximos pasos','en'=>'Next steps','it'=>'Prossimi passi'],
              'final_p' => [
                'es'=>'Sumario de beneficios y próximos pasos para postularse al intercambio.',
                'en'=>'Summary of benefits and next steps to apply for the exchange.',
                'it'=>'Sintesi dei benefici e prossimi passi per candidarsi allo scambio.',
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
          <section class="hero-centered editable-image" style="background-image: url('FOTOS/fotosIntercambio/italia.jpg'); background-size: cover; background-position: center;">
              <div class="hero-overlay"></div>
              <div class="hero-content-center">
                  <h1 class="hero-title-center editable-text"><?php echo $ii['hero_t'][$cl]; ?></h1>
                  <p class="hero-subtitle-center editable-text"><?php echo $ii['hero_s'][$cl]; ?></p>
              </div>
          </section>
          <div id="breadcrumbs" class="breadcrumbs-container"></div>

          <!-- Main Content -->
          <main class="main-centered">
              <div class="container">
                  <!-- Full Width Text -->
                  <section class="full-text">
                      <div class="text-container">
                          <h2 class="centered-title editable-text"><?php echo $ii['full_h'][$cl]; ?></h2>
                          <p class="centered-text editable-text"><?php echo $ii['full_p'][$cl]; ?></p>

                      </div>
                  </section>

                  <!-- Quote Section -->
                  <section class="quote-section">
                      <div class="quote-container">
                          <blockquote class="main-quote editable-text"><?php echo $ii['quote'][$cl]; ?></blockquote>
                          <cite class="quote-author editable-text"><?php echo $ii['quote_author'][$cl]; ?></cite>

                      </div>
                  </section>

                  <!-- Two Column Text -->
                  <section class="two-columns">
                      <div class="columns-container">
                          <div class="column">
                              <h3 class="column-title editable-text"><?php echo $ii['col1_h'][$cl]; ?></h3>
                              <p class="column-text editable-text"><?php echo $ii['col1_p'][$cl]; ?></p>

                          </div>
                          <div class="column">
                              <h3 class="column-title editable-text"><?php echo $ii['col2_h'][$cl]; ?></h3>
                              <p class="column-text editable-text"><?php echo $ii['col2_p'][$cl]; ?></p>

                          </div>
                      </div>
                  </section>

                  <!-- Final Text Section -->
                  <section class="final-text">
                      <div class="text-container">
                          <h2 class="centered-title editable-text"><?php echo $ii['final_h'][$cl]; ?></h2>
                          <p class="centered-text editable-text"><?php echo $ii['final_p'][$cl]; ?></p>

                      </div>
                  </section>

                  <section>
  <div class="boton-imagenes">
  <a href="ItaliaFotos.php" class="intercambio-btn">
    <?php echo $ii['see_photos'][$cl]; ?>
  </a>

</div>

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
                <h4><?php echo $ii['contact'][$cl]; ?></h4>

                <p>Gral. French 2380</p>
                <p>CP 11500 - Montevideo, Uruguay</p>
                <p>(+598) 2600 1527</p>
                <p>info@scuolaitaliana.edu.uy</p>
            </div>
        </div>
        
        <div class="footer-right">
            <div class="footer-section">
                <h4><?php echo $ii['links'][$cl]; ?></h4>
                <p><?php echo $ii['link_items'][$cl][0]; ?></p>
                <p><?php echo $ii['link_items'][$cl][1]; ?></p>
                <p><?php echo $ii['link_items'][$cl][2]; ?></p>

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