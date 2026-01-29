const searchInput = document.querySelector('.filters input[type="text"]');
const minPriceInput = document.querySelector('.price-range input:first-child');
const maxPriceInput = document.querySelector('.price-range input:last-child');
const categoryItems = document.querySelectorAll('.categories-list li');
const products = document.querySelectorAll('.product-card');

let activeCategory = 'all';

function filterProducts() {
  const search = searchInput.value.toLowerCase();
  const min = parseInt(minPriceInput.value) || 0;
  const max = parseInt(maxPriceInput.value) || Infinity;

  products.forEach(p => {
    const matchSearch = p.dataset.name.includes(search);
    const matchCategory = activeCategory === 'all' || p.dataset.category === activeCategory;
    const price = parseInt(p.dataset.price);
    const matchPrice = price >= min && price <= max;

    p.style.display = (matchSearch && matchCategory && matchPrice) ? 'block' : 'none';
  });
}

searchInput.addEventListener('input', filterProducts);
minPriceInput.addEventListener('input', filterProducts);
maxPriceInput.addEventListener('input', filterProducts);

categoryItems.forEach(item => {
  item.addEventListener('click', () => {
    categoryItems.forEach(i => i.classList.remove('active'));
    item.classList.add('active');
    activeCategory = item.dataset.category;
    filterProducts();
  });
});

filterProducts();