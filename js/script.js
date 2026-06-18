// Mobile menu toggle
document.addEventListener('DOMContentLoaded', function() {
    const menuToggle = document.getElementById('menuToggle');
    const mobileNav = document.getElementById('mobileNav');

    if (menuToggle && mobileNav) {
        menuToggle.addEventListener('click', function() {
            mobileNav.classList.toggle('open');
        });
    }

    // Add to cart button feedback (demo)
    const addButtons = document.querySelectorAll('.btn-add-cart');
    addButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const cartCount = document.querySelector('.cart-count');
            if (cartCount) {
                let count = parseInt(cartCount.textContent);
                count++;
                cartCount.textContent = count;
                alert('Product added to cart!');
            }
        });
    });

    // Track order form (demo)
    const trackForm = document.querySelector('.track-form-wrapper form');
    if (trackForm) {
        trackForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const result = document.querySelector('.track-result');
            if (result) {
                result.style.display = 'block';
                // Scroll to result
                result.scrollIntoView({ behavior: 'smooth' });
            }
        });
    }

    // Contact form (demo)
    const contactForm = document.querySelector('.contact-form-wrapper form');
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Thank you! Your message has been sent.');
            this.reset();
        });
    }
});