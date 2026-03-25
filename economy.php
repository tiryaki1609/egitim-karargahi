<?php
/**
 * Ekonomi Modülü - XP ve PUL Sistemi
 * 'Anne Şefkati' diliyle hazırlanmıştır.
 */

class Economy {
    private $xp;
    private $pul;

    public function __construct($initial_xp = 0, $initial_pul = 0) {
        $this->xp = $initial_xp;
        $this->pul = $initial_pul;
    }

    public function getXP() {
        return $this->xp;
    }

    public function getPUL() {
        return $this->pul;
    }

    public function addXP($amount) {
        $this->xp += $amount;
        return "Harika! Bilgi dağarcığına {$amount} XP daha ekledin. Işığın her yeri aydınlatıyor!";
    }

    public function addPUL($amount) {
        $this->pul += $amount;
        return "Tebrikler! Kumbarana {$amount} PUL eklendi. Gelecekteki keşiflerin için harika bir hazırlık.";
    }

    public function usePUL($amount) {
        if ($this->pul >= $amount) {
            $this->pul -= $amount;
            return "Bu harika seçim için PUL'larını kullandın. Yeni maceraların tadını çıkar!";
        } else {
            return "Henüz yeterli PUL birikmemiş gibi görünüyor. Biraz daha keşif yaparak yeni hazineler biriktirmeye ne dersin? Her adımda daha çok parlıyorsun!";
        }
    }

    /**
     * PUL Dağılımını Hesapla (Kağıt 100-10, Madeni 5-1)
     */
    public function getPULDistribution() {
        $remaining = $this->pul;

        $paper100 = floor($remaining / 100);
        $remaining %= 100;

        $paper10 = floor($remaining / 10);
        $remaining %= 10;

        $coin5 = floor($remaining / 5);
        $remaining %= 5;

        $coin1 = $remaining;

        return [
            'Kağıt 100' => $paper100,
            'Kağıt 10' => $paper10,
            'Madeni 5' => $coin5,
            'Madeni 1' => $coin1
        ];
    }
}
?>
