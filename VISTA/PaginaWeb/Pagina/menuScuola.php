<!DOCTYPE html>
<?php if (session_status() === PHP_SESSION_NONE) { session_start(); } if (isset($_GET['lang']) && in_array($_GET['lang'], ['es','en','it'])) { $_SESSION['lang'] = $_GET['lang']; } $cl = $_SESSION['lang'] ?? 'es'; ?>
<html lang="<?php echo $cl; ?>">
<head>
  <meta charset="UTF-8" />
  <title><?php $ms_meta=['es'=>'Menú Scuola Italiana','en'=>'Scuola Italiana Menu','it'=>'Menu Scuola Italiana']; echo $ms_meta[$cl]; ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="icon" type="image/png" href="/Pagina/VISTA/PaginaWeb/Pagina/FOTOS/fotosPrincipales/logotipo.png">
  <link rel="shortcut icon" href="/Pagina/favicon.ico">
  <!-- Fuente Merriweather Sans para el dropdown -->
  <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../css/menuScuola.css">

  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }


    body {
  font-family: 'Arial', sans-serif;
  display: flex;
  height: 100vh;
  overflow: hidden;
  background-color: white;
  transform: translateX(100%);
  animation: slideInFromRight 0.5s ease-out forwards;
}

@keyframes slideInFromRight {
  from {
    transform: translateX(100%);
  }
  to {
    transform: translateX(0);
  }
}

    /* Lado izquierdo con imagen */
    .left {
      width: 60%;
      position: relative;
      background-size: cover;
      background-position: center center;
      background-repeat: no-repeat;
      transition: background-image 0.5s ease-in-out;
    }

    /* Curva entre imagen y panel derecho */
    .curve {
      position: absolute;
      top: 0;
      right: -50px;
      width: 100px;
      height: 100%;
      background: white;
      border-top-left-radius: 50% 100%;
      border-bottom-left-radius: 50% 100%;
      z-index: 1;
    }

    /* Panel derecho */
    .right {
      width: 40%;
      background-color: white;
      position: relative;
      z-index: 2;
      display: flex;
      flex-direction: column;
      padding: 0 40px;
    }

    /* Menú superior centrado más hacia el centro */
    .top-menu {
      display: flex;
      justify-content: center; /* centrado horizontal */
      align-items: center;
      padding: 20px 0 0 0;
      gap: 30px;
      font-size: 14px;
      font-weight: bold;
      color: #1a1a1a;
      user-select: none;
      position: relative;
      font-family: 'Merriweather Sans', sans-serif;
    }

    /* Dropdown minimalista */
    .menu-dropdown {
      cursor: pointer;
      font-weight: 600;
      color: #2c3e50;
      user-select: none;
      position: relative;
    }

    .submenu {
      list-style: none;
      margin: 5px 0 0 0;
      padding: 0;
      max-height: 0;
      overflow: hidden;
      transition: max-height 0.3s ease;
      background: #f9f9f9;
      position: absolute;
      top: 100%;
      left: 0;
      box-shadow: 0 4px 6px rgba(0,0,0,0.1);
      border-radius: 4px;
      width: max-content;
      min-width: 160px;
      z-index: 10;
    }

    .submenu.show {
      max-height: 500px; /* suficiente espacio */
    }

    .submenu li {
      padding: 8px 15px;
      cursor: pointer;
      color: #2c3e50;
      font-weight: 400;
      white-space: nowrap;
    }

    .submenu li:hover {
      background-color: #eaeaea;
      text-decoration: none;
    }

    /* Otros spans en menú superior */
    .top-menu > span {
      cursor: pointer;
      font-weight: 600;
      color: #2c3e50;
      user-select: none;
    }

    .top-menu > span:hover {
      text-decoration: underline;
    }

    .close-button {
      position: absolute;
      top: 14px;
      right: 30px;
      width: 32px;
      height: 32px;
      background: #fff;
      border: 2px solid #b3b3b3;
      border-radius: 50%;
      text-align: center;
      line-height: 28px;
      font-size: 20px;
      cursor: pointer;
      user-select: none;
    }

    /* Contenedor principal del menú */
    .menu-container {
      display: flex;
      flex: 1;
      padding-top: 40px;
    }

    .menu {
      width: 50%;
    }

    .menu-item {
      font-size: 18px;
      margin-bottom: 15px;
      font-weight: bold;
      color: #1a1a1a;
      cursor: pointer;
      transition: color 0.2s;
    }

    .menu-item:hover {
      color: #b00202;
    }

    /* Submenús que aparecen a la derecha */
    .submenu-panel {
      width: 50%;
      padding-left: 20px;
      font-size: 14px;
      color: #555;
    }

    .submenu-content {
      display: none;
      animation: fadeIn 0.3s ease-in-out;
    }

    .submenu-content.active {
      display: block;
    }

    .submenu-content ul {
      list-style: none;
      padding-left: 0;
    }

    .submenu-content li {
      margin-bottom: 8px;
      cursor: pointer;
    }

    .submenu-content li:hover {
      text-decoration: none;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateX(10px); }
      to { opacity: 1; transform: translateX(0); }
    }
    @keyframes slideOutToRight {
  from {
    transform: translateX(0);
  }
  to {
    transform: translateX(100%);
  }
}

    /* Neutralizar apariencia de enlaces en submenús (pero mantenerlos clickeables) */
    .submenu a,
    .submenu-content a {
      color: inherit;
      text-decoration: none;
    }

    /* Search styles */
    .top-menu .search-wrapper { position: relative; }
    .top-menu input#menu-search {
      padding: 6px 10px;
      border: 1px solid #d0d5dd;
      border-radius: 6px;
      outline: none;
      font-size: 14px;
      min-width: 180px;
    }
    .top-menu input#menu-search:focus { border-color: #94a3b8; box-shadow: 0 0 0 3px rgba(148,163,184,0.25); }
    #search-results {
      position: absolute;
      top: 36px;
      right: 0;
      list-style: none;
      margin: 6px 0 0 0;
      padding: 6px 0;
      background: #fff;
      border: 1px solid #e5e7eb;
      border-radius: 6px;
      box-shadow: 0 10px 16px rgba(0,0,0,0.08);
      max-height: 260px;
      overflow: auto;
      display: none;
      z-index: 20;
      min-width: 260px;
    }
    #search-results li { padding: 6px 12px; }
    #search-results li a { display: block; color: #2c3e50; }
    #search-results li:hover { background: #f3f4f6; }

    /* Mobile adjustments for search */
    @media (max-width: 768px) {
      .top-menu {
        flex-wrap: wrap;
        gap: 12px;
        padding: 12px 0 0 0;
      }
      .top-menu .search-wrapper { width: 100%; }
      .top-menu input#menu-search { width: 100%; min-width: 0; }
      #search-results {
        left: 0;
        right: auto;
        min-width: 100%;
        max-height: 50vh;
      }
    }

  </style>
</head>
<div id="cms-root"></div>
<body>
  <div id="original-content">
  <div class="left" style="background-image: url('FOTOS/fotosPrincipales/ejemplo1.jpg');">
    <div class="curve"></div>
  </div>

  <div class="right">
    <!-- Menú superior con dropdown -->
    <div class="top-menu">
      <div class="menu-dropdown" onclick="toggleMenu(event)">
        Enlaces Rápidos
        <ul id="submenu" class="submenu"></ul>
      </div>
      <span>Calendario</span>
      <div class="search-wrapper">
        <input id="menu-search" type="text" placeholder="Buscar..." autocomplete="off" />
        <ul id="search-results"></ul>
      </div>
      <span>Otros</span>
    </div>
    <div class="close-button">✕</div>

    <!-- Contenedor principal del menú -->
    <!-- Contenedor principal del menú -->
<div class="menu-container">
  <div class="menu">
    <div class="menu-item" onclick="window.location.href='acerca-scuola.php'" data-target="submenu1" data-img="FOTOS/fotosPrincipales/ejemplo1.jpg">
      Acerca Scuola Italiana
    </div>

    <div class="menu-item" onclick="window.location.href='admisiones.php'" data-target="submenu2" data-img="FOTOS/fotosPrincipales/ejemplo2.jpg">
      Admisión
    </div>

    <div class="menu-item" onclick="window.location.href='propuesta.php'" data-target="submenu3" data-img="FOTOS/fotosPrincipales/ejemplo3.jpg">
      Propuesta Educativa
    </div>

    <div class="menu-item" onclick="window.location.href='mapa.php'" data-target="submenu4" data-img="FOTOS/fotosPrincipales/ejemplo4.jpg">
      Mapa del colegio
    </div>

    <div class="menu-item" onclick="window.location.href='deportes.php'" data-target="submenu5" data-img="FOTOS/fotosPrincipales/ejemplo5.jpg">
      Deportes
    </div>

    <div class="menu-item" onclick="window.location.href='otra.php'" data-target="submenu6" data-img="FOTOS/fotosPrincipales/ejemplo6.jpg">
      Otra sección
    </div>
  </div>



      <div class="submenu-panel">
        <div id="submenu1" class="submenu-content active">
          <ul>
            <li><a href="acerca-scuola.php"><strong>Ir a Acerca Scuola Italiana</strong></a></li>
            <li><a href="acerca-scuola.php">Acerca de la Scuola</a></li>
            <li><a href="acerca-bienvenido.php">Bienvenido a Scuola Italiana</a></li>
            <li><a href="acerca-mision-historia.php">Nuestra Misión e Historia</a></li>
            <li><a href="acerca-liderazgo-vision.php">Liderazgo y visión estratégica</a></li>
            <li><a href="acerca-personal.php">Nuestro personal docente y administrativo</a></li>
            <li><a href="acerca-carreras.php">Carreras</a></li>
            <li><a href="acerca-campus.php">Explora nuestro campus</a></li>
            <li><a href="acerca-comunidad.php">Voces de la comunidad</a></li>
            <li><a href="acerca-equidad-participacion.php">Equidad y participación comunitaria</a></li>
            <li><a href="calendario-escolar.php">Calendario escolar</a></li>
          </ul>
        </div>

        <div id="submenu2" class="submenu-content">
          <ul>
            <li><a href="admisiones.php"><strong>Ir a Admisión</strong></a></li>
            <li><a href="admision-requisitos.php">Requisitos de admisión</a></li>
            <li><a href="admision-fechas.php">Fechas clave</a></li>
            <li><a href="admision-contacto.php">Contacto de admisiones</a></li>
          </ul>
        </div>
        <div id="submenu3" class="submenu-content">
          <ul>
            <li><a href="propuesta.php"><strong>Ir a Propuesta Educativa</strong></a></li>
            <li><a href="propuesta-niveles.php">Niveles y áreas</a></li>
            <li><a href="propuesta-plan-academico.php">Plan académico</a></li>
            <li><a href="propuesta-proyectos.php">Proyectos destacados</a></li>
          </ul>
        </div>
        <div id="submenu4" class="submenu-content">
          <ul>
            <li><a href="mapa.php"><strong>Ir a Mapa del colegio</strong></a></li>
            <li><a href="mapa-campus.php">Mapa del campus</a></li>
            <li><a href="ubicaciones.php">Ubicaciones principales</a></li>
          </ul>
        </div>
        <div id="submenu5" class="submenu-content">
          <ul>
            <li><a href="deportes.php"><strong>Ir a Deportes</strong></a></li>
            <li><a href="deportes-actividades.php">Actividades deportivas</a></li>
            <li><a href="deportes-competencias.php">Competencias</a></li>
            <li><a href="deportes-talleres.php">Talleres</a></li>
          </ul>
        </div>
        <div id="submenu6" class="submenu-content">
          <ul>
            <li><a href="otra.php"><strong>Ir a Otra sección</strong></a></li>
            <li><a href="otra-historia.php">Historia institucional</a></li>
            <li><a href="otra-legado.php">Legado y valores</a></li>
            <li><a href="otra-documentos.php">Documentos y recursos</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  
<script>
    // Dropdown minimalista - VERSIÓN CORREGIDA
    let savedPages = [];

    async function loadPagesFromServer() {
        try {
            const response = await fetch('../../../MODELO/Gestor/pages_manager.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'action=getAll'
            });
            const pages = await response.json();
            return Array.isArray(pages) ? pages : [];
        } catch (error) {
            console.error('Error cargando páginas:', error);
            // Fallback a localStorage
            const localPages = JSON.parse(localStorage.getItem('savedPages')) || [];
            return localPages;
        }
    }

    async function updateMenu() {
        savedPages = await loadPagesFromServer();
        const submenu = document.getElementById("submenu");
        
        if (!Array.isArray(savedPages) || savedPages.length === 0) {
            submenu.innerHTML = "<li style=\"padding:8px 15px;\">No hay páginas creadas</li>";
            return;
        }

        // Enlaces Rápidos: mostrar páginas creadas
        submenu.innerHTML = savedPages.map(page => {
            const label = page.name || ('Página ' + page.id);
            return `<li><a href=\"../../../MODELO/Gestor/view_page.php?id=${page.id}\" style=\"text-decoration:none; color:#2c3e50; display:block; padding:8px 15px;\">${label}</a></li>`;
        }).join('');
    }

    function viewPage(id) {
        // Navegación normal
        window.location.href = `../../../MODELO/Gestor/view_page.php?id=${id}`;
    }

    function toggleMenu(event) {
        event.stopPropagation();
        document.getElementById("submenu").classList.toggle("show");
    }


    // Cerrar con transición
    document.querySelector('.close-button').addEventListener('click', () => {
        document.body.style.animation = 'slideOutToRight 0.5s ease-in forwards';
        setTimeout(() => {
            const params = new URLSearchParams(window.location.search);
            const isAdmin = params.get('cms_admin_token') === 'true';
            const target = isAdmin ? 'index.php?cms_admin_token=true' : 'index.php';
            window.location.href = target;
        }, 500);
    });

    document.addEventListener("DOMContentLoaded", async () => {
        await updateMenu();
        setupSearch();

        // Cerrar dropdown al click fuera
        document.body.addEventListener('click', () => {
            const submenu = document.getElementById("submenu");
            submenu.classList.remove("show");
        });

        // Cambiar imagen e info en menú principal
        const items = document.querySelectorAll('.menu-item');
        const contents = document.querySelectorAll('.submenu-content');
        const leftDiv = document.querySelector('.left');

        items.forEach(item => {
            item.addEventListener('mouseenter', () => {
                const target = item.getAttribute('data-target');
                const img = item.getAttribute('data-img');

                // Cambiar submenu visible
                contents.forEach(content => content.classList.remove('active'));
                const activeContent = document.getElementById(target);
                if (activeContent) activeContent.classList.add('active');

                // Cambiar imagen de la izquierda
                if (img) {
                    leftDiv.style.backgroundImage = `url('${img}')`;
                }
            });
        });

        // Mobile: always prevent direct navigation on .menu-item. Only expand submenu and update image.
        // Top links remain unchanged. This runs only on devices without hover.
        const isTouchLike = window.matchMedia && window.matchMedia('(hover: none)').matches;
        if (isTouchLike) {
            items.forEach(item => {
                item.addEventListener('click', (e) => {
                    e.preventDefault();
                    e.stopImmediatePropagation();
                    const target = item.getAttribute('data-target');
                    const img = item.getAttribute('data-img');

                    // Activate corresponding submenu
                    contents.forEach(content => content.classList.remove('active'));
                    const activeContent = document.getElementById(target);
                    if (activeContent) activeContent.classList.add('active');

                    // Update left image
                    if (img) {
                        leftDiv.style.backgroundImage = `url('${img}')`;
                    }
                }, true);
            });
        }
    });
    </script>

    <script>
    function buildSearchIndex() {
        const submenuLinks = Array.from(document.querySelectorAll('.submenu-content a'));
        const quickLinks = Array.from(document.querySelectorAll('#submenu li a'));
        const links = [...submenuLinks, ...quickLinks];
        return links.map(a => ({ text: a.textContent.trim(), href: a.getAttribute('href') }));
    }

    function setupSearch() {
        const input = document.getElementById('menu-search');
        const results = document.getElementById('search-results');
        if (!input || !results) return;
        let index = buildSearchIndex();

        const observer = new MutationObserver(() => { index = buildSearchIndex(); });
        observer.observe(document.body, { subtree: true, childList: true });

        function render(items) {
            if (!items.length) {
                results.innerHTML = '<li style="padding:6px 12px; color:#6b7280;">Sin resultados</li>';
                results.style.display = 'block';
                return;
            }
            results.innerHTML = items.slice(0, 8)
                .map(it => `<li><a href="${it.href}">${it.text}</a></li>`)
                .join('');
            results.style.display = 'block';
        }

        input.addEventListener('input', () => {
            const q = input.value.trim().toLowerCase();
            if (q.length < 1) { results.style.display = 'none'; return; }
            const filtered = index.filter(it => it.text.toLowerCase().includes(q));
            render(filtered);
        });

        input.addEventListener('keydown', (e) => {
            if (e.key === 'Enter') {
                const first = results.querySelector('li a');
                if (first) {
                    window.location.href = first.getAttribute('href');
                }
            }
        });

        document.addEventListener('click', (e) => {
            if (!results.contains(e.target) && e.target !== input) {
                results.style.display = 'none';
            }
        });
    }
    </script>

  <style>
.quality-icon {
    transition: all 0.3s ease;
    cursor: pointer;
}

.quality-icon:hover {
    background: #049B4C !important;
    transform: scale(1.1);
}

.quality-icon i {
    font-size: 40px;
    color: white;
}

.quality-item a {
    text-decoration: none;
}



/* MEJORAR LA SEPARACIÓN Y ANIMACIÓN DE NOTICIAS */
.projects-section {
    background: #1B2F6F;
    padding: 200px 5% 150px 5%;
    text-align: center;
    margin-bottom: 120px;
}

.news-section {
    padding: 140px 5% 100px 5%;
    background: #0A2452;
    position: relative;
    overflow: hidden;
}

.news-section::after {
    content: '';
    position: absolute;
    top: 0;
    right: 0;
    width: 0%;
    height: 870px;
    background: #004ECC;
    transition: width 2.5s cubic-bezier(1, 0.46, 0.45, 0.94);
    

    
    z-index: 1;
}

.news-section.animate::after {
    width: 50%;
}

.news-header, 
.news-grid {
    position: relative;
    z-index: 2;
}

</style>


  <script src="cms-admin.js"></script>
  <script src="analytics.js"></script>
  <link rel="stylesheet" href="../css/announcement.css">
  <script src="announcement.js"></script>
</body>
</html>