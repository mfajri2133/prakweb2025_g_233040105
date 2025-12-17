const kelas = ["A", "B", "C"];

const [senin, rabu, kamis] = kelas;
console.log(`Kelas hari senin itu kelas ${senin}`);
console.log(`Kelas hari rabu itu kelas ${rabu}`);
console.log(`Kelas hari kamis itu kelas ${kamis}`);

const mhs = {
    nama: "Budi",
    umur: 22,
};

const { nama, umur } = mhs;
console.log(`Nama saya ${nama}, umur saya ${umur} tahun.`);

const { nama: n, umur: u } = mhs;
console.log(`Nama saya ${n}, umur saya ${u} tahun.`);
