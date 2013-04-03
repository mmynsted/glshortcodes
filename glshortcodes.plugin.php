<?php
/**
 * glshortcodes plugin provides shortcodes
 *
 * See http://wiki.habariproject.org/en/Shortcodes
 *
 *
 *  . . . from wiki.habariprojects.org/en/Shortcodes . . .
 *  Shortcodes can be implemented in code in themes or plugins by adding a filter function. 
 * The filter function is named filter_shortcode_{code} where {code} is the name of the shortcode.
 * 
 * To implement the filter for the shortcode [currentdate/], use code like the following:
 * 
 *    function filter_shortcode_currentdate($content, $code, $attrs, $context)
 *    {
 *       return HabariDateTime::date_create()->format(isset($attrs['format']) ? $attrs['format'] : 'M j, Y');
 *    }
 * 
 * The arguments to the filter function include:
 * 
 * $content
 *     The content of the shortcode, including the shortcode tags, that will be replaced. 
 * $code
 *     The text of the shortcode, in this case, "currentdate". This is useful if more than one shortcode is handled by the same function. 
 * $attrs
 *     An array of attributes included in the shortcode. 
 * $context
 *     The content of the shortcode, not including the shortcode tags. *
 *
 *
 *
 *
 **/

class GlShortcodes extends Plugin
{

   /**
    * WARNING: This requires the imagebox plugin
    *
    * expect attrs:
    *  url = the image URL
    *  title = the image title 
    *
    * optional attrs:
    *  width = the image width (defaults to 600)
    *  align = the image align (defaults to center)
    *
    **/  
   function filter_shortcode_lightboximg($content, $code, $attrs, $context = null)
   {

      //if width is set use it as the $imgWidth, else use 600
      $imgWidth = isset($attrs['width']) ?: '600';
      $imgAlign = isset($attrs['align']) ?: 'center';
      $imgURL   = $attrs['url'];
      $imgTitle = $attrs['title'];

      $result = <<<EOF
<div style="text-align:$imgAlign"><a rel="lightbox" href="$imgURL" title="$imgTitle"><img alt="$imgTitle" src="$imgURL" width="$imgWidth"></a>$context</div>
EOF;
      return $result;
   }
}


?>
