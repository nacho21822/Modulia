/* FEATURES IMAGE SWITCH */
const image = document.getElementById('featuresImage');
const tags = document.querySelectorAll('.features-tags span');

const images = {
    kitchen: "../img/cocina1.jpg",
    living: "../img/comedor1.jpg",
    bathroom: "../img/baño1.jpg"
};

tags.forEach(tag => {
    tag.addEventListener('click', () => {
        image.style.opacity = 0;

        setTimeout(() => {
            image.src = images[tag.id];
            image.style.opacity = 1;
        }, 300);

        tags.forEach(t => t.classList.remove('active'));
        tag.classList.add('active');
    });
});