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
      <span>Buscar</span>
      <span>Otros</span>
    </div>
    <div class="close-button">✕</div>

    <!-- Contenedor principal del menú -->
    <!-- Contenedor principal del menú -->
<div class="menu-container">
  <div class="menu">
    <div class="menu-item" onclick="window.location.href='acerca.php'" data-target="submenu1" data-img="FOTOS/fotosPrincipales/ejemplo1.jpg">
      Acerca Scuola Italiana
    </div>

    <div class="menu-item" onclick="window.location.href='admision.php'" data-target="submenu2" data-img="FOTOS/fotosPrincipales/ejemplo2.jpg">
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
            <li><a href="admision-requisitos.php">Requisitos de admisión</a></li>
            <li><a href="admision-fechas.php">Fechas clave</a></li>
            <li><a href="admision-contacto.php">Contacto de admisiones</a></li>
          </ul>
        </div>
        <div id="submenu3" class="submenu-content">
          <ul>
            <li><a href="propuesta-niveles.php">Niveles y áreas</a></li>
            <li><a href="propuesta-plan-academico.php">Plan académico</a></li>
            <li><a href="propuesta-proyectos.php">Proyectos destacados</a></li>
          </ul>
        </div>
        <div id="submenu4" class="submenu-content">
          <ul>
            <li><a href="mapa-campus.php">Mapa del campus</a></li>
            <li><a href="ubicaciones.php">Ubicaciones principales</a></li>
          </ul>
        </div>
        <div id="submenu5" class="submenu-content">
          <ul>
            <li><a href="deportes-actividades.php">Actividades deportivas</a></li>
            <li><a href="deportes-competencias.php">Competencias</a></li>
            <li><a href="deportes-talleres.php">Talleres</a></li>
          </ul>
        </div>
        <div id="submenu6" class="submenu-content">
          <ul>
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
            window.location.href = 'index.php';
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
  <script src="analytics.js"></script>
</body>
</html>