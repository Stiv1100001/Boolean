// create a list of emails
const emails = [
  'bichicchi.stefano@gmail.com',
  'bichicchi.stefa@gmail.com',
  'bichicchi.stano@gmail.com',
  'bichicchi.sto@gmail.com',
  'bichicchi.stefano@gmail.com',
  'bichi.stefano@gmail.com',
  'bichicchi.stefano@google.com',
  'bichicchi.stefano@yahoo.com',
  'bichicchi.stefano@hotmail.com',
  'bichicchi.stefano@hotter.com',
];

document.getElementById('check').addEventListener('click', () => {
  const email = document.getElementById('email').value;

  /* Versione lunga e richiesta */
  let flag = false;
  for (let i = 0; i < emails.length; i++) {
    if (emails[i] === email) flag = true;
  }

  let result = document.getElementById('result');

  if (flag) {
    result.innerHTML = 'Benvenuto!';
    result.classList.remove('text-danger');
    result.classList.add('text-primary');
  } else {
    result.innerHTML = "Ah ah ah, you didn't say the magic word!";
    result.classList.remove('text-primary');
    result.classList.add('text-danger');
  }

  /* Versione rapidissima */
  /* if (emails.indexOf(email) !== -1) {
     result.innerHTML = 'Benvenuto!';
     result.classList.remove('text-danger');
     result.classList.add('text-primary');
   } else {
     document.getElementById('result').innerHTML = "Ah ah ah, you didn't say the magic word!";
     result.classList.remove('text-primary');
     result.classList.add('text-danger');
   } */
});

document.getElementById('roll').addEventListener('click', () => {
  const diceResultYou = Math.floor(Math.random() * 6 + 1);
  const diceResultPc = Math.floor(Math.random() * 6 + 1);

  document.getElementById('dice-result-you').innerHTML = diceResultYou;
  document.getElementById('dice-result-pc').innerHTML = diceResultPc;

  const result = document.getElementById('dice-result');
  if (diceResultPc > diceResultYou) {
    result.innerHTML = 'Hai perso!';
  } else if (diceResultYou > diceResultPc) {
    result.innerHTML = 'Hai vinto!';
  } else {
    result.innerHTML = 'Patta!';
  }
});
