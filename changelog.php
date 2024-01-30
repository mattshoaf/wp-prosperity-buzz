*** WP-Prosperity Buzz Changelog ***
/*-------------------------------------------------------*/
// version 3.0.3 (4/13/2021) - 3.0.10 (1/29/2024)
/*-------------------------------------------------------*/
1. FontAwsome Updated
2. PHP 8 compatility
3. MetaBox fix
4. GitHub authentication removed

/*-------------------------------------------------------*/
// 1/26/2021 - version 3
/*-------------------------------------------------------*/
1. Updated some depreciated jQuery functions
2. Updated jQuery to 1.12 from 1.8
3. Added jQuery migrate as a dependency
4. Version 3.0.1 changes theme updater to use Github

*** WP-Prosperity Changelog ***

/*-------------------------------------------------------*/
// 12/09/2015 - Version 2.6.1
/*-------------------------------------------------------*/
1. Fixed comment form bug that arose with release of WordPress 4.4.

FILES MODIFED
--------------------
1. style.css

/*-------------------------------------------------------*/
// 09/04/2015 - Version 2.6
/*-------------------------------------------------------*/

KEY CHANGES
--------------------

1. Adjusted $content_width variable to allow more flexibility in sizing images with WordPress Media Settings.
2. Updated code in theme-widgets.php to align with changes in Wordpress 4.3.
3. Added WP Prosperity Shortcode Generator to WordPress editor.
4. Added WP Prosperity Recipe Management Options to Add Post/Page screen.
5. Added styled Recipe Box for Posts and Pages.
6. Optimized code for better presentation of Stuctured Data Markup.
7. Improved texarea form fields on Theme Settings page to make form data wrap instead of overflow the field.
8. Add thubnail images to Site Map and 404 page templates.
9. Added ability to hide individual Header items on a Page or Post (rather than simply the entire Header).
10. Added option to display Instagram image widget above site footer (requires WP Instagram Widget plugin).
11. Updated FontAwesome icon font to version 4.4.
12. Fixed bug in Footer of Landing Page template.
13. Optimized Site Title for better SEO (i.e. site title wrapped in h1 tag on home page only).
14. Optimized print stylesheet for better print presentation.
15. Optimized woocommerce stylesheet for better mobile presentation or cart and checkout.
16. Update wp-prosperity.mo file to reflect added functionality.
17. Several minor bugfixes.

FILES MODIFIED
--------------------
* All files modified.

FILES ADDED
--------------------
1. recipe-info.php
2. theme-metaboxes-recipes.php
3. theme-scgen.php
4. /images/scgen.png
5. /images/scgen1.png
6. /images/scgen2.png

/*-------------------------------------------------------*/
// 02/03/2015 - Version 2.5
/*-------------------------------------------------------*/

KEY CHANGES
--------------------
1. Added function to allow one-click theme updates from WordPress Dashboard.
2. Optimized styling for Alternate Narrow Content Slider thumbnail navigation. 
3. Optimized styling for Woocommerce cart button and checkout pages. 
4. Added WP-Prosperity Author widget.

FILES MODIFIED
--------------------
* style.css 
* theme-admin.php
* theme-widgets.php
* woocommerce.css

/*-------------------------------------------------------*/
// 02/03/2015 - Version 2.4.1
/*-------------------------------------------------------*/

FILES MODIFIED
--------------------
* theme-widgets.php - bug fix in WP-Prosperity Text widget.


/*-------------------------------------------------------*/
// 02/02/2015 - Version 2.4
/*-------------------------------------------------------*/

FILES MODIFIED
--------------------
* bootstrap.min.css - updated Bootsrap to version 3.3.1.
* featured-2.php - various code optimizations.
* featured-pages.php - various code optimizations.
* featured-slides.php - various code optimizations.
* featured-wide.php - various code optimizations.
* flexslider.css - various code optimizations.
* footer.php - removed Genericon icon from backtotop function.
* fonts/font-awesome - updated fontawesome to version 4.3; replaced entire folder.
* functions.php
	- fixed Related Posts bug.
	- added WP 4.1 Title tag function; 
	- added Read More Button function.
* header.php - code optimization; added WP 4.1 Title tag function.
* index1.php - code optimization.
* index2.php - code optimization.
* index-blog.php - code optimization.
* index-portfolio.php - code optimization.
* page-archive-images.php - code optimization.
* shortcodes.css - code optimization and added code for Wide Content Box non-parallax background image.
* style.css 
	- added code for mobile nav menus to display "MENU" next to icon; updated version.
	- modified styling for Buttons and Button shbortcode.
	- modified styling for Search widget.
	- fixed Related Posts bug.
* theme-images.php 
	- changed large thumbnail size to 740x493 for higher quality images.
	- added option to hide thumbnail nav on Gallery Slider.
* theme-js.php - optimized code; updated Bootstrap to version 3.3.1.
* theme-metaboxes.php - added option to hide Single Post Featured Image in WP-Prosperity Post Options.
* theme-metaboxes-page.php - added option to hide Single Page Featured Image in WP-Prosperity Page Options.
* theme-options.php 
	- added option to hide thumbnails on Gallery Slider.
	- added new Theme Settings for Button Colors.
	- added option in Theme Settings to convert Read More link to a button.
* theme-shortcodes.php 
	- fixed background-image bug in Widecontent shortcode.
	- fixed minor bug in Icon Box shortcode.
	- added options to Wide Content Shortcode for non-parallax background images.
	- added Posts by Category shortcode.
* theme-styles.php 
	- modified code to allow for standard web fonts.
	- removed Genericons font.
	- updated FontAwesome to version 4.3.0.
	- updated Bootstrap to version 3.3.1.
	- added new Theme Settings for Button Colors.
* theme-widgets.php 
	- fixed background-image bug in WP-Prosperity Text Widget.
	- fixed bug that prevented WordPress Customizer from functioning properly.
* /js/bootstrap.min.js - updated Bootsrap to version 3.3.1.
* /vafpress-framework/data/gwf.json - added standard web-safe fonts - arial, helvetica, georgia, rockwell, times, cambria, verdana, geneva, tahoma, trebuchet, calibri, impact.

FILES ADDED
--------------------
* /images/blank.gif - added file to support wide content shortcode and widget.

FILES REMOVED
--------------------
* /fonts/genericons - removed entire folder.


/*-------------------------------------------------------*/
// 12/17/2014 - Version 2.3
/*-------------------------------------------------------*/

FILES ADDED
--------------------
* Added /images/rel-default.jpg - default image for Related Posts function. 

FILES MODIFIED
--------------------
* content.php - moved Related Posts above entry meta information.
* functions.php - modified Entry Meta Bottom function to fix Read More link bug.
* functions.php - added post title and excerpt to Related Posts function.
* index-masonry.php - modified category filter code for masonry and portfolio templates.
* index-portfolio.php - modified category filter code for masonry and portfolio templates.
* index-portfolio.php - added ability to show Pages in Portfolio.
* js/functions.js - updated Gallery Slider javascript to make it work more effective for images that are inconsistent size.
* single.php - moved Related Posts above entry meta information.
* style.css - modified category filter CSS code for masonry and portfolio templates.
* style.css - added CSS code for tabs widget in Footer Widgets area.
* style.css - added CSS code for using Pages in the Portfolio.
* style.css - modified CSS code for to fix bottom entry-meta overflow bug.
* style.css - added CSS code for Related Posts function.
* theme-images.php - added default image for Related Posts function.
* theme-metaboxes-page.php - fixed bug for Category Selector - changed from "multiselect" field to "sorter" field.
* theme-options.php - added options for post title, post excerpt and boxed layout to Related Posts function.
* theme-styles.php - fixed bug for color settings on Top Nav, Header Nav and Fixed Nav.
* theme-widgets.php - WP-Prosperity Text Widget - changed label for Bottom Padding field.
* vafpress-framework/classes/site/googlewebfont.php - fixed bug that prevents Google Fonts from working on SSL-based sites.
* vafpress-framework/data/gwf.json - added Google Web Fonts - NTR, Mallanna, Mandali, Halant, Vesper Libre, Karma, Hind, Fira Sans, Source Serif Pro, Ek Mukta, Slabo 27px.



/*-------------------------------------------------------*/
// 09/03/2014 - Version 2.2
/*-------------------------------------------------------*/

FILES ADDED
--------------------
* Added featured-2.php 
* Added featured-wide-2.php

FILES MODIFIED
--------------------
/js/plugins.js 
/languages/wp-prosperity.po 
* bbpress.css
* changelog.php 
* content-top-media.php 
* featured-slides.php 
* flexslider.css 
* functions.php 
* index2.php 
* shortcodes.css 
* style.css 
* theme-admin.php 
* theme-metaboxes-page.php 
* theme-metaboxes.php 
* theme-options.php 
* theme-shortcodes.php 
* theme-sources.php 
* theme-styles.php


/*-------------------------------------------------------*/
// 07/23/2014 - Version 2.1
/*-------------------------------------------------------*/

FILES ADDED
--------------------
* Added featured-slides.php 
* Added theme-metaboxes-slides.php


FILES MODIFIED
--------------------
* 404.php 
* bbpress.css
* changelog.php 
* featured-pages.php 
* featured-tabs.php 
* featured-wide.php 
* featured.php 
* flexslider.css 
* functions.php
* page-sitemap.php 
* shortcodes.css 
* style.css 
* theme-admin.php 
* theme-metaboxes-page.php 
* theme-metaboxes.php 
* theme-options.php 
* theme-shortcodes.php 
* theme-sources.php 
* theme-styles.php 

/*-------------------------------------------------------*/
// 06/16/2014 - Version 2.0
/*-------------------------------------------------------*/

FILES ADDED
--------------------
* Added content-top-media.php. 
* Added License.txt 
* Added page-wide.php 
* Added page-widgetized.php 
* Added site-header.php 
* Added style-print.css
* Added /images/div-shadow.png 
* Added /images/footnav-sep.png
* Added /js/flex-functions.js

FILES MODIFIED
--------------------
* /fonts/font-awesome/ all files in folder modified
* /vafpress-framework/ all files in folder modified
* /js/functions.js 
* /js/plugins.js
* /languages/wp-prosperity.po
* 404.php 
* archive.php 
* bbpress.css 
* changelog.php 
* content.php 
* featured-pages.php 
* featured-tabs.php 
* featured-wide.php 
* featured.php 
* flexslider.css 
* footer-widgets.php 
* footer.php 
* functions.php 
* header.php 
* icons-author.php 
* icons-site.php 
* index-blog.php 
* index-masonry.php 
* index-portfolio.php 
* index1.php 
* index2.php 
* nav-fixed.php 
* nav-header.php 
* nav-topbar.php 
* page-archive-images.php 
* page-archives-by-cat.php 
* page-archives-by-month.php 
* page-authors.php 
* page-blog-1-column.php 
* page-blog-2-column.php 
* page-blog-3-column.php 
* page-blog-4-column.php 
* page-blog-by-cat-stacked.php 
* page-blog-by-cat.php 
* page-featured-pages.php 
* page-masonry-2-column.php 
* page-masonry-3-column.php 
* page-masonry-4-column.php 
* page-portfolio-1-column.php 
* page-portfolio-2-column.php 
* page-portfolio-3-column.php 
* page-portfolio-4-column.php 
* page-sitemap.php 
* page.php 
* searchform.php 
* share.php 
* shortcodes.css 
* single.php 
* style-custom.css 
* style.css 
* theme-admin.php 
* theme-custom-functions.php 
* theme-images.php 
* theme-js.php 
* theme-metaboxes-page.php 
* theme-metaboxes.php 
* theme-options.php 
* theme-shortcodes.php 
* theme-sources.php 
* theme-styles.php 
* theme-widgets.php 
* woocommerce.css

/*-------------------------------------------------------*/
// 03/10/2014 - Version 1.1
/*-------------------------------------------------------*/

FILES ADDED
--------------------
* admin/img/c-sn.jpg
* admin/img/sn-c.jpg
* bbpress.css
* changelog.php
* woocommerce.css

FILES MODIFIED
--------------------
* content.php
* featured-tabs.php
* featured.php
* flexslider.css
* footer.php
* functions.php
* header.php
* index-blog.php
* index1.php
* index2.php
* share.php
* shorcodes.css
* sidebar-narrow.php
* sidebar.php
* single.php
* style-custom.css
* style.css
* theme-images.php
* theme-js.php
* theme-metaboxes-page.php
* theme-metaboxes.php
* theme-options.php
* theme-shortcodes.php
* theme-styles.php

/*-------------------------------------------------------*/
// 02/27/2014 - Version 1.0
/*-------------------------------------------------------*/

* First Logged release.
