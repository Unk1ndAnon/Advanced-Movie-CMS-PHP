/* Modernizr 2.6.2 (Custom Build) | MIT & BSD
 * Build: http://modernizr.com/download/#-touch-shiv-cssclasses-teststyles-prefixes-load
 */
;window.Modernizr=function(a,b,c){function w(a){j.cssText=a}function x(a,b){return w(m.join(a+";")+(b||""))}function y(a,b){return typeof a===b}function z(a,b){return!!~(""+a).indexOf(b)}function A(a,b,d){for(var e in a){var f=b[a[e]];if(f!==c)return d===!1?a[e]:y(f,"function")?f.bind(d||b):f}return!1}var d="2.6.2",e={},f=!0,g=b.documentElement,h="modernizr",i=b.createElement(h),j=i.style,k,l={}.toString,m=" -webkit- -moz- -o- -ms- ".split(" "),n={},o={},p={},q=[],r=q.slice,s,t=function(a,c,d,e){var f,i,j,k,l=b.createElement("div"),m=b.body,n=m||b.createElement("body");if(parseInt(d,10))while(d--)j=b.createElement("div"),j.id=e?e[d]:h+(d+1),l.appendChild(j);return f=["&#173;",'<style id="s',h,'">',a,"</style>"].join(""),l.id=h,(m?l:n).innerHTML+=f,n.appendChild(l),m||(n.style.background="",n.style.overflow="hidden",k=g.style.overflow,g.style.overflow="hidden",g.appendChild(n)),i=c(l,a),m?l.parentNode.removeChild(l):(n.parentNode.removeChild(n),g.style.overflow=k),!!i},u={}.hasOwnProperty,v;!y(u,"undefined")&&!y(u.call,"undefined")?v=function(a,b){return u.call(a,b)}:v=function(a,b){return b in a&&y(a.constructor.prototype[b],"undefined")},Function.prototype.bind||(Function.prototype.bind=function(b){var c=this;if(typeof c!="function")throw new TypeError;var d=r.call(arguments,1),e=function(){if(this instanceof e){var a=function(){};a.prototype=c.prototype;var f=new a,g=c.apply(f,d.concat(r.call(arguments)));return Object(g)===g?g:f}return c.apply(b,d.concat(r.call(arguments)))};return e}),n.touch=function(){var c;return"ontouchstart"in a||a.DocumentTouch&&b instanceof DocumentTouch?c=!0:t(["@media (",m.join("touch-enabled),("),h,")","{#modernizr{top:9px;position:absolute}}"].join(""),function(a){c=a.offsetTop===9}),c};for(var B in n)v(n,B)&&(s=B.toLowerCase(),e[s]=n[B](),q.push((e[s]?"":"no-")+s));return e.addTest=function(a,b){if(typeof a=="object")for(var d in a)v(a,d)&&e.addTest(d,a[d]);else{a=a.toLowerCase();if(e[a]!==c)return e;b=typeof b=="function"?b():b,typeof f!="undefined"&&f&&(g.className+=" "+(b?"":"no-")+a),e[a]=b}return e},w(""),i=k=null,function(a,b){function k(a,b){var c=a.createElement("p"),d=a.getElementsByTagName("head")[0]||a.documentElement;return c.innerHTML="x<style>"+b+"</style>",d.insertBefore(c.lastChild,d.firstChild)}function l(){var a=r.elements;return typeof a=="string"?a.split(" "):a}function m(a){var b=i[a[g]];return b||(b={},h++,a[g]=h,i[h]=b),b}function n(a,c,f){c||(c=b);if(j)return c.createElement(a);f||(f=m(c));var g;return f.cache[a]?g=f.cache[a].cloneNode():e.test(a)?g=(f.cache[a]=f.createElem(a)).cloneNode():g=f.createElem(a),g.canHaveChildren&&!d.test(a)?f.frag.appendChild(g):g}function o(a,c){a||(a=b);if(j)return a.createDocumentFragment();c=c||m(a);var d=c.frag.cloneNode(),e=0,f=l(),g=f.length;for(;e<g;e++)d.createElement(f[e]);return d}function p(a,b){b.cache||(b.cache={},b.createElem=a.createElement,b.createFrag=a.createDocumentFragment,b.frag=b.createFrag()),a.createElement=function(c){return r.shivMethods?n(c,a,b):b.createElem(c)},a.createDocumentFragment=Function("h,f","return function(){var n=f.cloneNode(),c=n.createElement;h.shivMethods&&("+l().join().replace(/\w+/g,function(a){return b.createElem(a),b.frag.createElement(a),'c("'+a+'")'})+");return n}")(r,b.frag)}function q(a){a||(a=b);var c=m(a);return r.shivCSS&&!f&&!c.hasCSS&&(c.hasCSS=!!k(a,"article,aside,figcaption,figure,footer,header,hgroup,nav,section{display:block}mark{background:#FF0;color:#000}")),j||p(a,c),a}var c=a.html5||{},d=/^<|^(?:button|map|select|textarea|object|iframe|option|optgroup)$/i,e=/^(?:a|b|code|div|fieldset|h1|h2|h3|h4|h5|h6|i|label|li|ol|p|q|span|strong|style|table|tbody|td|th|tr|ul)$/i,f,g="_html5shiv",h=0,i={},j;(function(){try{var a=b.createElement("a");a.innerHTML="<xyz></xyz>",f="hidden"in a,j=a.childNodes.length==1||function(){b.createElement("a");var a=b.createDocumentFragment();return typeof a.cloneNode=="undefined"||typeof a.createDocumentFragment=="undefined"||typeof a.createElement=="undefined"}()}catch(c){f=!0,j=!0}})();var r={elements:c.elements||"abbr article aside audio bdi canvas data datalist details figcaption figure footer header hgroup mark meter nav output progress section summary time video",shivCSS:c.shivCSS!==!1,supportsUnknownElements:j,shivMethods:c.shivMethods!==!1,type:"default",shivDocument:q,createElement:n,createDocumentFragment:o};a.html5=r,q(b)}(this,b),e._version=d,e._prefixes=m,e.testStyles=t,g.className=g.className.replace(/(^|\s)no-js(\s|$)/,"$1$2")+(f?" js "+q.join(" "):""),e}(this,this.document),function(a,b,c){function d(a){return"[object Function]"==o.call(a)}function e(a){return"string"==typeof a}function f(){}function g(a){return!a||"loaded"==a||"complete"==a||"uninitialized"==a}function h(){var a=p.shift();q=1,a?a.t?m(function(){("c"==a.t?B.injectCss:B.injectJs)(a.s,0,a.a,a.x,a.e,1)},0):(a(),h()):q=0}function i(a,c,d,e,f,i,j){function k(b){if(!o&&g(l.readyState)&&(u.r=o=1,!q&&h(),l.onload=l.onreadystatechange=null,b)){"img"!=a&&m(function(){t.removeChild(l)},50);for(var d in y[c])y[c].hasOwnProperty(d)&&y[c][d].onload()}}var j=j||B.errorTimeout,l=b.createElement(a),o=0,r=0,u={t:d,s:c,e:f,a:i,x:j};1===y[c]&&(r=1,y[c]=[]),"object"==a?l.data=c:(l.src=c,l.type=a),l.width=l.height="0",l.onerror=l.onload=l.onreadystatechange=function(){k.call(this,r)},p.splice(e,0,u),"img"!=a&&(r||2===y[c]?(t.insertBefore(l,s?null:n),m(k,j)):y[c].push(l))}function j(a,b,c,d,f){return q=0,b=b||"j",e(a)?i("c"==b?v:u,a,b,this.i++,c,d,f):(p.splice(this.i++,0,a),1==p.length&&h()),this}function k(){var a=B;return a.loader={load:j,i:0},a}var l=b.documentElement,m=a.setTimeout,n=b.getElementsByTagName("script")[0],o={}.toString,p=[],q=0,r="MozAppearance"in l.style,s=r&&!!b.createRange().compareNode,t=s?l:n.parentNode,l=a.opera&&"[object Opera]"==o.call(a.opera),l=!!b.attachEvent&&!l,u=r?"object":l?"script":"img",v=l?"script":u,w=Array.isArray||function(a){return"[object Array]"==o.call(a)},x=[],y={},z={timeout:function(a,b){return b.length&&(a.timeout=b[0]),a}},A,B;B=function(a){function b(a){var a=a.split("!"),b=x.length,c=a.pop(),d=a.length,c={url:c,origUrl:c,prefixes:a},e,f,g;for(f=0;f<d;f++)g=a[f].split("="),(e=z[g.shift()])&&(c=e(c,g));for(f=0;f<b;f++)c=x[f](c);return c}function g(a,e,f,g,h){var i=b(a),j=i.autoCallback;i.url.split(".").pop().split("?").shift(),i.bypass||(e&&(e=d(e)?e:e[a]||e[g]||e[a.split("/").pop().split("?")[0]]),i.instead?i.instead(a,e,f,g,h):(y[i.url]?i.noexec=!0:y[i.url]=1,f.load(i.url,i.forceCSS||!i.forceJS&&"css"==i.url.split(".").pop().split("?").shift()?"c":c,i.noexec,i.attrs,i.timeout),(d(e)||d(j))&&f.load(function(){k(),e&&e(i.origUrl,h,g),j&&j(i.origUrl,h,g),y[i.url]=2})))}function h(a,b){function c(a,c){if(a){if(e(a))c||(j=function(){var a=[].slice.call(arguments);k.apply(this,a),l()}),g(a,j,b,0,h);else if(Object(a)===a)for(n in m=function(){var b=0,c;for(c in a)a.hasOwnProperty(c)&&b++;return b}(),a)a.hasOwnProperty(n)&&(!c&&!--m&&(d(j)?j=function(){var a=[].slice.call(arguments);k.apply(this,a),l()}:j[n]=function(a){return function(){var b=[].slice.call(arguments);a&&a.apply(this,b),l()}}(k[n])),g(a[n],j,b,n,h))}else!c&&l()}var h=!!a.test,i=a.load||a.both,j=a.callback||f,k=j,l=a.complete||f,m,n;c(h?a.yep:a.nope,!!i),i&&c(i)}var i,j,l=this.yepnope.loader;if(e(a))g(a,0,l,0);else if(w(a))for(i=0;i<a.length;i++)j=a[i],e(j)?g(j,0,l,0):w(j)?B(j):Object(j)===j&&h(j,l);else Object(a)===a&&h(a,l)},B.addPrefix=function(a,b){z[a]=b},B.addFilter=function(a){x.push(a)},B.errorTimeout=1e4,null==b.readyState&&b.addEventListener&&(b.readyState="loading",b.addEventListener("DOMContentLoaded",A=function(){b.removeEventListener("DOMContentLoaded",A,0),b.readyState="complete"},0)),a.yepnope=k(),a.yepnope.executeStack=h,a.yepnope.injectJs=function(a,c,d,e,i,j){var k=b.createElement("script"),l,o,e=e||B.errorTimeout;k.src=a;for(o in d)k.setAttribute(o,d[o]);c=j?h:c||f,k.onreadystatechange=k.onload=function(){!l&&g(k.readyState)&&(l=1,c(),k.onload=k.onreadystatechange=null)},m(function(){l||(l=1,c(1))},e),i?k.onload():n.parentNode.insertBefore(k,n)},a.yepnope.injectCss=function(a,c,d,e,g,i){var e=b.createElement("link"),j,c=i?h:c||f;e.href=a,e.rel="stylesheet",e.type="text/css";for(j in d)e.setAttribute(j,d[j]);g||(n.parentNode.insertBefore(e,n),m(c,0))}}(this,document),Modernizr.load=function(){yepnope.apply(window,[].slice.call(arguments,0))};

// Sidebar

(function($) {
	$(document).ready(function() {
		$.slidebars();
	});
}) (jQuery);

// Dropdown

+function ($) {
  'use strict';

// DROPDOWN CLASS DEFINITION
// =========================

var backdrop = '.dropdown-backdrop'
var toggle   = '[data-toggle="dropdown"]'
var Dropdown = function (element) {
$(element).on('click.bs.dropdown', this.toggle)
}

Dropdown.VERSION = '3.3.5'

function getParent($this) {
var selector = $this.attr('data-target')

if (!selector) {
  selector = $this.attr('href')
  selector = selector && /#[A-Za-z]/.test(selector) && selector.replace(/.*(?=#[^\s]*$)/, '') // strip for ie7
}

var $parent = selector && $(selector)

return $parent && $parent.length ? $parent : $this.parent()
}

function clearMenus(e) {
if (e && e.which === 3) return
$(backdrop).remove()
$(toggle).each(function () {
  var $this         = $(this)
  var $parent       = getParent($this)
  var relatedTarget = { relatedTarget: this }

  if (!$parent.hasClass('open')) return

  if (e && e.type == 'click' && /input|textarea/i.test(e.target.tagName) && $.contains($parent[0], e.target)) return

  $parent.trigger(e = $.Event('hide.bs.dropdown', relatedTarget))

  if (e.isDefaultPrevented()) return

  $this.attr('aria-expanded', 'false')
  $parent.removeClass('open').trigger($.Event('hidden.bs.dropdown', relatedTarget))
})
}

Dropdown.prototype.toggle = function (e) {
var $this = $(this)

if ($this.is('.disabled, :disabled')) return

var $parent  = getParent($this)
var isActive = $parent.hasClass('open')

clearMenus()

if (!isActive) {
  if ('ontouchstart' in document.documentElement && !$parent.closest('.navbar-nav').length) {
    // if mobile we use a backdrop because click events don't delegate
    $(document.createElement('div'))
      .addClass('dropdown-backdrop')
      .insertAfter($(this))
      .on('click', clearMenus)
  }

  var relatedTarget = { relatedTarget: this }
  $parent.trigger(e = $.Event('show.bs.dropdown', relatedTarget))

  if (e.isDefaultPrevented()) return

  $this
    .trigger('focus')
    .attr('aria-expanded', 'true')

  $parent
    .toggleClass('open')
    .trigger($.Event('shown.bs.dropdown', relatedTarget))
}

return false
}

Dropdown.prototype.keydown = function (e) {
if (!/(38|40|27|32)/.test(e.which) || /input|textarea/i.test(e.target.tagName)) return

var $this = $(this)

e.preventDefault()
e.stopPropagation()

if ($this.is('.disabled, :disabled')) return

var $parent  = getParent($this)
var isActive = $parent.hasClass('open')

if (!isActive && e.which != 27 || isActive && e.which == 27) {
  if (e.which == 27) $parent.find(toggle).trigger('focus')
  return $this.trigger('click')
}

var desc = ' li:not(.disabled):visible a'
var $items = $parent.find('.dropdown-menu' + desc)

if (!$items.length) return

var index = $items.index(e.target)

if (e.which == 38 && index > 0)                 index--         // up
if (e.which == 40 && index < $items.length - 1) index++         // down
if (!~index)                                    index = 0

$items.eq(index).trigger('focus')
}


// DROPDOWN PLUGIN DEFINITION
// ==========================

function Plugin(option) {
return this.each(function () {
  var $this = $(this)
  var data  = $this.data('bs.dropdown')

  if (!data) $this.data('bs.dropdown', (data = new Dropdown(this)))
  if (typeof option == 'string') data[option].call($this)
})
}

var old = $.fn.dropdown

$.fn.dropdown             = Plugin
$.fn.dropdown.Constructor = Dropdown


// DROPDOWN NO CONFLICT
// ====================

$.fn.dropdown.noConflict = function () {
$.fn.dropdown = old
return this
}


// APPLY TO STANDARD DROPDOWN ELEMENTS
// ===================================

$(document)
.on('click.bs.dropdown.data-api', clearMenus)
.on('click.bs.dropdown.data-api', '.dropdown form', function (e) { e.stopPropagation() })
.on('click.bs.dropdown.data-api', toggle, Dropdown.prototype.toggle)
.on('keydown.bs.dropdown.data-api', toggle, Dropdown.prototype.keydown)
.on('keydown.bs.dropdown.data-api', '.dropdown-menu', Dropdown.prototype.keydown)

}(jQuery);

// Resize thumbnails

function equalizeHeights(selector) {
	var heights = new Array();

	// Loop to get all element heights
	$(selector).each(function() {

		// Need to let sizes be whatever they want so no overflow on resize
		$(this).css('min-height', '0');
		$(this).css('max-height', 'none');
		$(this).css('height', 'auto');

		// Then add size (no units) to array
 		heights.push($(this).height());
	});

	// Find max height of all elements
	var max = Math.max.apply( Math, heights );
//if(max<279) max=279;
	// Set all heights to max height
	$(selector).each(function() {
		$(this).css('height', max + 'px');
	});
}



function truncateEpisodeDetails() {
	$(".tv-details-episodes-info p").dotdotdot({
		ellipsis	: '... ',
		wrap		: 'word',
		fallbackToLetter: true,
		after		: null,
		watch		: window,
		height		: null,
		tolerance	: 0,
		callback	: function( isTruncated, orgContent ) {},
		lastCharacter	: {
			remove		: [ ' ', ',', ';', '.', '!', '?' ],
			noEllipsis	: []
		}
	});
}

// Filter values

// ABC
var abc = "All";

// Genres Array
var genres = [];

// Sort
var sortby = "Recent";

// Quality
var quality = "All";

// Server selection
var server = "Free";

// Search
var search = $("#search").val();

// Dropdown allow checkboxes

$('.dropdown-menu li label').click(function(event){
	    event.stopPropagation();
});

// Dropdown change

$(".dropdown-menu li").click(function(){

	genres = $('input:checkbox:checked.checkbox').map(function () {
		return this.value.replace(/_/g, ' ');
	}).get();

	var selText = $(this).text();
// 	console.log($(this).parent().attr('class'));
	if ($(this).parent().attr('class') == "dropdown-menu") {
		$(this).parents('.dropdown').find('.dropdown-toggle .value').text(selText);
		$(this).siblings(".active").removeClass("active");
		$(this).addClass("active");
	} else {
		$(this).parents('.dropdown').find('.dropdown-toggle .value').text(genres);
	}

// 	console.log(genres);
// 	console.log($(this).text());
});

$(".abc-filter .dropdown-menu li").click(function() {
	abc = $(this).text();
});

$(".sortby-filter .dropdown-menu li").click(function() {
	sortby = $(this).text();
});

$(".quality-filter .dropdown-menu li").click(function() {
	quality = ($(this).text()).split(' ')[0];
});

$("#server-button .dropdown-menu li").click(function() {
	var selHtml = $(this).html();
	server = $(this).find('.value').text();
	$(this).parents('.dropdown').find('.dropdown-toggle').html(selHtml);
});

// Dropdown (de)select all

$('#selectall').click(function () {
	$('.checkbox').prop('checked', this.checked);
});

$('.checkbox, #selectall').change(function () {

	var check = ($('.checkbox').filter(":checked").length == $('.checkbox').length);
	$('#selectall').prop("checked", check);

	var checked = $(this).text;
	var checkedAmount = $('.checkbox').filter(":checked").length;
	var selectedAmount = checkedAmount + " selected";

	if (checkedAmount == 0) {
		$(this).parents('.dropdown').find('.dropdown-toggle .value').text('Select');
	} else if (checkedAmount > 1 && $('.checkbox').filter(":checked").length == $('.checkbox').length == false) {
		$(this).parents('.dropdown').find('.dropdown-toggle .value').text(selectedAmount);
	} else if ($('.checkbox').not(':checked').length == 0) {
		genres = ["All"];
		selectedAmount = "All";
		$(this).parents('.dropdown').find('.dropdown-toggle .value').text(selectedAmount);
	}

});



// Fade in movies
/*
$(function(){
	$(".item").hide();
	$(".item").each(function(index) {
	    $(this).delay(100*index).fadeIn(300);
	});
});
*/

// Grid/list view

$("#listview").click(function() {
	$(this).parent().addClass("active");
	$("#gridview").parent().removeClass("active");
	$("#content").parent().removeClass("gridview").addClass("listview");
});

$("#gridview").click(function() {
	$(this).parent().addClass("active");
	$("#listview").parent().removeClass("active");
	$("#content").parent().removeClass("listview").addClass("gridview");
});

// TV Show selection

/*
$(".tv-details-seasons ol li").click(function() {
	$(".tv-details-seasons ol li").removeClass("active");
	$(this).addClass("active");
});
*/

// var serverload = find('.server-load');

// TV Episodes

(function($) {

    $('.tv-details').each(function() {

        var id = $('.tv-details-seasons ol li.active').attr('data-tab');
        var selection = $('#'+id);
        var tabs = this;

        $('.tv-details-seasons ol li', this).click(function() {
            $('.tv-details-seasons ol li.active', tabs).removeClass('active');
            $('.tv-details-episodes ol.active').removeClass('active');
            var id = $(this).addClass('active').attr('data-tab');
            var selection = $('#'+id).addClass('active');
            $('.tv-details-episodes').attr('data-active', id);
            $('.tv-details-episodes ol').perfectScrollbar('update');
        });

        $('.tv-details-episodes ol li').click(function() {
	        $('.tv-details-episodes ol li.active').removeClass('active');
	        selectedEpisode = $(this).closest("li");
			selectedEpisode.addClass('active');
        });

    });

})(jQuery);

// Watchlist

$(".watchlist-add, .favorites-add").click(function() {
	$(this).toggleClass("active");
});

function addWatchlist(id) {
	$('.watchlist-add').html('<i class="icon-back-in-time"></i><div id="spinner"><div class="bounce1"></div><div class="bounce2"></div><div class="bounce3"></div></div>');
	setTimeout(function(){
		$('.watchlist-add').html('<i class="icon-check added-watchlist-icon"></i><span>Added to watch list!</span>');
	}, 1500);
	$.ajax({
		url: "/users/addwatchlist",
		type: "POST",
		data: "id="+id,
		cache: false,
	});

	return false;
}

function removeWatchlist(id) {
	$.ajax({
		url: "/users/removewatchlist",
		type: "POST",
		data: "id="+id,
		cache: false,
	});
	return false;
}

$(".watchlist-remove, .favorites-remove").click(function() {
	var removeSelected = $(this).parents(".item");
	removeSelected.addClass("remove");
	console.log($(this).parents(".item"));
	setTimeout(function() {
		removeSelected.remove();
	}, 300);
});

// Favorites

function addFavorite(id) {

	$('.favorites-add').html('<i class="icon-heart-outlined"></i><div id="spinner"><div class="bounce1"></div><div class="bounce2"></div><div class="bounce3"></div></div>');
	setTimeout(function(){
		$('.favorites-add').html('<i class="icon-heart"></i><span>Added to favourites!</span>');
	}, 1500);

	$.ajax({
		url: "/users/addfavorites",
		type: "POST",
		data: "id="+id,
		cache: false,
	});

	return false;
}

function removeFavorite(id) {
	$.ajax({
		url: "/users/removefavorites",
		type: "POST",
		data: "id="+id,
		cache: false,
	});
	return false;
}

// Premium

$(".packages ul li button").click(function() {
	$(".packages ul li button").removeClass("selected");
	$(this).addClass('selected');
});

$("#premium_30").click(function() {
	$(".pricevalue").text("9.99");
	$(".discounted").text("Select a higher package to apply discount").css("font-weight","normal");
});

$("#premium_90").click(function() {
	$(".pricevalue").text("25.49");
	$(".discounted").text("15% Discount").css("font-weight","bold");
});

$("#premium_180").click(function() {
	$(".pricevalue").text("44.99");
	$(".discounted").text("25% Discount").css("font-weight","bold");
});

// Classie

!function(s){"use strict";function e(s){return new RegExp("(^|\\s+)"+s+"(\\s+|$)")}function n(s,e){var n=t(s,e)?c:a;n(s,e)}var t,a,c;"classList"in document.documentElement?(t=function(s,e){return s.classList.contains(e)},a=function(s,e){s.classList.add(e)},c=function(s,e){s.classList.remove(e)}):(t=function(s,n){return e(n).test(s.className)},a=function(s,e){t(s,e)||(s.className=s.className+" "+e)},c=function(s,n){s.className=s.className.replace(e(n)," ")});var o={hasClass:t,addClass:a,removeClass:c,toggleClass:n,has:t,add:a,remove:c,toggle:n};"function"==typeof define&&define.amd?define(o):"object"==typeof exports?module.exports=o:s.classie=o}(window);

// MODAL START

var ModalEffects = (function() {
	function init() {
		var overlay = document.querySelector( '.md-overlay' );
		[].slice.call( document.querySelectorAll( '.md-trigger' ) ).forEach( function( el, i ) {
			var modal = document.querySelector( '#' + el.getAttribute( 'data-modal' ) ),
				close = modal.querySelector( '.md-close' );
			function removeModal( hasPerspective ) {
				classie.remove( modal, 'md-show' );
				if( hasPerspective ) {
					classie.remove( document.documentElement, 'md-perspective' );
				}
			}
			function removeModalHandler() {
				removeModal( classie.has( el, 'md-setperspective' ) );
			}
			el.addEventListener( 'click', function( ev ) {
				classie.add( modal, 'md-show' );
				overlay.removeEventListener( 'click', removeModalHandler );
				overlay.addEventListener( 'click', removeModalHandler );
				if( classie.has( el, 'md-setperspective' ) ) {
					setTimeout( function() {
						classie.add( document.documentElement, 'md-perspective' );
					}, 25 );
				}
			});
			close.addEventListener( 'click', function( ev ) {
				ev.stopPropagation();
				removeModalHandler();
			});
		} );
	}
	init();
})();

// MODAL END

// Login modal

jQuery(document).ready(function($){
	var $form_modal = $('.user-modal'),
		$form_login = $form_modal.find('#login'),
		$form_signup = $form_modal.find('#signup'),
		$form_forgot_password = $form_modal.find('#reset-password'),
		$form_modal_tab = $('.switcher'),
		$tab_login = $form_modal_tab.children('li').eq(0).children('a'),
		$tab_signup = $form_modal_tab.children('li').eq(1).children('a'),
		$forgot_password_link = $form_login.find('.form-bottom-message a'),
		$back_to_login_link = $form_forgot_password.find('.form-bottom-message a'),
		$main_nav = $('.user-login');

	//open modal
	$main_nav.on('click', function(event){

		if( $(event.target).is($main_nav) ) {
			// on mobile open the submenu
			$(this).children('ul').toggleClass('is-visible');
		} else {
			// on mobile close submenu
			$main_nav.children('ul').removeClass('is-visible');
			//show modal layer
			$form_modal.addClass('is-visible');
			//show the selected form
			( $(event.target).is('.signup') ) ? signup_selected() : login_selected();
		}

	});

	//close modal
	$('.user-modal').on('click', function(event){
		if( $(event.target).is($form_modal) || $(event.target).is('.close-form') ) {
			$form_modal.removeClass('is-visible');
		}
	});
	//close modal when clicking the esc keyboard button
	$(document).keyup(function(event){
    	if(event.which=='27'){
    		$form_modal.removeClass('is-visible');
	    }
    });

	//switch from a tab to another
	$form_modal_tab.on('click', function(event) {
		event.preventDefault();
		( $(event.target).is( $tab_login ) ) ? login_selected() : signup_selected();
	});

	//hide or show password
	$('.hide-password').on('click', function(){
		var $this= $(this),
			$password_field = $this.prev('input');

		( 'password' == $password_field.attr('type') ) ? $password_field.attr('type', 'text') : $password_field.attr('type', 'password');
		( 'Hide' == $this.text() ) ? $this.text('Show') : $this.text('Hide');
		//focus and move cursor to the end of input field
		$password_field.putCursorAtEnd();
	});

	//show forgot-password form
	$forgot_password_link.on('click', function(event){
		event.preventDefault();
		forgot_password_selected();
	});

	//back to login from the forgot-password form
	$back_to_login_link.on('click', function(event){
		event.preventDefault();
		login_selected();
	});

	function login_selected(){
		$form_login.addClass('is-selected');
		$form_signup.removeClass('is-selected');
		$form_forgot_password.removeClass('is-selected');
		$tab_login.addClass('selected');
		$tab_signup.removeClass('selected');
	}

	function signup_selected(){
		$form_login.removeClass('is-selected');
		$form_signup.addClass('is-selected');
		$form_forgot_password.removeClass('is-selected');
		$tab_login.removeClass('selected');
		$tab_signup.addClass('selected');
	}

	function forgot_password_selected(){
		$form_login.removeClass('is-selected');
		$form_signup.removeClass('is-selected');
		$form_forgot_password.addClass('is-selected');
	}




	//IE9 placeholder fallback
	//credits http://www.hagenburger.net/BLOG/HTML5-Input-Placeholder-Fix-With-jQuery.html
//	if(!Modernizr.input.placeholder ){
		$('[placeholder]').focus(function() {
			var input = $(this);
			if (input.val() == input.attr('placeholder')) {
				input.val('');
		  	}
		}).blur(function() {
		 	var input = $(this);
		  	if (input.val() == '' || input.val() == input.attr('placeholder')) {
				input.val(input.attr('placeholder'));
		  	}
		}).blur();
		$('[placeholder]').parents('form').submit(function() {
		  	$(this).find('[placeholder]').each(function() {
				var input = $(this);
				if (input.val() == input.attr('placeholder')) {
			 		input.val('');
				}
		  	})
		});
	//}

});

jQuery.fn.putCursorAtEnd = function() {
	return this.each(function() {
    	// If this function exists...
    	if (this.setSelectionRange) {
      		// ... then use it (Doesn't work in IE)
      		// Double the length because Opera is inconsistent about whether a carriage return is one character or two. Sigh.
      		var len = $(this).val().length * 2;
      		this.setSelectionRange(len, len);
    	} else {
    		// ... otherwise replace the contents with itself
    		// (Doesn't work in Google Chrome)
      		$(this).val($(this).val());
    	}
	});
};

// Announcement


function createCookie(name,value,days) {
	if (days) {
		var date = new Date();
		date.setTime(date.getTime()+(days*24*60*60*1000));
		var expires = "; expires="+date.toGMTString();
	} else {
		var expires = "";
	}
	document.cookie = name+"="+value+expires+"; path=/";
}

function readCookie(name) {
	var nameEQ = name + "=";
	var ca = document.cookie.split(';');
	for(var i=0;i < ca.length;i++) {
		var c = ca[i];
		while (c.charAt(0)==' ') c = c.substring(1,c.length);
		if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
	}
	return null;
}

function eraseCookie(name) {
	createCookie(name,"",-1);
}

window.onload = function checkCookie() {
	// Global variable voor balance
	notice = readCookie("notice");
	// Notice doesn't exist
	if (notice == null) {
		createCookie("notice", true, 30);
		$('.notice').addClass("show");
	} else if(notice == "true") {
		// setCookie("balance", 1000, 365);
// 		createCookie("notice", true, 30);
		$('.notice').addClass("show");
		// document.cookie = 'points=1000; expires=Wed, 1 Jan 2020 10:00:00 UTC; path=/'
// 		$('.notice').html(noticetext);

	} else {
//		return checkCookie();
	}
}

$(".icon-cross").click(function() {
	createCookie("notice", false, 30);
	$(".notice").slideToggle();
});