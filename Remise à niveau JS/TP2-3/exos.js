// Exercice 1
function vowel(string) {
  let compteur = 0;
  for (let i = 0; i < string.length; i += 1) {
    if (
      string.charAt(i) === 'a' ||
      string.charAt(i) === 'e' ||
      string.charAt(i) === 'i' ||
      string.charAt(i) === 'o' ||
      string.charAt(i) === 'u' ||
      string.charAt(i) === 'y'
    ) {
      compteur += 1;
    }
  }
  return compteur;
}

console.log(vowel('je suis en cours'));

function palindrome(string) {
  for (let i = 0; i < Math.floor(string.length / 2); i += 1) {
    if (string.charAt(i) !== string.charAt(string.length - 1 - i)) {
      return false;
    }
  }
  return true;
}

console.log(palindrome('kayak'));

function uppercase(string) {
  const result = string.charAt(0).toUpperCase();
  return result + string.substr(1, string.length - 1);
}

console.log(uppercase('test'));

// Exercice 2
function lastButOne(array) {
  if (array.length >= 2) {
    return array[array.length - 2];
  }
  return false;
}

console.log(lastButOne([1, 2, 3, 4]));

function square(array) {
  let newArray = [];
  array.forEach((element) => {
    newArray.push(element * element);
  });
  return newArray;
}

console.log(square([1, 2, 3, 4]));

function gt10(array) {
  const result = [];
  array.forEach((element) => {
    if (element > 10) {
      result.push(element);
    }
  });
  return result;
}

console.log(gt10([1, 2, 11, 12]));

function sum(array) {
  let somme = 0;
  array.forEach((element) => {
    somme += element;
  });
  return somme;
}

console.log(sum([1, 2, 3]));

// Exercice 3
/*
function lastButOne2(array) {
  if (array.length >= 2) {
    return array;
  }
}
*/

function square2(array) {
  return array.map((x) => x * x);
}

console.log(square2([1, 2, 3, 4]));

function gt102(array) {
  return array.filter((arrayChar) => arrayChar > 10);
}

console.log(gt102([1, 2, 11, 12]));

function sum2(array) {
  return array.reduce(
    (accumulator, currentValue) => accumulator + currentValue
  );
}

console.log(sum2([1, 2, 3]));

// Exercice 4
// Ex 1
const data = [
  { name: 'bob', isTeacher: false },
  { name: 'nico', isTeacher: true },
  { name: 'pedro', isTeacher: true },
];

function isTeacherInData(data) {
  return data.some((person) => person.isTeacher === true);
}

console.log(isTeacherInData(data));

function isSup10ex2(data) {
  return data.every((element) => element > 10);
}

console.log(isSup10ex2([13, 22, 31, 11, 37]));

function findNumberSup30(data) {
  return data.find((number) => number > 30);
}

const pdg = [{ name: 'Mark' }, { name: 'Bernard' }, { name: 'Indra' }];
const salaire = [544000, 341000, 377000];

function together(pdg, salaire) {
  return pdg.map((person, index) => ({
    name: person.name,
    salaire: salaire[index].toString(),
  }));
}

console.log(together(pdg, salaire));

const listeInviteConf1 = ['anthony', 'pedro'];
const listeInviteConf2 = ['pedro', 'nico', 'vincent'];

function listeDesInvitesUniquementAUneConf(l1, l2) {
  return l1
    .filter((guest) => l2.indexOf(guest) === -1)
    .concat(l2.filter((guest) => l1.indexOf(guest) === -1));
}

console.log(
  listeDesInvitesUniquementAUneConf(listeInviteConf1, listeInviteConf2)
);

function listeDeTousLesInvites(l1, l2) {
  return new Set([...l1, ...l2]).values();
}

console.log(listeDeTousLesInvites(listeInviteConf1, listeInviteConf2));

function listeDesInvitesParticpantAux2Conf(l1, l2) {
  return new Set(
    l1
      .filter((guest) => l2.indexOf(guest) !== -1)
      .concat(l2.filter((guest) => l1.indexOf(guest) !== -1))
  ).values();
}

console.log(
  listeDesInvitesParticpantAux2Conf(listeInviteConf1, listeInviteConf2)
);

// Exercice 5
const codePostal = /^\d{5}$/;
const codePostal2 = /^[1-95]{2}[0-9]{3}$/;
const tel = /^0[1-7]([-. ]?\d{2}){4}$/;

console.log(codePostal.test('12345'));
console.log(codePostal2.test('28902'));
console.log(tel.test('0638422954'));

function affiche_rec(array) {
  array.forEach((element) => {
    if (Array.isArray(element)) {
      affiche_rec(element);
    }
    if (element !== undefined) {
      console.log(element);
    }
  });
}
console.log(affiche_rec([1, 2, 3]));

function majuscules(string) {
  result = '';
  split = string.split(' ');
  split.forEach((mot) => {
    result += mot[0].toUpperCase() + mot.substr(1, string.length - 1) + ' ';
  });
  return result;
}

console.log(majuscules('il fait beau'));

function alpha(string) {
  return string.replace(/\s/g, '').split('').sort().join('');
}

console.log(alpha('je suis en cours'));

function anagramme(string1, string2) {
  string1Sort = string1.split('').sort().join('');
  string2Sort = string2.split('').sort().join('');
  return string1Sort === string2Sort;
}

console.log(anagramme('chien', 'niche'));

function isEmail(string) {
  const regex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
  return regex.test(string);
}

console.log(isEmail('loan.thomy@gmail.com'));

function miroir(array) {
  const arrayReverse = array.map((x) => x);
  return arrayReverse.reverse().join('') === array.join('');
}

console.log(miroir([1, 2, 1]));
