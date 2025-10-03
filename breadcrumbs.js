(function () {
  console.log('🍞 Iniciando breadcrumbs jerárquicos...');

  const container = document.getElementById('breadcrumbs');
  if (!container) return;

  const path = window.location.pathname.replace(/\/$/, ''); // quita / final
  const segments = path.split('/').filter(Boolean); // elimina vacíos

  let crumbsHtml = '';
  let cumulativePath = '';

  segments.forEach((seg, idx) => {
    cumulativePath += '/' + seg;

    const isLast = idx === segments.length - 1;

    // Capitalizar el texto (o podés mapear nombres bonitos según la carpeta)
    const title = seg.replace('.php', '').replace(/[-_]/g, ' ')
                     .replace(/\b\w/g, l => l.toUpperCase());

    if (isLast) {
      crumbsHtml += `<span class="crumb-current">${title}</span>`;
    } else {
      crumbsHtml += `<a class="crumb-link" href="${cumulativePath}">${title}</a> <span class="crumb-sep">›</span> `;
    }
  });


  container.innerHTML = crumbsHtml;
  container.style.display = 'block';
})();
