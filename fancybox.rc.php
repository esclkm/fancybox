<?php

/* ====================
[BEGIN_COT_EXT]
Hooks=rc
[END_COT_EXT]
==================== */

/**
 * FancyBox for Cotonti Siena CMF
 *
 * @version 1.3.4
 * @author Janis Skarnelis, esclkm
 * @copyright (c) 2011 esclkm
 */

defined('COT_CODE') or die('Wrong URL.');

cot_rc_add_file($cfg['plugins_dir'].'/fancybox/fancybox/jquery.fancybox.css');
cot_rc_add_file($cfg['plugins_dir'].'/fancybox/fancybox/jquery.fancybox.js');


$outfancy = '$(document).ready(function() {
 $("a[href]").filter(function() {return /\.(jpg|jpeg|png|gif)$/i.test(this.href);}).attr("rel", "gallery").fancybox({';
$fancyopt = array();
($cfg['plugin']['fancybox']['fancypadding']) && $fancyopt[] = ' "padding" : "'.$cfg['plugin']['fancybox']['fancypadding'].'"';
($cfg['plugin']['fancybox']['fancymargin']) && $fancyopt[] = ' "margin" : "'.$cfg['plugin']['fancybox']['fancymargin'].'"';

($cfg['plugin']['fancybox']['fancymodal']) && $fancyopt[] = ' "modal" : "true"';
($cfg['plugin']['fancybox']['fancycyclic']) && $fancyopt[] = ' "cyclic" : "true"';

($cfg['plugin']['fancybox']['fancywidth']) && $fancyopt[] = ' "width" : "'.$cfg['plugin']['fancybox']['fancywidth'].'"';
($cfg['plugin']['fancybox']['fancyheight']) && $fancyopt[] = ' "height" : "'.$cfg['plugin']['fancybox']['fancyheight'].'"';




($cfg['plugin']['fancybox']['fancyshowclosebutton']) || $fancyopt[] = ' "closeBtn" : "false"';

$outfancy .= implode(', ', $fancyopt);
$outfancy .= '}); });';

cot_rc_add_embed('fancyboxset', $outfancy);
