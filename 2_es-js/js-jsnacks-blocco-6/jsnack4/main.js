// const result = document.getElementById(`result`);
function getRandomNumber(min, max) {
  return Math.floor(Math.random() * (max - min) + min);
}

function mySlice(list, a, b) {
  if (!list.length) return;

  if (a > b) return;

  if (b > list.length - 1) return;

  return list.slice(a, b);
}

function unSlice(list, a, b) {
  if (!list.length) return;

  if (a > b) return;

  if (b > list.length - 1) return;

  return [...list.slice(0, a), ...list.slice(b, list.length)];
}

const array = [];

for (let index = 0; index < 10; index++) {
  array.push(getRandomNumber(0, 90));
}
console.dir(array);
console.dir(mySlice(array, 2, 7));
console.dir(unSlice(array, 2, 7));
