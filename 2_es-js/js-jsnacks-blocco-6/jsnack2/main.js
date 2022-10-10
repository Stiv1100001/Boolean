// const result = document.getElementById(`result`);

function reverseWord(word) {
  return word.split('').reverse().join('');
}

function oppositeNumber(n) {
  return n * -1;
}

function getRandomNumber(min, max) {
  return Math.floor(Math.random() * (max - min) + min);
}

function randomWord() {
  let result = '';
  const vocals = 'AEIOUaeiou';
  const chars = 'BCDFGHJKLMNPQRSTVWXYZqwrtypsdfghjklzxcvbnm';

  const randomLength = getRandomNumber(4, 20);

  for (let i = getRandomNumber(1, 3); i < randomLength; i++) {
    if (i % 2 !== 0) result += vocals[getRandomNumber(0, vocals.length - 1)];
    else result += chars[getRandomNumber(0, chars.length - 1)];
  }

  return result;
}

const list = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

for (let i = 0; i < 10; i++) {
  list.push(randomWord());
}

const myresult = list.map((el) => (typeof el === 'number' ? oppositeNumber(el) : reverseWord(el)));

console.log(myresult);
