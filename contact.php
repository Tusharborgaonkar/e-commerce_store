<?php require_once 'includes/header.php'; ?>

<!-- ===== PAGE HEADER ===== -->
<section class="page-header">
    <div class="container">
        <h1>Contact Us</h1>
        <p>We'd love to hear from you! Drop us a message and we'll get back to you soon.</p>
    </div>
</section>

<!-- ===== CONTACT FORM + INFO ===== -->
<section class="contact-section">
    <div class="container">
        <div class="contact-grid">

            <!-- Contact Form -->
            <div class="contact-form-wrapper">
                <h2>Send a Message</h2>
                <form action="#" method="POST">
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" id="name" name="name" placeholder="Your name" required />
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" placeholder="you@example.com" required />
                    </div>
                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <input type="text" id="subject" name="subject" placeholder="How can we help?" />
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea id="message" name="message" rows="5" placeholder="Write your message here..." required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Send Message</button>
                </form>
            </div>

            <!-- Contact Info & Map -->
            <div class="contact-info-wrapper">
                <h2>Get in Touch</h2>
                <ul class="contact-details">
                    <li><i class="fas fa-map-marker-alt"></i> 123, Prismica Lane, New Delhi, India</li>
                    <li><i class="fas fa-phone"></i> +91 92271 30063</li>
                    <li><i class="fas fa-envelope"></i> support@prismica.com</li>
                    <li><i class="fas fa-clock"></i> Mon–Sat: 10:00 AM – 7:00 PM</li>
                </ul>
                <div class="map-placeholder">
                    <i class="fas fa-map-marked-alt"></i>
                    <p>Find us on Google Maps</p>
                </div>
                <div class="social-contact">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-whatsapp"></i></a>
                </div>
            </div>

        </div>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>