// products.js
const searchInput = document.querySelector('.filters input[type="text"]');
const minPriceInput = document.querySelector('.price-range input:first-child');
const maxPriceInput = document.querySelector('.price-range input:last-child');
const categoryItems = document.querySelectorAll('.categories-list li');
const productsContainer = document.getElementById('products-container');

let activeCategory = 'all'; 
let timeoutToken;

function filterProducts() {
    const search = searchInput ? searchInput.value : '';
    const min = minPriceInput ? minPriceInput.value : 0;
    const max = maxPriceInput ? maxPriceInput.value : '';

    productsContainer.style.opacity = '0.5';
    productsContainer.style.pointerEvents = 'none';

    const url = `/products?search=${encodeURIComponent(search)}&category=${encodeURIComponent(activeCategory)}&min_price=${min}&max_price=${max}`;

    fetch(url, { headers: { 'X-Requested-With': 'XMLHttpRequest' } })
        .then(response => response.text())
        .then(html => {
            productsContainer.innerHTML = html; 
            productsContainer.style.opacity = '1'; 
            productsContainer.style.pointerEvents = 'auto';
        })
        .catch(error => { console.error('Error:', error); productsContainer.style.opacity = '1'; });
}

function scheduleFilter() {
    clearTimeout(timeoutToken);
    timeoutToken = setTimeout(filterProducts, 500);
}

if (searchInput) searchInput.addEventListener('input', scheduleFilter); 
if (minPriceInput) minPriceInput.addEventListener('input', scheduleFilter);
if (maxPriceInput) maxPriceInput.addEventListener('input', scheduleFilter);

// Clic manual en botones
categoryItems.forEach(item => {
    item.addEventListener('click', () => {
        categoryItems.forEach(li => li.classList.remove('active'));
        item.classList.add('active');
        activeCategory = item.dataset.category;
        filterProducts(); 
    });
});

// LÓGICA URL AUTOMÁTICA
document.addEventListener('DOMContentLoaded', () => {
    const params = new URLSearchParams(window.location.search);
    const categoriaUrl = params.get('category');

    if (categoriaUrl) {
        // Normalizamos la URL (quitamos espacios y ponemos minúsculas)
        const categoriaBuscada = categoriaUrl.trim().toLowerCase();
        let botonEncontrado = null;

        // Buscamos en la lista de categorías la que coincida
        for (let li of categoryItems) {
            const nombreCategoria = li.dataset.category.trim().toLowerCase();
            
            if (nombreCategoria === categoriaBuscada) {
                botonEncontrado = li;
                break;
            }
        }

        // Si existe el botón, simulamos el clic
        if (botonEncontrado) {
            botonEncontrado.click();
        } else {
            console.warn('Categoría en URL no encontrada en los filtros:', categoriaUrl);
        }
    }
});