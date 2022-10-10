const result = document.getElementById(`result`);

let sum = 0;

const oddNumber = [];
let oddSum = 0;
const evenNumber = [];
let evenSum = 0;

while (evenSum < 200 || oddSum < 200) {
  number = parseInt(prompt('Inserisci un numero'));

  if (!isNaN(number)) {
    if (number % 2 === 0) {
      oddNumber.push(number);
      oddSum += number;
    } else {
      evenNumber.push(number);
      evenSum += number;
    }
  }
}

/* 
let sum = 0;

while (sum < 200) {
  number = parseInt(prompt('Inserisci un numero'));
  if (!isNaN(number)) sum += number;
} */

result.innerHTML = `La somma pari è: ${oddSum} {${oddNumber.join(
  '-'
)}}, la somma dispari  è ${evenSum} {${evenNumber.join('-')}}`;
