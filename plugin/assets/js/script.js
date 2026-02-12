jQuery(document).ready(function($) {
    let selectedDate = '';
    let selectedTime = '';
    
    // Date selection
    $('#hsr-date').on('change', function() {
        selectedDate = $(this).val();
        selectedTime = '';
        
        if (selectedDate) {
            loadAvailability(selectedDate);
        }
    });
    
    // Load availability
    function loadAvailability(date) {
        $.ajax({
            url: hsrAjax.ajaxurl,
            type: 'POST',
            data: {
                action: 'hsr_get_availability',
                nonce: hsrAjax.nonce,
                date: date
            },
            success: function(response) {
                if (response.success) {
                    displayTimeSlots(response.data.booked_times);
                }
            }
        });
    }
    
    // Display time slots
    function displayTimeSlots(bookedTimes) {
        const timeSlots = [];
        for (let i = 0; i < 24; i++) {
            const hour = String(i).padStart(2, '0');
            timeSlots.push(hour + ':00');
        }
        
        const $grid = $('#hsr-time-slots');
        $grid.empty();
        
        timeSlots.forEach(function(time) {
            const isBooked = bookedTimes.includes(time);
            const $slot = $('<div class="hsr-time-slot">');
            $slot.text(time);
            
            if (isBooked) {
                $slot.addClass('hsr-booked');
            } else {
                $slot.on('click', function() {
                    $('.hsr-time-slot').removeClass('hsr-selected');
                    $(this).addClass('hsr-selected');
                    selectedTime = time;
                    showConfirmSection();
                });
            }
            
            $grid.append($slot);
        });
        
        $('#hsr-time-section').show();
    }
    
    // Show confirm section
    function showConfirmSection() {
        const formattedDate = new Date(selectedDate).toLocaleDateString('tr-TR', {
            day: 'numeric',
            month: 'long',
            year: 'numeric',
            weekday: 'long'
        });
        
        $('#hsr-selected-info').text(formattedDate + ' - ' + selectedTime);
        $('#hsr-confirm-section').show();
    }
    
    // Confirm appointment
    $('#hsr-confirm-btn').on('click', function() {
        const $btn = $(this);
        $btn.prop('disabled', true).text('Oluşturuluyor...');
        
        $.ajax({
            url: hsrAjax.ajaxurl,
            type: 'POST',
            data: {
                action: 'hsr_create_appointment',
                nonce: hsrAjax.nonce,
                date: selectedDate,
                time: selectedTime
            },
            success: function(response) {
                if (response.success) {
                    showMessage('Randevu başarıyla oluşturuldu! E-posta onayı gönderildi.', 'success');
                    setTimeout(function() {
                        window.location.reload();
                    }, 2000);
                } else {
                    showMessage(response.data.message, 'error');
                    $btn.prop('disabled', false).text('Randevuyu Onayla');
                }
            },
            error: function() {
                showMessage('Bir hata oluştu. Lütfen tekrar deneyin.', 'error');
                $btn.prop('disabled', false).text('Randevuyu Onayla');
            }
        });
    });
    
    // Delete appointment
    $(document).on('click', '.hsr-delete-btn', function() {
        if (!confirm('Bu randevuyu iptal etmek istediğinizden emin misiniz?')) {
            return;
        }
        
        const appointmentId = $(this).data('id');
        const $card = $(this).closest('.hsr-appointment-card, tr');
        
        $.ajax({
            url: hsrAjax.ajaxurl,
            type: 'POST',
            data: {
                action: 'hsr_delete_appointment',
                nonce: hsrAjax.nonce,
                appointment_id: appointmentId
            },
            success: function(response) {
                if (response.success) {
                    $card.fadeOut(300, function() {
                        $(this).remove();
                    });
                    showMessage('Randevu iptal edildi', 'success');
                } else {
                    showMessage(response.data.message, 'error');
                }
            }
        });
    });
    
    // Show message
    function showMessage(message, type) {
        const $message = $('<div class="hsr-message ' + type + '">').text(message);
        $('#hsr-message').html($message);
        
        setTimeout(function() {
            $message.fadeOut();
        }, 5000);
    }
});