// const result = document.getElementById('result');

const lista1 = ['a', 'b', 'c'];
const lista2 = [1, 2, 3];

const listaResult = [];
const objResult = {};

const totalLenght = Math.min(lista1.length, lista2.length) * 2;

for (let index = 0; index < lista1.length; index++) {
  objResult[lista1[index]] = lista2[index];
}

for (let i = 0; i < totalLenght; i++) {
  i % 2 === 0 ? listaResult.push(lista1.shift()) : listaResult.push(lista2.shift());
}

console.log(listaResult);
console.log(objResult);
