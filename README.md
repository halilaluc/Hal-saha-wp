# Halı Saha Randevu - WordPress Plugin & Tema

WordPress için modern ve kullanıcı dostu halı saha randevu yönetim sistemi.

## 📦 Paket İçeriği

1. **Plugin**: `hali-saha-randevu/` - Randevu sistemi fonksiyonları
2. **Tema**: `halisaha-tema/` - Modern görünüm

## 🚀 Kurulum

### Gereksinimler
- WordPress 5.0 veya üzeri
- PHP 7.4 veya üzeri
- MySQL 5.6 veya üzeri

### Adım 1: WordPress Hosting

**Önerilen Hosting Sağlayıcıları:**
- **Hostinger** (En ucuz - 30 TL/ay)
- **Niagahoster** (Türkçe destek)
- **Bluehost** (WordPress tarafından önerilen)
- **SiteGround** (Hızlı ve güvenilir)

### Adım 2: Plugin Kurulumu

1. **ZIP Dosyası Oluşturun:**
   ```bash
   cd wordpress-halisaha
   zip -r hali-saha-randevu.zip plugin/
   ```

2. **WordPress Admin'e Gidin:**
   - WordPress Admin Panel → Eklentiler → Yeni Ekle
   - "Eklenti Yükle" butonuna tıklayın
   - `hali-saha-randevu.zip` dosyasını yükleyin
   - "Etkinleştir" butonuna tıklayın

3. **Veritabanı Tabloları Otomatik Oluşturulur**

### Adım 3: Tema Kurulumu

1. **ZIP Dosyası Oluşturun:**
   ```bash
   zip -r halisaha-tema.zip theme/
   ```

2. **WordPress Admin'e Gidin:**
   - WordPress Admin Panel → Görünüm → Temalar → Yeni Ekle
   - "Tema Yükle" butonuna tıklayın
   - `halisaha-tema.zip` dosyasını yükleyin
   - "Etkinleştir" butonuna tıklayın

### Adım 4: Sayfaları Oluşturun

**Ana Sayfa:**
- Sayfalar → Yeni Ekle
- Başlık: "Ana Sayfa"
- Ayarlar → Okuma → "Ana sayfa" seçin

**Randevu Al:**
- Sayfalar → Yeni Ekle
- Başlık: "Randevu Al"
- İçerik: `[randevu_formu]`
- Yayınla

**Randevularım:**
- Sayfalar → Yeni Ekle
- Başlık: "Randevularım"
- İçerik: `[randevularim]`
- Yayınla

**Admin Panel:**
- Sayfalar → Yeni Ekle
- Başlık: "Admin Panel"
- İçerik: `[admin_randevular]`
- Yayınla

### Adım 5: Menü Oluşturun

1. **Görünüm → Menüler**
2. **Yeni Menü Oluştur** → "Ana Menü"
3. Sayfaları ekleyin:
   - Ana Sayfa
   - Randevu Al
   - Randevularım
4. **Menü Konumu**: "Ana Menü" seçin
5. **Kaydet**

## 🎨 Özelleştirme

### Logo Ekleme
- Görünüm → Özelleştir → Site Kimliği → Logo Seç

### Renkler
- Plugin CSS: `wp-content/plugins/hali-saha-randevu/assets/css/style.css`
- Tema CSS: `wp-content/themes/halisaha-tema/style.css`

### E-posta Ayarları

WordPress varsayılan `wp_mail()` kullanır. Daha güvenilir e-posta için:

1. **WP Mail SMTP** eklentisini kurun
2. Gmail, SendGrid veya SMTP ayarlarını yapın

## 📱 Shortcode'lar

**Randevu Formu:**
```
[randevu_formu]
```

**Kullanıcı Randevuları:**
```
[randevularim]
```

**Admin Paneli:**
```
[admin_randevular]
```

## 🔐 Admin Kullanıcı Oluşturma

1. **Kullanıcılar → Yeni Ekle**
2. Kullanıcı adı, e-posta, şifre girin
3. **Rol**: Yönetici
4. **Kullanıcı Ekle**

## 📊 Admin Özellikleri

- **Randevular Menüsü**: Tüm randevuları göster
- **İstatistikler**: Toplam ve bugünkü randevular
- **Randevu Silme**: Herhangi bir randevuyu sil

## 🔧 Sorun Giderme

### E-postalar Gönderilmiyor
1. **WP Mail SMTP** eklentisini kurun
2. SMTP ayarlarını yapın
3. Test e-postası gönderin

### Randevular Görünmüyor
1. Plugin'in aktif olduğundan emin olun
2. Veritabanı tablolarını kontrol edin
3. Cache'i temizleyin

### Sayfa 404 Hatası
1. Ayarlar → Kalıcı Bağlantılar
2. "Kaydet" butonuna tıklayın

## 📞 Destek

- **GitHub Issues**: https://github.com/halilaluc/Sahaproje/issues
- **E-posta**: [E-posta adresiniz]

## 📄 Lisans

GNU General Public License v2 or later

## 🤝 Katkıda Bulunma

1. Repository'yi fork edin
2. Feature branch oluşturun
3. Değişikliklerinizi commit edin
4. Pull Request oluşturun

## 📝 Sürüm Geçmişi

### 1.0.0 (2024)
- İlk sürüm
- Temel randevu sistemi
- Admin paneli
- E-posta bildirimleri
- Türkçe dil desteği