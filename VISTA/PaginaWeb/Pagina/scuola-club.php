<!DOCTYPE html>
<?php if (session_status() === PHP_SESSION_NONE) { session_start(); } $cl = $_SESSION['lang'] ?? 'es'; ?>
<html lang="<?php echo $cl; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/scuola-club.css">
    <title><?php $sc_meta=['es'=>'Scuola Club - Heliopolis','en'=>'Scuola Club - Heliopolis','it'=>'Scuola Club - Heliopolis']; echo $sc_meta[$cl]; ?></title>
<link rel="icon" type="image/png" href="/Pagina/favicon.png">
<link rel="shortcut icon" href="/Pagina/favicon.ico">
</head>
<body>
    <div id="original-content">
     <!-- Navigation -->
          <nav class="navbar">
              <div class="nav-container">
                  <div class="nav-logo">
                      <img src="fotosPrincipales/logo2.png" alt="Scuola Italiana di Montevideo" style="height: 120px;">
                  </div>
                  <div class="nav-menu-button" onclick="window.location.href='menuScuola.html'">
                      <span></span>
                      <span></span>
                      <span></span>
                  </div>
              </div>
          </nav>

          <!-- Hero Section -->
          <?php 
            $sc = [
              'hero_t' => ['es'=>'Heliopolis','en'=>'Heliopolis','it'=>'Heliopolis'],
              'hero_s' => ['es'=>'Una colección de imágenes organizadas visualmente','en'=>'A visually organized image collection','it'=>'Una raccolta di immagini organizzate visivamente'],
              'gal_t' => ['es'=>'heliopolis','en'=>'heliopolis','it'=>'heliopolis'],
              'gal_d' => ['es'=>'En el marco del proyecto “Heliópolis” investigamos sobre Francisco Piria, la alquimia y la astronomía; los alumnos visitan Piriápolis.','en'=>'Within the “Heliópolis” project we explore Francisco Piria, alchemy and astronomy; students visit Piriápolis.','it'=>'Nel progetto “Heliopolis” esploriamo Francesco Piria, l’alchimia e l’astronomia; gli studenti visitano Piriápolis.'],
              'ph_main_t' => ['es'=>'Imagen destacada','en'=>'Featured image','it'=>'Immagine in evidenza'],
              'ph_main_c' => ['es'=>'Descripción de la imagen principal','en'=>'Description of the main image','it'=>'Descrizione dell’immagine principale'],
              'ph_1' => ['es'=>'Primera imagen','en'=>'First image','it'=>'Prima immagine'],
              'ph_2' => ['es'=>'Segunda imagen','en'=>'Second image','it'=>'Seconda immagine'],
              'ph_3' => ['es'=>'Tercera imagen','en'=>'Third image','it'=>'Terza immagine'],
              'ph_4' => ['es'=>'Cuarta imagen','en'=>'Fourth image','it'=>'Quarta immagine'],
              'ph_5' => ['es'=>'Quinta imagen','en'=>'Fifth image','it'=>'Quinta immagine'],
              'info_t' => ['es'=>'Información adicional','en'=>'Additional information','it'=>'Informazioni aggiuntive'],
              'info_p' => ['es'=>'Espacio para agregar información adicional, créditos de fotografía o contexto relevante.','en'=>'Space to add extra information, photo credits, or relevant context.','it'=>'Spazio per aggiungere informazioni aggiuntive, crediti fotografici o contesto rilevante.'],
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
                  <h1 class="hero-title-gallery editable-text"><?php echo $sc['hero_t'][$cl]; ?></h1>
                  <p class="hero-subtitle-gallery editable-text"><?php echo $sc['hero_s'][$cl]; ?></p>
              </div>
          </section>

          <!-- Main Content -->
          <main class="main-gallery">
              <div class="container">
                  <!-- Gallery Description -->
                  <section class="gallery-intro">
                      <h2 class="gallery-title editable-text"><?php echo $sc['gal_t'][$cl]; ?></h2>
                      <p class="gallery-description editable-text"><?php echo $sc['gal_d'][$cl]; ?></p>
                  </section>

                  <!-- Photo Grid -->
                  <section class="photo-grid">
                      <div class="grid-container">
                          <div class="photo-item large">
                              <img class="editable-image" src="fotosPrincipales/arcimboldo2.jpg" alt="Imagen principal">
                              <div class="photo-overlay">
                                  <h3 class="photo-title editable-text"><?php echo $sc['ph_main_t'][$cl]; ?></h3>
                                  <p class="photo-caption editable-text"><?php echo $sc['ph_main_c'][$cl]; ?></p>
                              </div>
                          </div>

                          <div class="photo-item">
                              <img class="editable-image" src="fotosPrincipales/arcimboldo3.jpg" alt="Imagen 1">
                              <div class="photo-overlay">
                                  <h3 class="photo-title editable-text"><?php echo $sc['ph_1'][$cl]; ?></h3>
                              </div>
                          </div>

                          <div class="photo-item">
                              <img class="editable-image" src="fotosPrincipales/arcimboldo4.jpg" alt="Imagen 2">
                              <div class="photo-overlay">
                                  <h3 class="photo-title editable-text"><?php echo $sc['ph_2'][$cl]; ?></h3>
                              </div>
                          </div>

                          <div class="photo-item">
                              <img class="editable-image" src="fotosPrincipales/arcimboldo5.jpg" alt="Imagen 3">
                              <div class="photo-overlay">
                                  <h3 class="photo-title editable-text"><?php echo $sc['ph_3'][$cl]; ?></h3>
                              </div>
                          </div>

                          <div class="photo-item">
                              <img class="editable-image" src="fotosPrincipales/arcimboldo.jpg" alt="Imagen 4">
                              <div class="photo-overlay">
                                  <h3 class="photo-title editable-text"><?php echo $sc['ph_4'][$cl]; ?></h3>
                              </div>
                          </div>

                          <div class="photo-item">
                              <img class="editable-image" src="fotosPrincipales/arcimboldo2.jpg" alt="Imagen 5">
                              <div class="photo-overlay">
                                  <h3 class="photo-title editable-text"><?php echo $sc['ph_5'][$cl]; ?></h3>
                              </div>
                          </div>
                      </div>
                  </section>

                  <!-- Gallery Footer Text -->
                  <section class="gallery-footer-text">
                      <div class="footer-text-container">
                          <h2 class="footer-text-title editable-text"><?php echo $sc['info_t'][$cl]; ?></h2>
                          <p class="footer-text-content editable-text"><?php echo $sc['info_p'][$cl]; ?></p>
                      </div>
                  </section>
              </div>
          </main>

        <style>
            * { margin: 0; padding: 0; box-sizing: border-box; }
          body { font-family: 'Merriweather Sans', sans-serif; line-height: 1.6; color: #333; }
          .container { max-width: 1200px; margin: 0 auto; padding: 0 20px; }
          
          .navbar { position: relative; background: rgba(10, 36, 82, 0.5); z-index: 1000; height: 80px; }
          .nav-container { display: flex; justify-content: space-between; align-items: center; padding: 15px 5%; max-width: 1200px; margin: 0 auto;  height: 100%; }
          .nav-logo img { height: 50px; width: auto; }
          .nav-menu-button { display: flex; flex-direction: column; cursor: pointer; padding: 8px; }
          .nav-menu-button span { width: 25px; height: 3px; background: white; margin: 3px 0; border-radius: 2px; }

          /* Navigation */
          .hero-gallery { 
    position: relative;
    top: -80px;
    height: calc(50vh + 80px); 
    display: flex; 
    align-items: center; 
    justify-content: center; 
    margin-bottom: -80px;
}

          .hero-overlay { position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(4, 155, 76, 0.5); }
          .hero-content-gallery { text-align: center; color: white; z-index: 2; position: relative; }
          .hero-title-gallery { font-size: 2.8rem; font-weight: 700; margin-bottom: 15px; }
          .hero-subtitle-gallery { font-size: 1.1rem; opacity: 0.95; }

          /* Main Gallery */
          .main-gallery { padding: 60px 0; }
          
          .gallery-intro { text-align: center; margin-bottom: 50px; }
          .gallery-title { font-size: 2rem; color: #1B2F6F; margin-bottom: 20px; }
          .gallery-description { font-size: 1.1rem; color: #555; max-width: 700px; margin: 0 auto; }

          /* Photo Grid */
          .grid-container { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px; margin-bottom: 50px; }
          .photo-item { position: relative; border-radius: 10px; overflow: hidden; cursor: pointer; transition: transform 0.3s ease; }
          .photo-item:hover { transform: scale(1.05); }
          .photo-item.large { grid-column: span 2; grid-row: span 2; }
          .photo-item img { width: 100%; height: 250px; object-fit: cover; }
          .photo-item.large img { height: 520px; }
          
          .photo-overlay { position: absolute; bottom: 0; left: 0; right: 0; background: linear-gradient(transparent, rgba(0,0,0,0.8)); color: white; padding: 20px; transform: translateY(100%); transition: transform 0.3s ease; }
          .photo-item:hover .photo-overlay { transform: translateY(0); }
          .photo-title { font-size: 1.1rem; font-weight: 600; margin-bottom: 5px; }
          .photo-caption { font-size: 0.9rem; opacity: 0.9; }

          /* Gallery Footer Text */
          .gallery-footer-text { background: #f8f9fa; padding: 40px; border-radius: 15px; }
          .footer-text-container { text-align: center; max-width: 800px; margin: 0 auto; }
          .footer-text-title { font-size: 1.6rem; color: #1B2F6F; margin-bottom: 15px; }
          .footer-text-content { color: #555; line-height: 1.7; }

          /* Footer */
          .footer { background: #1B2F6F; color: white; padding: 40px 0; text-align: center; }
          .footer-logo { height: 60px; margin-bottom: 15px; }

          @media (max-width: 768px) {
              .photo-item.large { grid-column: span 1; grid-row: span 1; }
              .photo-item.large img { height: 250px; }
              .grid-container { grid-template-columns: 1fr; }
          }
    
        </style>

        <footer class="footer-bottom-new">
    <div class="footer-container">
        <div class="footer-Aleft">
            <div class="footer-logo">
                <img src="fotosPrincipales/logotipo.png" alt="Scuola Italiana di Montevideo" style="height: 60px;">
            </div>
            <div class="footer-subtitle">
                <p>Scuola Italiana di Montevideo</p>
            </div>
        </div>
        
        <div class="footer-center">
            <div class="footer-section">
                <h4><?php echo $sc['contact'][$cl]; ?></h4>
                <p>Av. Brasil 3149, Montevideo</p>
                <p>(+598) 2621 4822 / 2622 1422</p>
                <p>info@scuolaitaliana.edu.uy</p>
            </div>
        </div>
        
        <div class="footer-right">
            <div class="footer-section">
                <h4><?php echo $sc['links'][$cl]; ?></h4>
                <p><?php echo $sc['link_items'][$cl][0]; ?></p>
                <p><?php echo $sc['link_items'][$cl][1]; ?></p>
                <p><?php echo $sc['link_items'][$cl][2]; ?></p>
            </div>
        </div>
    </div>
    
    <div class="footer-info-bar">
        <p>Desarrollado por el equipo SGE | Proyecto de apoyo 2002 - EE Informática</p>
    </div>
</footer>
<link rel="stylesheet" href="breadcrumbs.css">

</div>
<script src="breadcrumbs.js"></script>
<script src="cms-admin.js"></script>
<script src="analytics.js"></script>
</body>
</html>