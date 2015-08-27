<?php declare(strict_types=1);

namespace ajf\NATO;

class Encoder
{
    private /* array<string, string> */ $letters = Mappings\NATOLetters;
    private /* array<string, string> */ $digits = Mappings\FAADigits;
    private /* bool */ $errorOnNonASCII = TRUE;

    public function setLetterMapping(array/*<string, string>*/ $letters) /* : void */ {
        $this->letters = $letters;
    }

    public function setDigitMapping(array /*<string, string>*/$digits) /* : void */ {
        $this->digits = $digits;
    }

    public function enableErrorsOnNonASCII(bool $enabled) {
        $this->errorOnNonASCII = $enabled;
    }

    public function encode(string $input) {
        $output = "";
        $prevc = NULL;

        for ($i = 0; $i < \strlen($input); $i++) {
            $c = $input[$i];

            if ("\x7f" < $c) {
                if ($this->errorOnNonASCII) {
                    throw new \Exception("Error at position $i: non-ASCII byte '$c'");
                }
            } else {
                $c = strtolower($c);
            }

            $replacement = $this->letters[$c] ?? $this->digits[$c] ?? NULL;

            if ($replacement !== NULL
                // Decimal point only valid for digits
                && !($c === "." && $replacement === ($this->digits[$c] ?? NULL)
                    && !ctype_digit($prevc))) {
                // Insert spaces at word boundaries
                if ($prevc !== NULL && !ctype_space($prevc) && !ctype_punct($prevc)
                    || ($prevc === '.' && ctype_digit($c))) {
                    $output .= ' ';
                }
                $output .= $replacement;
            } else {
                $output .= $c;
            }

            $prevc = $c;
        }

        return $output;
    }
}
