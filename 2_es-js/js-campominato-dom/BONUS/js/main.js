const grid = document.getElementById('grid');
const startButton = document.getElementById('play');
const difficultyList = document.getElementById('difficulty');
const bombsHTMLDOMPosition = [];

// % User score
let score = 0;

// % End of game
let stop = false;

/**
 * Return a random integer number between gived value
 * @param {Integer} min Minimun value
 * @param {Integer} max Maximun value
 * @returns {Integer} Result value
 */
function getRandomInt(min, max) {
  return Math.floor(Math.random() * (max - min) + min);
}

/**
 * Update score based on passed value
 * @param {Integer} points Current points
 */
function updatePoints(points, win = null) {
  if (win === true) {
    // % Winning state
    document.getElementById('score').innerHTML = `Current score: ${points}, you win!`;
  } else if (win === false) {
    // % Loosing state
    document.getElementById('score').innerHTML = `Current score: ${points}, you lose!`;
  } else {
    // % Only update
    document.getElementById('score').innerHTML = `Current score: ${points}`;
  }
}

/**
 * Remove all EventListener from blocks
 * Reveil all bombs
 */
function gameOver() {
  for (let i = 0; i < bombsHTMLDOMPosition.length; i++) {
    bombsHTMLDOMPosition[i].classList.add('bg-danger');
    bombsHTMLDOMPosition[i].classList.remove('bg-black', 'text-white');
  }

  const blocks = document.querySelectorAll('.block');

  for (let i = 0; i < blocks.length; i++) {
    const newBlock = blocks[i].cloneNode(true);
    blocks[i].replaceWith(newBlock);
  }
  stop = false;
}

/**
 * Returns range value from gived difficulty
 * @param {String} difficulty a string rappresenting difficulty ("1" | "2" | "3")
 * @returns Array [CellNumber, MaxValue]
 */
function getDifficultyValue(difficulty) {
  let cellsNumber, size;

  switch (difficulty) {
    case '1':
      {
        cellsNumber = 100;
      }
      break;

    case '2':
      {
        cellsNumber = 81;
      }
      break;

    case '3':
      {
        cellsNumber = 49;
      }
      break;

    default:
      {
        cellsNumber = getRandomInt(0, 200);
      }
      break;
  }

  size = Math.sqrt(cellsNumber);

  return [size, cellsNumber];
}

/**
 * Create an array of 16 blacklisted Integers
 * @param {Integer} maxValue max number generated
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

/**
 * Init grid
 */
function initialize() {
  score = 0;
  grid.innerHTML = '';
  updatePoints(0);
}

function populateGrid(difficulty) {
  // | Get table size
  const [size, cellsNumber] = getDifficultyValue(difficulty);

  // | Generate black list
  const bombList = getBombList(16, cellsNumber);

  let index = 0;

  for (let i = 0; i < size; i++) {
    //| Create a row
    const row = document.createElement('div');
    row.classList.add('my-row', 'd-flex', 'justify-content-center');

    //| Generate blocks
    for (let j = 0; j < size; j++) {
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
        // ! Insert bomb in custom array, for future use
        bombsHTMLDOMPosition.push(block);
        block.addEventListener(
          'click',
          (event) => {
            if (!stop) {
              event.currentTarget.classList.remove('bg-black', 'text-white');
              event.currentTarget.classList.add('bg-danger');
              updatePoints(score, false);
              stop = true;
              gameOver();
            }
          },
          { once: true }
        );
      } else {
        block.addEventListener(
          'click',
          (event) => {
            if (!stop) {
              event.currentTarget.classList.remove('bg-black', 'text-white');
              event.currentTarget.classList.add('bg-cyan');
              updatePoints(++score);

              if (score === cellsNumber - 16) {
                updatePoints(score, true);
              }
            }
          },
          { once: true }
        );
      }

      row.appendChild(block);
    }

    // | Adding row in grid
    grid.appendChild(row);
  }
}

// * Start
startButton.addEventListener('click', () => {
  initialize();
  populateGrid(difficultyList.value);
});
