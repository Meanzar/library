<?php

use Meanz3\OpenSource\Api;

use PHPUnit\Framework\TestCase;

class ApiTest extends TestCase
{
    public function testScrapUrl()
    {
        $url = "https://diablo.fandom.com/wiki/Diablo_Wiki";
        $html = file_get_contents($url);

        $dom = new HTML5DOMDocument();
        $dom->loadHTML($html);

        $tabs = $dom->querySelectorAll('.wds-dropdown');
        $spells = [];

        foreach ($tabs as $tab) {
            $classElement = $tab->previousSibling->previousSibling->textContent;
            $className = trim($classElement);
            $spellElements = $tab->querySelectorAll('.mw-parser-output div p');

            foreach ($spellElements as $spellElement) {
                $spellName = $spellElement->textContent;
                $spells[$className][] = $spellName;
            }
        }

        // Vérifier les résultats attendus
        $expectedSpells = [
            'Class1' => ['Spell1', 'Spell2'],
            'Class2' => ['Spell3', 'Spell4'],
            // ...
        ];

        $this->assertEquals($expectedSpells, $spells);
    }
}