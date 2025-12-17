const angka = [-2, -2, 6, -8, 3, 6, 8 - 10];
let angkabaru = [];
const arrFilter = angka.filter((a) => {
    if (a >= 0) {
        angkabaru.push(a);
    }
});

const angkabaru2 = angka.map((a) => a * 2);
console.log(angkabaru2);
