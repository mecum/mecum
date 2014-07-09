Expand
=============================

Expand is an dynamic extension system. 

It's helpful for easily add some methods of extension to an object during the PHP execution process.

Prerequisites
----------

* `PHP`_ 5.4 or greater.

Installation
----------

The recommended way to install Expand is through `Composer`_.

First, add Expand to the list of dependencies inside your `composer.json`:

.. code-block:: json

    {
        "require": {
            "mecum/expand": "1.0.*"
        }
    }

Then simply install it with composer:

.. code-block:: batch

    $> composer install --prefer-dist

Continuous integration
----------
This project is automatically tested on the `Travis CI`_ plateform.

See below the status of the last dev build :

.. image:: https://travis-ci.org/mecum/expand.svg?branch=1.0.0

Tests
----------

To run the test suite, you need `Composer`_:


Linux :

.. code-block:: bash

    $> php composer.phar install --dev
    $> vendor/bin/phpunit
    
Windows :

Launch the batch files ``dev/composer.bat`` and ``dev/phpunit.bat``
    
License
----------

Mecum is licensed under the MIT license.

For the full copyright and license information, please view the `LICENSE`_.

.. _LICENSE:             https://github.com/mecum/expand/blob/master/LICENSE
.. _PHP:                 http://www.php.net/
.. _Composer:            http://getcomposer.org
.. _Travis CI:           https://travis-ci.org
