// Script de analytics para tracking de visitas
(function() {
    'use strict';
    
    // Configuración
    const ANALYTICS_ENDPOINT = '../../../CONTROLADOR/Analytics/track_visit.php';
    
    // Datos de la página actual
    const pageData = {
        page_url: window.location.href,
        page_title: document.title,
        referrer: document.referrer || ''
    };
    
    // Función para enviar datos de visita
    function trackVisit() {
        // Crear FormData
        const formData = new FormData();
        formData.append('page_url', pageData.page_url);
        formData.append('page_title', pageData.page_title);
        formData.append('referrer', pageData.referrer);
        
        // Enviar via fetch (no bloquea la carga de la página)
        fetch(ANALYTICS_ENDPOINT, {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                console.log('✅ Visita registrada en analytics');
            } else {
                console.warn('⚠️ Error registrando visita:', data.message);
            }
        })
        .catch(error => {
            console.warn('⚠️ Error de red en analytics:', error);
        });
    }
    
    // Registrar visita cuando la página esté completamente cargada
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', trackVisit);
    } else {
        // La página ya está cargada
        trackVisit();
    }
    
    // También registrar cuando el usuario sale de la página (opcional)
    window.addEventListener('beforeunload', function() {
        // Solo si el navegador soporta sendBeacon
        if (navigator.sendBeacon) {
            const data = new FormData();
            data.append('page_url', pageData.page_url);
            data.append('page_title', pageData.page_title);
            data.append('referrer', pageData.referrer);
            
            navigator.sendBeacon(ANALYTICS_ENDPOINT, data);
        }
    });
    
})();
