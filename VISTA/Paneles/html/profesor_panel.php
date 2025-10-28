<?php

session_start();
require_once('../../../MODELO/config/bootstrap.php');
require_once('../../../MODELO/Paneles/TeacherModel.php');

/* seguridad: sólo profesores */
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'profesor') {
    header("Location: index.php");
    exit();
}

$mensaje = "";
$mensaje_tipo = "ok"; // ok | error
$id_profesor = intval($_SESSION['id_usuario']);

/* ==========================
   📌 ACCIONES DEL PROFESOR - USAR MODELO
   - Crear/Eliminar fecha en calendario
========================== */
$teacherModel = new TeacherModel();

if (isset($_POST['crear_fecha'])) {
    $id_clase = intval($_POST['id_clase']);
    $fecha = $_POST['fecha'] ?? '';
    $tipo = in_array($_POST['tipo'] ?? '', ['tarea','examen','prueba','oral','proyecto','entrega','otro']) ? $_POST['tipo'] : 'otro';
    $descripcion = trim($_POST['descripcion'] ?? '');

    // Validar usando modelo
    if (!$teacherModel->verifyClassAccess($id_profesor, $id_clase)) {
        $mensaje = "⌐ No estás autorizado para agregar fechas a esta clase.";
        $mensaje_tipo = "error";
    } else {
        if (!$fecha) {
            $mensaje = "⚠️ Seleccioná una fecha.";
            $mensaje_tipo = "error";
        } else {
            $result = $teacherModel->addCalendarEvent($id_clase, $fecha, $tipo, $descripcion, $id_profesor);
            if ($result['success']) {
                $mensaje = "✅ Fecha agregada al calendario.";
            } else {
                $mensaje = "⌐ Error al guardar.";
                $mensaje_tipo = "error";
            }
        }
    }
}

if (isset($_POST['eliminar_fecha'])) {
    $id = intval($_POST['id_fecha']);
    $result = $teacherModel->deleteCalendarEvent($id, $id_profesor);
    if ($result['success']) {
        $mensaje = "🗑️ Fecha eliminada.";
    } else {
        $mensaje = "⌐ " . ($result['error'] ?? 'No se pudo eliminar.');
        $mensaje_tipo = "error";
    }
}

/* ==========================
   📌 USAR MODELOS PARA OBTENER DATOS
========================== */

/* Clases asignadas al profesor */
$clases_prof = $teacherModel->getTeacherClasses($id_profesor);

/* Para mostrar alumnos por clase */
$alumnos_por_clase = [];
if (count($clases_prof) > 0) {
    $ids = array_map(function($c){return intval($c['id_clase']);}, $clases_prof);
    $alumnos_por_clase = $teacherModel->getStudentsByClass($ids);
}

/* Eventos: generales + de las clases del profesor */
$eventos = [];
if (count($clases_prof) > 0) {
    $ids = array_map(function($c){return intval($c['id_clase']);}, $clases_prof);
    $eventos = $teacherModel->getEventsForClasses($ids);
} else {
    $eventos = $teacherModel->getGeneralEvents();
}

/* Calendario: fechas de las clases del profesor */
$calendario_por_clase = [];
if (count($clases_prof) > 0) {
    $ids = array_map(function($c){return intval($c['id_clase']);}, $clases_prof);
    $calendario_por_clase = $teacherModel->getCalendarByClass($ids);
}

/* Para el selector de clases en el formulario */
$clases_select = $clases_prof;

?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Panel Profesor - Scuola Italiana di Montevideo</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="../css/profesor.css">   
</head>
<body>
<button class="sidebar-toggle" onclick="toggleSidebarProfesor()" aria-label="Abrir menú">☰</button>

<div class="backdrop" id="backdrop"></div>

<aside class="sidebar">
  <h2>Profesor</h2>
  <nav class="nav">
    <a href="#" class="active" onclick="mostrarSeccion('seccionClases', this)">🏫 Mis Clases</a>
    <a href="#" onclick="mostrarSeccion('seccionCalendario', this)">📅 Calendario</a>
    <a href="#" onclick="mostrarSeccion('seccionEventos', this)">🎉 Eventos</a>
    <a href="#" onclick="mostrarSeccion('seccionLinks', this)">🔗 Mis Links</a>
    <a href="../../../CONTROLADOR/Auth/logout.php" style="margin-top: 20px; background: rgba(255,255,255,0.1);">🚪 Cerrar Sesión</a>
  </nav>
</aside>

<main class="main">
  <?php if($mensaje): ?>
    <div class="card" style="background:<?php echo ($mensaje_tipo==='error'?'#fdecea':'#e8f6ee'); ?>;color:<?php echo ($mensaje_tipo==='error'?'#a12017':'#0c6b2e'); ?>;border:1px solid <?php echo ($mensaje_tipo==='error'?'#f5c2c0':'#bfe4cc'); ?>;font-weight:600;margin-bottom:14px">
      <?php echo $mensaje; ?>
    </div>
  <?php endif; ?>

  <!-- SECCIÓN: Clases -->
  <section id="seccionClases" class="card" style="display:none">
    <h1>Mis Clases</h1>
    <?php if(count($clases_prof)===0): ?>
      <p class="small">No estás asignado a ninguna clase. Contactá a coordinación para que te asignen.</p>
    <?php endif; ?>

    <?php foreach($clases_prof as $c): ?>
      <div style="margin-bottom:12px;padding:12px;border-radius:10px;border:1px solid #eef2f7;background:#fff">
        <h3 style="margin:0 0 6px"><?php echo htmlspecialchars($c['año'].' · '.$c['nombre']); ?></h3>
        <div class="small" style="margin-bottom:8px">Alumnos asignados:</div>
        <?php if(!isset($alumnos_por_clase[$c['id_clase']]) || count($alumnos_por_clase[$c['id_clase']])===0): ?>
          <div class="small">No hay alumnos asignados aún.</div>
        <?php else: ?>
          <div class="table-wrap" style="margin-top:6px;">
            <table>
              <thead><tr><th>Nombre</th><th>Email</th></tr></thead>
              <tbody>
                <?php foreach($alumnos_por_clase[$c['id_clase']] as $al): ?>
                  <tr>
                    <td><?php echo htmlspecialchars($al['nombre']); ?></td>
                    <td><?php echo htmlspecialchars($al['email']); ?></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        <?php endif; ?>
      </div>
    <?php endforeach; ?>
  </section>

  <!-- SECCIÓN: Calendario -->
  <section id="seccionCalendario" class="card" style="display:block">
    <h1>Calendario – Agregar fecha</h1>

    <?php if(count($clases_select)===0): ?>
      <p class="small">No tenés clases. No podés agregar fechas hasta que coordinación te asigne.</p>
    <?php else: ?>

      <!-- Controles de vista -->
      <div class="calendar-view-controls" style="margin-bottom: 20px;">
        <button id="btnVistaCalendario" class="btn active" onclick="cambiarVista('calendario')">📅 Vista Calendario</button>
        <button id="btnVistaLista" class="btn" onclick="cambiarVista('lista')">📋 Vista Lista</button>
      </div>

      <!-- Selector de clase para calendario -->
      <div id="clase-selector" class="card" style="padding: 16px; margin-bottom: 16px;">
        <div style="display: flex; gap: 12px; align-items: end;">
          <div style="flex: 1;">
            <label for="selectClaseCalendario" style="display: block; margin-bottom: 8px; font-weight: 600; font-size: 14px;">Seleccionar clase para ver calendario:</label>
            <select id="selectClaseCalendario" onchange="cargarCalendarioGrupo()">
              <option value="">-- Seleccionar clase --</option>
              <?php foreach($clases_select as $cs): ?>
                <option value="<?php echo $cs['id_clase']; ?>"><?php echo htmlspecialchars($cs['año'].' · '.$cs['nombre']); ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div>
            <button id="btnAgregarTarea" class="btn" onclick="mostrarModalAgregarTarea()" disabled>
              ➕ Agregar Tarea
            </button>
          </div>
        </div>
      </div>

      <!-- Calendario Visual -->
      <div id="calendar-container" class="calendar-container">
        <div id="calendar"></div>
      </div>

      <!-- Vista de Lista (original) -->
      <div id="lista-container" class="lista-container" style="display: none;">
        <form method="post" class="form-row card" style="padding:12px;margin-bottom:12px">
          <select name="id_clase" required>
            <option value="">-- Seleccionar clase --</option>
            <?php foreach($clases_select as $cs): ?>
              <option value="<?php echo $cs['id_clase']; ?>"><?php echo htmlspecialchars($cs['año'].' · '.$cs['nombre']); ?></option>
            <?php endforeach; ?>
          </select>
          <input type="date" name="fecha" required>
        <select name="tipo" required>
          <option value="tarea">Tarea (visible solo como fecha para alumnos)</option>
          <option value="examen">Examen</option>
          <option value="prueba">Prueba</option>
          <option value="oral">Presentación Oral</option>
          <option value="proyecto">Proyecto</option>
          <option value="entrega">Entrega</option>
          <option value="otro">Otro</option>
        </select>
          <input type="text" name="descripcion" placeholder="Descripción (solo visible para profesores)">
          <button type="submit" name="crear_fecha" class="btn">Agregar fecha</button>
        </form>

        <h3>Fechas por clase</h3>
        <?php foreach($clases_prof as $c): ?>
          <div style="margin-bottom:10px;">
            <h4 style="margin:6px 0"><?php echo htmlspecialchars($c['año'].' · '.$c['nombre']); ?></h4>
            <?php if(empty($calendario_por_clase[$c['id_clase']])): ?>
              <div class="small">No hay fechas registradas.</div>
            <?php else: ?>
              <div class="table-wrap">
                <table>
                  <thead><tr><th>Fecha</th><th>Tipo</th><th>Descripción (privada)</th><th>Acción</th></tr></thead>
                  <tbody>
                    <?php foreach($calendario_por_clase[$c['id_clase']] as $f): ?>
                      <tr>
                        <td><?php echo htmlspecialchars($f['fecha']); ?></td>
                        <td><?php echo htmlspecialchars(ucfirst($f['tipo'])); ?></td>
                        <td><?php echo htmlspecialchars($f['descripcion']); ?></td>
                        <td>
                          <form method="post" onsubmit="return confirm('¿Eliminar esta fecha?');" style="display:inline">
                            <input type="hidden" name="id_fecha" value="<?php echo $f['id']; ?>">
                            <button type="submit" name="eliminar_fecha" class="danger">Eliminar</button>
                          </form>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            <?php endif; ?>
          </div>
        <?php endforeach; ?>
      </div>

    <?php endif; ?>
  </section>

  <!-- Modal para agregar tarea -->
  <div id="modalAgregarTarea" class="modal" style="display: none;">
    <div class="modal-content">
      <div class="modal-header">
        <h3>Agregar Nueva Tarea</h3>
        <button class="modal-close" onclick="cerrarModalAgregarTarea()">&times;</button>
      </div>
      <div class="modal-body">
        <form id="formAgregarTarea">
          <div class="form-group">
            <label for="modalTipo">Tipo de tarea:</label>
            <select id="modalTipo" required>
              <option value="tarea">Tarea</option>
              <option value="examen">Examen</option>
              <option value="prueba">Prueba</option>
              <option value="oral">Presentación Oral</option>
              <option value="proyecto">Proyecto</option>
              <option value="entrega">Entrega</option>
              <option value="otro">Otro</option>
            </select>
          </div>
          <div class="form-group">
            <label for="modalFecha">Fecha:</label>
            <input type="date" id="modalFecha" required>
          </div>
          <div class="form-group">
            <label for="modalDescripcion">Descripción (opcional):</label>
            <textarea id="modalDescripcion" rows="3" placeholder="Descripción de la tarea..."></textarea>
          </div>
          <div class="modal-actions">
            <button type="button" class="btn" onclick="cerrarModalAgregarTarea()">Cancelar</button>
            <button type="submit" class="btn" style="background: var(--primary);">Agregar Tarea</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- SECCIÓN: Eventos (coord) -->
  <section id="seccionEventos" class="card" style="display:none">
    <h1>Eventos (publicados por Coordinación)</h1>
    <?php if(empty($eventos)): ?>
      <p class="small">No hay eventos por ahora.</p>
    <?php else: ?>
      <div class="event-grid">
        <?php foreach($eventos as $e): ?>
          <div class="event-card">
            <img src="uploads/<?php echo $e['imagen'] ? htmlspecialchars($e['imagen']) : 'default.jpg'; ?>" alt="Evento">
            <div class="info">
              <h3><?php echo htmlspecialchars($e['titulo']); ?></h3>
              <p class="small">📅 <?php echo htmlspecialchars($e['fecha']); ?></p>
              <p class="small">🏷 <?php echo htmlspecialchars(ucfirst($e['tipo'])); ?> <?php if($e['tipo']==='clase') echo " · ".htmlspecialchars($e['clase_nombre']); ?></p>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </section>

  <!-- SECCIÓN: Links personales (localStorage) -->
  <section id="seccionLinks" class="card" style="display:none">
    <h1>Mis Links</h1>
    <p class="small">Guarda accesos rápidos (Google Classroom, SIGED, etc.). Estos links se guardan en tu navegador (localStorage) y no en la base de datos.</p>

    <div style="margin:12px 0" class="form-row">
      <input id="linkTitulo" type="text" placeholder="Nombre del link (ej. Classroom)" />
      <input id="linkUrl" type="url" placeholder="https://..." />
      <button id="btnAgregarLink" class="btn">Agregar link</button>
    </div>

    <div id="misLinks" class="links-list"></div>
    <div style="margin-top:12px;" class="small">Los links se guardan localmente en este navegador. Si querés que sean accesibles desde otro dispositivo, guardalos manualmente o pedime que los guardemos en la DB.</div>
  </section>

</main>

<!-- FullCalendar CSS -->
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.css" rel="stylesheet">

<script>
/* Variables globales */
let calendar = null;
let claseActual = null;

/* Navegación entre secciones */
function mostrarSeccion(id, el) {
  document.querySelectorAll("main section").forEach(s => s.style.display = "none");
  document.getElementById(id).style.display = "block";
  if (el) {
    document.querySelectorAll(".nav a").forEach(a => a.classList.remove("active"));
    el.classList.add("active");
  }
  
  // Inicializar calendario cuando se muestre la sección
  if (id === 'seccionCalendario' && calendar) {
    setTimeout(() => calendar.render(), 100);
  }
}

/* Cambiar entre vista calendario y lista */
function cambiarVista(vista) {
  const btnCalendario = document.getElementById('btnVistaCalendario');
  const btnLista = document.getElementById('btnVistaLista');
  const containerCalendario = document.getElementById('calendar-container');
  const containerLista = document.getElementById('lista-container');
  const selectorClase = document.getElementById('clase-selector');
  
  if (vista === 'calendario') {
    btnCalendario.classList.add('active');
    btnLista.classList.remove('active');
    containerCalendario.style.display = 'block';
    containerLista.style.display = 'none';
    selectorClase.style.display = 'block';
    
    // Renderizar calendario si no está inicializado
    if (!calendar) {
      inicializarCalendario();
    } else {
      calendar.render();
    }
  } else {
    btnCalendario.classList.remove('active');
    btnLista.classList.add('active');
    containerCalendario.style.display = 'none';
    containerLista.style.display = 'block';
    selectorClase.style.display = 'none';
  }
}

/* Cargar calendario de un grupo específico */
function cargarCalendarioGrupo() {
  const selectClase = document.getElementById('selectClaseCalendario');
  const btnAgregar = document.getElementById('btnAgregarTarea');
  const idClase = selectClase.value;
  
  if (!idClase) {
    if (calendar) {
      calendar.removeAllEvents();
      calendar.render();
    }
    btnAgregar.disabled = true;
    return;
  }
  
  claseActual = idClase;
  btnAgregar.disabled = false;
  
  fetch(`../../../CONTROLADOR/Calendario/get_group_calendar.php?id_clase=${idClase}`)
    .then(response => response.json())
    .then(data => {
      if (data.error) {
        console.error('Error:', data.error);
        alert('Error al cargar el calendario: ' + data.error);
      } else {
        if (calendar) {
          calendar.removeAllEvents();
          calendar.addEventSource(data.eventos);
          calendar.render();
        }
      }
    })
    .catch(error => {
      console.error('Error:', error);
      alert('Error al cargar el calendario');
    });
}

/* Modal para agregar tarea */
function mostrarModalAgregarTarea() {
  if (!claseActual) {
    alert('Primero selecciona una clase');
    return;
  }
  
  // Establecer fecha de hoy por defecto
  const hoy = new Date().toISOString().split('T')[0];
  document.getElementById('modalFecha').value = hoy;
  
  document.getElementById('modalAgregarTarea').style.display = 'flex';
}

function cerrarModalAgregarTarea() {
  document.getElementById('modalAgregarTarea').style.display = 'none';
  document.getElementById('formAgregarTarea').reset();
}

/* Agregar tarea desde el modal */
function agregarTareaDesdeModal(event) {
  event.preventDefault();
  
  const formData = {
    id_clase: claseActual,
    tipo: document.getElementById('modalTipo').value,
    fecha: document.getElementById('modalFecha').value,
    descripcion: document.getElementById('modalDescripcion').value
  };
  
  fetch('../../../CONTROLADOR/Calendario/add_calendar_event.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify(formData)
  })
  .then(response => response.json())
  .then(data => {
    if (data.success) {
      // Agregar el evento al calendario
      if (calendar) {
        calendar.addEvent(data.evento);
        calendar.render();
      }
      
      cerrarModalAgregarTarea();
      alert('✅ Tarea agregada correctamente');
    } else {
      alert('❌ Error: ' + data.error);
    }
  })
  .catch(error => {
    console.error('Error:', error);
    alert('❌ Error al agregar la tarea');
  });
}

/* Inicializar FullCalendar */
function inicializarCalendario() {
  const calendarEl = document.getElementById('calendar');
  if (!calendarEl) return;

  const isMobile = window.matchMedia('(max-width: 768px)').matches;
  const baseOptions = {
    locale: 'es',
    expandRows: true,
    dayMaxEventRows: true,
    contentHeight: 'auto',
    aspectRatio: isMobile ? 0.78 : 1.35,
    headerToolbar: isMobile ? { left: 'prev,next', center: 'title', right: 'today' } : { left: 'prev,next today', center: 'title', right: 'dayGridMonth,listWeek' },
    initialView: 'dayGridMonth',
    buttonText: { today: 'Hoy', month: 'Mes', week: 'Semana', list: 'Lista' },
    events: [], // Se cargarán dinámicamente
    eventClick: function(info) {
      const event = info.event;
      const props = event.extendedProps;
      
      let mensaje = `📅 ${event.title}\n`;
      mensaje += `👨‍🏫 Profesor: ${props.profesor}\n`;
      if (props.es_mi_tarea) {
        mensaje += `✅ Esta es tu tarea\n`;
      }
      if (props.descripcion) {
        mensaje += `📝 Descripción: ${props.descripcion}`;
      }
      
      alert(mensaje);
    },
    eventDisplay: 'block',
    dayMaxEvents: 3,
    moreLinkClick: 'popover'
  };

  calendar = new FullCalendar.Calendar(calendarEl, baseOptions);
  calendar.render();

  // Cargar inicialmente todas las tareas del profesor (todas sus clases)
  fetch('../../../CONTROLADOR/Calendario/get_calendar_events.php')
    .then(response => response.json())
    .then(data => {
      if (Array.isArray(data)) {
        calendar.addEventSource(data);
      }
    })
    .catch(err => console.error('Error cargando eventos iniciales:', err));

  // Ajustar proporción dinámicamente al redimensionar sin cambiar de vista
  let lastIsMobile = isMobile;
  window.addEventListener('resize', () => {
    const nowMobile = window.matchMedia('(max-width: 768px)').matches;
    if (calendar) {
      if (nowMobile !== lastIsMobile) {
        lastIsMobile = nowMobile;
      }
      calendar.setOption('aspectRatio', nowMobile ? 0.78 : 1.35);
    }
  });
}

/* ===== Links en localStorage ===== */
const LS_KEY = 'prof_links_<?php echo $id_profesor; ?>';
function cargarLinks() {
  const cont = document.getElementById('misLinks');
  cont.innerHTML = '';
  let arr = JSON.parse(localStorage.getItem(LS_KEY) || '[]');
  arr.forEach((l,i) => {
    const div = document.createElement('div');
    div.className = 'link-pill';
    div.innerHTML = `<a href="${l.url}" target="_blank" style="color:inherit;text-decoration:none">${l.title}</a>
                     <button style="margin-left:8px" onclick="borrarLink(${i})">✖</button>`;
    cont.appendChild(div);
  });
}
function agregarLink(e) {
  e.preventDefault();
  const title = document.getElementById('linkTitulo').value.trim();
  const url = document.getElementById('linkUrl').value.trim();
  if (!title || !url) return alert('Completá título y URL');
  let arr = JSON.parse(localStorage.getItem(LS_KEY) || '[]');
  arr.push({title, url});
  localStorage.setItem(LS_KEY, JSON.stringify(arr));
  document.getElementById('linkTitulo').value = '';
  document.getElementById('linkUrl').value = '';
  cargarLinks();
}
function borrarLink(i) {
  let arr = JSON.parse(localStorage.getItem(LS_KEY) || '[]');
  arr.splice(i,1);
  localStorage.setItem(LS_KEY, JSON.stringify(arr));
  cargarLinks();
}
document.getElementById('btnAgregarLink').addEventListener('click', agregarLink);
cargarLinks();

/* Mantener active en menu */
document.querySelectorAll('.nav a').forEach(a => {
        if (a.getAttribute('href') !== '../../../CONTROLADOR/Auth/logout.php') {
    a.addEventListener('click', function(e){ 
      e.preventDefault(); 
      mostrarSeccion(this.getAttribute('onclick').match(/'([^']+)'/)[1], this); 
    });
  }
});

/* Por defecto mostrar Calendario */
mostrarSeccion('seccionCalendario');

// Inicializar calendario al cargar
document.addEventListener('DOMContentLoaded', function(){
  setTimeout(() => inicializarCalendario(), 200);
});

/* Event listeners */
document.addEventListener('DOMContentLoaded', function() {
  // Formulario del modal
  document.getElementById('formAgregarTarea').addEventListener('submit', agregarTareaDesdeModal);
  
  // Cerrar modal al hacer click fuera
  document.getElementById('modalAgregarTarea').addEventListener('click', function(e) {
    if (e.target === this) {
      cerrarModalAgregarTarea();
    }
  });
});

/* pequeños helpers */
function q(sel){ return document.querySelector(sel); }

function toggleSidebarProfesor(){
    document.body.classList.toggle('sidebar-collapsed');
    const collapsed = document.body.classList.contains('sidebar-collapsed');
    try{ localStorage.setItem('sidebarCollapsed_profesor', collapsed ? '1' : '0'); }catch(e){}
  }
  document.addEventListener('DOMContentLoaded', function(){
    try{
      const saved = localStorage.getItem('sidebarCollapsed_profesor');
      if (saved === '1') {
        document.body.classList.add('sidebar-collapsed');
      } else if (saved === null && window.matchMedia('(max-width: 768px)').matches) {
        document.body.classList.add('sidebar-collapsed');
      }
    }catch(e){}
    // Backdrop click to close
    const backdrop = document.getElementById('backdrop');
    if(backdrop){ backdrop.addEventListener('click', ()=>{ document.body.classList.remove('sidebar-collapsed'); }); }
    // ESC to close
    document.addEventListener('keydown', (e)=>{ if(e.key==='Escape'){ document.body.classList.add('sidebar-collapsed'); } });
    // Close on nav click in mobile
    document.querySelectorAll('.nav a').forEach(a=>{
      if (a.getAttribute('href') !== '../../../CONTROLADOR/Auth/logout.php') {
        a.addEventListener('click', ()=>{
          if (window.matchMedia('(max-width: 768px)').matches) { document.body.classList.add('sidebar-collapsed'); }
        });
      }
    });
  });
</script>

<!-- FullCalendar JS -->
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js"></script>
</body>
</html>