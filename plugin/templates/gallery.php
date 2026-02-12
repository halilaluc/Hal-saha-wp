<div class="hsr-gallery">
    <h2 class="hsr-gallery-title">Galeri</h2>
    <div class="hsr-gallery-grid" id="hsr-gallery-container">
        <p class="hsr-loading">Fotoğraflar yükleniyor...</p>
    </div>
</div>

<script>
jQuery(document).ready(function($) {
    // Fetch gallery images
    $.ajax({
        url: '<?php echo rest_url('hsr/v1/gallery'); ?>',
        type: 'GET',
        success: function(response) {
            displayGallery(response);
        },
        error: function() {
            $('#hsr-gallery-container').html('<p class="hsr-error">Fotoğraflar yüklenemedi</p>');
        }
    });
    
    function displayGallery(images) {
        const $container = $('#hsr-gallery-container');
        $container.empty();
        
        if (images.length === 0) {
            $container.html('<p class="hsr-empty">Henüz fotoğraf eklenmemiş</p>');
            return;
        }
        
        images.forEach(function(image) {
            const $item = $('<div class="hsr-gallery-item">');
            const $img = $('<img>').attr({
                src: image.thumbnail_url,
                alt: image.title,
                'data-full': image.image_url
            });
            
            const $overlay = $('<div class="hsr-gallery-overlay">');
            if (image.title) {
                $overlay.append($('<h3>').text(image.title));
            }
            
            $item.append($img).append($overlay);
            $item.on('click', function() {
                openLightbox(image.image_url, image.title);
            });
            
            $container.append($item);
        });
    }
    
    function openLightbox(imageUrl, title) {
        const $lightbox = $('<div class="hsr-lightbox">');
        const $content = $('<div class="hsr-lightbox-content">');
        const $img = $('<img>').attr('src', imageUrl);
        const $close = $('<span class="hsr-lightbox-close">&times;</span>');
        
        if (title) {
            $content.append($('<h3>').text(title));
        }
        
        $content.append($img);
        $lightbox.append($close).append($content);
        
        $('body').append($lightbox);
        
        $lightbox.on('click', function(e) {
            if ($(e.target).is('.hsr-lightbox') || $(e.target).is('.hsr-lightbox-close')) {
                $lightbox.remove();
            }
        });
    }
});
</script>

<style>
.hsr-gallery-title {
    text-align: center;
    font-size: 32px;
    margin-bottom: 30px;
    color: #0F172A;
}

.hsr-gallery-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    gap: 20px;
}

.hsr-gallery-item {
    position: relative;
    overflow: hidden;
    border-radius: 12px;
    cursor: pointer;
    aspect-ratio: 1;
}

.hsr-gallery-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s;
}

.hsr-gallery-item:hover img {
    transform: scale(1.1);
}

.hsr-gallery-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);
    color: white;
    padding: 20px;
    transform: translateY(100%);
    transition: transform 0.3s;
}

.hsr-gallery-item:hover .hsr-gallery-overlay {
    transform: translateY(0);
}

.hsr-gallery-overlay h3 {
    margin: 0;
    font-size: 16px;
}

.hsr-lightbox {
    position: fixed;
    inset: 0;
    background: rgba(0,0,0,0.9);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 10000;
    padding: 20px;
}

.hsr-lightbox-content {
    max-width: 90%;
    max-height: 90%;
    text-align: center;
}

.hsr-lightbox-content img {
    max-width: 100%;
    max-height: 80vh;
    border-radius: 8px;
}

.hsr-lightbox-content h3 {
    color: white;
    margin-bottom: 15px;
}

.hsr-lightbox-close {
    position: absolute;
    top: 20px;
    right: 40px;
    color: white;
    font-size: 40px;
    cursor: pointer;
    z-index: 10001;
}

.hsr-loading,
.hsr-error,
.hsr-empty {
    text-align: center;
    padding: 40px;
    color: #64748B;
}

@media (max-width: 768px) {
    .hsr-gallery-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 12px;
    }
}
</style>
