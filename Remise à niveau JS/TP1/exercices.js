/*eslint linebreak-style: ["error", "windows"]*/

console.log("JS fonctionnel !");

//Exercice 1
//t = 2;
//console.log(t);

//var t = 4;
//console.log(t);

//let t = 4;
//console.log(t);

let x = 2;
var y = 1;
console.log(y);
console.log(x);

//Exercice 2

console.log("12" + "34");
console.log(12 + 34);
console.log(12 + "34");

//Exercice 3

function helloWorld() {
  console.log("Hello World!");
}

function helloPrenom(prenom) {
  console.log(`Bonjour ${prenom}`);
}

function calculPrixTTC(prix, tva = 1.2) {
  return prix * tva;
}

//tests
helloWorld();
helloPrenom("loan");
console.log(calculPrixTTC(10));
console.log(calculPrixTTC(10, 1.055));

//Exercice 4
const testArrow = () => {
  console.log("voici le texte de la formation");
};

testArrow();
const testArrow2 = () => {
  console.log(`voici le texte de la formation ${this}`);
};

const multiPar10 = (x) => x * 10;

const multiDeuxNombres = (x, y) => x * y;

//tests
testArrow2();
console.log(multiPar10(2));
console.log(multiDeuxNombres(2, 3));

//Exercice 5
function max(number1, number2) {
  if (number1 > number2) {
    return number1;
  } else {
    return number2;
  }
}

function max3(number1, number2, number3) {
  if (number1 > number2 && number1 > number3) {
    return number1;
  }
  if (number2 > number1 && number2 > number3) {
    return number2;
  }
  return number3;
}

function jour(numero) {
  switch (numero) {
    case 1:
      return "lundi";
      break;
    case 2:
      return "mardi";
      break;
    case 3:
      return "mercredi";
      break;
    case 4:
      return "jeudi";
      break;
    case 5:
      return "vendredi";
      break;
    case 6:
      return "samedi";
      break;
    case 7:
      return "dimanche";
      break;
    default:
      return "Veuillez mettre un chiffre entre 1 et 7";
  }
}

//tests
console.log(max(1, 2));
console.log(max3(3, 5, 2));
console.log(jour(2));

//Exercice 6
function factorielleItFor(number) {
  let result = number;
  for (let i = number - 1; i > 0; i--) {
    result *= i;
  }
  return result;
}

function factorielleItWhile(number) {
  let num = number - 1;
  let result = number;
  while (num > 0) {
    result *= num;
    num--;
  }
  return result;
}

function factorielleRec(number, result = 1) {
  if (number === 1) {
    return result;
  }
  result *= number;
  return factorielleRec(number - 1, result);
}

function exposantRec(number, exp, result = 0) {
  if (exp === 0) {
    return 1;
  } else if (exp === 1) {
    return result;
  }
  result += number * number;
  return exposantRec(number, exp - 1, result);
}

//tests
console.log(factorielleItFor(5));
console.log(factorielleItWhile(5));
console.log(factorielleRec(5));
console.log(exposantRec(2, 3));

function calcul(...rest) {
  let result = 0;
  rest.forEach((x) => {
    result += x;
  });
  return result / rest.length;
}

//tests
console.log(calcul(1, 2, 3, 4, 5));
