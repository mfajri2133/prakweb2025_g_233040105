const namaToko = "Toko Serba Ada";
const hargaBuku = 50000;
const hargaPensil = 2000;

function hitungTotalBelanja(jumlahBuku, jumlahPensil) {
    return jumlahBuku * hargaBuku + jumlahPensil * hargaPensil;
}

function cetakStruk(total) {
    console.log("===" + namaToko + "===");
    console.log("Total belanja: Rp." + total);
    console.log("Terima Kasih");
}

module.exports = {
    hitungTotalBelanja,
    cetakStruk,
};
