<?php
/**
 * Dashboard Modülü - Karargah Merkezi
 * Güncelleme: Glassmorphism Tasarımı ve Pedagojik Dil Senkronizasyonu
 */

require_once 'economy.php';
require_once 'security.php';

// Başlangıç XP ve PUL değerleri (Mimar Yetkisiyle)
$economy = new Economy(150, 456); 
$security = new SecurityModule();

?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Karargah Paneli | Keşif Merkezi</title>
    <style>
        /* Karargah Anayasası: Koyu Lacivert ve Glassmorphism Standartları */
        body { 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%); 
            background-attachment: fixed;
            margin: 0; 
            padding: 20px; 
            color: #ffffff; 
            min-height: 100vh;
        }
        
        .dashboard-container { 
            max-width: 1200px; 
            margin: 40px auto; 
            display: grid; 
            grid-template-columns: 1fr 2fr; 
            gap: 25px; 
        }

        /* Şeffaf Cam Efekti */
        .card { 
            background: rgba(255, 255, 255, 0.1); 
            backdrop-filter: blur(15px); 
            -webkit-backdrop-filter: blur(15px);
            border-radius: 24px; 
            padding: 30px; 
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.37);
        }

        .card h3 { 
            margin-top: 0; 
            color: #4facfe; 
            font-size: 1.5rem;
            letter-spacing: 1px;
        }

        .stat-box { 
            display: flex; 
            justify-content: space-between; 
            padding: 15px 0; 
            border-bottom: 1px solid rgba(255, 255, 255, 0.1); 
        }

        .stat-box:last-child { border-bottom: none; }
        
        .economy-grid { 
            display: grid; 
            grid-template-columns: 1fr 1fr; 
            gap: 12px; 
            margin-top: 20px; 
        }

        .economy-item { 
            background: rgba(255, 255, 255, 0.05); 
            padding: 12px; 
            border-radius: 15px; 
            text-align: center; 
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .economy-item span { display: block; font-size: 11px; color: #cbd5e1; text-transform: uppercase; }
        .economy-item strong { font-size: 20px; color: #4facfe; }

        .btn-call { 
            background: linear-gradient(45deg, #00f2fe 0%, #4facfe 100%);
            color: white; 
            border: none; 
            padding: 18px; 
            border-radius: 20px; 
            font-weight: bold; 
            cursor: pointer; 
            width: 100%; 
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(79, 172, 254, 0.4);
        }

        .btn-call:hover { 
            transform: translateY(-3px); 
            box-shadow: 0 6px 20px rgba(79, 172, 254, 0.6);
        }

        /* Anne Şefkati - Pedagojik Dil Alanı */
        .pedagog-note { 
            font-style: italic; 
            color: #e2e8f0; 
            font-size: 14px; 
            margin-top: 25px; 
            border-left: 4px solid #00f2fe; 
            padding-left: 15px;
            line-height: 1.6;
        }
    </style>
</head>
<body>

    <div class="dashboard-container">

        <div class="card">
            <h3>Kişisel Kumbaram</h3>
            <div class="stat-box">
                <span>Bilgi Puanı (XP):</span>
                <strong><?php echo number_format($economy->getXP()); ?></strong>
            </div>
            <div class="stat-box">
                <span>Birikmiş PUL:</span>
                <strong><?php echo number_format($economy->getPUL()); ?></strong>
            </div>

            <div class="economy-grid">
                <?php foreach ($economy->getPULDistribution() as $label => $count): ?>
                    <div class="economy-item">
                        <span><?php echo $label; ?></span>
                        <strong><?php echo $count; ?></strong>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="pedagog-note">
                "Her bir XP ve PUL, senin merakının ve azminin parıltılı bir yansıması. Yeni keşiflerini görmek bizi çok heyecanlandırıyor!"
            </div>
        </div>

        <div class="card">
            <h3>Güvenli Keşif Alanı</h3>
            <p style="color: #cbd5e1;">Bugün hangi arkadaşınla yeni maceralar paylaşmak istersin? Güvenli hattın senin için ışıldıyor.</p>

            <div id="video-interface-wrapper" style="margin-top: 20px;">
                <?php if(function_exists('renderVideoCallUI')) renderVideoCallUI(); ?>
            </div>

            <div class="pedagog-note" style="margin-top: 30px;">
                "Burada paylaştığın tüm neşen, senin ve arkadaşının arasında kalıyor. Biz sadece senin huzurla keşfetmen için buradayız."
            </div>
        </div>

    </div>

    <script src="star_dust.js"></script>
    <script>
        // Anne Şefkati içeren interaktif geri bildirimler
        function endCall() {
            // Pedagojik dil güncellemesi: Hata veya onay yerine "yıldız tozu" teması
            if(confirm("Görüşmeyi başarıyla tamamlayıp, tüm izleri gökyüzüne 'Yıldız Tozu' olarak bırakalım mı?")) {
                if (typeof startStarDust === "function") {
                    startStarDust();
                }
                document.getElementById('video-interface-wrapper').innerHTML = 
                    "<div style='text-align:center; padding:20px; color:#4facfe;'>✨ Harika bir paylaşımdı! İzler gökyüzüne uğurlandı.</div>";
            }
        }
    </script>
</body>
</html>
