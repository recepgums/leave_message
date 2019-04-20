# leave_message
-----------------------------------------------------------------------------------------------------------
Projenin nasıl çalıştığını görmek için "proje tanıtım" videosunu indirin.
-----------------------------------------------------------------------------------------------------------

Dokümantasyon "16542010-Recep-Gümüş_Dünyaya-Bir-Mesaj-Bırak" dosyasında mevcuttur.

-----------------------------------------------------------------------------------------------------------



KURULUMU



1.   Programlar/xampp7.exe
2.   Programlar/Composer-Setup.exe
3.   "Proje" klasörü kopyalanır > C:\xampp\htdocs klasörüne yapıştırılır
4.   "cmd" komut penceresi açılır ve klasör aktifleşir > "cd C:\xampp\htdocs\Proje"
5.   "composer update" komutu girilir. NOT: (") tırnak işaretleri girilmeyecektir.
6.   "Xampp Control Panel" uygulamasında "Apache" ve "MySql" Seçeneklerinde "Start" butonuna basılır
7.   Apache başlatma olayında hata verilir ise Config butonu Apache(httpd.conf) seçeneği tıklanır
     ve açılan dosyada "Listen 80" yazısını "Listen 8080" ile değiştirilir ve tekrar denenir
8.   Sunucular başladıktan sonra "localhost/phpmyadmin" yada "localhost:8080/phpmyadmin"
     linki tarayıcıda açılır ve açılan Phpmyadmin sayfasında 
     utf8mb4_turkish_ci formatında bir veritabanı oluşturulur.
9.   Bundan sonraki işlemler bu klasörde yapılacaktır > "C:\xampp\htdocs\Proje"
10.  .env dosyası açılır ve ayarlamalar yapılır >
        DB_DATABASE=ornek_db < oluşturulan veritabanı ismi
	MAIL_HOST=smtp.yandex.com 
	MAIL_USERNAME=yandex_hesabi@yandex.com
	MAIL_PASSWORD=yandex_hesabi_sifresi
	MAIL_ENCRYPTION=ssl
11.  vendor/laravel/framework/src/Illuminate/Foundation/Auth/Access/AuthenticatesUsers.php dosyası açılır >
	public function username()
    	{
            return 'email';
    	}
     kodları bulunur ve bu şekilde degistirilir.
	public function username()
    	{
            return 'username';
    	}
     bu işlem login ekranındaki email ile yada kullanıcı ile girilme durumuna göre ayarlarnır.
12.  config/mail.php dosyası açılır >
	59. satırda yazan kod bu şekilde değiştirilir.
	'address' => env('MAIL_FROM_ADDRESS', 'yandex_hesabi@yandex.com'),
	"yandex_hesabi@yandex.com" > sizin emailiniz oluyor.
13.  Cmd ekranı mevcut dizinde "php artisan migrate" komutu girilir.
     Bu işlem migrations daki hazırlanmış tabloları veritabanına gönderir.
14.  Laravelin timezone bölge alanı türkiye seçilmelidir yoksa otomatik olarak 3 saat geriden gelen UTC 
     formatında çalışır. Ayar bu şekilde yapılır. >
	config/app.php dosyası açılır.
	68.satırdaki kod bu şekilde değiştirilir.
	'timezone' => 'Europe/Istanbul',
15.  Cmd ekranı mevcut dizinde "php artisan serve" komutu girilir.
     Bu şekilde proje başlatılmış olur ve başlatıldığı için 
     bu çalışır halde olan cmd ekranı proje ile iş bitene kadar kapatılmaz.
16.  Tarayıcıda "localhost:8000" linki açılarak projeye bakılır.













