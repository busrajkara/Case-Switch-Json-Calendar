# Takvim Notları Uygulaması

## Genel Bakış
Takvim Notları Uygulaması, kullanıcıların bir tarih seçip o tarih için kısa bir not kaydedebileceği bir web uygulamasıdır. Proje, HTML, CSS, JavaScript ve PHP ile geliştirilmiştir. Notlar JSON formatında saklanır.

## Özellikler
- **Etkileşimli Takvim**: Tarih seçerek not ekleme ve görüntüleme.
- **Not Yönetimi**: Not ekleme, güncelleme ve görüntüleme işlevleri.
- **Duyarlı Tasarım**: Farklı cihaz boyutlarına uygun.
- **Case-Switch Kullanımı**: Durum yönetimi için `switch-case` yapıları kullanılmıştır.

## Ekran Görüntüleri
Aşağıdaki görseller uygulamanın farklı bölümlerini göstermektedir.

### Grid Yapısı
Aşağıda uygulamanın takvim görünümü için kullanılan ızgara yapısı:
![image](https://github.com/user-attachments/assets/e30c59be-0aa6-4877-9f16-378082a34967)


- **7 sütun**: Günlerin haftanın günlerine göre düzenlenmesi.
- **Dinamik içerik**: Günlere tıklanarak not görüntüleme.

### Görsel 1: Ana Takvim Görünümü
![image](https://github.com/user-attachments/assets/a9c99e1e-ab16-4880-8c37-46b14b2e5267)


### Görsel 2: Not Ekleme Alanı
![image](https://github.com/user-attachments/assets/883cac38-ea47-43e5-8e2d-7333cd8e3490)


### Görsel 3: Kaydedilmiş Notların Listesi
![image](https://github.com/user-attachments/assets/94c16db5-cf67-4dcc-ba63-9f99f42e7104)


## Nasıl Kullanılır?
1. Projeyi klonlayın:
   ```bash
   git clone <repository-url>
   ```
2. Dosyaları bir PHP sunucusuna yerleştirin.
3. `index.php` dosyasını tarayıcınızda açın.
4. Takvim üzerinden bir gün seçerek not ekleyin veya görüntüleyin.

## Kullanılan Teknolojiler
- **Frontend**: HTML, CSS, JavaScript
- **Backend**: PHP
- **Depolama**: JSON dosyası

## Case-Switch Kullanımı
Proje, durum yönetimini kolaylaştırmak için JavaScript ve PHP'de `switch-case` yapıları kullanmaktadır.

### JavaScript Örneği:
```javascript
switch(selectedDay) {
    case "1":
        console.log("Pazartesi seçildi.");
        break;
    case "2":
        console.log("Salı seçildi.");
        break;
    default:
        console.log("Geçersiz gün.");
}
```

### PHP Örneği:
```php
switch ($action) {
    case "save":
        // Not kaydetme işlemleri
        break;
    case "load":
        // Not yükleme işlemleri
        break;
    default:
        echo "Geçersiz işlem.";
        break;
}
```

## Proje Dosya Yapısı
```
root/
├── index.php
├── notes.json
├── notes.php
├── script.js
├── style.css
└── images/
    ├── calendar-view.png
    ├── add-note-view.png
    └── saved-notes.png
```

## Lisans
Bu proje MIT Lisansı altında yayınlanmıştır.

### **Not**:
- Görsellerin `images/` klasöründe olduğunu varsaydım. Görselleri doğru klasöre ekleyip adlandırmalısınız.
- Ekran görüntüsü için istediğiniz düzeni veya ekleyeceğiniz görsellerin detaylarını paylaşırsanız daha özelleştirilmiş bir tasarım sunabilirim.
