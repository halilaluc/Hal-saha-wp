# WORDPRESS KURULUM TALİMATLARI

## Hızlı Başlangıç

### 1. Hosting Satın Alın

**Hostinger (Önerilen - En Ucuz):**
- https://www.hostinger.com.tr
- Premium Shared Hosting: ~30 TL/ay
- WordPress otomatik kurulum
- Ücretsiz SSL sertifikası
- 24/7 destek

**Alternatifler:**
- Niagahoster: https://www.niagahoster.co.id
- Bluehost: https://www.bluehost.com
- SiteGround: https://www.siteground.com

### 2. WordPress Kurulumu

**Hostinger'de:**
1. cPanel'e giriş yapın
2. "Auto Installer" → "WordPress"
3. Domain seçin
4. Admin kullanıcı adı ve şifre belirleyin
5. "Install" butonuna tıklayın

### 3. Plugin ve Tema Yükleme

**A. Manuel Yükleme (FTP):**

1. **FileZilla** indirin: https://filezilla-project.org

2. **FTP Bilgileri** (Hosting'den alın):
   - Host: ftp.yourdomain.com
   - Username: cpanel kullanıcı adı
   - Password: cpanel şifre

3. **Plugin Yükle:**
   ```
   /public_html/wp-content/plugins/
   ```
   `hali-saha-randevu` klasörünü buraya yükleyin

4. **Tema Yükle:**
   ```
   /public_html/wp-content/themes/
   ```
   `halisaha-tema` klasörünü buraya yükleyin

**B. WordPress Admin ile:**

1. Plugin ve temayı ZIP yapın
2. WordPress Admin → Eklentiler/Temalar → Yeni Ekle
3. ZIP dosyasını yükleyin

### 4. İlk Ayarlar

1. **Kalıcı Bağlantılar:**
   - Ayarlar → Kalıcı Bağlantılar
   - "Yazı adı" seçin
   - Kaydet

2. **Zaman Dilimi:**
   - Ayarlar → Genel
   - Zaman Dilimi: İstanbul
   - Kaydet

3. **Kullanıcı Kaydı:**
   - Ayarlar → Genel
   - "Herkes kayıt olabilir" işaretleyin
   - Varsayılan rol: Abone
   - Kaydet

### 5. SSL Sertifikası (HTTPS)

**Hostinger'de:**
1. cPanel → SSL/TLS Status
2. "AutoSSL" etkinleştir
3. Domain'i seçin → "Run AutoSSL"

**WordPress'te:**
1. Ayarlar → Genel
2. WordPress Adresi: `https://yourdomain.com`
3. Site Adresi: `https://yourdomain.com`
4. Kaydet

### 6. Yedekleme Ayarlama

**UpdraftPlus Plugin:**
1. Eklentiler → Yeni Ekle → "UpdraftPlus" ara
2. Kur ve Etkinleştir
3. Ayarlar → UpdraftPlus Yedekleri
4. Otomatik yedekleme ayarla (haftalık)
5. Google Drive veya Dropbox bağla

### 7. Performans Optimizasyonu

**WP Super Cache Plugin:**
1. Eklentiler → Yeni Ekle → "WP Super Cache"
2. Kur ve Etkinleştir
3. Ayarlar → WP Super Cache
4. "Caching On" seçin

### 8. Güvenlik

**Wordfence Plugin:**
1. Eklentiler → Yeni Ekle → "Wordfence"
2. Kur ve Etkinleştir
3. Temel güvenlik taraması yapın

### 9. E-posta Ayarları

**WP Mail SMTP:**
1. Eklentiler → Yeni Ekle → "WP Mail SMTP"
2. Kur ve Etkinleştir
3. Gmail SMTP ayarları:
   - SMTP Host: smtp.gmail.com
   - Port: 587
   - Encryption: TLS
   - Username: gmail@gmail.com
   - Password: Uygulama şifresi

**Gmail Uygulama Şifresi Alma:**
1. Google Hesap → Güvenlik
2. 2 Adımlı Doğrulama → Açık
3. Uygulama Şifreleri → Mail → Oluştur

## ✅ Kontrol Listesi

- [ ] Hosting satın alındı
- [ ] WordPress kuruldu
- [ ] Plugin yüklendi ve aktif
- [ ] Tema yüklendi ve aktif
- [ ] Sayfalar oluşturuldu (Ana Sayfa, Randevu Al, Randevularım)
- [ ] Menü ayarlandı
- [ ] SSL sertifikası aktif (HTTPS)
- [ ] E-posta ayarları yapıldı
- [ ] Yedekleme ayarlandı
- [ ] Güvenlik eklentisi kuruldu
- [ ] Test randevusu alındı
- [ ] E-posta onayı geldi

## 🎯 Sonraki Adımlar

1. **Domain** satın alın (opsiyonel)
2. **Logo** tasarlayın ve yükleyin
3. **İçerik** ekleyin (Hakkımızda, İletişim sayfaları)
4. **Google Analytics** ekleyin
5. **Google Search Console** ekleyin
6. **Sosyal medya** paylaşım butonları ekleyin

## 💡 İpuçları

- **Yedek alın**: Her güncelleme öncesi yedek alın
- **Güncel tutun**: WordPress, plugin ve temaları güncelleyin
- **Güvenlik**: Güçlü şifreler kullanın
- **Performans**: Gereksiz plugin kullanmayın
- **SEO**: Yoast SEO plugin'i kurun

## 📞 Yardım

Sorularınız için:
- Hosting desteği: support@hostinger.com
- WordPress forumları: https://tr.wordpress.org/support/
- GitHub: Issues açın