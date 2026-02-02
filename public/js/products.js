const searchInput = document.querySelector('.filters input[type="text"]');
const minPriceInput = document.querySelector('.price-range input:first-child');
const maxPriceInput = document.querySelector('.price-range input:last-child');
const categoryItems = document.querySelectorAll('.categories-list li');
const productsContainer = document.getElementById('products-container');

let activeCategory = 'all';
let timeoutToken;

function filterProducts() {
    const search = searchInput.value;
    const min = minPriceInput ? minPriceInput.value : 0;
    const max = maxPriceInput ? maxPriceInput.value : '';

    productsContainer.style.opacity = '0.5';
    productsContainer.style.pointerEvents = 'none';

    const url = `/products?search=${encodeURIComponent(search)}&category=${activeCategory}&min_price=${min}&max_price=${max}`;

    fetch(url, {
        headers: { 'X-Requested-With': 'XMLHttpRequest' }
    })
    .then(response => response.text())
    .then(html => {
        productsContainer.innerHTML = html;
        productsContainer.style.opacity = '1';
        productsContainer.style.pointerEvents = 'auto';
    })
    .catch(error => {
        console.error('Error:', error);
        productsContainer.style.opacity = '1';
    });
}

function scheduleFilter() {
    clearTimeout(timeoutToken);
    timeoutToken = setTimeout(filterProducts, 500);
}

if (searchInput) searchInput.addEventListener('input', scheduleFilter);
if (minPriceInput) minPriceInput.addEventListener('input', scheduleFilter);
if (maxPriceInput) maxPriceInput.addEventListener('input', scheduleFilter);

categoryItems.forEach(item => {
    item.addEventListener('click', () => {
        categoryItems.forEach(li => li.classList.remove('active'));
        item.classList.add('active');

        activeCategory = item.dataset.category;
        
        filterProducts(); 
    });
});