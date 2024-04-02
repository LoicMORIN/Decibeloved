
let currentIndex = 0;

function showSlide(index) {
    const carousel = document.querySelector('.carousel');
    const totalSlides = document.querySelectorAll('.carousel-item').length;
    const itemsPerPage = 3;
    index = (index + totalSlides) % totalSlides;
    const translateValue = -index * (100 / itemsPerPage) + '%';
    carousel.style.transform = 'translateX(' + translateValue + ')';
    currentIndex = index;
    const prevBtn = document.querySelector('.carousel-btn.prev');
    if (currentIndex === 0) {
      
      prevBtn.style.display = 'none';
     } else {
    
      prevBtn.style.display = 'block';
     }
}

function prevSlide() {
    showSlide(currentIndex - 1);
}

function nextSlide() {
    showSlide(currentIndex + 1);
}
