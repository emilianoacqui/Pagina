// Script para el selector de idiomas
document.addEventListener('DOMContentLoaded', function() {
    const langToggle = document.getElementById('langToggle');
    const langDropdown = document.getElementById('langDropdown');
    
    if (!langToggle || !langDropdown) {
        console.warn('Selector de idioma no encontrado');
        return;
    }
    
    // Toggle del dropdown
    langToggle.addEventListener('click', function(e) {
        e.stopPropagation();
        toggleDropdown();
    });
    
    // Cerrar al hacer click fuera
    document.addEventListener('click', function(e) {
        if (!langToggle.contains(e.target) && !langDropdown.contains(e.target)) {
            closeDropdown();
        }
    });
    
    // Cerrar con tecla Escape
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeDropdown();
        }
    });
    
    // Prevenir cierre al hacer click dentro del dropdown
    langDropdown.addEventListener('click', function(e) {
        e.stopPropagation();
    });
    
    // Funciones auxiliares
    function toggleDropdown() {
        const isOpen = langDropdown.classList.contains('show');
        if (isOpen) {
            closeDropdown();
        } else {
            openDropdown();
        }
    }
    
    function openDropdown() {
        langDropdown.classList.add('show');
        langToggle.classList.add('active');
        langToggle.setAttribute('aria-expanded', 'true');
    }
    
    function closeDropdown() {
        langDropdown.classList.remove('show');
        langToggle.classList.remove('active');
        langToggle.setAttribute('aria-expanded', 'false');
    }
    
    // Accesibilidad: navegación con teclado
    langToggle.addEventListener('keydown', function(e) {
        if (e.key === 'Enter' || e.key === ' ') {
            e.preventDefault();
            toggleDropdown();
        }
    });
    
    // Navegación con flechas dentro del dropdown
    const langOptions = langDropdown.querySelectorAll('.lang-option');
    langOptions.forEach((option, index) => {
        option.addEventListener('keydown', function(e) {
            if (e.key === 'ArrowDown') {
                e.preventDefault();
                const nextOption = langOptions[index + 1];
                if (nextOption) nextOption.focus();
            } else if (e.key === 'ArrowUp') {
                e.preventDefault();
                const prevOption = langOptions[index - 1];
                if (prevOption) {
                    prevOption.focus();
                } else {
                    langToggle.focus();
                }
            }
        });
    });
});