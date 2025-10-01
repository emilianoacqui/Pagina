<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <title>Scuola Italiana</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!-- Fuente Merriweather Sans para el dropdown -->
  <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@400;600&display=swap" rel="stylesheet">

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
      text-decoration: underline;
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
      text-decoration: underline;
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

  </style>
</head>
<body>
  <div class="left" style="background-image: url('fotosPrincipales/ejemplo1.jpg');">
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
      <span>Buscar</span>
      <span>Otros</span>
    </div>
    <div class="close-button">✕</div>

    <!-- Contenedor principal del menú -->
    <!-- Contenedor principal del menú -->
<div class="menu-container">
  <div class="menu">
    <div class="menu-item" onclick="window.location.href='acerca.php'" data-target="submenu1" data-img="fotosPrincipales/ejemplo1.jpg">
      Acerca Scuola Italiana
    </div>

    <div class="menu-item" onclick="window.location.href='admision.php'" data-target="submenu2" data-img="fotosPrincipales/ejemplo2.jpg">
      Admisión
    </div>

    <div class="menu-item" onclick="window.location.href='propuesta.php'" data-target="submenu3" data-img="fotosPrincipales/ejemplo3.jpg">
      Propuesta Educativa
    </div>

    <div class="menu-item" onclick="window.location.href='mapa.php'" data-target="submenu4" data-img="fotosPrincipales/ejemplo4.jpg">
      Mapa del colegio
    </div>

    <div class="menu-item" onclick="window.location.href='deportes.php'" data-target="submenu5" data-img="fotosPrincipales/ejemplo5.jpg">
      Deportes
    </div>

    <div class="menu-item" onclick="window.location.href='otra.php'" data-target="submenu6" data-img="fotosPrincipales/ejemplo6.jpg">
      Otra sección
    </div>
  </div>



      <div class="submenu-panel">
        <div id="submenu1" class="submenu-content active">
          <ul>
            <li>Bienvenido a Scuola Italiana</li>
            <li>Nuestra Misión e Historia</li>
            <li>Liderazgo y visión estratégica</li>
            <li>Nuestro personal docente y administrativo</li>
            <li>Carreras</li>
            <li>Explora nuestro campus</li>
            <li>Voces de la comunidad</li>
            <li>Equidad y participación comunitaria</li>
            <li>Calendario escolar</li>
          </ul>
        </div>

        <div id="submenu2" class="submenu-content"><p>Información sobre admisiones, requisitos y fechas clave.</p></div>
        <div id="submenu3" class="submenu-content"><p>Plan académico, niveles y contenidos educativos.</p></div>
        <div id="submenu4" class="submenu-content"><p>Área de humanidades, literatura y proyectos artísticos.</p></div>
        <div id="submenu5" class="submenu-content"><p>Actividades deportivas, competencias y talleres físicos.</p></div>
        <div id="submenu6" class="submenu-content"><p>Historia y legado institucional de la escuela.</p></div>
      </div>
    </div>
  </div>

  
<script>
    // Dropdown minimalista - VERSIÓN CORREGIDA
    let savedPages = [];

    async function loadPagesFromServer() {
        try {
            const response = await fetch('pages_manager.php', {
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
        
        if (savedPages.length === 0) {
            submenu.innerHTML = "<li>No hay páginas creadas</li>";
        } else {
            submenu.innerHTML = savedPages.map(page =>
                `<li onclick="viewPage(${page.id})">${page.name}</li>`
            ).join('');
        }
    }

    function viewPage(id) {
        const page = savedPages.find(p => p.id === id);
        if (!page) return;
        
        // 🔥 CORRECCIÓN: Abrir la página usando view_page.php para mantener estilos
        window.open(`view_page.php?id=${id}`, '_blank');
    }

    function toggleMenu(event) {
        event.stopPropagation();
        document.getElementById("submenu").classList.toggle("show");
    }

    // Cerrar con transición
    document.querySelector('.close-button').addEventListener('click', () => {
        document.body.style.animation = 'slideOutToRight 0.5s ease-in forwards';
        setTimeout(() => {
            history.back();
        }, 500);
    });

    document.addEventListener("DOMContentLoaded", async () => {
        await updateMenu();

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
    });
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
</body>
</html>