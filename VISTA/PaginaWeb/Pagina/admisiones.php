<!DOCTYPE html>
<?php if (session_status() === PHP_SESSION_NONE) { session_start(); } if (isset($_GET['lang']) && in_array($_GET['lang'], ['es','en','it'])) { $_SESSION['lang'] = $_GET['lang']; } $cl = $_SESSION['lang'] ?? 'es'; ?>
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
  <div id="original-content">
    <section class="admissions-wrap">
      <div class="admissions-header">
        <h1 class="admissions-title"><?php $h=['es'=>'Contacto','en'=>'Contact','it'=>'Contatto']; echo $h[$cl]; ?></h1>
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
          <form class="contact-form" onsubmit="event.preventDefault(); this.classList.add('sent');">
            <input type="text" placeholder="<?php echo $cl==='es'?'Nombre y Apellido*':($cl==='en'?'Full name*':'Nome e cognome*'); ?>" required>
            <input type="email" placeholder="E-mail*" required>
            <input type="tel" placeholder="<?php echo $cl==='es'?'Teléfono/Celular*':($cl==='en'?'Phone*':'Telefono/Cellulare*'); ?>" required>
            <select required>
              <option value="">Admisiones</option>
              <option>Inicial</option>
              <option>Primaria</option>
              <option>Secundaria</option>
              <option>Actividades extracurriculares</option>
            </select>
            <textarea rows="5" placeholder="<?php echo $cl==='es'?'Mensaje*':($cl==='en'?'Message*':'Messaggio*'); ?>" required></textarea>

            <fieldset class="survey">
              <legend><?php echo $cl==='es'?'¿Cómo te enteraste de nuestra propuesta educativa?':'How did you hear about us?'; ?></legend>
              <label><input type="checkbox"> Recomendación</label>
              <label><input type="checkbox"> Exalumno</label>
              <label><input type="checkbox"> Redes sociales/Web</label>
              <label><input type="checkbox"> Publicidad vía pública</label>
              <label><input type="checkbox"> Otro</label>
            </fieldset>

            <button type="submit" class="btn-submit">ENVIAR</button>
          </form>

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
</body>
</html>
