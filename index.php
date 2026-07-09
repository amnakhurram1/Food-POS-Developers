<?php
// index.php - Landing page
session_start();

// retrieve previous form values / errors (if any)
$old = $_SESSION['old'] ?? [];
$errors = $_SESSION['errors'] ?? [];
// clear after reading
unset($_SESSION['old'], $_SESSION['errors']);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>FoodPanda — Delivering Happiness | Landing</title>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>
<body class="light-mode">
    
    <div id="signup-modal" class="modal-wrap">
        <div class="modal-content">
            <button class="modal-close-btn">&times;</button>
            <div class="modal-header">
                <h2>Join FoodPanda Partner Hub</h2>
                <p>Register now to start accepting orders from millions of customers.</p>
            </div>
            <form>
                <label>Restaurant Name <input type="text" placeholder="e.g., The Golden Wok" required></label>
                <label>Email <input type="email" placeholder="restaurant@example.com" required></label>
                <label>Password <input type="password" required></label>
                <button type="submit" class="btn btn-primary">Create Account</button>
            </form>
            <p class="modal-footer-text">Already a partner? <a href="#">Log In</a></p>
        </div>
    </div>

    <header class="nav-wrap">
        <div class="container nav">
            <div class="logo">Food<span class="accent">Panda</span></div>
            <nav class="menu">
                <button id="dark-mode-toggle" class="btn btn-ghost" title="Toggle Dark Mode">
                    <span id="mode-icon">🌙</span>
                </button>
                <a href="#features">Features</a>
                <a href="#pricing">Pricing</a>
                <a href="#contact">Contact</a>
                <a class="btn" id="open-signup-btn" href="#">Sign Up</a>
            </nav>
        </div>
    </header>

    <section class="hero" id="home">
        <div class="container hero-grid">
            <div class="hero-text">
                <h1>The fastest way to get food delivered</h1>
                <p class="lead">Partner with FoodPanda to reach more customers. Track orders, get real-time analytics, and scale easily.</p>
                <div class="hero-ctas">
                    <a class="btn btn-primary" href="#contact">Get Started for Free</a>
                    <a class="btn btn-ghost" href="#features">Learn More</a>
                </div>
                <ul class="highlights">
                    <li>✅ Live order tracking</li>
                    <li>✅ Powerful analytics dashboard</li>
                    <li>✅ Seamless integration with POS</li>
                </ul>
            </div>
            <div class="hero-mockup js-mockup-rotate">
                <img src="foodp.png" alt="Food delivery system tablet mockup" class="mockup-img-fixed">
            </div>
        </div>
    </section>

    <section id="features" class="features">
        <div class="container">
            <h2>Key Features</h2>
            <p class="sub">Everything restaurants need to run faster and serve customers better.</p>

            <div class="feature-grid">
                <div class="feature-card">
                    <div class="feature-icon">📦</div>
                    <h3>Order Management</h3>
                    <p>Accept, track and update orders in real-time with an intuitive interface.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">📊</div>
                    <h3>Sales Analytics</h3>
                    <p>Daily and weekly sales, peak hour reports and menu performance insights.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🔗</div>
                    <h3 class="feature-header">Easy Integration</h3>
                    <p>Integrates with your existing POS, accounting and third-party delivery platforms.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">⚙️</div>
                    <h3 class="feature-header">Inventory Alerts</h3>
                    <p>Low-stock alerts and usage patterns to reduce shortages and waste.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="pricing" class="pricing">
        <div class="container">
            <h2>Pricing</h2>
            <p class="sub">Simple transparent pricing for restaurants of all sizes.</p>

            <div class="pricing-grid">
                <div class="price-card">
                    <div class="price-header">Basic</div>
                    <div class="price-amt">Free</div>
                    <ul>
                        <li>Order management</li>
                        <li>Email support</li>
                        <li>Basic reports</li>
                    </ul>
                    <a class="btn" href="#contact">Start Free</a>
                </div>

                <div class="price-card featured">
                    <div class="price-header">Pro</div>
                    <div class="price-amt">PKR 2,499 / mo</div>
                    <ul>
                        <li>Everything in Basic</li>
                        <li>Advanced analytics</li>
                        <li>Priority support</li>
                    </ul>
                    <a class="btn btn-primary" href="#contact">Get Pro</a>
                </div>

                <div class="price-card">
                    <div class="price-header">Enterprise</div>
                    <div class="price-amt">Contact Us</div>
                    <ul>
                        <li>Custom integrations</li>
                        <li>Account manager</li>
                        <li>Service-level agreement</li>
                    </ul>
                    <a class="btn" href="#contact">Contact Sales</a>
                </div>
            </div>
        </div>
    </section>

    <section id="contact" class="contact">
        <div class="container contact-grid">
            <div class="contact-info">
                <h2>Contact Us</h2>
                <p class="sub">Want a demo or partnership? Fill out the form and we'll be in touch.</p>

                <ul class="contact-list">
                    <li>📍 Lahore, Pakistan</li>
                    <li>📧 sales@foodpanda.example</li>
                    <li>📞 +92 300 0000000</li>
                </ul>
            </div>

            <div class="contact-form">
                <?php if (!empty($errors)): ?>
                    <div class="alert">
                        <strong>There were errors with your submission:</strong>
                        <ul>
                            <?php foreach ($errors as $e): ?>
                                <li><?=htmlspecialchars($e)?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <form method="post" action="contact.php">
                    <label>
                        Name
                        <input type="text" name="name" value="<?=htmlspecialchars($old['name'] ?? '')?>" required>
                    </label>

                    <label>
                        Email
                        <input type="email" name="email" value="<?=htmlspecialchars($old['email'] ?? '')?>" required>
                    </label>

                    <label>
                        Message
                        <textarea rows="5" name="message" required><?=htmlspecialchars($old['message'] ?? '')?></textarea>
                    </label>

                    <input type="hidden" name="ticket" value="POS-000"> <button type="submit" class="btn btn-primary">Send Message</button>
                </form>
            </div>
        </div>
    </section>

    <footer class="footer">
        <div class="container footer-grid">
            <div>© <?=date('Y')?> FoodPanda — Delivering Happiness</div>

            <div class="social">
                <a href="https://www.facebook.com/foodpanda.pk/" target="_blank" rel="noopener">Facebook</a> •
                <a href="https://www.instagram.com/foodpanda_pk/" target="_blank" rel="noopener">Instagram</a> •
                <a href="https://twitter.com/foodpanda_pk" target="_blank" rel="noopener">Twitter</a> •
                <a href="https://www.linkedin.com/company/foodpanda/" target="_blank" rel="noopener">LinkedIn</a>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const modal = document.getElementById('signup-modal');
            const openBtn = document.getElementById('open-signup-btn');
            const closeBtn = document.querySelector('.modal-close-btn');
            const body = document.body;
            const toggleBtn = document.getElementById('dark-mode-toggle');
            const modeIcon = document.getElementById('mode-icon');
            
            // --- MODAL LOGIC ---
            openBtn.addEventListener('click', (e) => {
                e.preventDefault();
                modal.style.display = 'flex';
            });
            closeBtn.addEventListener('click', () => {
                modal.style.display = 'none';
            });
            window.addEventListener('click', (e) => {
                if (e.target === modal) {
                    modal.style.display = 'none';
                }
            });

            // --- DARK MODE LOGIC ---
            // 1. Check local storage for preference
            const savedMode = localStorage.getItem('theme') || 'light-mode';
            body.className = savedMode;
            modeIcon.textContent = savedMode === 'dark-mode' ? '☀️' : '🌙';

            toggleBtn.addEventListener('click', () => {
                const currentMode = body.className === 'dark-mode' ? 'light-mode' : 'dark-mode';
                body.className = currentMode;
                localStorage.setItem('theme', currentMode);
                modeIcon.textContent = currentMode === 'dark-mode' ? '☀️' : '🌙';
            });
        });
    </script>
</body>
</html>