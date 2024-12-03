// Correction TP2 - eslint airbnb

// CHAINE DE CARACTERE

// vowel("je suis en cours") -> 6
function isVowel(x) {
  return 'aeiouy'.indexOf(x) !== -1;
}
console.log(isVowel('u'));
console.log(isVowel('g'));

// ecriture avec l'opérateur ternaire
function vowel(str) {
  let nb = 0;
  for (let i = 0; i < str.length; i += 1) {
    nb += isVowel(str[i]) ? 1 : 0;
  }
  return nb;
}

console.log(vowel('je suis en cours'));

// palindrome("test") -> false
// palindrome("kayak") -> true
function palindrome(str) {
  const len = str.length;
  for (let i = 0; i < Math.floor(len / 2); i += 1) {
    if (str.charAt(i) !== str.charAt(len - i - 1)) {
      return false;
    }
  }
  return true;
}

console.log(palindrome('test'));
console.log(palindrome('kayak'));

function palindromeBis(x) {
  return x === x.split('').reverse().join('');
}

console.log(palindromeBis('test'));
console.log(palindromeBis('kayak'));

// uppercase("il fait BEAU") -> Il fait beau

function uppercase(str) {
  return str.charAt(0).toUpperCase() + str.substr(1).toLowerCase();
}

console.log(uppercase('il fait BEAU'));

// TABLEAUX

const t = [1, 4, 5, 7];
const tVide = [];

function lastButOne(tab) {
  return tab.length > 1 ? tab[tab.length - 2] : false;
}

console.log(lastButOne(t));
console.log(lastButOne(tVide));

// FONCTION TABLEAUX UTILISANT LES BOUCLES

// square([1,2,3,4]) -> [1,4,9,16]
function square(a) {
  const res = [];
  for (let i = 0; i < a.length; i += 1) {
    res.push(a[i] * a[i]);
  }
  return res;
}

console.log(square(t));

// gtVide0([1,27,3,42,2]) -> [27,42]
function gt10(a) {
  const res = [];
  for (let i = 0; i < a.length; i += 1) {
    if (a[i] >= 10) {
      res.push(a[i]);
    }
  }
  return res;
}

console.log(gt10(t));

// sum([1,2,3]) -> 6

function sum(a) {
  let res = 0;
  for (let i = 0; i < a.length; i += 1) {
    res += a[i];
  }
  return res;
}

console.log(sum(t));

// FUNCTION TABLEAUX AVEC LES FONCTIONS D'ORDRE SUPERIEUR => ECRITURE ACTUELLE

function squareV2(a) {
  return a.map((x) => x * x);
}
console.log(squareV2(t));

function gt10V2(a) {
  return a.filter((x) => x > 10);
}
console.log(gt10V2(t));

function sumV2(a) {
  return a.reduce((x, y) => x + y, 0);
}
console.log(sumV2(t));

// aure exercice non demandé mais pour l'exemple
function voyelles(str) {
  return str.split('').filter((x) => 'aeiouy'.indexOf(x) !== -1).length;
}
console.log(voyelles('je suis en cours'));

function voyelles2(str) {
  return str.split('').filter(isVowel).length;
}
console.log(voyelles2('je suis en cours'));

// AUTRES EXOS

const data1 = [
  { name: 'bob', isTeacher: false },
  { name: 'nico', isTeacher: true },
  { name: 'pedro', isTeacher: true },
];

function isTeacherInData(tab) {
  return tab.some((x) => x.isTeacher);
  // ou => tab.filter( x => x.isTeacher ).length > 0;
}

console.log(`un prof ? => ${isTeacherInData(data1)}`);

const data2 = [13, 22, 31, 11, 37];
const data3 = [13, 2, 31, 11, 37];
function isSup10(data) {
  return data.every((x) => x > 10);
}

console.log(`[13, 22, 31, 11, 37] tous sup à 10 => ${isSup10(data2)}`);
console.log(`[13, 2, 31, 11, 37] tous sup à 10  => ${isSup10(data3)}`);

function findNumberSup30(data) {
  return data.find((x) => x > 30);
}
console.log(`[...]findNumberSup30 => ${findNumberSup30(data2)}`);

const pdg = [{ name: 'Mark' }, { name: 'Bernard' }, { name: 'Indra' }];
const salaire = [544000, 341000, 377000];

function together(tabPdg, tabSalaire) {
  return tabPdg.map((x, i) => ({
    ...x,
    salaire: tabSalaire[i],
  }));
}

console.log(together(pdg, salaire));

const listeInviteConf1 = ['anthony', 'pedro'];
const listeInviteConf2 = ['pedro', 'nico', 'vincent'];

function listeDesInvitesUniquementAUneConf(l1, l2) {
  return l1
    .filter((x) => !l2.includes(x))
    .concat(l2.filter((x) => !l1.includes(x)));
}

console.log(
  listeDesInvitesUniquementAUneConf(listeInviteConf1, listeInviteConf2)
);

function listeDeTousLesInvites(l1, l2) {
  return l1.concat(l2.filter((x) => !l1.includes(x)));
}
console.log(listeDeTousLesInvites(listeInviteConf1, listeInviteConf2));

function listeDesInvitesParticipantAux2Conf(l1, l2) {
  return l1.filter((x) => l2.includes(x));
}
console.log(
  listeDesInvitesParticipantAux2Conf(listeInviteConf1, listeInviteConf2)
);

// EXPRESSIONS REGULIERES

// Reconnaitre une chaine contenant un code postal (5 chiffres).
// /^[0-9]{5}$/
// Reconnaitre une chaine contenant un code postal mais en faisant en sorte que les deux
// premiers chiffres soient entre 01 et 95.
// /^(0[1-9]|[1-8][0-9]|9[1-5])[0-9]{3}$/
// Reconnaitre exactement un numéro de téléphone (le premier chiffre est un 0,
// le suivant un chiffre entre 1 et 7, les 8 autres sont quelconques).
// On peut ajouter un espace, un point ou un tiret entre des groupes de deux chiffres
// (par exemple 01.12.23.34.45)
// /^0[1-7]([-. ]?[0-9]{2}){4}$/

// utilisation d’expression régulière (objet RegExp)
const re = /^0[0-9]{9}$/;
console.log(re.test('0606060606')); // -> true
console.log(re.test('1000')); // -> false

// EXERCICE TP => code runner

// miroir : vérifie si un tableau est symétrique
// miroir([1,2,1,3]) -> false
// miroir ([1,2,1]) -> true
// miroir ([1,2,2,1]) -> true

function miroir(tab) {
  return tab.join('') === tab.reverse().join('');
}

console.log('miroir');
console.log(miroir([]));
console.log(miroir([1, 2, 1]));
console.log(miroir([1, 2, 2, 1]));
console.log(miroir([1, 2, 3, 4]));
console.log(miroir([1, 2, 3, 4, 5]));

// affiche([1,2,3]) -> 1 2 3
// affiche([1,2,[3,4, [5,6,7], 8], 9]) -> 1 2 3 4 5 6 7 8 9
/* function afficheRec(a) {
  let res = '';
  if (typeof a === 'number') {
    res = `${a} `;
  } else {
    for (let i = 0; i < a.length; i += 1) {
      res += afficheRec(a[i]);
    }
  }
  return res;
} */
function afficheRec(tab) {
  let res = '';
  if (Array.isArray(tab)) {
    tab.forEach((x) => {
      res += afficheRec(x);
    });
  } else {
    res += `${tab}`;
  }
  return res;
}
console.log('afficheRec');
console.log(afficheRec([1, 2, 3]));
console.log(afficheRec([1, 2, [3, 4, [5, 6, 7], 8], 9]));

// majuscules("il fait beau") -> Il Fait Beau
function majuscules(str) {
  return str
    .split(' ')
    .map((x) => x.charAt(0).toUpperCase() + x.substr(1).toLowerCase())
    .join(' ');
}

console.log(majuscules('il fait beAu'));

// alpha : retourne une chaine avec toutes les lettres dans l’ordre alphabétique.
// alpha("je suis en cours") -> ceeijnorsssuu
function alpha(str) {
  return str.split('').sort().join('').trim();
}

console.log(`alpha => ${alpha('je suis en cours')}`);

// anagramme : teste si deux chaines sont anagrammes l’une de l’autre
// anagramme("chien", "niche") -> true
// anagramme("chien", "maison") -> false
function anagramme(str1, str2) {
  return alpha(str1) === alpha(str2);
}

console.log(`anagrame chien, niche => ${anagramme('chien', 'niche')}`);
console.log(`anagrame chien, niche => ${anagramme('chien', 'maison')}`);
// isEmail : teste si une chaine de caractère est une adresse email correcte
// (on supposera qu’une adresse est composée d’une suite de lettres et de chiffres,
// puis d’une @, puis d’une suite de lettres contenant un .)

// isEmail("test@test.com") -> true
// isEmail("test@test") -> false (pas de point)
// isEmail("testtest.com") -> false (pas d’@)
function isEmail(str) {
  const re1 = /^[a-z0-9]+@[a-z]+\.[a-z]+/;
  return re1.test(str);
}

console.log(isEmail('test@test.com'));
console.log(isEmail('test@test'));
console.log(isEmail('testtest.com'));

// converts a letter to an ascii code
function c2a(s) {
  return s.charCodeAt(0);
}

// converts an ascii code to a letter
function a2c(a) {
  return String.fromCharCode(a);
}

function caesar(str, cle) {
  const a = c2a('a');
  return str
    .split('')
    .map((char) => {
      if (char >= 'a' && char <= 'z') {
        return a2c(((c2a(char) - a + cle) % 26) + a);
      }
      return char;
    })
    .join('');
}

console.log(caesar('a', 1));
console.log(caesar('barfoo', 3));
console.log(caesar('world, say hello!', 12));
