const result = document.getElementById(`result`);

let n, m, l;

do {
  n = parseInt(prompt('Inserisci un numero N'));
  m = parseInt(prompt('Inserisci un numero M'));
  l = parseInt(prompt('Inserisci un numero L'));
} while (isNaN(n) && isNaN(m) && isNaN(l));

for (let i = 0; i < n; i++) {
  let array = [];
  let sum = 0;

  while (array.length < m && sum < l) {
    let number = Math.floor(Math.random() * 4528 + 4);
    array.push(number);

    if (array.length === m) {
      for (let j = 0; j < m; j++) {
        sum += array[j];
      }

      if (sum < l) array = [];
    }
  }

  result.innerHTML += array.join(', ') + '<br>';
}
