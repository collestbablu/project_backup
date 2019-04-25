/**
*	@name							Accordion
*	@descripton						This $mav plugin makes creating accordions pain free
*	@version						1.3
*	@requires						$mav 1.2.6+
*
*	@author							Jan Jarfalk
*	@author-email					jan.jarfalk@unwrongest.com
*	@author-website					http://www.unwrongest.com
*
*	@licens							MIT License - http://www.opensource.org/licenses/mit-license.php
*/

(function($mav){
     $mav.fn.extend({  
         accordion: function() {       
            return this.each(function() {
            	
            	var $mavul = $mav(this);
            	
				if($mavul.data('accordiated'))
					return false;
													
				$mav.each($mavul.find('ul, li>div'), function(){
					$mav(this).data('accordiated', true);
					$mav(this).hide();
				});
				
				$mav.each($mavul.find('span.head'), function(){
					$mav(this).click(function(e){
						activate(this);
						return void(0);
					});
				});
				
				var active = (location.hash)?$mav(this).find('a[href=' + location.hash + ']')[0]:'';

				if(active){
					activate(active, 'toggle');
					$mav(active).parents().show();
				}
				
				function activate(el,effect){
					$mav(el).parent('li').toggleClass('active').siblings().removeClass('active').children('ul, div').slideUp('fast');
					$mav(el).siblings('ul, div')[(effect || 'slideToggle')]((!effect)?'fast':null);
				}
				
            });
        } 
    }); 
})($mav);

$mav(document).ready(function () {
	
	$mav("ul.accordion li.parent").each(function(){
        $mav(this).append('<span class="head"><a href="javascript:void(0)"></a></span>');
      });
	
	$mav('ul.accordion').accordion();
	
	$mav("ul.accordion li.active").each(function(){
		$mav(this).children().next("ul").css('display', 'block');
	});
});