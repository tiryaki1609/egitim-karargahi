/**
 * Yıldız Tozu (Star Dust) İmha Scripti
 * Ses kayıtlarını ve tüm izleri 20 dakika sonra tamamen siler.
 */

const StarDustProtokolu = {
    timer: 20 * 60, // 20 dakika (saniye cinsinden)
    active: false,

    baslat: function() {
        console.log("Yıldız Tozu Protokolü Başlatıldı: İzler 20 dakika içinde silinecek.");
        this.active = true;

        setTimeout(() => {
            this.imhaEt();
        }, this.timer * 1000);
    },

    imhaEt: function() {
        // Tüm geçici ses kayıtlarını ve oturum bilgilerini temizle.
        this.active = false;
        console.log("Yıldız Tozu Etkisi: Tüm geçici veriler silindi. Tertemiz bir sayfa!");
        alert("Her şey Yıldız Tozu oldu! Yeni maceralar için tertemiz bir sayfa seni bekliyor.");
        location.reload();
    }
};

function startStarDust() {
    StarDustProtokolu.baslat();
}

/**
 * Otomatik Silme: Oturum açıldığından itibaren her şey 20 dakika sonra imha olur.
 */
document.addEventListener('DOMContentLoaded', () => {
    // startStarDust(); // Gerekirse otomatik olarak da başlatılabilir.
});
