<!DOCTYPE html>
<?php if (session_status() === PHP_SESSION_NONE) { session_start(); } if (isset($_GET['lang']) && in_array($_GET['lang'], ['es','en','it'])) { $_SESSION['lang'] = $_GET['lang']; } $cl = $_SESSION['lang'] ?? 'es'; require_once(__DIR__ . '/../../../MODELO/conexion.php'); ?>
<html lang="<?php echo $cl; ?>">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title><?php $t=['es'=>'Admisiones','en'=>'Admissions','it'=>'Ammissioni']; echo $t[$cl]; ?></title>
  <link rel="icon" type="image/png" href="/Pagina/VISTA/PaginaWeb/Pagina/FOTOS/fotosPrincipales/logotipo.png">
  <link rel="stylesheet" href="../css/admisiones.css">
</head>
<div id="cms-root"></div>
<body>
  <?php include __DIR__.'/includes/navbar.php'; ?>
  <div id="original-content">
    <section class="admissions-wrap">
      <div class="admissions-header">
        <h1 class="admissions-title"><?php $h=['es'=>'Contacto','en'=>'Contact','it'=>'Contatto']; echo $h[$cl]; ?></h1>
        <nav aria-label="breadcrumb" style="margin:8px 0 10px 0; font-size:13px;">
          <a href="index.php" style="color:#0A2452; text-decoration:none;">Inicio</a>
          <span style="margin:0 6px; color:#888;">/</span>
          <span style="color:#555;">Admisiones</span>
        </nav>
        <p class="admissions-intro">
          <?php if ($cl==='es'): ?>
          Gracias por interesarte en la propuesta educativa de la Scuola Italiana di Montevideo. Te invitamos a realizar una visita guiada individual y así conocer más de cerca nuestra propuesta educativa y nuestras instalaciones. Por consultas acerca del proceso de admisiones, agradecemos completar el formulario a continuación y a la brevedad nos pondremos en contacto para ayudarte a continuar el proceso.
          <?php elseif ($cl==='en'): ?>
          Thank you for your interest in Scuola Italiana di Montevideo. Book a guided visit to learn more about our educational proposal and facilities. For admissions inquiries, please complete the form below and we will contact you shortly to help you with the process.
          <?php else: ?>
          Grazie per il tuo interesse nella Scuola Italiana di Montevideo. Ti invitiamo a prenotare una visita guidata per conoscere da vicino la nostra proposta educativa e le nostre strutture. Per richieste di ammissione, compila il modulo sottostante e ti contatteremo al più presto.
          <?php endif; ?>
        </p>
      </div>

      <div class="admissions-grid">
        <div class="admissions-left">
          <form class="contact-form" id="admisionForm" method="POST" action="../../../CONTROLADOR/Admisiones/procesar_admision.php">
            <input type="text" name="nombre" placeholder="<?php echo $cl==='es'?'Nombre y Apellido*':($cl==='en'?'Full name*':'Nome e cognome*'); ?>" required>
            <input type="email" name="email" placeholder="E-mail*" required>
            <input type="tel" name="telefono" placeholder="<?php echo $cl==='es'?'Teléfono/Celular*':($cl==='en'?'Phone*':'Telefono/Cellulare*'); ?>" required>
            <select name="nivel" required>
              <option value="">Admisiones</option>
              <option value="Inicial">Inicial</option>
              <option value="Primaria">Primaria</option>
              <option value="Secundaria">Secundaria</option>
              <option value="Actividades extracurriculares">Actividades extracurriculares</option>
            </select>
            <textarea name="mensaje" rows="5" placeholder="<?php echo $cl==='es'?'Mensaje*':($cl==='en'?'Message*':'Messaggio*'); ?>" required></textarea>

            <fieldset class="survey">
              <legend><?php echo $cl==='es'?'¿Cómo te enteraste de nuestra propuesta educativa?':'How did you hear about us?'; ?></legend>
              <label><input type="checkbox" name="como_se_entero[]" value="Recomendación"> Recomendación</label>
              <label><input type="checkbox" name="como_se_entero[]" value="Exalumno"> Exalumno</label>
              <label><input type="checkbox" name="como_se_entero[]" value="Redes sociales/Web"> Redes sociales/Web</label>
              <label><input type="checkbox" name="como_se_entero[]" value="Publicidad vía pública"> Publicidad vía pública</label>
              <label><input type="checkbox" name="como_se_entero[]" value="Otro"> Otro</label>
            </fieldset>

            <button type="submit" class="btn-submit">ENVIAR</button>
          </form>

          <div id="mensaje-resultado" style="display: none; margin-top: 20px; padding: 15px; border-radius: 5px;"></div>

          <ul class="contact-icons">
            <li><i class="fa-solid fa-location-dot"></i> Gral. French 2380 – Montevideo, CP: 11500</li>
            <li><i class="fa-solid fa-phone"></i> (+598) 2600 1527</li>
            <li><i class="fa-solid fa-envelope"></i> info@scuolaitaliana.edu.uy</li>
          </ul>
        </div>

        <div class="admissions-right">
          <div class="video-box">
            <iframe class="video-frame" src="https://www.youtube.com/embed/dQw4w9WgXcQ" title="Video" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>

          <div class="info-card">
            <h3>Por consultas sobre:</h3>
            <p><strong>Admisiones</strong><br><a href="mailto:admisiones@scuolaitaliana.edu.uy">admisiones@scuolaitaliana.edu.uy</a></p>
            <p><strong>Caja | Horario 08:00 a 13:00 - 13:30 a 16:00</strong><br><a href="mailto:caja@scuolaitaliana.edu.uy">caja@scuolaitaliana.edu.uy</a></p>
            <p><strong>Trabajar con nosotros</strong><br><a href="mailto:trabajarconnosotros@scuolaitaliana.edu.uy">trabajarconnosotros@scuolaitaliana.edu.uy</a></p>
            <p><strong>Solicitud de Fórmula 69</strong><br><a href="mailto:secretariapreparatorio@scuolaitaliana.edu.uy">secretariapreparatorio@scuolaitaliana.edu.uy</a></p>
          </div>
        </div>
      </div>
    </section>
  </div>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <script src="cms-admin.js"></script>
  <script src="analytics.js"></script>
  <footer class="footer-bottom-new">
    <div class="footer-container">
      <div class="footer-left">
        <div class="footer-logo">

<script>
document.getElementById('admisionForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    const mensajeDiv = document.getElementById('mensaje-resultado');
    
    // Mostrar loading
    mensajeDiv.style.display = 'block';
    mensajeDiv.style.backgroundColor = '#f0f8ff';
    mensajeDiv.style.color = '#0066cc';
    mensajeDiv.innerHTML = 'Enviando solicitud...';
    
    fetch('../../../CONTROLADOR/Admisiones/procesar_admision.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            mensajeDiv.style.backgroundColor = '#d4edda';
            mensajeDiv.style.color = '#155724';
            mensajeDiv.innerHTML = data.message;
            document.getElementById('admisionForm').reset();
        } else {
            mensajeDiv.style.backgroundColor = '#f8d7da';
            mensajeDiv.style.color = '#721c24';
            mensajeDiv.innerHTML = 'Error: ' + data.error;
        }
    })
    .catch(error => {
        mensajeDiv.style.backgroundColor = '#f8d7da';
        mensajeDiv.style.color = '#721c24';
        mensajeDiv.innerHTML = 'Error de conexión. Intenta nuevamente.';
    });
});
</script>

</body>
</html>
