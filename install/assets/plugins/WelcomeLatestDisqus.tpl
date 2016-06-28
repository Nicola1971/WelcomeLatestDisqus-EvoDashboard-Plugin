//<?php
/**
 * WelcomeLatestDisqus
 *
 * Latest Disqus Comments widget for EvoDashboard
 *
 * @author    Nicola Lambathakis http://www.tattoocms.it/
 * @category    plugin
 * @version    3.0 RC
 * @license	 http://www.gnu.org/copyleft/gpl.html GNU Public License (GPL)
 * @internal    @events OnManagerWelcomeHome,OnManagerMainFrameHeaderHTMLBlock
 * @internal    @installset base
 * @internal    @modx_category Dashboard
 * @internal    @properties  &WidgetTitle=Widget Title:;string;RSS Reader &FeedUrl=Rss url:;string;http://www.tattoocms.it/feed.rss &rssitemsnumber=Feed items number:;string;3 &datarow=widget row position:;list;1,2,3,4,5,6,7,8,9,10;1 &datacol=widget col position:;list;1,2,3,4;1 &datasizex=widget x size:;list;1,2,3,4;4 &datasizey=widget y size:;list;1,2,3,4,5,6,7,8,9,10;2
 * /
 
/**
 * WelcomeLatestDisqus RC 3.0
 * author Nicola Lambathakis http://www.tattoocms.it/
 *
 * Latest Disqus Comments widget for EvoDashboard
 * Event: OnManagerWelcomeHome,OnManagerMainFrameHeaderHTMLBlock
&WidgetTitle=Widget Title:;string;Latest Disqus Comments &DisqusDomain=Disqus domain name (ie: tattoocms):;string;tattoocms &DisqusApiKey=Disqus Public Key:;string;S95vswe6x8aXZRojcr5ZY9x0e4FNW48a1ZSfKMvUbEgc45kbzIxAN0llIb1mHwBq &num_items=Number of comments to show in the widget:;string;5 &datarow=widget row position:;list;1,2,3,4,5,6,7,8,9,10;1 &datacol=widget col position:;list;1,2,3,4;1 &datasizex=widget x size:;list;1,2,3,4;4 &datasizey=widget y size:;list;1,2,3,4,5,6,7,8,9,10;2

*/
// Run the main code
include($modx->config['base_path'].'assets/plugins/welcomedisqus/welcomedisqus.php');