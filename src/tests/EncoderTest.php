<?php declare(strict_types=1);

namespace ajf\NATO;

class EncoderTest extends \PHPUnit_Framework_TestCase
{
    public function testHighByteNoError() {
        $noHighByte = "Damnit Shinji, get in the EVA";

        $explicitFalseEncoder = new Encoder;
        $explicitFalseEncoder->enableErrorsOnNonASCII(FALSE);
        $encoded = $explicitFalseEncoder->encode($noHighByte);

        // No exception should be thrown
    }

    /**
     * @expectedException Exception
     */
    public function testHighByteError() {
        $highByte = "Félicitations! Félicitations! Félicitations!";

        $plainEncoder = new Encoder;
        $encoded = $plainEncoder->encode($highByte);
    }


    /**
     * @expectedException Exception
     */
    public function testHighByteError2() {
        $highByte = "おめでとう！おめでとう！おめでとう！";

        $explicitTRUEEncoder = new Encoder;
        $explicitTRUEEncoder->enableErrorsOnNonASCII(TRUE);
        $encoded = $explicitTRUEEncoder->encode($highByte);
    }

    public function testLetterMappings() {
        $testText = "AJ-AJ";

        $plainEncoder = new Encoder;
        $NATOEncoder = new Encoder;
        $NATOEncoder->setLetterMapping(Mappings\NATOLetters);
        $ATISEncoder = new Encoder;
        $ATISEncoder->setLetterMapping(Mappings\ATISLetters);

        $this->assertEquals("Alfa Juliett-Alfa Juliett",
            $plainEncoder->encode($testText));
        $this->assertEquals("Alfa Juliett-Alfa Juliett",
            $NATOEncoder->encode($testText));
        $this->assertEquals("Alpha Juliet-Alpha Juliet",
            $ATISEncoder->encode($testText));
    }

    public function testDigitMappings() {
        $testText = "012345.6789";

        $plainEncoder = new Encoder;
        $FAAEncoder = new Encoder;
        $FAAEncoder->setDigitMapping(Mappings\FAADigits);
        $USMCEncoder = new Encoder;
        $USMCEncoder->setDigitMapping(Mappings\USMCDigits);
        $ITUEncoder = new Encoder;
        $ITUEncoder->setDigitMapping(Mappings\ITUDigits);

        $this->assertEquals(
            "Zero One Two Three Four Five Point Six Seven Eight Niner",
            $plainEncoder->encode($testText)
        );
        $this->assertEquals(
            "Zero One Two Three Four Five Point Six Seven Eight Niner",
            $FAAEncoder->encode($testText)
        );
        $this->assertEquals(
            "Zero Won Too Tree Fo-wer Fife Point Six Seven Ate Niner",
            $USMCEncoder->encode($testText)
        );
        $this->assertEquals(
            "Nadazero Unaone Bissotwo Terrathree Kartefour Pantafive Decimal Soxisix Setteseven Oktoeight Novenine",
            $ITUEncoder->encode($testText)
        );
    }

    public function testMixed() {
        $testText = "Hello world! 3.141592 is PI. A B C";
        $encoder = new Encoder;

        $this->assertEquals(
            "Hotel Echo Lima Lima Oscar Whiskey Oscar Romeo Lima Delta! Three Point One Four One Five Niner Two India Sierra Papa India. Alfa Bravo Charlie",
            $encoder->encode($testText)
        );

        $testText2 = "I love 新世紀エヴァンゲリオン! It's very すけ. Je l'aimé.";
        $tolerantEncoder = new Encoder;
        $tolerantEncoder->enableErrorsOnNonASCII(FALSE);

        $this->assertEquals(
            "India Lima Oscar Victor Echo 新世紀エヴァンゲリオン! India Tango'Sierra Victor Echo Romeo Yankee すけ. Juliett Echo Lima'Alfa India Mikeé.",
            $tolerantEncoder->encode($testText2)
        );
    }
}
