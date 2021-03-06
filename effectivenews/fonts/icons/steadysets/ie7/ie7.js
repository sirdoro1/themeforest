/* To avoid CSS expressions while still supporting IE 7 and IE 6, use this script */
/* The script tag referring to this file must be placed before the ending body tag. */

/* Use conditional comments in order to target IE 7 and older:
	<!--[if lt IE 8]><!-->
	<script src="ie7/ie7.js"></script>
	<!--<![endif]-->
*/

(function() {
	function addIcon(el, entity) {
		var html = el.innerHTML;
		el.innerHTML = '<span style="font-family: \'steadysets\'">' + entity + '</span>' + html;
	}
	var icons = {
		'steady-icon-type': '&#xe600;',
		'steady-icon-box': '&#xe601;',
		'steady-icon-archive': '&#xe602;',
		'steady-icon-envelope': '&#xe603;',
		'steady-icon-email': '&#xe604;',
		'steady-icon-files': '&#xe605;',
		'steady-icon-uniE606': '&#xe606;',
		'steady-icon-file-settings': '&#xe607;',
		'steady-icon-file-add': '&#xe608;',
		'steady-icon-file': '&#xe609;',
		'steady-icon-align-left': '&#xe60a;',
		'steady-icon-align-right': '&#xe60b;',
		'steady-icon-align-center': '&#xe60c;',
		'steady-icon-align-justify': '&#xe60d;',
		'steady-icon-file-broken': '&#xe60e;',
		'steady-icon-browser': '&#xe60f;',
		'steady-icon-windows': '&#xe610;',
		'steady-icon-window': '&#xe611;',
		'steady-icon-folder': '&#xe612;',
		'steady-icon-folder-add': '&#xe613;',
		'steady-icon-folder-settings': '&#xe614;',
		'steady-icon-folder-check': '&#xe615;',
		'steady-icon-wifi-low': '&#xe616;',
		'steady-icon-wifi-mid': '&#xe617;',
		'steady-icon-wifi-full': '&#xe618;',
		'steady-icon-connection-empty': '&#xe619;',
		'steady-icon-connection-25': '&#xe61a;',
		'steady-icon-connection-50': '&#xe61b;',
		'steady-icon-connection-75': '&#xe61c;',
		'steady-icon-connection-full': '&#xe61d;',
		'steady-icon-list': '&#xe61e;',
		'steady-icon-grid': '&#xe61f;',
		'steady-icon-uniE620': '&#xe620;',
		'steady-icon-battery-charging': '&#xe621;',
		'steady-icon-battery-empty': '&#xe622;',
		'steady-icon-battery-25': '&#xe623;',
		'steady-icon-battery-50': '&#xe624;',
		'steady-icon-battery-75': '&#xe625;',
		'steady-icon-battery-full': '&#xe626;',
		'steady-icon-settings': '&#xe627;',
		'steady-icon-arrow-left': '&#xe628;',
		'steady-icon-arrow-up': '&#xe629;',
		'steady-icon-arrow-down': '&#xe62a;',
		'steady-icon-arrow-right': '&#xe62b;',
		'steady-icon-reload': '&#xe62c;',
		'steady-icon-refresh': '&#xe62d;',
		'steady-icon-volume': '&#xe62e;',
		'steady-icon-volume-increase': '&#xe62f;',
		'steady-icon-volume-decrease': '&#xe630;',
		'steady-icon-mute': '&#xe631;',
		'steady-icon-microphone': '&#xe632;',
		'steady-icon-microphone-off': '&#xe633;',
		'steady-icon-book': '&#xe634;',
		'steady-icon-checkmark': '&#xe635;',
		'steady-icon-checkbox-checked': '&#xe636;',
		'steady-icon-checkbox': '&#xe637;',
		'steady-icon-paperclip': '&#xe638;',
		'steady-icon-download': '&#xe639;',
		'steady-icon-tag': '&#xe63a;',
		'steady-icon-trashcan': '&#xe63b;',
		'steady-icon-search': '&#xe63c;',
		'steady-icon-zoom-in': '&#xe63d;',
		'steady-icon-zoom-out': '&#xe63e;',
		'steady-icon-chat': '&#xe63f;',
		'steady-icon-chat-1': '&#xe640;',
		'steady-icon-chat-2': '&#xe641;',
		'steady-icon-chat-3': '&#xe642;',
		'steady-icon-comment': '&#xe643;',
		'steady-icon-calendar': '&#xe644;',
		'steady-icon-bookmark': '&#xe645;',
		'steady-icon-email2': '&#xe646;',
		'steady-icon-heart': '&#xe647;',
		'steady-icon-enter': '&#xe648;',
		'steady-icon-cloud': '&#xe649;',
		'steady-icon-book2': '&#xe64a;',
		'steady-icon-star': '&#xe64b;',
		'steady-icon-clock': '&#xe64c;',
		'steady-icon-printer': '&#xe64d;',
		'steady-icon-home': '&#xe64e;',
		'steady-icon-flag': '&#xe64f;',
		'steady-icon-meter': '&#xe650;',
		'steady-icon-switch': '&#xe651;',
		'steady-icon-forbidden': '&#xe652;',
		'steady-icon-lock': '&#xe653;',
		'steady-icon-unlocked': '&#xe654;',
		'steady-icon-unlocked2': '&#xe655;',
		'steady-icon-users': '&#xe656;',
		'steady-icon-user': '&#xe657;',
		'steady-icon-users2': '&#xe658;',
		'steady-icon-user2': '&#xe659;',
		'steady-icon-bullhorn': '&#xe65a;',
		'steady-icon-share': '&#xe65b;',
		'steady-icon-screen': '&#xe65c;',
		'steady-icon-phone': '&#xe65d;',
		'steady-icon-phone-portrait': '&#xe65e;',
		'steady-icon-phone-landscape': '&#xe65f;',
		'steady-icon-tablet': '&#xe660;',
		'steady-icon-tablet-landscape': '&#xe661;',
		'steady-icon-laptop': '&#xe662;',
		'steady-icon-camera': '&#xe663;',
		'steady-icon-microwave-oven': '&#xe664;',
		'steady-icon-credit-cards': '&#xe665;',
		'steady-icon-calculator': '&#xe666;',
		'steady-icon-bag': '&#xe667;',
		'steady-icon-diamond': '&#xe668;',
		'steady-icon-drink': '&#xe669;',
		'steady-icon-shorts': '&#xe66a;',
		'steady-icon-vcard': '&#xe66b;',
		'steady-icon-sun': '&#xe66c;',
		'steady-icon-bill': '&#xe66d;',
		'steady-icon-coffee': '&#xe66e;',
		'steady-icon-uniE66F': '&#xe66f;',
		'steady-icon-newspaper': '&#xe670;',
		'steady-icon-stack': '&#xe671;',
		'steady-icon-map-marker': '&#xe672;',
		'steady-icon-map': '&#xe673;',
		'steady-icon-support': '&#xe674;',
		'steady-icon-uniE675': '&#xe675;',
		'steady-icon-barbell': '&#xe676;',
		'steady-icon-stopwatch': '&#xe677;',
		'steady-icon-atom': '&#xe678;',
		'steady-icon-syringe': '&#xe679;',
		'steady-icon-health': '&#xe67a;',
		'steady-icon-bolt': '&#xe67b;',
		'steady-icon-pill': '&#xe67c;',
		'steady-icon-bones': '&#xe67d;',
		'steady-icon-lab': '&#xe67e;',
		'steady-icon-clipboard': '&#xe67f;',
		'steady-icon-mug': '&#xe680;',
		'steady-icon-bucket': '&#xe681;',
		'steady-icon-select': '&#xe682;',
		'steady-icon-graph': '&#xe683;',
		'steady-icon-crop': '&#xe684;',
		'steady-icon-image': '&#xe685;',
		'steady-icon-cube': '&#xe686;',
		'steady-icon-bars': '&#xe687;',
		'steady-icon-chart': '&#xe688;',
		'steady-icon-pencil': '&#xe689;',
		'steady-icon-measure': '&#xe68a;',
		'steady-icon-eyedropper': '&#xe68b;',
		'0': 0
		},
		els = document.getElementsByTagName('*'),
		i, c, el;
	for (i = 0; ; i += 1) {
		el = els[i];
		if(!el) {
			break;
		}
		c = el.className;
		c = c.match(/steady-icon-[^\s'"]+/);
		if (c && icons[c[0]]) {
			addIcon(el, icons[c[0]]);
		}
	}
}());
