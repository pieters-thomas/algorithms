
const MIN_LENGTH = 3;
let word = document.getElementById('target').innerText;
let longest = '';

for (let j = 0; j < word.length; j++) {
    let term = '';
    for (let i = j; i < word.length; i++) {
        term += word.charAt(i);

        if ( term.length >= MIN_LENGTH && term.length > longest.length && term.split('').reverse().join('') === term ) longest = term;
    }
}
alert(longest);




