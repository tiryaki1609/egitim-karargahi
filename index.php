<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Dijital Eğitim Karargahı | Keşif Kapısı</title>
    <style>
        /* Temel Ayarlar ve Arka Plan */
        body, html {
            margin: 0; padding: 0; height: 100%; width: 100%;
            display: flex; align-items: center; justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            overflow: hidden;
        }

        /* Responsive (Duyarlı) Glassmorphism Panel */
        .discovery-card {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(25px);
            -webkit-backdrop-filter: blur(25px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 30px;
            padding: clamp(20px, 5vw, 40px);
            width: 90%;
            max-width: 400px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
            text-align: center;
            color: #ffffff;
            box-sizing: border-box;
            transition: all 0.5s ease;
        }

        /* Başlık ve Teşvik Edici Not */
        h2 { 
            color: #ffffff !important; 
            font-size: clamp(1.4rem, 6vw, 1.8rem);
            margin-bottom: 15px;
            font-weight: 600;
            text-shadow: 0 2px 4px rgba(0,0,0,0.3);
        }

        .pedagog-message {
            font-size: 14px;
            background: rgba(255, 255, 255, 0.12);
            padding: 12px;
            border-radius: 15px;
            margin-bottom: 25px;
            line-height: 1.5;
            color: #e0f2f1;
            border: 1px dashed rgba(255, 255, 255, 0.2);
        }

        /* Giriş Alanları */
        .input-group { text-align: left; margin-bottom: 15px; }
        
        label { 
            display: block; color: #ffffff !important; 
            font-size: 13px; margin-bottom: 6px; margin-left: 8px;
            font-weight: 500;
        }

        input {
            width: 100%; padding: 14px;
            background: rgba(255, 255, 255, 0.95) !important;
            border: none; border-radius: 15px;
            font-size: 16px; color: #2c3e50 !important;
            box-sizing: border-box; outline: none;
            box-shadow: inset 0 2px 4px rgba(0,0,0,0.1);
        }

        /* Seçenekler Satırı */
        .options {
            display: flex; justify-content: space-between;
            font-size: 12px; margin: 15px 5px 25px;
            color: #ffffff;
        }
        
        .options a { color: #ffffff; text-decoration: none; opacity: 0.8; font-weight: bold; }
        .options a:hover { opacity: 1; text-decoration: underline; }

        /* Butonlar */
        .btn-action {
            width: 100%; padding: 16px;
            background: linear-gradient(to right, #4facfe 0%, #00f2fe 100%);
            color: white !important; border: none; border-radius: 20px;
            font-size: 18px; font-weight: bold; cursor: pointer;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .btn-action:active { transform: scale(0.97); }

        .btn-qr {
            margin-top: 15px; background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.3); font-size: 14px;
        }

        /* Seviye Tespit Alanı (Yapıyı Bozmadan Gizli) */
        #level-test-area {
            display: none;
        }

        .random-word {
            font-size: 32px; font-weight: bold; color: #00f2fe;
            letter-spacing: 5px; margin: 15px 0; text-transform: uppercase;
        }

        /* Alt Bilgi */
        .footer-note {
            font-size: 11px; margin-top: 25px; opacity: 0.8; font-style: italic;
        }

        /* Arka Plan Bulanıklaştırma Efekti (Menü Açıldığında) */
        .blur-bg { filter: blur(15px); pointer-events: none; }

        .mic-active { animation: pulse 1.5s infinite; background: #ff4b2b !important; }
        @keyframes pulse { 0% { opacity: 1; } 50% { opacity: 0.5; } 100% { opacity: 1; } }
    </style>
</head>
<body>

    <div class="discovery-card" id="main-card">
        <h2>Keşif Kapısı</h2>
        
        <div id="login-section">
            <div class="pedagog-message">
                "Hoş geldin araştırmacı! Bugün hangi yeni bilgiyi keşfedeceğiz? Karargah seni bekliyor."
            </div>
            
            <div class="input
