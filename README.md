PrestigeSEO | JSON-LD Structured Data Markup
==================================

<strong>Author</strong> :  <a href="http://viaprestige-agency.com" target="_blanc">Viaprestige Web Agency</a><br>
<strong>Package</strong> :  PrestigeSEO | JSON-LD Structured Data Markup class<br>
<strong>Version</strong> :  1.0 Stable release<br>
<strong>schema.org</strong> :  https://schema.org/<br>
<strong>Date</strong>:  29/12/2015<br>

----------

Summary
-----------------------

<ul>
<li><a href="#History">History</a></li>
<li><a href="#the-bases">The bases</a></li>
<li><a href="#the-work-space">The Work Space</a></li>
<li><a href="#functionalities">Functionalities</a></li>
<li><a href="#upcoming">Upcoming</a></li>
<li><a href="#compatibility">Compatibility</a></li>
<li><a href="#requirements">Requirements</a></li>
<li><a href="#components">Components</a></li>
<li><a href="#installation">Installation</a></li>
<li><a href="#debugin">Debugin</a></li>
</ul>

----------

**PrestigeSEO** is an other simple & cute PHP plugin, that generate automatically **JSON-LD Structured Data Markup** for your website, using the <a href="https://developers.facebook.com/docs/graph-api" target="_blank">schema.org vocabulary </a>.
PrestigeSEO is created specially for <a href="https://wordpress.org/" target="_blanc">WordPress</a>, under <a href="http://theme-fusion.com/avada/" target="_blanc">Avada</a> template.

History
-----------------------

Read this <a href="https://developers.google.com/structured-data/" target="_blanc">Article</a>.

----------


The bases
-----------------------

Take a look at <a href="https://schema.org/docs/gs.html">This</a>.


The Work Space
-----------------------

We choose WordPress as the best work space for our plugin, and we made it **100% compatible** with Avada & Wp-rocket.


----------


Functionalities
-----------------------

 - Generate **Structured Data** for <a href="https://developers.google.com/structured-data/customize/overview" target="_blanc">Homepage</a>.
 - Generate **Structured Data** for <a href="https://developers.google.com/structured-data/customize/overview" target="_blanc">Article</a>.
 - Generate **Structured Data** for <a href="https://developers.google.com/structured-data/customize/contact-points" target="_blanc">Contact page</a>.
 - Generate **Structured Data** for <a href="https://developers.google.com/structured-data/customize/social-profiles" target="_blanc">Author</a>.



Upcoming
-----------------------
 - Official PrestigeSEO  Wordpress plugin.
 - <a href="https://developers.google.com/structured-data/rich-snippets/reviews" target="_blanc">Rich Snippets</a> for Reviews and Ratings.
 - Rich Snippets for Products.

----------

Compatibility
-------------------

Since <a href="https://wordpress.org/download/" target="_blanc">Wordpress 4.4</a> & <a href="http://themeforest.net/item/avada-responsive-multipurpose-theme/2833226" target="_blanc">Avada 3.9.1</a>

Viasocial startup release is simple & flexible & compatible with popular CMS :<br>
<a href="http://drupalfr.org/" target="_blanc"><img src="http://viaprestige.github.io/Viasocial/img/viasocial_drupal.png" alt="Drupal" style="max-width:100%;"></a> | <a href="https://www.joomla.org/" target="_blanc"><img src="http://viaprestige.github.io/Viasocial/img/viasocial_joomla.png" alt="Joomla!" style="max-width:100%;"></a> | <a href="https://www.prestashop.com/fr/" target="_blanc"><img src="http://viaprestige.github.io/Viasocial/img/viasocial_prestashop.png" alt="Prestashop" style="max-width:100%;"></a> | <a href="http://magento.com/" target="_blanc"><img src="http://viaprestige.github.io/Viasocial/img/viasocial_magento.png" alt="Magento" style="max-width:100%;"></a> | <a href="http://modx.com/" target="_blanc"><img src="http://viaprestige.github.io/Viasocial/img/viasocial_modx.png" alt="Modx" style="max-width:100%;"></a><br>
Depending on your customization.

----------

Fully compatible with popular plugins :<br>
The powerfull cache engine : <a href="http://wp-rocket.me/fr/" target="_blanc">WP Rocket</a><br>

Tested with success with latest WordPress core : <a href="https://github.com/WordPress/WordPress" target="_blanc">v4.5</a>

----------

Requirements
--------------------

 - PHP 5.4
 - Wordpress & Avada updates.

----------

Components
----------------

Viasocial folder :

	.package
	|
	+PrestigeSEO
	|   --- PrestigeSEO.class.php
	|   --- License.txt
	|   --- README.MD
	+-- classes
	|   --- Schema.class.php
	|   --- Wordpress.class.php
	|   --- Avada.class.php
	|   --- Cache.class.php

----------


Installation
----------------

### Startup intagration (developers)
	
1- Create folder named package in template dir

2- Copy Folder PrestigeSEO in package

2- Include the facebook class in your Avada footer.php and make a call to it  :

	include_once(get_template_directory().'/package/PrestigeSEO/PrestigeSEO.class.php');
	
3- Create instance :

	PrestigeSEO\PrestigeSEO::PSEO_run();

----------

Debugin
----------------

https://developers.google.com/structured-data/testing-tool/

----------

FAQ's
----------------

----------

License
----------------
[![License](https://poser.pugx.org/viaprestige/viasocial/license)](https://packagist.org/packages/viaprestige/viasocial)
