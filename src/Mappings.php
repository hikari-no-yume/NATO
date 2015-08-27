<?php declare(strict_types=1);

namespace ajf\NATO\Mappings;

// https://en.wikipedia.org/wiki/NATO_phonetic_alphabet#Letters
const NATOLetters = [
    'a' => 'Alfa',
    'b' => 'Bravo',
    'c' => 'Charlie',
    'd' => 'Delta',
    'e' => 'Echo',
    'f' => 'Foxtrot',
    'g' => 'Golf',
    'h' => 'Hotel',
    'i' => 'India',
    'j' => 'Juliett',
    'k' => 'Kilo',
    'l' => 'Lima',
    'm' => 'Mike',
    'n' => 'November',
    'o' => 'Oscar',
    'p' => 'Papa',
    'q' => 'Quebec',
    'r' => 'Romeo',
    's' => 'Sierra',
    't' => 'Tango',
    'u' => 'Uniform',
    'v' => 'Victor',
    'w' => 'Whiskey',
    'x' => 'Xray',
    'y' => 'Yankee',
    'z' => 'Zulu'
];

// https://en.wikipedia.org/wiki/NATO_phonetic_alphabet#Letters
const ATISLetters = [
    'a' => 'Alpha',
    'b' => 'Bravo',
    'c' => 'Charlie',
    'd' => 'Delta',
    'e' => 'Echo',
    'f' => 'Foxtrot',
    'g' => 'Golf',
    'h' => 'Hotel',
    'i' => 'India',
    'j' => 'Juliet',
    'k' => 'Kilo',
    'l' => 'Lima',
    'm' => 'Mike',
    'n' => 'November',
    'o' => 'Oscar',
    'p' => 'Papa',
    'q' => 'Quebec',
    'r' => 'Romeo',
    's' => 'Sierra',
    't' => 'Tango',
    'u' => 'Uniform',
    'v' => 'Victor',
    'w' => 'Whiskey',
    'x' => 'Xray',
    'y' => 'Yankee',
    'z' => 'Zulu'
];

// https://en.wikipedia.org/wiki/NATO_phonetic_alphabet#Digits
const FAADigits = [
    '0' => 'Zero',
    '1' => 'One',
    '2' => 'Two',
    '3' => 'Three',
    '4' => 'Four',
    '5' => 'Five',
    '6' => 'Six',
    '7' => 'Seven',
    '8' => 'Eight',
    '9' => 'Niner',
    '.' => 'Point'
];

// https://en.wikipedia.org/wiki/NATO_phonetic_alphabet#Digits
const USMCDigits = [
    '0' => 'Zero',
    '1' => 'Won',
    '2' => 'Too',
    '3' => 'Tree',
    '4' => 'Fo-wer',
    '5' => 'Fife',
    '6' => 'Six',
    '7' => 'Seven',
    '8' => 'Ate',
    '9' => 'Niner',
    '.' => 'Point'  // Not specified by USMC. We use 'Point' here since USMC
                    // is close to FAA in other places, and FAA uses 'Point'.
];

// https://en.wikipedia.org/wiki/NATO_phonetic_alphabet#Digits
const ITUDigits = [
    '0' => 'Nadazero',
    '1' => 'Unaone',
    '2' => 'Bissotwo',
    '3' => 'Terrathree',
    '4' => 'Kartefour',
    '5' => 'Pantafive',
    '6' => 'Soxisix',
    '7' => 'Setteseven',
    '8' => 'Oktoeight',
    '9' => 'Novenine',
    '.' => 'Decimal'
];
