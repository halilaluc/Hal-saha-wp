<div class="wrap">
    <h1><?php _e('Halı Saha Randevuları', 'hali-saha-randevu'); ?></h1>
    
    <div class="hsr-admin-stats">
        <div class="hsr-stat-box">
            <h3>Toplam Randevu</h3>
            <p class="hsr-stat-number"><?php echo count($appointments); ?></p>
        </div>
        <div class="hsr-stat-box">
            <h3>Bugünkü Randevular</h3>
            <p class="hsr-stat-number">
                <?php
                $today = date('Y-m-d');
                echo count(array_filter($appointments, function($apt) use ($today) {
                    return $apt->appointment_date === $today;
                }));
                ?>
            </p>
        </div>
    </div>
    
    <?php if (empty($appointments)): ?>
        <p><?php _e('Henüz randevu yok.', 'hali-saha-randevu'); ?></p>
    <?php else: ?>
        <table class="wp-list-table widefat fixed striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Kullanıcı</th>
                    <th>E-posta</th>
                    <th>Telefon</th>
                    <th>Tarih</th>
                    <th>Saat</th>
                    <th>Durum</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($appointments as $apt): ?>
                    <tr>
                        <td><?php echo $apt->id; ?></td>
                        <td><?php echo esc_html($apt->user_name); ?></td>
                        <td><?php echo esc_html($apt->user_email); ?></td>
                        <td><?php echo esc_html($apt->user_phone); ?></td>
                        <td><?php echo date_i18n('d.m.Y', strtotime($apt->appointment_date)); ?></td>
                        <td><?php echo $apt->appointment_time; ?></td>
                        <td><span class="hsr-status-badge"><?php echo $apt->status; ?></span></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>