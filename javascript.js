let result = document.getElementById('result');
let history = document.getElementById('history');
let calculationHistory = [];

function appendToResult(value) {
  result.textContent += value;
}

function clearResult() {
  result.textContent = '';
}

function calculate() {
  const expression = result.textContent;
  if (expression !== '') {
    try {
      const resultValue = eval(expression);
      result.textContent = resultValue;
      saveCalculation(expression, resultValue);
    } catch (error) {
      result.textContent = 'Error';
    }
  }
}

// function deleteLastCharacter() {
//   var display = document.getElementById('display').value;
//   document.getElementById('display').value = display.slice(0, -1);
// }

function deleteLastCharacter() {
  let currentResult = result.textContent;
  result.textContent = currentResult.slice(0, -1);
}

// function saveCalculation(expression, resultValue) {
//   calculationHistory.push({ expression, resultValue });
//   displayHistory();
//   storeInDatabase(expression, resultValue);
// }

function saveCalculation(expression, resultValue) {
  // Using AJAX to send data to the PHP server
  const xhr = new XMLHttpRequest();
  xhr.open('POST', 'save_calculation.php', true);
  xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  xhr.onreadystatechange = function() {
    if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
      // Do something if needed
    }
  };
  const data = `expression=${encodeURIComponent(expression)}&result=${encodeURIComponent(resultValue)}`;
  xhr.send(data);
}


function displayHistory() {
  history.innerHTML = '';
  calculationHistory.slice().reverse().forEach(entry => {
    const entryElement = document.createElement('div');
    entryElement.textContent = `${entry.expression} = ${entry.resultValue}`;
    history.appendChild(entryElement);
  });
}

function storeInDatabase(expression, resultValue) {
  // Using AJAX to send data to the PHP server
  const xhr = new XMLHttpRequest();
  xhr.open('POST', 'save_calculation.php', true);
  xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  xhr.onreadystatechange = function() {
    if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
      // Do something if needed
    }
  };
  xhr.send(`expression=${encodeURIComponent(expression)}&result=${encodeURIComponent(resultValue)}`);
}
