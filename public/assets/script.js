document.addEventListener('DOMContentLoaded', () => {
    // Mobile navigation toggle
    const toggle = document.querySelector('.mobile-toggle');
    const menu = document.querySelector('.menu');
    if (toggle && menu) {
        toggle.addEventListener('click', () => {
            menu.classList.toggle('open');
        });
    }

    // Toast handler
    document.querySelectorAll('[data-toast]').forEach(btn => {
        btn.addEventListener('click', () => {
            const t = document.querySelector('.toast');
            if (t) {
                t.textContent = btn.dataset.toast;
                t.style.display = 'block';
                setTimeout(() => t.style.display = 'none', 2800);
            }
        });
    });
});
