(function () {
  const container = document.getElementById('breadcrumbs');
  if (!container) return;

  const fullPath = decodeURIComponent(window.location.pathname);
  const parts = fullPath.split('/');
  const file = parts.pop() || 'index.php';
  const baseDir = parts.join('/') + '/';

  function humanizeFileName(name) {
    const base = name.replace('.php', '').trim();
    if (!base || base.toLowerCase() === 'index') return 'Pagina';
    const pretty = base
      .replace(/([a-z])([A-Z])/g, '$1 $2')
      .replace(/[-_]+/g, ' ')
      .replace(/\s+/g, ' ')
      .trim();
    return pretty.charAt(0).toUpperCase() + pretty.slice(1);
  }

  // Breadcrumb determinístico (sin historial): Pagina fijo + jerarquía por convención
  const trail = [];
  trail.push({ file: 'index.php', label: 'Pagina' });

  if (file !== 'index.php') {
    // Menús (ej: menuIntercambio.php)
    if (/^menu/i.test(file)) {
      trail.push({ file, label: humanizeFileName(file) });
    }
    // Fotos (ej: ArgentinaFotos.php, ItaliaFotos.php, EEUUFotos.php)
    else if (/Fotos/i.test(file)) {
      // Si es fotos de Intercambio, inferir padre de país y menú
      if (/Argentina|EEUU|Italia/i.test(file)) {
        trail.push({ file: 'menuIntercambio.php', label: 'Menu intercambio' });
        const country = /Argentina/i.test(file)
          ? 'IntercambioArgentina.php'
          : /EEUU/i.test(file)
            ? 'IntercambioEEUU.php'
            : 'IntercambioItalia.php';
        trail.push({ file: country, label: humanizeFileName(country) });
      }
      trail.push({ file, label: humanizeFileName(file) });
    }
    // Páginas de Intercambio (ej: IntercambioArgentina.php)
    else if (/Intercambio/i.test(file)) {
      trail.push({ file: 'menuIntercambio.php', label: 'Menu intercambio' });
      trail.push({ file, label: humanizeFileName(file) });
    }
    // Resto: directo
    else {
      trail.push({ file, label: humanizeFileName(file) });
    }
  }

  const html = trail.map((entry, idx) => {
    const isLast = idx === trail.length - 1;
    if (isLast) return `<span class=\"crumb-current\">${entry.label}</span>`;
    return `<a class=\"crumb-link\" href=\"${baseDir}${entry.file}\">${entry.label}</a> <span class=\"crumb-sep\">›</span> `;
  }).join('');

  container.innerHTML = html;
  container.style.display = 'block';
})();