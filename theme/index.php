<?php get_header(); ?>

<main class="site-main">
    <div class="hero-section">
        <div class="hero-overlay">
            <div class="container">
                <div class="hero-content">
                    <h1 class="hero-title">
                        Halı Saha Randevunuzu<br>
                        <span class="hero-accent">Hemen Alın</span>
                    </h1>
                    <p class="hero-subtitle">
                        Modern ve hızlı randevu sistemiyle halı saha rezervasyonunuzu kolayca yapın.
                    </p>
                    <?php if (is_user_logged_in()): ?>
                        <a href="<?php echo home_url('/randevu-al'); ?>" class="hero-btn">Randevu Al</a>
                    <?php else: ?>
                        <a href="<?php echo wp_registration_url(); ?>" class="hero-btn">Hemen Kayıt Ol</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    
    <div class="features-section">
        <div class="container">
            <h2 class="section-title">Neden Bizi Seçmelisiniz?</h2>
            
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">📅</div>
                    <h3>Kolay Rezervasyon</h3>
                    <p>İstediğiniz tarih ve saati seçerek anında randevu alın.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">🕐</div>
                    <h3>7/24 Erişim</h3>
                    <p>İstediğiniz zaman, istediğiniz yerden randevu alabilirsiniz.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">👥</div>
                    <h3>Kullanıcı Dostu</h3>
                    <p>Modern ve sade arayüz ile kolayca randevularınızı yönetin.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">📱</div>
                    <h3>Mobil Uyumlu</h3>
                    <p>Telefonunuzdan veya bilgisayarınızdan erişin.</p>
                </div>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>