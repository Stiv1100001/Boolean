const grid = document.getElementById('grid');
const startButton = document.getElementById('play');
const difficultyList = document.getElementById('difficulty');
let score = 0;

let stop = false;

/**
 * Return a random integer number between gived value
 * @param {Number} min Minimun value
 * @param {Number} max Maximun value
 * @returns {Number} Result value
 */
function getRandomInt(min, max) {
  return Math.floor(Math.random() * (max - min) + min);
}

/**
 * Update score based on passed value
 * @param {Number} points Current points
 */
function updatePoints(points, win = null) {
  if (win) {
    document.getElementById('score').innerHTML = `Current score: ${points}, you win!`;
  } else if (win === false) {
    document.getElementById('score').innerHTML = `Current score: ${points}, you lose!`;
  } else {
    document.getElementById('score').innerHTML = `Current score: ${points}`;
  }
}

/**
 * Returns range value from gived difficulty
 * @param {String} difficulty a string rappresenting difficulty ("1" | "2" | "3")
 * @returns Array [CellNumber, MaxValue]
 */
function getDifficultyValue(difficulty) {
  let cellsNumber, n;

  switch (difficulty) {
    case '1':
    default:
      {
        cellsNumber = 100;
        n = 10;
      }
      break;

    case '2':
      {
        cellsNumber = 81;
        n = 9;
      }
      break;

    case '3':
      {
        cellsNumber = 49;
        n = 7;
      }
      break;
  }

  return [n, cellsNumber];
}

/**
 * Create an array of 16 blacklisted Integers
 * @param {Number} maxValue max number generated
 * @returns {Array} Array of 16 elements
 */
function getBombList(maxBombs, cellsNumber) {
  // ! Set doesn't allow duplicate values!
  const result = new Set();

  while (result.size < maxBombs) {
    result.add(getRandomInt(0, cellsNumber));
  }

  // ? Returning an array, for eliminating Set methods from upper scope
  return Array.from(result);
}

function populateGrid(difficulty) {
  // | Get table size
  const [n, cellsNumber] = getDifficultyValue(difficulty);

  // | Generate black list
  const bombList = getBombList(16, cellsNumber);

  let index = 0;

  for (let i = 0; i < n; i++) {
    //| Create a row
    const row = document.createElement('div');
    row.classList.add('my-row', 'd-flex', 'justify-content-center');

    //| Generate blocks
    for (let j = 0; j < n; j++) {
      //| Creating single block
      const block = document.createElement('div');
      block.classList.add(
        'block',
        'text-white',
        'bg-black',
        'd-flex',
        'justify-content-center',
        'align-items-center',
        'h-100',
        'border',
        'border-3',
        'border-white'
      );

      //| Creating block content
      const innerSpan = document.createElement('span');
      innerSpan.innerHTML = ++index;
      block.appendChild(innerSpan);

      // | Bomb logic
      if (bombList.includes(index)) {
        block.addEventListener('click', (event) => {
          event.currentTarget.classList.remove('bg-black');
          event.currentTarget.classList.remove('text-white');
          event.currentTarget.classList.add('bg-danger');
          if (!stop) {
            updatePoints(score, false);
            stop = true;
          }
        });
      } else {
        block.addEventListener('click', (event) => {
          event.currentTarget.classList.remove('bg-black');
          event.currentTarget.classList.remove('text-white');
          event.currentTarget.classList.add('bg-cyan');
          if (!stop) {
            updatePoints(++score);

            if (score === cellsNumber - 16) {
              updatePoints(score, true);
            }
          }
        });
      }

      row.appendChild(block);
    }

    // | Adding row in grid
    grid.appendChild(row);
  }
}

// * Start
startButton.addEventListener('click', () => {
  score = 0;
  stop = false;
  updatePoints(score);
  grid.innerHTML = '';
  populateGrid(difficultyList.value);
});
