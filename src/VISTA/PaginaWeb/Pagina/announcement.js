(function(){
  const PAGE = (window.location.pathname.split('/').pop() || '').toLowerCase();
  if (PAGE === 'admisiones.php') return; // no mostrar en la página de admisiones

  const STORAGE_KEY = 'admissions_announce_closed_until_v1';
  const SESSION_KEY = 'admissions_announce_closed_session_v1';
  const now = Date.now();
  const isIndex = PAGE === '' || PAGE === 'index.php';
  // If user already closed during this browser/tab session, never show again until session ends
  try {
    if (sessionStorage.getItem(SESSION_KEY) === '1') return;
  } catch(_) {}
  if (!isIndex) {
    try {
      const until = parseInt(localStorage.getItem(STORAGE_KEY) || '0', 10);
      if (until && now < until) return; // respetar pausa en otras páginas
    } catch(_) {}
  }

  const params = new URLSearchParams(window.location.search);
  const isAdmin = params.get('cms_admin_token') === 'true';
  const dest = 'popap.php' + (isAdmin ? '?cms_admin_token=true' : '');

  const root = document.createElement('div');
  root.className = 'announce-root';
  root.innerHTML = `
    <div class="announce-card" role="dialog" aria-live="polite">
      <button class="announce-close" aria-label="Cerrar">✕</button>
      <div class="announce-media">
        <img src="FOTOS/fotosPrincipales/ejemplo2.jpg" alt="Admisiones" loading="lazy" />
      </div>
      <div class="announce-body">
        <h3 class="announce-title">Admisiones 2026</h3>
        <p class="announce-text">Te invitamos a conocer nuestra amplia propuesta educativa para acompañar el crecimiento de tus hijos.\nCompletando el formulario a continuación nos pondremos en contacto a la brevedad para asesorarte.</p>
        <div class="announce-actions">
          <button class="announce-btn announce-primary" data-action="go">Más información</button>
          <button class="announce-btn announce-secondary" data-action="later">Más tarde</button>
        </div>
      </div>
    </div>`;

  const card = root.querySelector('.announce-card');
  const closeBtn = root.querySelector('.announce-close');
  const onClose = (hours) => {
    if (!isIndex) {
      try { localStorage.setItem(STORAGE_KEY, String(Date.now() + hours*60*60*1000)); } catch(_) {}
    }
    // Also remember for the current session across all pages (including index)
    try { sessionStorage.setItem(SESSION_KEY, '1'); } catch(_) {}
    card.classList.remove('show');
    setTimeout(()=> root.remove(), 300);
  };

  closeBtn.addEventListener('click', ()=> onClose(48)); // cerrar por 48h
  root.addEventListener('click', (e)=>{
    const t = e.target;
    if (!(t instanceof HTMLElement)) return;
    const act = t.getAttribute('data-action');
    if (act === 'go') {
      onClose(72); // si va, ocultar por 72h
      window.location.href = dest;
    } else if (act === 'later') {
      onClose(24); // menos tiempo si elige más tarde
    }
  });

  // Swipe to dismiss (mobile-like notification)
  let startX = 0;
  let currentX = 0;
  let dragging = false;
  const threshold = 100; // px to trigger dismiss
  const maxFade = 0.6; // max opacity reduction

  const onTouchStart = (e) => {
    const touch = e.touches && e.touches[0];
    if (!touch) return;
    dragging = true;
    startX = touch.clientX;
    currentX = startX;
    card.style.transition = 'none';
  };

  const onTouchMove = (e) => {
    if (!dragging) return;
    const touch = e.touches && e.touches[0];
    if (!touch) return;
    currentX = touch.clientX;
    const dx = Math.max(0, currentX - startX); // only allow right swipe
    card.style.transform = `translateX(${dx}px)`;
    const fade = Math.min(dx / 200, maxFade);
    card.style.opacity = String(1 - fade);
  };

  const onTouchEnd = () => {
    if (!dragging) return;
    dragging = false;
    const dx = Math.max(0, currentX - startX);
    card.style.transition = 'transform .25s ease, opacity .25s ease';
    if (dx > threshold) {
      // fling out and close
      card.style.transform = `translateX(${Math.max(dx, 360)}px)`;
      card.style.opacity = '0';
      setTimeout(()=> onClose(24), 200);
    } else {
      // restore
      card.style.transform = '';
      card.style.opacity = '';
      // remove inline transition after it completes
      const cleanup = () => {
        card.style.transition = '';
        card.removeEventListener('transitionend', cleanup);
      };
      card.addEventListener('transitionend', cleanup);
    }
  };

  card.addEventListener('touchstart', onTouchStart, { passive: true });
  card.addEventListener('touchmove', onTouchMove, { passive: true });
  card.addEventListener('touchend', onTouchEnd, { passive: true });

  const attach = () => {
    document.body.appendChild(root);
    // animación suave
    setTimeout(()=> card.classList.add('show'), 50);
  };

  // mostrar tras un delay: 5s en index, 1.2s en otras páginas
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', ()=> setTimeout(attach, isIndex ? 5000 : 1200));
  } else {
    setTimeout(attach, isIndex ? 5000 : 1200);
  }
})();
