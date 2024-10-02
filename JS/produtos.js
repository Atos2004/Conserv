document.addEventListener('DOMContentLoaded', function () {
    const brandLink = document.getElementById('navbar-brand');

    function updateBrandLink() {
        if (window.innerWidth < 768) { // Ajuste o valor conforme necessário
            brandLink.textContent = 'Adicionar Produto';
            brandLink.href = 'produtos.php';
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