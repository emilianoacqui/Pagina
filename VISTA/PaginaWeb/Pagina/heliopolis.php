<!DOCTYPE html>
<?php if (session_status() === PHP_SESSION_NONE) { session_start(); } $cl = $_SESSION['lang'] ?? 'es'; ?>
<html lang="<?php echo $cl; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php $he_meta=['es'=>'Heliopolis','en'=>'Heliopolis','it'=>'Heliopolis']; echo $he_meta[$cl]; ?></title>
    <link rel="stylesheet" href="breadcrumbs.css">
    <link rel="stylesheet" href="../css/heliopolis.css">
</head>
<div id="cms-root"></div>
<body>
    <div id="original-content">
     <!-- Navigation -->
          <nav class="navbar">
              <div class="nav-container">
                  <div class="nav-logo">
                      <img src="FOTOS/fotosPrincipales/logo2.png" alt="Scuola Italiana di Montevideo" style="height: 120px;">
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
            $he = [
              'hero_t' => ['es'=>'Heliopolis','en'=>'Heliopolis','it'=>'Heliopolis'],
              'hero_s' => ['es'=>'Una colección de imágenes organizadas visualmente','en'=>'A visually organized image collection','it'=>'Una raccolta di immagini organizzate visivamente'],
              'gal_t' => ['es'=>'heliopolis','en'=>'heliopolis','it'=>'heliopolis'],
              'gal_d' => ['es'=>'En el marco del proyecto “Heliópolis”, los estudiantes investigan sobre Francisco Piria y sus conexiones con la alquimia y la astronomía, visitando Piriápolis y puntos emblemáticos de la ciudad.','en'=>'Within the “Heliópolis” project, students research Francisco Piria and his connections to alchemy and astronomy, visiting Piriápolis and emblematic city sites.','it'=>'Nel progetto “Heliopolis” gli studenti studiano Francesco Piria e i suoi legami con l’alchimia e l’astronomia, visitando Piriápolis e luoghi emblematici della città.'],
              'ph_main_t' => ['es'=>'Imagen destacada','en'=>'Featured image','it'=>'Immagine in evidenza'],
              'ph_main_c' => ['es'=>'Descripción de la imagen principal','en'=>'Description of the main image','it'=>'Descrizione dell’immagine principale'],
              'ph_1' => ['es'=>'Primera imagen','en'=>'First image','it'=>'Prima immagine'],
              'ph_2' => ['es'=>'Segunda imagen','en'=>'Second image','it'=>'Seconda immagine'],
              'ph_3' => ['es'=>'Tercera imagen','en'=>'Third image','it'=>'Terza immagine'],
              'ph_4' => ['es'=>'Cuarta imagen','en'=>'Fourth image','it'=>'Quarta immagine'],
              'ph_5' => ['es'=>'Quinta imagen','en'=>'Fifth image','it'=>'Quinta immagine'],
              'info_t' => ['es'=>'Información adicional','en'=>'Additional information','it'=>'Informazioni aggiuntive'],
              'info_p' => ['es'=>'Proyecto interdisciplinario desarrollado por docentes y estudiantes, articulando áreas como historia, arte y ciencias, con salidas de campo y registro fotográfico propio.','en'=>'Interdisciplinary project developed by teachers and students, connecting areas such as history, art and science, with field trips and original photo documentation.','it'=>'Progetto interdisciplinare realizzato da docenti e studenti, collegando aree come storia, arte e scienze, con uscite sul territorio e documentazione fotografica originale.'],
              'contact' => ['es'=>'Contacto','en'=>'Contact','it'=>'Contatto'],
              'links' => ['es'=>'Enlaces útiles','en'=>'Useful links','it'=>'Link utili'],
              'link_items' => [
                'es' => ['Política de privacidad','Requisitos técnicos','Accesibilidad'],
                'en' => ['Privacy Policy','Technical Requirements','Accessibility'],
                'it' => ['Informativa sulla privacy','Requisiti tecnici','Accessibilità'],
              ],
            ];
          ?>
          <section class="hero-gallery editable-image" style="background-image: url('FOTOS/fotosPrincipales/heliopolis3.jpg'); background-size: cover; background-position: center;">
              <div class="hero-overlay"></div>
              <div class="hero-content-gallery">
                  <h1 class="hero-title-gallery editable-text"><?php echo $he['hero_t'][$cl]; ?></h1>
                  <p class="hero-subtitle-gallery editable-text"><?php echo $he['hero_s'][$cl]; ?></p>
              </div>
          </section>
          <div id="breadcrumbs" class="breadcrumbs-container"></div>

          <!-- Main Content -->
          <main class="main-gallery">
              <div class="container">
                  <!-- Gallery Description -->
                  <section class="gallery-intro">
                      <h2 class="gallery-title editable-text"><?php echo $he['gal_t'][$cl]; ?></h2>
                      <p class="gallery-description editable-text"><?php echo $he['gal_d'][$cl]; ?></p>
                  </section>

                  <!-- Photo Grid -->
                  <section class="photo-grid">
                      <div class="grid-container">
                          <div class="photo-item large">
                              <img class="editable-image" src="FOTOS/fotosPrincipales/arcimboldo2.jpg" alt="Imagen principal">
                              <div class="photo-overlay">
                                  <h3 class="photo-title editable-text"><?php echo $he['ph_main_t'][$cl]; ?></h3>
                                  <p class="photo-caption editable-text"><?php echo $he['ph_main_c'][$cl]; ?></p>
                              </div>
                          </div>

                          <div class="photo-item">
                              <img class="editable-image" src="FOTOS/fotosPrincipales/arcimboldo3.jpg" alt="Imagen 1">
                              <div class="photo-overlay">
                                  <h3 class="photo-title editable-text"><?php echo $he['ph_1'][$cl]; ?></h3>
                              </div>
                          </div>

                          <div class="photo-item">
                              <img class="editable-image" src="FOTOS/fotosPrincipales/arcimboldo4.jpg" alt="Imagen 2">
                              <div class="photo-overlay">
                                  <h3 class="photo-title editable-text"><?php echo $he['ph_2'][$cl]; ?></h3>
                              </div>
                          </div>

                          <div class="photo-item">
                              <img class="editable-image" src="FOTOS/fotosPrincipales/arcimboldo5.jpg" alt="Imagen 3">
                              <div class="photo-overlay">
                                  <h3 class="photo-title editable-text"><?php echo $he['ph_3'][$cl]; ?></h3>
                              </div>
                          </div>

                          <div class="photo-item">
                              <img class="editable-image" src="FOTOS/fotosPrincipales/arcimboldo.jpg" alt="Imagen 4">
                              <div class="photo-overlay">
                                  <h3 class="photo-title editable-text"><?php echo $he['ph_4'][$cl]; ?></h3>
                              </div>
                          </div>

                          <div class="photo-item">
                              <img class="editable-image" src="FOTOS/fotosPrincipales/arcimboldo2.jpg" alt="Imagen 5">
                              <div class="photo-overlay">
                                  <h3 class="photo-title editable-text"><?php echo $he['ph_5'][$cl]; ?></h3>
                              </div>
                          </div>
                      </div>
                  </section>

                  <!-- Gallery Footer Text -->
                  <section class="gallery-footer-text">
                      <div class="footer-text-container">
                          <h2 class="footer-text-title editable-text"><?php echo $he['info_t'][$cl]; ?></h2>
                          <p class="footer-text-content editable-text"><?php echo $he['info_p'][$cl]; ?></p>
                      </div>
                  </section>
              </div>
          </main>

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
                <h4><?php echo $he['contact'][$cl]; ?></h4>
                <p>Gral. French 2380</p>
                <p>CP 11500 - Montevideo, Uruguay</p>
                <p>(+598) 2600 1527</p>
                <p>info@scuolaitaliana.edu.uy</p>
            </div>
        </div>
        
        <div class="footer-right">
            <div class="footer-section">
                <h4><?php echo $he['links'][$cl]; ?></h4>
                <p><?php echo $he['link_items'][$cl][0]; ?></p>
                <p><?php echo $he['link_items'][$cl][1]; ?></p>
                <p><?php echo $he['link_items'][$cl][2]; ?></p>
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