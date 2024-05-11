// slider
const left = document.querySelector('.left');
const right = document.querySelector('.righ');
const imgElement = document.getElementById('imgs');
const images = ["./Image/Banner/Baner2.jpg", "./Image/Banner/Banner3.jpg"   
 ];  
let index = 0;
const changeImg = (direction) => {
    if (direction === 'left') {
        index = (index - 1 + images.length) % images.length; 
    } else {
        index = (index + 1) % images.length; 
    }
    imgElement.src = images[index];
}
left.addEventListener('click', () => {
    changeImg('left');
});
right.addEventListener('click', () => {
    changeImg('right');
});
setInterval(() => {
    changeImg('right');
}, 2500);
// category
const toggler = document.querySelector("#Togglers");
const categoriesItem = document.querySelector(".categories_item");
toggler.addEventListener("click", () => {
    categoriesItem.classList.toggle("active");
});

