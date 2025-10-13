(function () {
  console.log('🍞 Iniciando breadcrumbs jerárquicos...');

  const container = document.getElementById('breadcrumbs');
  if (!container) return;

  const path = window.location.pathname.replace(/\/$/, '');
  const segments = path.split('/').filter(Boolean);

  // Carpetas técnicas que querés omitir del breadcrumb
  const ignoreFolders = ['VISTA', 'Pagina%20-%20copia' , 'PaginaWeb' ];
  
  // Filtrar solo los segmentos relevantes
  const relevantSegments = segments.filter(seg => !ignoreFolders.includes(seg));

  // Si no hay segmentos relevantes, no mostrar nada
  if (relevantSegments.length === 0) {
    container.style.display = 'none';
    return;
  }

  let crumbsHtml = '';
  let cumulativePath = '';

  // Reconstruir el path real para los links
  const baseStructure = segments.slice(0, segments.indexOf(relevantSegments[0])).join('/');

  relevantSegments.forEach((seg, idx) => {
    cumulativePath += '/' + seg;
    const fullPath = baseStructure ? `/${baseStructure}${cumulativePath}` : cumulativePath;

    const isLast = idx === relevantSegments.length - 1;

    // Capitalizar el texto
    const title = seg.replace('.php', '').replace(/[-_]/g, ' ')
                     .replace(/\b\w/g, l => l.toUpperCase());

    if (isLast) {
      crumbsHtml += `<span class="crumb-current">${title}</span>`;
    } else {
      crumbsHtml += `<a class="crumb-link" href="${fullPath}">${title}</a> <span class="crumb-sep">›</span> `;
    }
  });

  container.innerHTML = crumbsHtml;
  container.style.display = 'block';
})();