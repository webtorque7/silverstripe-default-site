(function($){

    $(document).ready(function(){
        $('.slide-item').cycle({
            fx: 'scrollHorz',
            speed: 1000,
            pager: '.cycle-pager'
        });
    });


	$('wte').entwine(function($){

		/*$('nav').entwine({
			onclick:function(e) {
				e.preventDefault();
				this.hideLinks();
			},
			hideLinks:function() {
				this.find('li a').hide();
			}
		});

		$('nav').hideLinks();*/

		$('ul.entwine-test li').entwine({
			onadd:function() {
				this.css({backgroundColor: 'pink', marginLeft: 0})
			},
			onclick:function(e) {
				e.preventDefault();
				if (this.outerHeight() < 100) {
					this.expand();
				}
				else {
					this.collapse();
				}
			},
			expand:function() {
	          this.animate({height: 150}, {queue: false})
	        },
	        collapse:function() {
	          this.animate({height: 45}, {queue: false})
	        }
		});
	});

})(jQuery);