document.addEventListener('DOMContentLoaded', function () {
    const brandLink = document.getElementById('navbar-brand');

    function updateBrandLink() {
        if (window.innerWidth < 768) { // Ajuste o valor conforme necessário
            brandLink.textContent = 'Adicionar Serviço';
            brandLink.href = 'servicos.php';
        } else {
            brandLink.textContent = 'Conserv';
            brandLink.href = '#';
        }
    }

    // Initial check
    updateBrandLink();

    // Update on resize
    window.addEventListener('resize', updateBrandLink);
});