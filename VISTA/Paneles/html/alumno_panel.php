<?php

session_start();
require_once('../../../MODELO/config/bootstrap.php');

/* seguridad: sólo alumnos */
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'alumno') {
    header("Location: index.php");
    exit();
}

$mensaje = "";
$mensaje_tipo = "ok"; // ok | error
$id_alumno = intval($_SESSION['id_usuario']);

/* ==========================
   📌 CONSULTAS
========================== */

/* Clases asignadas al alumno */
$clases_alumno = [];
$stmt = $conn->prepare("
    SELECT c.id_clase, c.nombre, c.`año`
    FROM clases c
    JOIN usuarios_clases uc ON c.id_clase = uc.id_clase
    WHERE uc.id_usuario = ? AND uc.rol_en_clase = 'alumno'
    ORDER BY c.`año`, c.nombre
");
$stmt->bind_param("i", $id_alumno);
$stmt->execute();
$res = $stmt->get_result();
while ($r = $res->fetch_assoc()) { $clases_alumno[] = $r; }
$stmt->close();

/* Para mostrar profesores por clase */
$profesores_por_clase = [];
if (count($clases_alumno) > 0) {
    $ids = array_map(function($c){return intval($c['id_clase']);}, $clases_alumno);
    $in = implode(',', $ids);
    $sql = "
      SELECT uc.id_clase, u.id_usuario, u.nombre, u.email
      FROM usuarios_clases uc
      JOIN usuarios u ON uc.id_usuario = u.id_usuario
      WHERE uc.id_clase IN ($in) AND uc.rol_en_clase='profesor'
      ORDER BY u.nombre
    ";
    $res = $conn->query($sql);
    while ($row = $res->fetch_assoc()) {
        $profesores_por_clase[$row['id_clase']][] = $row;
    }
}

/* Eventos: generales + de las clases del alumno */
$eventos = [];
if (count($clases_alumno) > 0) {
    $ids = array_map(function($c){return intval($c['id_clase']);}, $clases_alumno);
    $in = implode(',', $ids);
    $sql = "SELECT e.*, c.nombre AS clase_nombre
            FROM eventos e
            LEFT JOIN clases c ON e.id_clase = c.id_clase
            WHERE e.tipo = 'general' OR (e.tipo='clase' AND e.id_clase IN ($in))
            ORDER BY e.fecha DESC";
    $res = $conn->query($sql);
    while ($row = $res->fetch_assoc()) { $eventos[] = $row; }
} else {
    // si no tiene clases, muestra solo generales
    $res = $conn->query("SELECT e.*, NULL AS clase_nombre FROM eventos e WHERE e.tipo='general' ORDER BY e.fecha DESC");
    while ($row = $res->fetch_assoc()) { $eventos[] = $row; }
}

/* Calendario: fechas de las clases del alumno (solo muestra tipo y fecha, no descripción privada) */
$calendario_por_clase = [];
if (count($clases_alumno) > 0) {
    $ids = array_map(function($c){return intval($c['id_clase']);}, $clases_alumno);
    $in = implode(',', $ids);
    $sql = "SELECT id_clase, fecha, tipo FROM calendario WHERE id_clase IN ($in) ORDER BY fecha ASC";
    $res = $conn->query($sql);
    while ($row = $res->fetch_assoc()) {
        $calendario_por_clase[$row['id_clase']][] = $row;
    }
}

/* Obtener fechas próximas (próximos 30 días) */
$fechas_proximas = [];
$fecha_actual = date('Y-m-d');
$fecha_limite = date('Y-m-d', strtotime('+30 days'));
if (count($clases_alumno) > 0) {
    $ids = array_map(function($c){return intval($c['id_clase']);}, $clases_alumno);
    $in = implode(',', $ids);
    $sql = "SELECT cal.fecha, cal.tipo, c.nombre as clase_nombre, c.año
            FROM calendario cal
            JOIN clases c ON cal.id_clase = c.id_clase
            WHERE cal.id_clase IN ($in) 
            AND cal.fecha BETWEEN '$fecha_actual' AND '$fecha_limite'
            ORDER BY cal.fecha ASC";
    $res = $conn->query($sql);
    while ($row = $res->fetch_assoc()) { $fechas_proximas[] = $row; }
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<title>Panel Alumno - Scuola Italiana di Montevideo</title>
<link rel="stylesheet" href="../css/alumno.css">   
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

</head>
<body>
  <aside class="sidebar">
    <h2>Alumno</h2>
    <nav class="nav">
      <a href="#" class="active" onclick="mostrarSeccion('seccionDashboard', this)">📊 Resumen</a>
      <a href="#" onclick="mostrarSeccion('seccionClases', this)">🏫 Mis Clases</a>
      <a href="#" onclick="mostrarSeccion('seccionCalendario', this)">📅 Calendario</a>
      <a href="#" onclick="mostrarSeccion('seccionEventos', this)">🎉 Eventos</a>
      <a href="#" onclick="mostrarSeccion('seccionLinks', this)">🔗 Mis Links</a>
      <a href="logout.php" style="margin-top: 20px; background: rgba(255,255,255,0.1);">🚪 Cerrar Sesión</a>
    </nav>
  </aside>

  <main class="main">
    <?php if($mensaje): ?>
      <div class="card msg <?php echo $mensaje_tipo; ?>">
        <?php echo $mensaje; ?>
      </div>
    <?php endif; ?>

    <!-- SECCIÓN: Dashboard/Resumen -->
    <section id="seccionDashboard" class="card" style="display:block;">
      <h1>Resumen - Bienvenido <?php echo htmlspecialchars($_SESSION['nombre']); ?></h1>
      
      <div class="dashboard-grid">
        <div class="dashboard-card">
          <h3>Mis Clases</h3>
          <div class="number"><?php echo count($clases_alumno); ?></div>
          <p>Clases asignadas</p>
        </div>
        
        <div class="dashboard-card warning">
          <h3>Próximas Fechas</h3>
          <div class="number"><?php echo count($fechas_proximas); ?></div>
          <p>En los próximos 30 días</p>
        </div>
        
        <div class="dashboard-card success">
          <h3>Eventos Activos</h3>
          <div class="number"><?php echo count($eventos); ?></div>
          <p>Eventos disponibles</p>
        </div>
      </div>

      <?php if (!empty($fechas_proximas)): ?>
        <div class="card">
          <h3>📅 Próximas Fechas Importantes</h3>
          <div class="upcoming-dates">
            <?php foreach ($fechas_proximas as $fecha): 
              $dias_restantes = (strtotime($fecha['fecha']) - strtotime(date('Y-m-d'))) / (60*60*24);
            ?>
              <div class="upcoming-item">
                <div class="upcoming-date">
                  <?php echo date('d/m', strtotime($fecha['fecha'])); ?>
                  <div class="upcoming-class"><?php echo $dias_restantes == 0 ? 'HOY' : ($dias_restantes == 1 ? 'MAÑANA' : intval($dias_restantes).' días'); ?></div>
                </div>
                <div class="upcoming-details">
                  <div style="font-weight: 500;"><?php echo ucfirst($fecha['tipo']); ?></div>
                  <div class="upcoming-class"><?php echo htmlspecialchars($fecha['año'].' • '.$fecha['clase_nombre']); ?></div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      <?php endif; ?>
    </section>

    <!-- SECCIÓN: Clases -->
    <section id="seccionClases" class="card" style="display:none;">
      <h1>Mis Clases</h1>
      <?php if(count($clases_alumno)===0): ?>
        <p class="small">No estás asignado a ninguna clase aún. El coordinador debe asignarte a las clases correspondientes.</p>
      <?php endif; ?>

      <?php foreach($clases_alumno as $c): ?>
        <div class="card" style="margin-bottom:16px; background: linear-gradient(135deg, #fff, #f8f9fa);">
          <h3 style="margin:0 0 8px; color: var(--accent);"><?php echo htmlspecialchars($c['año'].' • '.$c['nombre']); ?></h3>
          
          <div class="small" style="margin-bottom:12px;">Profesores asignados:</div>
          <?php if(!isset($profesores_por_clase[$c['id_clase']]) || count($profesores_por_clase[$c['id_clase']])===0): ?>
            <div class="small">No hay profesores asignados aún.</div>
          <?php else: ?>
            <div class="table-wrap">
              <table>
                <thead><tr><th>Profesor</th><th>Email de Contacto</th></tr></thead>
                <tbody>
                  <?php foreach($profesores_por_clase[$c['id_clase']] as $prof): ?>
                    <tr>
                      <td><?php echo htmlspecialchars($prof['nombre']); ?></td>
                      <td><?php echo htmlspecialchars($prof['email']); ?></td>
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
    <section id="seccionCalendario" class="card" style="display:none;">
      <h1>📅 Calendario de Clases</h1>
      <p class="small">Fechas importantes de tus clases (tareas, exámenes y otros eventos).</p>

      <?php if(count($clases_alumno)===0): ?>
        <p class="small">No tienes clases asignadas.</p>
      <?php else: ?>
        
        <?php foreach($clases_alumno as $c): ?>
          <div class="calendar-section">
            <div class="calendar-header">
              <h3 style="margin:0; color: var(--accent);"><?php echo htmlspecialchars($c['año'].' • '.$c['nombre']); ?></h3>
            </div>
            
            <?php if(empty($calendario_por_clase[$c['id_clase']])): ?>
              <p class="small" style="padding: 16px; background: #f8f9fa; border-radius: 8px;">No hay fechas registradas para esta clase.</p>
            <?php else: ?>
              <div class="calendar-items">
                <?php 
                // Ordenar fechas por fecha ascendente
                $fechas = $calendario_por_clase[$c['id_clase']];
                usort($fechas, function($a, $b) { return strtotime($a['fecha']) - strtotime($b['fecha']); });
                
                foreach($fechas as $f): 
                  $fecha_formateada = date('d/m/Y', strtotime($f['fecha']));
                  $es_pasado = strtotime($f['fecha']) < strtotime(date('Y-m-d'));
                ?>
                  <div class="calendar-item <?php echo $f['tipo']; ?>" style="<?php echo $es_pasado ? 'opacity: 0.6;' : ''; ?>">
                    <div class="calendar-date"><?php echo $fecha_formateada; ?></div>
                    <div style="flex: 1;">
                      <div style="font-weight: 500;"><?php echo ucfirst($f['tipo']); ?></div>
                      <?php if ($es_pasado): ?>
                        <div class="small">Fecha pasada</div>
                      <?php endif; ?>
                    </div>
                    <div class="calendar-type <?php echo $f['tipo']; ?>"><?php echo $f['tipo']; ?></div>
                  </div>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>
          </div>
        <?php endforeach; ?>

      <?php endif; ?>
    </section>

    <!-- SECCIÓN: Eventos -->
    <section id="seccionEventos" class="card" style="display:none;">
      <h1>🎉 Eventos</h1>
      <p class="small">Eventos generales de la institución y específicos de tus clases.</p>
      
      <?php if(empty($eventos)): ?>
        <p class="small">No hay eventos disponibles por el momento.</p>
      <?php else: ?>
        <div class="event-grid">
          <?php foreach($eventos as $e): ?>
            <div class="event-card">
              <img src="uploads/<?php echo $e['imagen'] ? htmlspecialchars($e['imagen']) : 'default.jpg'; ?>" alt="Evento">
              <div class="info">
                <h3><?php echo htmlspecialchars($e['titulo']); ?></h3>
                <p>📅 <?php echo date('d/m/Y', strtotime($e['fecha'])); ?></p>
                <p>🏷️ <?php echo htmlspecialchars(ucfirst($e['tipo'])); ?></p>
                <?php if($e['tipo'] === 'clase' && $e['clase_nombre']): ?>
                  <p>🏫 <?php echo htmlspecialchars($e['clase_nombre']); ?></p>
                <?php endif; ?>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
    </section>

    <!-- SECCIÓN: Links Personales -->
    <section id="seccionLinks" class="card" style="display:none;">
      <h1>🔗 Mis Links</h1>
      <p class="small">Guarda tus accesos rápidos (Google Classroom, SIGED, material de estudio, etc.). Estos links se guardan localmente en tu navegador.</p>

      <div class="form-row" style="margin: 16px 0;">
        <input id="linkTitulo" type="text" placeholder="Nombre del link (ej. Classroom 3°A)" />
        <input id="linkUrl" type="url" placeholder="https://..." />
        <button id="btnAgregarLink" class="btn">Agregar Link</button>
      </div>

      <div id="misLinks" class="links-grid"></div>
      
      <div style="margin-top: 20px; padding: 12px; background: #e3f2fd; border-radius: 8px;" class="small">
        💡 <strong>Consejo:</strong> Los links se guardan en tu navegador actual. Si usas otro dispositivo, deberás agregarlos nuevamente.
      </div>
    </section>

  </main>

  <script>
    // Global variables
    const id_alumno = <?php echo $id_alumno; ?>;

    // Utility functions
    function mostrarSeccion(id, link = null) {
      document.querySelectorAll("main section").forEach(s => s.style.display = "none");
      document.getElementById(id).style.display = "block";
      if (link) {
        document.querySelectorAll(".nav a").forEach(a => a.classList.remove("active"));
        link.classList.add("active");
      }
    }

    // ===== Links en localStorage =====
    const LS_KEY = `alumno_links_${id_alumno}`;
    
    function cargarLinks() {
      const cont = document.getElementById('misLinks');
      cont.innerHTML = '';
      let arr = JSON.parse(localStorage.getItem(LS_KEY) || '[]');
      
      if (arr.length === 0) {
        cont.innerHTML = '<p class="small" style="grid-column: 1/-1; text-align: center; padding: 20px;">No tienes links guardados aún.</p>';
        return;
      }
      
      arr.forEach((l, i) => {
        const div = document.createElement('div');
        div.className = 'link-card';
        div.innerHTML = `
          <a href="${l.url}" target="_blank">${l.title}</a>
          <button onclick="borrarLink(${i})" title="Eliminar link">✕</button>
        `;
        cont.appendChild(div);
      });
    }
    
    function agregarLink(e) {
      e.preventDefault();
      const title = document.getElementById('linkTitulo').value.trim();
      const url = document.getElementById('linkUrl').value.trim();
      
      if (!title || !url) {
        alert('⚠️ Completa el título y la URL del link');
        return;
      }
      
      if (!url.startsWith('http://') && !url.startsWith('https://')) {
        alert('⚠️ La URL debe comenzar con http:// o https://');
        return;
      }
      
      let arr = JSON.parse(localStorage.getItem(LS_KEY) || '[]');
      arr.push({title, url});
      localStorage.setItem(LS_KEY, JSON.stringify(arr));
      
      document.getElementById('linkTitulo').value = '';
      document.getElementById('linkUrl').value = '';
      cargarLinks();
      
      // Pequeña animación de éxito
      const btn = document.getElementById('btnAgregarLink');
      const originalText = btn.textContent;
      btn.textContent = '✅ Agregado';
      btn.disabled = true;
      setTimeout(() => {
        btn.textContent = originalText;
        btn.disabled = false;
      }, 1500);
    }
    
    function borrarLink(i) {
      if (!confirm('¿Eliminar este link?')) return;
      
      let arr = JSON.parse(localStorage.getItem(LS_KEY) || '[]');
      arr.splice(i, 1);
      localStorage.setItem(LS_KEY, JSON.stringify(arr));
      cargarLinks();
    }

    // Event Listeners
    document.addEventListener('DOMContentLoaded', function() {
      // Cargar links al iniciar
      cargarLinks();
      
      // Agregar link
      document.getElementById('btnAgregarLink').addEventListener('click', agregarLink);
      
      // También permitir agregar con Enter
      document.getElementById('linkUrl').addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
          agregarLink(e);
        }
      });
      
      // Navigation links
      document.querySelectorAll('.nav a').forEach(link => {
        if (link.getAttribute('href') !== 'logout.php') {
          link.addEventListener('click', function(e) {
            e.preventDefault();
            const match = this.getAttribute('onclick');
            if (match) {
              const sectionId = match.match(/'([^']+)'/)[1];
              mostrarSeccion(sectionId, this);
            }
          });
        }
      });
    });

    // Actualizar fechas próximas cada minuto (para el contador de días)
    setInterval(function() {
      const fechasProximas = document.querySelectorAll('.upcoming-class');
      fechasProximas.forEach(function(elem) {
        // Aquí podrías actualizar el contador si fuera necesario
        // Por simplicidad, lo dejamos estático por ahora
      });
    }, 60000);

    // Destacar fechas de hoy en el calendario
    document.addEventListener('DOMContentLoaded', function() {
      const hoy = new Date().toISOString().split('T')[0];
      const fechasHoy = document.querySelectorAll('.calendar-item');
      
      fechasHoy.forEach(function(item) {
        const fechaElement = item.querySelector('.calendar-date');
        if (fechaElement) {
          const fechaTexto = fechaElement.textContent.trim();
          // Convertir dd/mm/yyyy a yyyy-mm-dd para comparar
          const partes = fechaTexto.split('/');
          if (partes.length === 3) {
            const fechaFormateada = `${partes[2]}-${partes[1].padStart(2, '0')}-${partes[0].padStart(2, '0')}`;
            if (fechaFormateada === hoy) {
              item.style.boxShadow = '0 0 15px rgba(52,152,219,0.4)';
              item.style.borderLeftWidth = '6px';
            }
          }
        }
      });
    });
  </script>
</body>
</html>