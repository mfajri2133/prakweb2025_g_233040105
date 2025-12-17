function volumeDuaKubus(a, b) {
    var volumeA = a * a * a;
    var volumeB = b * b * b;
    return volumeA + volumeB;
}

console.log(volumeDuaKubus(8, 3)); // Output: 539
console.log(volumeDuaKubus(10, 15)); // Output: 3375
