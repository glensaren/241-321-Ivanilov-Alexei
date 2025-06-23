const buttonLabels = ['1' , '2' , '3', '+' ,
 '4' , '5' , '6', '-' ,
 '7' , '8' , '9', '*' ,
 '(' , '0' , ')', '/' ,
 'AC' , '=' , 'C' , '.', 'F'
];


const calculatorDiv = document.getElementById('calculator');
const displayField = document.getElementById('display');

buttonLabels.forEach(label => {
  const button = document.createElement('button');
  button.textContent = label;
  button.onclick = () => {
    if (label === '=') {
      calculateExpression();
    } 
    
    else if (label === 'C') {
      displayField.value = '';
    }

    else if (label === 'F') {
      fetchTrigFromFile();
    }

    else {
      displayField.value += label;
    }
  };
  calculatorDiv.appendChild(button);
});

function calculateExpression() {
  fetch('backend.php', {
    method: 'POST',
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
    body: 'expr=' + encodeURIComponent(displayField.value)
  })
  .then(response => response.text())
  .then(serverResult => {
    displayField.value = serverResult;
  });
}

function fetchTrigFromFile() {
  fetch('backend.php', {
    method: 'POST',
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
    body: 'load_file=true'
  })
  .then(response => response.text())
  .then(result => {
    displayField.value = result;
  });
}

