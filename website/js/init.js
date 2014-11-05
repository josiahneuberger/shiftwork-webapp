/*
	Read Only by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
*/
/*
	Modified by Designaquark Josiah Neuberger
	original file can be find under the assets folder.
*/
(function($) {



	skel.init({
		reset: 'full',
		breakpoints: {
			global: { href: 'css/style.css', containers: '45em', grid: { gutters: { vertical: '2em', horizontal: 0 } } },
			xlarge: { media: '(max-width: 1680px)', href: 'css/style-xlarge.css' },
			large: { media: '(max-width: 1280px)', href: 'css/style-large.css', containers: '42em', grid: { gutters: { vertical: '1.5em' } }, viewport: { scalable: false } },
			medium: { media: '(max-width: 1024px)', href: 'css/style-medium.css', containers: '85%', grid: { collapse: 1 } },
			small: { media: '(max-width: 736px)', href: 'css/style-small.css', containers: '90%', grid: { gutters: { vertical: '1.25em' } } },
			xsmall: { media: '(max-width: 480px)', href: 'css/style-xsmall.css', grid: { collapse: 2 } }
		},
		plugins: {
			layers: {
				titleBar: {
					breakpoints: 'medium',
					width: '100%',
					height: 44,
					position: 'top-left',
					side: 'top',
					html: '	<span class="toggle" data-action="toggleLayer" data-args="sidePanel"></span><span class="title" data-action="copyText" data-args="logo"></span>'
				},
				sidePanel: {
					breakpoints: 'medium',
					hidden: true,
					width: { small: 400, medium: '30em' },
					height: '100%',
					animation: 'pushX',
					position: 'top-right',
					side: 'right',
					orientation: 'vertical',
					clickToHide: true,
					html: '<div data-action="moveElement" data-args="header"></div>'
				}
				
			}
		}
		
	});
	


	$(function() {
		
		var $body = $('body'),
			$header = $('#header'),
			$nav = $('#main-nav'), $nav_a = $nav.find('a'),
			$wrapper = $('#wrapper');

		// Forms (IE<10).
			var $form = $('form');
			if ($form.length > 0) {
				
				$form.find('.form-button-submit')
					.on('click', function() {
						$(this).parents('form').submit();
						return false;
					});
		
				if (skel.vars.IEVersion < 10) {
					$.fn.n33_formerize=function(){var _fakes=new Array(),_form = $(this);_form.find('input[type=text],textarea').each(function() { var e = $(this); if (e.val() == '' || e.val() == e.attr('placeholder')) { e.addClass('formerize-placeholder'); e.val(e.attr('placeholder')); } }).blur(function() { var e = $(this); if (e.attr('name').match(/_fakeformerizefield$/)) return; if (e.val() == '') { e.addClass('formerize-placeholder'); e.val(e.attr('placeholder')); } }).focus(function() { var e = $(this); if (e.attr('name').match(/_fakeformerizefield$/)) return; if (e.val() == e.attr('placeholder')) { e.removeClass('formerize-placeholder'); e.val(''); } }); _form.find('input[type=password]').each(function() { var e = $(this); var x = $($('<div>').append(e.clone()).remove().html().replace(/type="password"/i, 'type="text"').replace(/type=password/i, 'type=text')); if (e.attr('id') != '') x.attr('id', e.attr('id') + '_fakeformerizefield'); if (e.attr('name') != '') x.attr('name', e.attr('name') + '_fakeformerizefield'); x.addClass('formerize-placeholder').val(x.attr('placeholder')).insertAfter(e); if (e.val() == '') e.hide(); else x.hide(); e.blur(function(event) { event.preventDefault(); var e = $(this); var x = e.parent().find('input[name=' + e.attr('name') + '_fakeformerizefield]'); if (e.val() == '') { e.hide(); x.show(); } }); x.focus(function(event) { event.preventDefault(); var x = $(this); var e = x.parent().find('input[name=' + x.attr('name').replace('_fakeformerizefield', '') + ']'); x.hide(); e.show().focus(); }); x.keypress(function(event) { event.preventDefault(); x.val(''); }); });  _form.submit(function() { $(this).find('input[type=text],input[type=password],textarea').each(function(event) { var e = $(this); if (e.attr('name').match(/_fakeformerizefield$/)) e.attr('name', ''); if (e.val() == e.attr('placeholder')) { e.removeClass('formerize-placeholder'); e.val(''); } }); }).bind("reset", function(event) { event.preventDefault(); $(this).find('select').val($('option:first').val()); $(this).find('input,textarea').each(function() { var e = $(this); var x; e.removeClass('formerize-placeholder'); switch (this.type) { case 'submit': case 'reset': break; case 'password': e.val(e.attr('defaultValue')); x = e.parent().find('input[name=' + e.attr('name') + '_fakeformerizefield]'); if (e.val() == '') { e.hide(); x.show(); } else { e.show(); x.hide(); } break; case 'checkbox': case 'radio': e.attr('checked', e.attr('defaultValue')); break; case 'text': case 'textarea': e.val(e.attr('defaultValue')); if (e.val() == '') { e.addClass('formerize-placeholder'); e.val(e.attr('placeholder')); } break; default: e.val(e.attr('defaultValue')); break; } }); window.setTimeout(function() { for (x in _fakes) _fakes[x].trigger('formerize_sync'); }, 10); }); return _form; };
					$form.n33_formerize();
				}

			}
			
			// Dropdowns.
			$('#main-nav > ul').dropotron({ 
				baseZIndex:			1000,		// Base Z-Index
				menuClass:			'dropotron',// Menu class (assigned to every <ul>)
				expandMode:			'hover',	// Expansion mode ("hover" or "click")
				hoverDelay:			150,		// Hover delay (in ms)
				hideDelay:			1000,		// Hide delay (in ms; 0 disables)
				openerClass:		'opener',	// Opener class
				openerActiveClass:	'active',	// Active opener class
				submenuClassPrefix:	'level-',	// Submenu class prefix
				mode:				'fade',		// Menu mode ("instant", "fade", "slide", "zoom")
				speed:				'fast',		// Menu speed ("fast", "slow", or ms)
				easing:				'linear',	// Easing mode ("swing", "linear")
				alignment:			'center',		// Alignment ("left", "center", "right")
				offsetX:			-300,			// Submenu offset X
				offsetY:			0,			// Submenu offset Y
				globalOffsetY:		0,			// Global offset Y
				IEOffsetX:			-300,			// IE Offset X
				IEOffsetY:			0,			// IE Offset Y
				noOpenerFade:		true,		// If true and mode = "fade", prevents top-level opener fade.
				detach:				false,		// Detach second level menus (prevents parent style bleed).
				cloneOnDetach:		false		// If true and detach = true, leave original menu intact.
			});
			
			//Create the schedules, this must go in init or it is called multiple times from skel.
			for (z=1; z<=4; z++) {
				table = document.createElement("TABLE");
				table.className = "table2";
				row = table.insertRow(0);
						
				getSchedule(z, row);
				document.getElementById("calendar" + z).appendChild(table);
			}
			
			
		/*// Header.
			var ids = [];

			// Set up nav items.
				$nav_a
					.scrolly()
					.on('click', function(event) {
						
						var $this = $(this),
							href = $this.attr('href');
						
						// Not an internal link? Bail.
							if (href.charAt(0) != '#')
								return;
						
						// Prevent default behavior.
							event.preventDefault();
						
						// Remove active class from all links and mark them as locked (so scrollzer leaves them alone).
							$nav_a
								.removeClass('active')
								.addClass('scrollzer-locked');
					
						// Set active class on this link.
							$this.addClass('active');
					
					})
					.each(function() {
					
						var $this = $(this),
							href = $this.attr('href'),
							id;
						
						// Not an internal link? Bail.
							if (href.charAt(0) != '#')
								return;
						
						// Add to scrollzer ID list.
							id = href.substring(1);
							$this.attr('id', id + '-link');
							ids.push(id);
						
					});
			
			// Initialize scrollzer.
				$.scrollzer(ids, { pad: 300, lastHack: true });*/
		
	});

})(jQuery);