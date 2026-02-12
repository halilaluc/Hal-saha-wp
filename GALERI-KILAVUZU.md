# 📸 GALERİ ÖZELLİĞİ KULLANIM KILAVUZU

## WordPress'te Fotoğraf Ekleme

### Adım 1: WordPress Admin Paneline Girin
1. WordPress sitenize giriş yapın
2. Sol menüden **"Galeri"** seçeneğine tıklayın

### Adım 2: Yeni Fotoğraf Ekleyin
1. **"Yeni Ekle"** butonuna tıklayın
2. **Başlık**: Fotoğraf başlığı girin (örn: "Halı Saha Manzarası")
3. **Öne Çıkan Görsel**: Sağ taraftan "Öne Çıkan Görsel Belirle" butonuna tıklayın
4. Fotoğrafınızı yükleyin veya medya kütüphanesinden seçin
5. **İsteğe Bağlı**: Açıklama ekleyebilirsiniz
6. **"Yayınla"** butonuna tıklayın

### Adım 3: Galeri Sayfası Oluşturun
1. **Sayfalar → Yeni Ekle**
2. Başlık: "Galeri"
3. İçerik: `[galeri]` shortcode'unu ekleyin
4. **Yayınla**

---

## Web Sitesinde Görüntüleme

### API URL Ayarlama

`/frontend/src/pages/GalleryPage.jsx` dosyasını açın:

```javascript
// Bu satırı WordPress sitenizin URL'i ile değiştirin
const WORDPRESS_API = 'https://your-wordpress-site.com/wp-json/hsr/v1/gallery';

// Örnek:
const WORDPRESS_API = 'https://halisaha.com/wp-json/hsr/v1/gallery';
```

### Kullanım
1. Web sitesine giriş yapın
2. Dashboard'da **"Galeri"** butonuna tıklayın
3. Fotoğraflar grid layout ile görünür
4. Fotoğrafa tıklayın → Lightbox (büyütülmüş görünüm)
5. X tuşuna veya dışarı tıklayarak kapatın

---

## Mobil Uygulamada Görüntüleme

### API URL Ayarlama

`/mobile/src/screens/GalleryScreen.js` dosyasını açın:

```javascript
// Bu satırı WordPress sitenizin URL'i ile değiştirin
const WORDPRESS_API = 'https://your-wordpress-site.com/wp-json/hsr/v1/gallery';
```

### Kullanım
1. Mobil uygulamaya giriş yapın
2. Dashboard'da **"Galeri"** kartına tıklayın
3. Fotoğraflar grid layout ile görünür
4. Fotoğrafa tıklayın → Full screen modal
5. X tuşuna tıklayarak kapatın
6. Pull-to-refresh ile yenileyin

---

## REST API Endpoint'i

### GET /wp-json/hsr/v1/gallery

**Response:**
```json
[
  {
    "id": 123,
    "title": "Halı Saha Manzarası",
    "description": "Gece aydınlatması ile halı saha",
    "image_url": "https://site.com/wp-content/uploads/2024/01/photo.jpg",
    "thumbnail_url": "https://site.com/wp-content/uploads/2024/01/photo-300x300.jpg",
    "date": "2024-01-15T10:30:00"
  }
]
```

---

## Özellikler

✅ **WordPress Yönetimi**: Kolay fotoğraf ekleme/silme
✅ **Responsive Grid**: Mobil ve masaüstü uyumlu
✅ **Lightbox**: Büyütülmüş görünüm
✅ **Lazy Loading**: Performanslı yükleme
✅ **REST API**: Merkezi veri kaynağı
✅ **Auto Sync**: WordPress'te güncelleme → Otomatik tüm uygulamalarda görünür

---

## Sorun Giderme

### Fotoğraflar Görünmüyor

**1. WordPress REST API Kontrolü**
Tarayıcınızda şu URL'yi açın:
```
https://your-site.com/wp-json/hsr/v1/gallery
```

JSON formatında fotoğraflar görünmeli. Görünmüyorsa:
- Plugin'in aktif olduğunu kontrol edin
- Permalink ayarlarını yeniden kaydedin (Ayarlar → Kalıcı Bağlantılar → Kaydet)

**2. CORS Hatası**

WordPress sitenizde CORS izinleri ayarlayın. `functions.php` dosyasına:

```php
add_action('rest_api_init', function() {
    remove_filter('rest_pre_serve_request', 'rest_send_cors_headers');
    add_filter('rest_pre_serve_request', function($value) {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
        header('Access-Control-Allow-Credentials: true');
        return $value;
    });
}, 15);
```

**3. API URL Yanlış**

Web ve mobil uygulamalarda API URL'i doğru ayarlandığından emin olun.

---

## Fotoğraf Optimizasyonu

**Önerilen Boyutlar:**
- **Minimum**: 1024x768 px
- **Maksimum**: 2048x1536 px
- **Format**: JPEG (web için) veya WebP
- **Kalite**: 80-85%

**WordPress'te Otomatik Optimize:**

1. **Smush** eklentisini kurun
2. Otomatik sıkıştırmayı etkinleştirin
3. Yüklenen fotoğraflar otomatik optimize edilir

---

## Gelişmiş Özellikler

### Kategori Ekleme (İsteğe Bağlı)

`class-gallery.php` dosyasında taxonomy ekleyebilirsiniz:

```php
register_taxonomy('gallery_category', 'hsr_gallery', array(
    'labels' => array('name' => 'Kategoriler'),
    'hierarchical' => true,
    'show_in_rest' => true,
));
```

### Fotoğraf Beğeni Sistemi

REST API'ye POST endpoint'i ekleyerek beğeni özelliği eklenebilir.

---

## Video Desteği (Gelecek Güncelleme)

Yakında video yükleme desteği eklenecek!

---

## Destek

Sorularınız için:
- GitHub Issues: https://github.com/halilaluc/Hal-saha-wp/issues
- WordPress REST API Dökümantasyonu: https://developer.wordpress.org/rest-api/
