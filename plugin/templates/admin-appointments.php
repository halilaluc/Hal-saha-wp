<div class="hsr-admin-appointments">
    <h2>Tüm Randevular</h2>
    
    <?php if (empty($appointments)): ?>
        <p>Henüz randevu yok.</p>
    <?php else: ?>
        <?php
        $grouped = array();
        foreach ($appointments as $apt) {
            $grouped[$apt->appointment_date][] = $apt;
        }
        ksort($grouped);
        ?>
        
        <?php foreach ($grouped as $date => $apts): ?>
            <div class="hsr-date-group">
                <h3><?php echo HSR_Appointments::format_date($date); ?> (<?php echo count($apts); ?> randevu)</h3>
                <table class="hsr-table">
                    <thead>
                        <tr>
                            <th>Saat</th>
                            <th>Kullanıcı</th>
                            <th>E-posta</th>
                            <th>Telefon</th>
                            <th>İşlem</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($apts as $apt): ?>
                            <tr>
                                <td><?php echo $apt->appointment_time; ?></td>
                                <td><?php echo esc_html($apt->user_name); ?></td>
                                <td><?php echo esc_html($apt->user_email); ?></td>
                                <td><?php echo esc_html($apt->user_phone); ?></td>
                                <td>
                                    <button class="hsr-delete-btn" data-id="<?php echo $apt->id; ?>">Sil</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>