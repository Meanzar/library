Installation

```composer require Meanzar\OpenSource```
Local development

```composer install```
```php vendor/bin/phpstan analyse src --level=max```
```php vendor/bin/php-cs-fixer fix src --rules=@PSR12```
```php vendor/bin/phpunit tests```

 Library Documentation
The used library is a PHP-based scraping library that allows extracting data from HTML pages. It provides functionalities to load and manipulate HTML content, as well as interact with page elements.

Installation
The library can be installed via Composer using the following command:

javascript
Copy code
composer require ivopetkov/html5-dom-document-php
Basic Usage
php
Copy code
use IvoPetkov\HTML5DOMDocument;

// Load HTML content
$html = file_get_contents('https://example.com');

// Create an instance of HTML5DOMDocument
$dom = new HTML5DOMDocument();
$dom->loadHTML($html);

// Perform scraping operations on the loaded DOM
$elements = $dom->querySelectorAll('.selector');

// Iterate through the retrieved elements
foreach ($elements as $element) {
    // Manipulate the elements as per your requirements
    $text = $element->textContent;
    echo $text;
}
CSS Selectors
The library supports the use of CSS selectors to target specific elements in the DOM. CSS selectors can be used with the querySelector method to retrieve the first matching element or with the querySelectorAll method to retrieve all matching elements.

Example of using CSS selectors:

php

// Select the first matching element
$element = $dom->querySelector('.selector');

// Select all matching elements
$elements = $dom->querySelectorAll('.selector');
DOM Manipulation
The library also allows manipulating the content of the DOM by adding, modifying, or removing elements.

Examples:

php
Copy code
// Add a new element
$newElement = $dom->createElement('div');
$newElement->textContent = 'New Element';
$dom->appendChild($newElement);

// Modify the content of an existing element
$element = $dom->querySelector('.selector');
$element->textContent = 'New Content';

// Remove an element
$element = $dom->querySelector('.selector');
$element->remove();