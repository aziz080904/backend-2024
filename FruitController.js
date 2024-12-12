// import data fruits
const fruits = require("./fruits.js");

// membuat fungsi index
const index = () => {
    for (const fruit of fruits) {
        console.log(fruit);
    }
};

// membuat fungsi store
const store = (name) => {
    fruits.push(name);
    module.exports.index();
};

// membuat fungsi update
const update = (index, namaBaru) => {
    if (index >= 0 && index < fruits.length) {
        fruits[index] = namaBaru;
        module.exports.index(); // Memanggil fungsi index yang diekspor
    } else {
        console.log(`Indeks ${index} tidak valid.`);
    }
};

// membuat fungsi destroy
const destroy = (index) => {
    if (index >= 0 && index < fruits.length) {
        fruits.splice(index, 1);
        module.exports.index(); // Memanggil fungsi index yang diekspor
    } else {
        console.log(`Indeks ${index} tidak valid.`);
    }
};

// export method index, store, update, destroy
module.exports = { index, store, update, destroy };
