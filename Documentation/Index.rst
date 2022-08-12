.. include:: /Includes.rst.txt

=========================
FontAwesome Icon Provider
=========================

:Extension key:
   fontawesome_provider

:Package name:
   friendsoftypo3/fontawesome-provider

:Version:
   |release|

:Language:
   en

:Author:
   TYPO3 Core Team & Contributors

:License:
   This document is published under the
   `Creative Commons BY 4.0 <https://creativecommons.org/licenses/by/4.0/>`__
   license.

:Rendered:
   |today|

----

Adds the :php:`FontawesomeIconProvider` introduced in TYPO3 v7. FontAwesome was
removed in TYPO3 v12 and was extracted into a separate extension.

----

**Table of Contents:**

.. contents::
   :backlinks: top
   :depth: 2
   :local:

Installation
============

The latest version can be installed via `TER`_ or via composer by running

.. code-block:: bash

   composer require friendsoftypo3/fontawesome-provider

in a TYPO3 v11+ installation.

.. _TER: https://extensions.typo3.org/extension/fontawesome_provider

Inside the logic
================

The class :php:`\TYPO3\CMS\Core\Imaging\IconProvider\FontawesomeIconProvider` is
extracted into a new namespace :php:`\FriendsOfTYPO3\FontawesomeProvider\Imaging\IconProvider\FontawesomeIconProvider::class`.

A Composer class map is in place which ensures compatibility when using the old
class name.

For compatibility reasons, this extension is installable in TYPO3 v11 already.
If installed in TYPO3 v12, additional CSS is loaded that provides the
:css:`fa-*` classes.

Usage
=====

To register icons from FontAwesome create a file called
:file:`Configuration/Icons.php` in your extension (if it does not exist yet):

.. code-block:: php
   :caption: EXT:your_extension/Configuration/Icons.php

   <?php
   return [
       // Icon identifier
       'myfontawesomeicon' => [
           'provider' => \FriendsOfTYPO3\FontawesomeProvider\Imaging\IconProvider\FontawesomeIconProvider::class,
           // The FontAwesome icon name
           'name' => 'spinner',
           // All icon providers provide the possibility to register an icon that spins
           'spinning' => true,
       ],
   ];

Visit the :ref:`t3coreapi:icon` chapter in TYPO3 Explained for more information
about icon registration.

Current state
=============

The latest version here reflects a feature-complete state, and solely acts as a
compatibility layer for extensions and installations in need of this legacy
feature.

Contribution
============

Feel free to submit any pull request, or add documentation, tests, as you please.
We will publish a new version every once in a while, depending on the amount of
changes and pull requests submitted.

License
=======

The extension is published under GPL v2+, all included third-party libraries are
published under their respective licenses.
