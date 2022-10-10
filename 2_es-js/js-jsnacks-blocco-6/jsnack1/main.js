const result = document.getElementById('result');

function getRandomNumber(min, max) {
  return Math.random() * (max - min) + min;
}

function randomWeigth() {
  return getRandomNumber(0.1, 5);
}

function randomLength() {
  return getRandomNumber(5, 35);
}

function randomVariety() {
  const varieties = ['Romana', 'Nera', 'Napoletana', 'Rugosa'];

  return varieties[Math.floor(getRandomNumber(0, varieties.length - 1))];
}

const zucchine = [];

for (let i = 0; i < 10; i++) {
  zucchine.push({
    varietà: randomVariety(),
    peso: randomWeigth(),
    lunghezza: randomLength(),
  });
}

let totalWeight = 0;

zucchine.forEach((z) => {
  totalWeight += z.peso;
});

const shortZucchine = zucchine.filter((zucchina) => zucchina.lunghezza > 15);
const longZucchine = zucchine.filter((zucchina) => zucchina.lunghezza <= 15);

let totalShortWeight = 0;
let totalLongWeight = 0;

shortZucchine.forEach((z) => {
  totalShortWeight += z.peso;
});

longZucchine.forEach((z) => {
  totalLongWeight += z.peso;
});

console.log('Peso totale:', totalWeight);
console.log('Peso totale lunghe:', totalLongWeight);
console.log('Peso totale corte:', totalShortWeight);

console.table(shortZucchine);
console.table(longZucchine);
