const result = document.getElementById(`main`);

function evenSum(number1, number2) {
  return (number1 + number2) % 2 === 0;
}

result.innerHTML += evenSum(10, 1);
