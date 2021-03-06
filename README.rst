Mecum
=============================

This is the Mecum's all inclusive package.

You can see each component package for more informations :

* `Expand`_ : The dynamic extension system
* `Unify`_ : The data manipulation framework

Prerequisites
----------

* PHP 5.4 or greater.

Installation
----------

The recommended way to install all Mecum's components is through `Composer`_.

First, add Mecum to the list of dependencies inside your `composer.json`:

.. code-block:: json

    {
        "require": {
            "mecum/mecum": "1.0.*"
        }
    }

Then simply install it with composer:

.. code-block:: batch

    $> composer install --prefer-dist
	
Continuous integration
----------
This project is automatically tested on the `Travis CI`_ plateform.

See below the status of the last dev build :

.. image:: https://travis-ci.org/mecum/mecum.svg?branch=master

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

.. _Expand:              https://github.com/mecum/expand
.. _Unify:               https://github.com/mecum/unify
.. _LICENSE:             https://github.com/mecum/mecum/blob/master/LICENSE
.. _Composer:            http://getcomposer.org
.. _Travis CI:           https://travis-ci.org
