<!DOCTYPE html>
<?php if (session_status() === PHP_SESSION_NONE) { session_start(); } $cl = $_SESSION['lang'] ?? 'es'; ?>
<html lang="<?php echo $cl; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php $itf_meta=['es'=>'Italia - Galería','en'=>'Italy - Gallery','it'=>'Italia - Galleria']; echo $itf_meta[$cl]; ?></title>
    <link rel="stylesheet" href="breadcrumbs.css">
    <link rel="stylesheet" href="../css/ItaliaFotos.css">
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
          <section class="hero-gallery editable-image" style="background-image: url('https://images.unsplash.com/photo-1452587925148-ce544e77e70d?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80'); background-size: cover; background-position: center;">
              <div class="hero-overlay"></div>
              <div class="hero-content-gallery">
                  <h1 class="hero-title-gallery editable-text"><?php $htg=['es'=>'Galería Visual','en'=>'Visual Gallery','it'=>'Galleria Visiva']; echo $htg[$cl]; ?></h1>
                  <p class="hero-subtitle-gallery editable-text"><?php $hsg=['es'=>'Una colección de imágenes organizadas visualmente','en'=>'A collection of visually organized images','it'=>'Una raccolta di immagini organizzate visivamente']; echo $hsg[$cl]; ?></p>
              </div>
          </section>
          <div id="breadcrumbs" class="breadcrumbs-container"></div>

          <!-- Main Content -->
          <main class="main-gallery">
              <div class="container">
                  <!-- Gallery Description -->
                  <section class="gallery-intro">
                      <h2 class="gallery-title editable-text"><?php $gd=['es'=>'Descripción de la galería','en'=>'Gallery Description','it'=>'Descrizione della galleria']; echo $gd[$cl]; ?></h2>
                      <p class="gallery-description editable-text"><?php $gdd=['es'=>'Aquí puedes escribir una introducción sobre las imágenes que se muestran en esta galería. Explica el contexto, la temática o la importancia de estas fotografías.','en'=>'Here you can write an introduction to the images displayed in this gallery. Explain the context, theme or importance of these photographs.','it'=>'Qui puoi scrivere un’introduzione alle immagini visualizzate in questa galleria. Spiega il contesto, il tema o l’importanza di queste fotografie.']; echo $gdd[$cl]; ?></p>
                  </section>

                  <!-- Photo Grid -->
                  <section class="photo-grid">
                      <div class="grid-container">
                          <div class="photo-item large">
                              <img class="editable-image" src="https://images.unsplash.com/photo-1523050854058-8df90110c9d1?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Imagen principal">
                              <div class="photo-overlay">
                                  <h3 class="photo-title editable-text"><?php $pt=['es'=>'Imagen destacada','en'=>'Featured Image','it'=>'Immagine in evidenza']; echo $pt[$cl]; ?></h3>
                                  <p class="photo-caption editable-text"><?php $pc=['es'=>'Descripción de la imagen principal','en'=>'Description of the main image','it'=>'Descrizione dell’immagine principale']; echo $pc[$cl]; ?></p>
                              </div>
                          </div>
                          
                          <div class="photo-item">
                              <img class="editable-image" src="https://images.unsplash.com/photo-1577896851231-70ef18881754?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" alt="Imagen 1">
                              <div class="photo-overlay">
                                  <h3 class="photo-title editable-text"><?php $pt1=['es'=>'Primera imagen','en'=>'First Image','it'=>'Prima immagine']; echo $pt1[$cl]; ?></h3>
                              </div>
                          </div>
                          
                          <div class="photo-item">
                              <img class="editable-image" src="https://images.unsplash.com/photo-1509062522246-3755977927d7?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" alt="Imagen 2">
                              <div class="photo-overlay">
                                  <h3 class="photo-title editable-text"><?php $pt2=['es'=>'Segunda imagen','en'=>'Second Image','it'=>'Seconda immagine']; echo $pt2[$cl]; ?></h3>
                              </div>
                          </div>
                          
                          <div class="photo-item">
                              <img class="editable-image" src="https://images.unsplash.com/photo-1503676260728-1c00da094a0b?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" alt="Imagen 3">
                              <div class="photo-overlay">
                                  <h3 class="photo-title editable-text"><?php $pt3=['es'=>'Tercera imagen','en'=>'Third Image','it'=>'Terza immagine']; echo $pt3[$cl]; ?></h3>
                              </div>
                          </div>
                          
                          <div class="photo-item">
                              <img class="editable-image" src="https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" alt="Imagen 4">
                              <div class="photo-overlay">
                                  <h3 class="photo-title editable-text"><?php $pt4=['es'=>'Cuarta imagen','en'=>'Fourth Image','it'=>'Quarta immagine']; echo $pt4[$cl]; ?></h3>
                              </div>
                          </div>
                          
                          <div class="photo-item">
                              <img class="editable-image" src="https://images.unsplash.com/photo-1544551763-46a013bb70d5?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" alt="Imagen 5">
                              <div class="photo-overlay">
                                  <h3 class="photo-title editable-text"><?php $pt5=['es'=>'Quinta imagen','en'=>'Fifth Image','it'=>'Quinta immagine']; echo $pt5[$cl]; ?></h3>
                              </div>
                          </div>
                      </div>
                  </section>

                  <!-- Gallery Footer Text -->
                  <section class="gallery-footer-text">
                      <div class="footer-text-container">
                          <h2 class="footer-text-title editable-text"><?php $gft=['es'=>'Información adicional','en'=>'Additional Information','it'=>'Informazioni aggiuntive']; echo $gft[$cl]; ?></h2>
                          <p class="footer-text-content editable-text"><?php $gfc=['es'=>'Espacio para agregar información adicional sobre las imágenes, créditos de fotografía, o cualquier contexto relevante que complemente la galería visual.','en'=>'Space to add additional information about the images, photography credits, or any relevant context that complements the visual gallery.','it'=>'Spazio per aggiungere informazioni aggiuntive sulle immagini, crediti fotografici o qualsiasi contesto rilevante che completi la galleria visiva.']; echo $gfc[$cl]; ?></p>
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
                <h4><?php $ct=['es'=>'Contacto','en'=>'Contact','it'=>'Contatto']; echo $ct[$cl]; ?></h4>
                <p>Gral. French 2380</p>
                <p>CP 11500 - Montevideo, Uruguay</p>
                <p>(+598) 2600 1527</p>
                <p>info@scuolaitaliana.edu.uy</p>
            </div>
        </div>
        
        <div class="footer-right">
            <div class="footer-section">
                <h4><?php $lu=['es'=>'Enlaces útiles','en'=>'Useful Links','it'=>'Collegamenti utili']; echo $lu[$cl]; ?></h4>
                <p><?php $pp=['es'=>'Política de privacidad','en'=>'Privacy Policy','it'=>'Informativa sulla privacy']; echo $pp[$cl]; ?></p>
                <p><?php $rt=['es'=>'Requisitos técnicos','en'=>'Technical Requirements','it'=>'Requisiti tecnici']; echo $rt[$cl]; ?></p>
                <p><?php $a11y=['es'=>'Accesibilidad','en'=>'Accessibility','it'=>'Accessibilità']; echo $a11y[$cl]; ?></p>
                <p>Política de privacidad</p>
                <p>Requisitos técnicos</p>
                <p>Accesibilidad</p>
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