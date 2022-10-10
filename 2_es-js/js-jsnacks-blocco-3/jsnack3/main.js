const result = document.getElementById(`main`);

function isEven(number) {
  if (Array.isArray(number) || typeof number == 'string') {
    return number.length % 2 === 0;
  }

  if (typeof number === 'boolean') {
    return number;
  }

  if (isNaN(number)) {
    console.error('Gived value is not a number:', JSON.stringify(number));
    return undefined;
  }

  return number % 2 === 0;
}

function createDiv(id) {
  let div = document.createElement('div');
  div.classList.add('bg-warning', 'mb-4');
  div.id = id;
  return div;
}

let numbers = [[1, 2], true, 3, {}, 5, 6, false, 8, 9, 'ciao'];

const redDiv = createDiv('red');
const greenDiv = createDiv('green');

for (let i = 0; i < numbers.length; i++) {
  if (isEven(numbers[i]) !== undefined && isEven(numbers[i])) redDiv.innerHTML += `${numbers[i]} `;
  else if (isEven(numbers[i]) !== undefined && !isEven(numbers[i]))
    greenDiv.innerHTML += `${numbers[i]} `;
}

result.appendChild(redDiv);
result.appendChild(greenDiv);
