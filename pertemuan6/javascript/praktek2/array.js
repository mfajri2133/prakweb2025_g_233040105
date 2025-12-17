function tambahPenumpang(namaPenumpang, penumpang) {
    if (penumpang.length === 0) {
        penumpang.push(namaPenumpang);
        return penumpang;
    }

    for (var i = 0; i < penumpang.length; i++) {
        if (penumpang[i] === undefined) {
            penumpang[i] = namaPenumpang;
            return penumpang;
        }

        if (penumpang[i] === namaPenumpang) {
            console.log(namaPenumpang + " sudah ada di dalam angkot.");
            return penumpang;
        }
    }

    penumpang.push(namaPenumpang);
    return penumpang;
}

let penumpang = [];
penumpang = tambahPenumpang("Alice", penumpang);
penumpang = tambahPenumpang("Bob", penumpang);
penumpang = tambahPenumpang("Jordy", penumpang);
console.log(penumpang); // Output: [ 'Alice', 'Bob', 'Jordy' ]
