
    document.addEventListener('DOMContentLoaded', function () {
        const brandLink = document.getElementById('navbar-brand');

        function updateBrandLink() {
            if (window.innerWidth < 768) { 
                brandLink.textContent = 'Adicionar Cliente';
                brandLink.href = 'testecopy.php';
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
