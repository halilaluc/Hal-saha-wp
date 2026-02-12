<div class="hsr-booking-form">
    <div class="hsr-card">
        <h2 class="hsr-title">📅 Tarih Seçin</h2>
        <input type="date" id="hsr-date" class="hsr-input" min="<?php echo date('Y-m-d'); ?>">
    </div>
    
    <div class="hsr-card" id="hsr-time-section" style="display:none;">
        <h2 class="hsr-title">🕐 Saat Seçin</h2>
        <div class="hsr-time-grid" id="hsr-time-slots"></div>
    </div>
    
    <div class="hsr-card" id="hsr-confirm-section" style="display:none;">
        <h3>Seçiminiz:</h3>
        <p id="hsr-selected-info"></p>
        <button id="hsr-confirm-btn" class="hsr-btn hsr-btn-primary">Randevuyu Onayla</button>
    </div>
    
    <div id="hsr-message"></div>
</div>