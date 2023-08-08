<!DOCTYPE html>
<html>
<head>
  <title>Calculator with History</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div id="calculator">
    <div id="result"></div>
    <div>
      <button onclick="appendToResult('1')">1</button>
      <button onclick="appendToResult('2')">2</button>
      <button onclick="appendToResult('3')">3</button>
      <button onclick="appendToResult('+')">+</button><br>
    </div><br>
    <div>
      <button onclick="appendToResult('4')">4</button>
      <button onclick="appendToResult('5')">5</button>
      <button onclick="appendToResult('6')">6</button>
      <button onclick="appendToResult('-')">-</button>
    </div><br>
    <div>
      <button onclick="appendToResult('7')">7</button>
      <button onclick="appendToResult('8')">8</button>
      <button onclick="appendToResult('9')">9</button>
      <button onclick="appendToResult('*')">*</button>
    </div><br>
    <div>
      <button onclick="appendToResult('0')">0</button>
      <button onclick="appendToResult('.')">.</button>
      <button onclick="calculate()">=</button>
      <button onclick="appendToResult('/')">/</button>
    </div><br>
    <div>
      <button onclick="clearResult()">C</button>
      <button onclick="deleteLastCharacter()">&#9003;</button>
    </div><br>
    
  <br>
  <div id="history"  >
     <a  href="retrieve_calculation.php"  >View History</a>
  </div>
  <script src="javascript.js"></script>
</body>
</html>
