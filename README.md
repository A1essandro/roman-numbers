# roman-numbers

[![Build Status](https://travis-ci.org/A1essandro/roman-numbers.svg)](https://travis-ci.org/A1essandro/roman-numbers) [![Coverage Status](https://coveralls.io/repos/A1essandro/roman-numbers/badge.svg?branch=master&service=github)](https://coveralls.io/github/A1essandro/roman-numbers?branch=master)
[![Latest Stable Version](https://poser.pugx.org/a1essandro/roman-numbers/v/stable)](https://packagist.org/packages/a1essandro/roman-numbers) [![Total Downloads](https://poser.pugx.org/a1essandro/roman-numbers/downloads)](https://packagist.org/packages/a1essandro/roman-numbers) [![Latest Unstable Version](https://poser.pugx.org/a1essandro/roman-numbers/v/unstable)](https://packagist.org/packages/a1essandro/roman-numbers) [![License](https://poser.pugx.org/a1essandro/roman-numbers/license)](https://packagist.org/packages/a1essandro/roman-numbers)

Easy conversion int <=> roman numbers

##Requirements
This package is guaranteed supported on PHP 5.3 and above.

##Installing
###Composer
See more [getcomposer.org](http://getcomposer.org).

Execute command 
```
composer require a1essandro/roman-numbers
```

##Usage

###Basic
```php

use NumberFormatter\RomanNumber;

$romanFromInt = new RomanNumber(12);
echo (string)$romanFromInt; // XII
echo $romanFromInt->toInt(); // 12

$romanFromRomat = new RomanNumber('XIX');
echo (string)$romanFromRoman; // XIX
echo $romanFromRoman->toInt(); // 19

```

###Validation

```php

try {
    new RomanNumber($someVariable);
} catch (InvalidStringException $e) {
    //if $someVariable is invalid string (not correct roman number)
} catch (InvalidIntException $e) {
    //if $someVariable is invalid int (for example -1)
} catch (InvalidArgumentException $e) {
    //if $someVariable is not int or string (invalid type)
}

```

