<div class="hsr-my-appointments">
    <?php if (empty($appointments)): ?>
        <div class="hsr-empty">
            <p>📅 Henüz randevunuz yok</p>
            <a href="<?php echo home_url('/randevu-al'); ?>" class="hsr-btn hsr-btn-primary">Randevu Al</a>
        </div>
    <?php else: ?>
        <h2>Randevularım</h2>
        <?php
        $upcoming = array_filter($appointments, function($apt) {
            return strtotime($apt->appointment_date . ' ' . $apt->appointment_time) >= time();
        });
        $past = array_filter($appointments, function($apt) {
            return strtotime($apt->appointment_date . ' ' . $apt->appointment_time) < time();
        });
        ?>
        
        <?php if (!empty($upcoming)): ?>
            <h3>Yaklaşan Randevular</h3>
            <div class="hsr-appointments-grid">
                <?php foreach ($upcoming as $apt): ?>
                    <div class="hsr-appointment-card">
                        <div class="hsr-appointment-info">
                            <p class="hsr-date">📅 <?php echo HSR_Appointments::format_date($apt->appointment_date); ?></p>
                            <p class="hsr-time">🕐 <?php echo $apt->appointment_time; ?></p>
                        </div>
                        <button class="hsr-delete-btn" data-id="<?php echo $apt->id; ?>">İptal</button>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        
        <?php if (!empty($past)): ?>
            <h3>Geçmiş Randevular</h3>
            <div class="hsr-appointments-grid hsr-past">
                <?php foreach ($past as $apt): ?>
                    <div class="hsr-appointment-card hsr-past-card">
                        <p class="hsr-date">📅 <?php echo HSR_Appointments::format_date($apt->appointment_date); ?></p>
                        <p class="hsr-time">🕐 <?php echo $apt->appointment_time; ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    <?php endif; ?>
</div>