<!DOCTYPE html>
<?php if (session_status() === PHP_SESSION_NONE) { session_start(); } $cl = $_SESSION['lang'] ?? 'es'; ?>
<html lang="<?php echo $cl; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php $ce_meta=['es'=>'Comunidad de Exalumnos','en'=>'Alumni Community','it'=>'Comunità Ex Alunni']; echo $ce_meta[$cl]; ?></title>
    <link rel="stylesheet" href="breadcrumbs.css">
    <link rel="stylesheet" href="../css/comunidad-exalumnos.css">
    <link rel="icon" type="image/png" href="/Pagina/VISTA/PaginaWeb/Pagina/FOTOS/fotosPrincipales/logotipo.png">
    <link rel="shortcut icon" href="/Pagina/favicon.ico">
</head>
<div id="cms-root"></div>
<body>
     <div id="original-content">
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
            $ce = [
              'hero_t' => ['es'=>'Heliopolis','en'=>'Heliopolis','it'=>'Heliopolis'],
              'hero_s' => ['es'=>'Una colección de imágenes organizadas visualmente','en'=>'A visually organized image collection','it'=>'Una raccolta di immagini organizzate visivamente'],
              'gal_t' => ['es'=>'heliopolis','en'=>'heliopolis','it'=>'heliopolis'],
              'gal_d' => ['es'=>'En el proyecto “Heliópolis” los alumnos investigan a Francisco Piria, la alquimia y la astronomía, visitando Piriápolis.','en'=>'In the “Heliópolis” project students research Francisco Piria, alchemy and astronomy, visiting Piriápolis.','it'=>'Nel progetto “Heliopolis” gli studenti studiano Francesco Piria, l’alchimia e l’astronomia, visitando Piriápolis.'],
              'ph_main_t' => ['es'=>'Imagen destacada','en'=>'Featured image','it'=>'Immagine in evidenza'],
              'ph_main_c' => ['es'=>'Descripción de la imagen principal','en'=>'Description of the main image','it'=>'Descrizione dell’immagine principale'],
              'ph_1' => ['es'=>'Primera imagen','en'=>'First image','it'=>'Prima immagine'],
              'ph_2' => ['es'=>'Segunda imagen','en'=>'Second image','it'=>'Seconda immagine'],
              'ph_3' => ['es'=>'Tercera imagen','en'=>'Third image','it'=>'Terza immagine'],
              'ph_4' => ['es'=>'Cuarta imagen','en'=>'Fourth image','it'=>'Quarta immagine'],
              'ph_5' => ['es'=>'Quinta imagen','en'=>'Fifth image','it'=>'Quinta immagine'],
              'info_t' => ['es'=>'Información adicional','en'=>'Additional information','it'=>'Informazioni aggiuntive'],
              'info_p' => ['es'=>'Espacio para información adicional, créditos fotográficos o contexto relevante.','en'=>'Space for additional information, photo credits, or relevant context.','it'=>'Spazio per informazioni aggiuntive, crediti fotografici o contesto rilevante.'],
              'contact' => ['es'=>'Contacto','en'=>'Contact','it'=>'Contatto'],
              'links' => ['es'=>'Enlaces útiles','en'=>'Useful links','it'=>'Link utili'],
              'link_items' => [
                'es' => ['Política de privacidad','Requisitos técnicos','Accesibilidad'],
                'en' => ['Privacy Policy','Technical Requirements','Accessibility'],
                'it' => ['Informativa sulla privacy','Requisiti tecnici','Accessibilità'],
              ],
            ];
          ?>
          <section class="hero-gallery editable-image" style="background-image: url('fotosPrincipales/heliopolis3.jpg'); background-size: cover; background-position: center;">
              <div class="hero-overlay"></div>
              <div class="hero-content-gallery">
                  <h1 class="hero-title-gallery editable-text"><?php echo $ce['hero_t'][$cl]; ?></h1>
                  <p class="hero-subtitle-gallery editable-text"><?php echo $ce['hero_s'][$cl]; ?></p>
              </div>
          </section>
          <div id="breadcrumbs" class="breadcrumbs-container"></div>

          <!-- Main Content -->
          <main class="main-gallery">
              <div class="container">
                  <!-- Gallery Description -->
                  <section class="gallery-intro">
                      <h2 class="gallery-title editable-text"><?php echo $ce['gal_t'][$cl]; ?></h2>
                      <p class="gallery-description editable-text"><?php echo $ce['gal_d'][$cl]; ?></p>
                  </section>

                  <!-- Photo Grid -->
                  <section class="photo-grid">
                      <div class="grid-container">
                          <div class="photo-item large">
                              <img class="editable-image" src="FOTOS/fotosPrincipales/arcimboldo2.jpg" alt="Imagen principal">
                              <div class="photo-overlay">
                                  <h3 class="photo-title editable-text"><?php echo $ce['ph_main_t'][$cl]; ?></h3>
                                  <p class="photo-caption editable-text"><?php echo $ce['ph_main_c'][$cl]; ?></p>
                              </div>
                          </div>
                          
                          <div class="photo-item">
                              <img class="editable-image" src="FOTOS/fotosPrincipales/arcimboldo3.jpg" alt="Imagen 1">
                              <div class="photo-overlay">
                                  <h3 class="photo-title editable-text"><?php echo $ce['ph_1'][$cl]; ?></h3>
                              </div>
                          </div>
                          
                          <div class="photo-item">
                              <img class="editable-image" src="FOTOS/fotosPrincipales/arcimboldo4.jpg" alt="Imagen 2">
                              <div class="photo-overlay">
                                  <h3 class="photo-title editable-text"><?php echo $ce['ph_2'][$cl]; ?></h3>
                              </div>
                          </div>
                          
                          <div class="photo-item">
                              <img class="editable-image" src="FOTOS/fotosPrincipales/arcimboldo5.jpg" alt="Imagen 3">
                              <div class="photo-overlay">
                                  <h3 class="photo-title editable-text"><?php echo $ce['ph_3'][$cl]; ?></h3>
                              </div>
                          </div>
                          
                          <div class="photo-item">
                              <img class="editable-image" src="FOTOS/fotosPrincipales/arcimboldo.jpg" alt="Imagen 4">
                              <div class="photo-overlay">
                                  <h3 class="photo-title editable-text"><?php echo $ce['ph_4'][$cl]; ?></h3>
                              </div>
                          </div>
                          
                          <div class="photo-item">
                              <img class="editable-image" src="FOTOS/fotosPrincipales/arcimboldo2.jpg" alt="Imagen 5">
                              <div class="photo-overlay">
                                  <h3 class="photo-title editable-text"><?php echo $ce['ph_5'][$cl]; ?></h3>
                              </div>
                          </div>
                      </div>
                  </section>

                  <!-- Gallery Footer Text -->
                  <section class="gallery-footer-text">
                      <div class="footer-text-container">
                          <h2 class="footer-text-title editable-text"><?php echo $ce['info_t'][$cl]; ?></h2>
                          <p class="footer-text-content editable-text"><?php echo $ce['info_p'][$cl]; ?></p>
                      </div>
                  </section>
              </div>
          </main>
        <footer class="footer-bottom-new">
    <div class="footer-container">
        <div class="footer-Aleft">
            <div class="footer-logo">
                <img src="FOTOS/fotosPrincipales/logo2.png" alt="Scuola Italiana di Montevideo" style="height: 60px;">
            </div>
            <div class="footer-subtitle">
                <p>Scuola Italiana di Montevideo</p>
            </div>
        </div>
        
        <div class="footer-center">
            <div class="footer-section">
                <h4><?php echo $ce['contact'][$cl]; ?></h4>
                <p>Av. Brasil 3149, Montevideo</p>
                <p>(+598) 2621 4822 / 2622 1422</p>
                <p>info@scuolaitaliana.edu.uy</p>
            </div>
        </div>
        
        <div class="footer-right">
            <div class="footer-section">
                <h4><?php echo $ce['links'][$cl]; ?></h4>
                <p><?php echo $ce['link_items'][$cl][0]; ?></p>
                <p><?php echo $ce['link_items'][$cl][1]; ?></p>
                <p><?php echo $ce['link_items'][$cl][2]; ?></p>
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