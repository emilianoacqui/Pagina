<!DOCTYPE html>
<?php if (session_status() === PHP_SESSION_NONE) { session_start(); } $cl = $_SESSION['lang'] ?? 'es'; ?>
<html lang="<?php echo $cl; ?>">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
  <title><?php $meta=['es'=>'Calendario escolar','en'=>'School calendar','it'=>'Calendario scolastico']; echo $meta[$cl]; ?></title>
  <link rel="stylesheet" href="breadcrumbs.css">
  <link rel="stylesheet" href="../css/acerca-scuola.css">
  <link rel="icon" type="image/png" href="/Pagina/favicon.png">
  <link rel="shortcut icon" href="/Pagina/favicon.ico">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.css">
  <style>
    .calendar-container{ width:100%; max-width:100%; margin:40px auto; overflow-x:hidden }
    #fc-escolar{ width:100%; background:#fff; border-radius:12px; box-shadow:0 10px 25px rgba(0,0,0,0.08); padding:6px }
    @media (max-width:768px){
      .calendar-container{ margin:16px auto }
      .fc .fc-toolbar{ flex-wrap:wrap; gap:6px }
      .fc .fc-toolbar-title{ font-size:14px }
      .fc .fc-button{ padding:3px 7px; font-size:11px }
      .fc .fc-col-header-cell-cushion{ padding:4px 0; font-size:12px }
      .fc .fc-daygrid-day-number{ padding:2px; font-size:12px }
      .fc .fc-daygrid-event{ font-size:11px; padding:1px 2px }
    }
  </style>
</head>
<div id="cms-root"></div>
<body>
<div id="original-content">
  <!-- Header -->
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

  <?php 
    $copy = [
      'hero_t' => [
        'es'=>'Calendario escolar',
        'en'=>'School calendar',
        'it'=>'Calendario scolastico'
      ],
      'hero_s' => [
        'es'=>'Fechas de inicio, recesos, evaluaciones y eventos institucionales.',
        'en'=>'Start dates, recesses, evaluations and institutional events.',
        'it'=>'Date di inizio, pause, valutazioni ed eventi istituzionali.'
      ],
      'sec1_t' => [
        'es'=>'Próximas fechas', 'en'=>'Upcoming dates', 'it'=>'Prossime date'
      ],
      'sec1_items' => [
        'es'=>[
          'Inicio de clases: 01/03',
          'Receso de invierno: 01/07 - 14/07',
          'Semana de evaluaciones: 15/11 - 22/11',
          'Acto de fin de curso: 15/12'
        ],
        'en'=>[
          'Start of classes: 03/01',
          'Winter break: 07/01 - 07/14',
          'Assessment week: 11/15 - 11/22',
          'End-of-year ceremony: 12/15'
        ],
        'it'=>[
          'Inizio lezioni: 01/03',
          'Vacanze invernali: 01/07 - 14/07',
          'Settimana delle verifiche: 15/11 - 22/11',
          'Cerimonia di fine anno: 15/12'
        ]
      ],
      'sec2_t' => [
        'es'=>'Calendario descargable', 'en'=>'Downloadable calendar', 'it'=>'Calendario scaricabile'
      ],
      'sec2_p' => [
        'es'=>'Descarga el calendario completo con todas las actividades del año.',
        'en'=>'Download the full calendar with all activities of the year.',
        'it'=>'Scarica il calendario completo con tutte le attività dell’anno.'
      ],
      'contact' => ['es'=>'Contacto','en'=>'Contact','it'=>'Contatto']
    ];
  ?>

  <!-- Hero -->
  <section class="hero-about editable-image" style="background-image: linear-gradient(rgba(0,0,0,0.35), rgba(0,0,0,0.35)), url('FOTOS/fotosPrincipales/ejemplo5.jpg');">
    <div class="hero-content">
      <h1 class="editable-text"><?php echo $copy['hero_t'][$cl]; ?></h1>
      <p class="editable-text"><?php echo $copy['hero_s'][$cl]; ?></p>
    </div>
  </section>
<div id="breadcrumbs" class="breadcrumbs-container"></div>

  <!-- Calendario institucional (eventos de Coordinación) -->
  <section class="about-section">
    <div class="container">
      <div class="about-grid">
        <div class="about-text">
          <h2 class="editable-text">Calendario institucional</h2>
          <p class="editable-text">Eventos publicados por la Coordinación.</p>
        </div>
        <div class="about-image" style="width:100%">
          <div class="calendar-container">
            <div id="fc-escolar"></div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Próximas fechas -->
  <section class="about-section">
    <div class="container">
      <div class="about-grid">
        <div class="about-text">
          <h2 class="editable-text"><?php echo $copy['sec1_t'][$cl]; ?></h2>
          <ul class="editable-text">
            <?php foreach ($copy['sec1_items'][$cl] as $it): ?>
              <li><?php echo $it; ?></li>
            <?php endforeach; ?>
          </ul>
        </div>
        <div class="about-image editable-image">
          <img src="FOTOS/fotosPrincipales/portada1.jpg" alt="Calendario escolar">
        </div>
      </div>
    </div>
  </section>

  <!-- Calendario descargable -->
  <section class="offer-section">
    <div class="container offer-grid">
      <div class="offer-text">
        <h2 class="editable-text"><?php echo $copy['sec2_t'][$cl]; ?></h2>
        <p class="editable-text"><?php echo $copy['sec2_p'][$cl]; ?></p>
        <div class="offer-links">
          <a class="btn" href="Documentos/calendario-escolar.pdf" target="_blank">PDF</a>
        </div>
      </div>
      <div class="offer-image editable-image">
        <img src="FOTOS/fotosPrincipales/ejemplo2.jpg" alt="Calendario descargable">
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="footer-bottom-new">
    <div class="footer-container">
      <div class="footer-left">
        <div class="footer-logo">
          <img src="FOTOS/fotosPrincipales/logotipo.png" alt="Scuola Italiana di Montevideo" style="height: 60px;">
        </div>
        <div class="footer-subtitle">
          <p>Scuola Italiana di Montevideo</p>
        </div>
      </div>
      <div class="footer-center">
        <div class="footer-section">
          <h4><?php echo $copy['contact'][$cl]; ?></h4>
          <p>Av. Brasil 3149, Montevideo</p>
          <p>(+598) 2621 4822 / 2622 1422</p>
          <p>info@scuolaitaliana.edu.uy</p>
        </div>
      </div>
      <div class="footer-right">
        <div class="footer-section">
          <h4>Links</h4>
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
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function(){
    const el = document.getElementById('fc-escolar');
    if (!el) return;
    const isMobile = window.matchMedia('(max-width:768px)').matches;
    const cal = new FullCalendar.Calendar(el, {
      locale: 'es',
      expandRows: true,
      dayMaxEventRows: true,
      contentHeight: 'auto',
      aspectRatio: isMobile ? 0.56 : 1.35,
      headerToolbar: isMobile ? { left: 'prev,next', center: 'title', right: 'today' } : { left: 'prev,next today', center: 'title', right: 'dayGridMonth,listWeek' },
      initialView: 'dayGridMonth',
      dayHeaderFormat: { weekday: 'short' },
      buttonText: { today:'Hoy', month:'Mes', week:'Semana', list:'Lista' },
      events: function(info, success, failure){
        fetch('../../../CONTROLADOR/Calendario/get_calendar_events.php')
          .then(r=>r.json())
          .then(data=> Array.isArray(data) ? success(data) : failure('Formato inválido'))
          .catch(err=>failure(err));
      },
      eventClick: function(info){
        const ev = info.event; const p = ev.extendedProps||{};
        alert(`📅 ${ev.title}\n${p.clase?('📚 '+p.clase+'\n'):''}${p.descripcion?('📝 '+p.descripcion):''}`);
      }
    });
    cal.render();
  });
</script>
<script src="cms-admin.js"></script>
<script src="analytics.js"></script>
</body>
</html>
