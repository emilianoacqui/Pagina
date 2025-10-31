<!DOCTYPE html>
<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
if (isset($_GET['lang']) && in_array($_GET['lang'], ['es', 'en', 'it'], true)) {
  $_SESSION['lang'] = $_GET['lang'];
}
$cl = $_SESSION['lang'] ?? 'es';

$ms_meta = [
  'es' => 'Menú Scuola Italiana',
  'en' => 'Scuola Italiana Menu',
  'it' => 'Menu Scuola Italiana',
];

if (!function_exists('ms_tr')) {
  function ms_tr(array $map, string $lang): string
  {
    if (isset($map[$lang]) && is_string($map[$lang])) {
      return $map[$lang];
    }
    if (isset($map['es']) && is_string($map['es'])) {
      return $map['es'];
    }
    $first = reset($map);
    return is_string($first) ? $first : '';
  }
}

$uiText = [
  'quick_links' => [
    'es' => 'Enlaces Rápidos',
    'en' => 'Quick Links',
    'it' => 'Collegamenti Rapidi',
  ],
  'calendar' => [
    'es' => 'Calendario',
    'en' => 'Calendar',
    'it' => 'Calendario',
  ],
  'others' => [
    'es' => 'Otros',
    'en' => 'Others',
    'it' => 'Altri',
  ],
  'search_placeholder' => [
    'es' => 'Buscar...',
    'en' => 'Search...',
    'it' => 'Cerca...',
  ],
];

$menuItems = [
  [
    'id' => 'submenu1',
    'image' => 'FOTOS/fotosPrincipales/ejemplo1.jpg',
    'link' => 'acerca-scuola.php',
    'label' => [
      'es' => 'Acerca Scuola Italiana',
      'en' => 'About Scuola Italiana',
      'it' => 'Informazioni sulla Scuola Italiana',
    ],
    'submenu' => [
      [
        'href' => 'acerca-scuola.php',
        'label' => [
          'es' => 'Ir a Acerca Scuola Italiana',
          'en' => 'Go to About Scuola Italiana',
          'it' => 'Vai a Informazioni sulla Scuola Italiana',
        ],
        'strong' => true,
      ],
      [
        'href' => 'acerca-scuola.php',
        'label' => [
          'es' => 'Acerca de la Scuola',
          'en' => 'About the School',
          'it' => 'Informazioni sulla scuola',
        ],
      ],
      [
        'href' => 'acerca-bienvenido.php',
        'label' => [
          'es' => 'Bienvenido a Scuola Italiana',
          'en' => 'Welcome to Scuola Italiana',
          'it' => 'Benvenuti alla Scuola Italiana',
        ],
      ],
      [
        'href' => 'acerca-mision-historia.php',
        'label' => [
          'es' => 'Nuestra Misión e Historia',
          'en' => 'Our Mission and History',
          'it' => 'La nostra missione e storia',
        ],
      ],
      [
        'href' => 'acerca-liderazgo-vision.php',
        'label' => [
          'es' => 'Liderazgo y visión estratégica',
          'en' => 'Leadership and Strategic Vision',
          'it' => 'Leadership e visione strategica',
        ],
      ],
      [
        'href' => 'acerca-personal.php',
        'label' => [
          'es' => 'Nuestro personal docente y administrativo',
          'en' => 'Our Teaching and Administrative Staff',
          'it' => 'Il nostro personale docente e amministrativo',
        ],
      ],
      [
        'href' => 'acerca-carreras.php',
        'label' => [
          'es' => 'Carreras',
          'en' => 'Careers',
          'it' => 'Carriere',
        ],
      ],
      [
        'href' => 'acerca-campus.php',
        'label' => [
          'es' => 'Explora nuestro campus',
          'en' => 'Explore Our Campus',
          'it' => 'Esplora il nostro campus',
        ],
      ],
      [
        'href' => 'acerca-comunidad.php',
        'label' => [
          'es' => 'Voces de la comunidad',
          'en' => 'Voices of the Community',
          'it' => 'Voci della comunità',
        ],
      ],
      [
        'href' => 'acerca-equidad-participacion.php',
        'label' => [
          'es' => 'Equidad y participación comunitaria',
          'en' => 'Equity and Community Engagement',
          'it' => 'Equità e partecipazione della comunità',
        ],
      ],
      [
        'href' => 'calendario-escolar.php',
        'label' => [
          'es' => 'Calendario escolar',
          'en' => 'School Calendar',
          'it' => 'Calendario scolastico',
        ],
      ],
    ],
  ],
  [
    'id' => 'submenu2',
    'image' => 'FOTOS/fotosPrincipales/ejemplo2.jpg',
    'link' => 'admisiones.php',
    'label' => [
      'es' => 'Admisión',
      'en' => 'Admission',
      'it' => 'Ammissione',
    ],
    'submenu' => [
      [
        'href' => 'admisiones.php',
        'label' => [
          'es' => 'Ir a Admisión',
          'en' => 'Go to Admission',
          'it' => 'Vai a Ammissione',
        ],
        'strong' => true,
      ],
      [
        'href' => 'admision-requisitos.php',
        'label' => [
          'es' => 'Requisitos de admisión',
          'en' => 'Admission Requirements',
          'it' => 'Requisiti di ammissione',
        ],
      ],
      [
        'href' => 'admision-fechas.php',
        'label' => [
          'es' => 'Fechas clave',
          'en' => 'Key Dates',
          'it' => 'Date importanti',
        ],
      ],
      [
        'href' => 'admision-contacto.php',
        'label' => [
          'es' => 'Contacto de admisiones',
          'en' => 'Admissions Contact',
          'it' => 'Contatti per l\'ammissione',
        ],
      ],
    ],
  ],
  [
    'id' => 'submenu3',
    'image' => 'FOTOS/fotosPrincipales/ejemplo3.jpg',
    'link' => 'propuesta.php',
    'label' => [
      'es' => 'Propuesta Educativa',
      'en' => 'Educational Program',
      'it' => 'Offerta formativa',
    ],
    'submenu' => [
      [
        'href' => 'propuesta.php',
        'label' => [
          'es' => 'Ir a Propuesta Educativa',
          'en' => 'Go to Educational Program',
          'it' => 'Vai a Offerta formativa',
        ],
        'strong' => true,
      ],
      [
        'href' => 'propuesta-niveles.php',
        'label' => [
          'es' => 'Niveles y áreas',
          'en' => 'Levels and Areas',
          'it' => 'Livelli e aree',
        ],
      ],
      [
        'href' => 'propuesta-plan-academico.php',
        'label' => [
          'es' => 'Plan académico',
          'en' => 'Academic Plan',
          'it' => 'Piano accademico',
        ],
      ],
      [
        'href' => 'propuesta-proyectos.php',
        'label' => [
          'es' => 'Proyectos destacados',
          'en' => 'Featured Projects',
          'it' => 'Progetti principali',
        ],
      ],
    ],
  ],
  [
    'id' => 'submenu4',
    'image' => 'FOTOS/fotosPrincipales/ejemplo4.jpg',
    'link' => 'mapa.php',
    'label' => [
      'es' => 'Mapa del colegio',
      'en' => 'School Map',
      'it' => 'Mappa della scuola',
    ],
    'submenu' => [
      [
        'href' => 'mapa.php',
        'label' => [
          'es' => 'Ir a Mapa del colegio',
          'en' => 'Go to School Map',
          'it' => 'Vai a Mappa della scuola',
        ],
        'strong' => true,
      ],
      [
        'href' => 'mapa-campus.php',
        'label' => [
          'es' => 'Mapa del campus',
          'en' => 'Campus Map',
          'it' => 'Mappa del campus',
        ],
      ],
      [
        'href' => 'ubicaciones.php',
        'label' => [
          'es' => 'Ubicaciones principales',
          'en' => 'Main Locations',
          'it' => 'Posizioni principali',
        ],
      ],
    ],
  ],
  [
    'id' => 'submenu5',
    'image' => 'FOTOS/fotosPrincipales/ejemplo5.jpg',
    'link' => 'deportes.php',
    'label' => [
      'es' => 'Deportes',
      'en' => 'Sports',
      'it' => 'Sport',
    ],
    'submenu' => [
      [
        'href' => 'deportes.php',
        'label' => [
          'es' => 'Ir a Deportes',
          'en' => 'Go to Sports',
          'it' => 'Vai a Sport',
        ],
        'strong' => true,
      ],
      [
        'href' => 'deportes-actividades.php',
        'label' => [
          'es' => 'Actividades deportivas',
          'en' => 'Sports Activities',
          'it' => 'Attività sportive',
        ],
      ],
      [
        'href' => 'deportes-competencias.php',
        'label' => [
          'es' => 'Competencias',
          'en' => 'Competitions',
          'it' => 'Competizioni',
        ],
      ],
      [
        'href' => 'deportes-talleres.php',
        'label' => [
          'es' => 'Talleres',
          'en' => 'Workshops',
          'it' => 'Laboratori',
        ],
      ],
    ],
  ],
  [
    'id' => 'submenu6',
    'image' => 'FOTOS/fotosPrincipales/ejemplo6.jpg',
    'link' => 'otra.php',
    'label' => [
      'es' => 'Otra sección',
      'en' => 'Other Section',
      'it' => 'Altra sezione',
    ],
    'submenu' => [
      [
        'href' => 'otra.php',
        'label' => [
          'es' => 'Ir a Otra sección',
          'en' => 'Go to Other Section',
          'it' => 'Vai a Altra sezione',
        ],
        'strong' => true,
      ],
      [
        'href' => 'otra-historia.php',
        'label' => [
          'es' => 'Historia institucional',
          'en' => 'Institutional History',
          'it' => 'Storia istituzionale',
        ],
      ],
      [
        'href' => 'otra-legado.php',
        'label' => [
          'es' => 'Legado y valores',
          'en' => 'Legacy and Values',
          'it' => 'Eredità e valori',
        ],
      ],
      [
        'href' => 'otra-documentos.php',
        'label' => [
          'es' => 'Documentos y recursos',
          'en' => 'Documents and Resources',
          'it' => 'Documenti e risorse',
        ],
      ],
      [
        'href' => 'fisica.php',
        'label' => [
          'es' => 'Laboratorio de Física',
          'en' => 'Physics Laboratory',
          'it' => 'Laboratorio di fisica',
        ],
        'attributes' => 'style="opacity:0.8; font-weight:400;"',
      ],
    ],
  ],
];

$jsText = [
  'no_pages' => [
    'es' => 'No hay páginas creadas',
    'en' => 'No pages created',
    'it' => 'Nessuna pagina creata',
  ],
  'no_results' => [
    'es' => 'Sin resultados',
    'en' => 'No results',
    'it' => 'Nessun risultato',
  ],
  'page_fallback' => [
    'es' => 'Página ',
    'en' => 'Page ',
    'it' => 'Pagina ',
  ],
];
?>
<html lang="<?php echo $cl; ?>">
<head>
  <meta charset="UTF-8" />
  <title><?php echo htmlspecialchars(ms_tr($ms_meta, $cl)); ?></title>
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
  <div class="left" style="background-image: url('FOTOS/fotosPrincipales/ejemplo1.jpg');">
    <div class="curve"></div>
  </div>

  <div class="right">
    <!-- Menú superior con dropdown -->
    <div class="top-menu">
      <div class="menu-dropdown" onclick="toggleMenu(event)">
        <?php echo htmlspecialchars(ms_tr($uiText['quick_links'], $cl)); ?>
        <ul id="submenu" class="submenu"></ul>
      </div>
      <span><?php echo htmlspecialchars(ms_tr($uiText['calendar'], $cl)); ?></span>
      <div class="search-wrapper">
        <input id="menu-search" type="text" placeholder="<?php echo htmlspecialchars(ms_tr($uiText['search_placeholder'], $cl)); ?>" autocomplete="off" />
        <ul id="search-results"></ul>
      </div>
      <span><?php echo htmlspecialchars(ms_tr($uiText['others'], $cl)); ?></span>
    </div>
    <div class="close-button">✕</div>

    <!-- Contenedor principal del menú -->
<div class="menu-container">
  <div class="menu">
        <?php foreach ($menuItems as $item): ?>
          <div
            class="menu-item"
            onclick="window.location.href='<?php echo htmlspecialchars($item['link'], ENT_QUOTES); ?>'"
            data-target="<?php echo htmlspecialchars($item['id']); ?>"
            data-img="<?php echo htmlspecialchars($item['image']); ?>"
          >
            <?php echo htmlspecialchars(ms_tr($item['label'], $cl)); ?>
    </div>
        <?php endforeach; ?>
  </div>

      <div class="submenu-panel">
        <?php foreach ($menuItems as $index => $item): ?>
          <div id="<?php echo htmlspecialchars($item['id']); ?>" class="submenu-content<?php echo $index === 0 ? ' active' : ''; ?>">
            <ul>
              <?php foreach ($item['submenu'] as $submenu): ?>
                <li>
                  <a href="<?php echo htmlspecialchars($submenu['href']); ?>"<?php echo !empty($submenu['attributes']) ? ' ' . $submenu['attributes'] : ''; ?>>
                    <?php if (!empty($submenu['strong'])): ?><strong><?php endif; ?>
                    <?php echo htmlspecialchars(ms_tr($submenu['label'], $cl)); ?>
                    <?php if (!empty($submenu['strong'])): ?></strong><?php endif; ?>
                  </a>
                </li>
              <?php endforeach; ?>
          </ul>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>

  
<script>
    // Dropdown minimalista - VERSIÓN CORREGIDA
    const msTranslations = <?php echo json_encode([
        'noPages' => ms_tr($jsText['no_pages'], $cl),
        'noResults' => ms_tr($jsText['no_results'], $cl),
        'pageFallback' => ms_tr($jsText['page_fallback'], $cl),
    ], JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT); ?>;
    let savedPages = [];

    async function loadPagesFromServer() {
        try {
            const response = await fetch('../../../CONTROLADOR/Cms/pages_manager.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'action=getAll'
            });
            const result = await response.json();
            const pages = (result && result.success && Array.isArray(result.data)) ? result.data : [];
            return pages;
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
        const isAdmin = new URLSearchParams(window.location.search).get('cms_admin_token') === 'true';
        
        // Solo mostrar páginas creadas por plantillas (no ediciones de páginas existentes)
        const createdPages = (Array.isArray(savedPages) ? savedPages : []).filter(p => p && p.template && p.template !== 'existing_page');

        if (!Array.isArray(createdPages) || createdPages.length === 0) {
            submenu.innerHTML = `<li style="padding:8px 15px;">${msTranslations.noPages}</li>`;
            return;
        }

        submenu.innerHTML = createdPages.map(page => {
            const label = page.name || (msTranslations.pageFallback + page.id);
            const token = isAdmin ? '&cms_admin_token=true' : '';
            return `<li><a href="view_page.php?id=${page.id}${token}" style="text-decoration:none; color:#2c3e50; display:block; padding:8px 15px;">${label}</a></li>`;
        }).join('');
    }

    function viewPage(id) {
        // Navegación normal
        window.location.href = `view_page.php?id=${id}`;
    }

    function toggleMenu(event) {
        event.stopPropagation();
        document.getElementById("submenu").classList.toggle("show");
    }


    // Cerrar con transición: volver a la página anterior si existe, si no, ir a index
    document.querySelector('.close-button').addEventListener('click', () => {
        document.body.style.animation = 'slideOutToRight 0.5s ease-in forwards';
        setTimeout(() => {
            const hasReferrer = document.referrer && new URL(document.referrer, window.location.origin).origin === window.location.origin;
            if (hasReferrer && window.history.length > 1) {
                window.history.back();
                return;
            }
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

        // Mantener modo admin al navegar desde items que usan onclick con window.location.href
        const params = new URLSearchParams(window.location.search);
        const isAdmin = params.get('cms_admin_token') === 'true';
        if (isAdmin) {
            document.querySelectorAll('.menu-item').forEach(item => {
                item.addEventListener('click', (e) => {
                    const onclick = item.getAttribute('onclick');
                    const m = onclick && onclick.match(/'([^']+)'/);
                    if (m && m[1]) {
                        e.preventDefault();
                        e.stopImmediatePropagation();
                        let href = m[1];
                        if (!href.includes('cms_admin_token=true')) {
                            href += (href.includes('?') ? '&' : '?') + 'cms_admin_token=true';
                        }
                        window.location.href = href;
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
                results.innerHTML = `<li style="padding:6px 12px; color:#6b7280;">${msTranslations.noResults}</li>`;
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