<?php

declare(strict_types=1);

namespace Meanz3\OpenSource;

use IvoPetkov\HTML5DOMDocument;
class Api {
    public function scrapUrl() :string {
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

        return $spells;
    }
}