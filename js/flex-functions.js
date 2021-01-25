/*
 * froogaloop
 * https://github.com/vimeo/player-api/tree/master/javascript
 */


var Froogaloop=function(){function e(a){return new e.fn.init(a)}function h(a,c,b){if(!b.contentWindow.postMessage)return!1;var f=b.getAttribute("src").split("?")[0],a=JSON.stringify({method:a,value:c});"//"===f.substr(0,2)&&(f=window.location.protocol+f);b.contentWindow.postMessage(a,f)}function j(a){var c,b;try{c=JSON.parse(a.data),b=c.event||c.method}catch(f){}"ready"==b&&!i&&(i=!0);if(a.origin!=k)return!1;var a=c.value,e=c.data,g=""===g?null:c.player_id;c=g?d[g][b]:d[b];b=[];if(!c)return!1;void 0!==
a&&b.push(a);e&&b.push(e);g&&b.push(g);return 0<b.length?c.apply(null,b):c.call()}function l(a,c,b){b?(d[b]||(d[b]={}),d[b][a]=c):d[a]=c}var d={},i=!1,k="";e.fn=e.prototype={element:null,init:function(a){"string"===typeof a&&(a=document.getElementById(a));this.element=a;a=this.element.getAttribute("src");"//"===a.substr(0,2)&&(a=window.location.protocol+a);for(var a=a.split("/"),c="",b=0,f=a.length;b<f;b++){if(3>b)c+=a[b];else break;2>b&&(c+="/")}k=c;return this},api:function(a,c){if(!this.element||
!a)return!1;var b=this.element,f=""!==b.id?b.id:null,d=!c||!c.constructor||!c.call||!c.apply?c:null,e=c&&c.constructor&&c.call&&c.apply?c:null;e&&l(a,e,f);h(a,d,b);return this},addEvent:function(a,c){if(!this.element)return!1;var b=this.element,d=""!==b.id?b.id:null;l(a,c,d);"ready"!=a?h("addEventListener",a,b):"ready"==a&&i&&c.call(null,d);return this},removeEvent:function(a){if(!this.element)return!1;var c=this.element,b;a:{if((b=""!==c.id?c.id:null)&&d[b]){if(!d[b][a]){b=!1;break a}d[b][a]=null}else{if(!d[a]){b=
!1;break a}d[a]=null}b=!0}"ready"!=a&&b&&h("removeEventListener",a,c)}};e.fn.init.prototype=e.fn;window.addEventListener?window.addEventListener("message",j,!1):window.attachEvent("onmessage",j);return window.Froogaloop=window.$f=e}();


/*
 * Flexslider Video Functions
 */


function callPlayer(frame_id, func, args) {
	if (window.jQuery && frame_id instanceof jQuery) frame_id = frame_id.get(0).id;
	var iframe = document.getElementById(frame_id);
	if (iframe && iframe.tagName.toUpperCase() != 'IFRAME') {
		iframe = iframe.getElementsByTagName('iframe')[0];
	}
	// When the player is not ready yet, add the event to a queue
	// Each frame_id is associated with an own queue.
	// Each queue has three possible states:
	//  undefined = uninitialised / array = queue / 0 = ready
	if (!callPlayer.queue) callPlayer.queue = {};
	var queue = callPlayer.queue[frame_id],
		domReady = document.readyState == 'complete';
	if (domReady && !iframe) {
		// DOM is ready and iframe does not exist. Log a message
		window.console && console.log('callPlayer: Frame not found; id=' + frame_id);	
		if (queue) clearInterval(queue.poller);
	} else if (func === 'listening') {
		// Sending the "listener" message to the frame, to request status updates	
		if (iframe && iframe.contentWindow) {
			func = '{"event":"listening","id":' + JSON.stringify(''+frame_id) + '}';
			iframe.contentWindow.postMessage(func, '*');
		}
	} else if (!domReady || iframe && (!iframe.contentWindow || queue && !queue.ready)) {
		if (!queue) queue = callPlayer.queue[frame_id] = [];
		queue.push([func, args]);
		if (!('poller' in queue)) {
			// keep polling until the document and frame is ready
			queue.poller = setInterval(function() {
				callPlayer(frame_id, 'listening');
			}, 250);
			// Add a global "message" event listener, to catch status updates:
			messageEvent(1, function runOnceReady(e) {
				var tmp = JSON.parse(e.data);
				if (tmp && tmp.id == frame_id && tmp.event == 'onReady') {
					// YT Player says that they're ready, so mark the player as ready
					clearInterval(queue.poller);
					queue.ready = true;
					messageEvent(0, runOnceReady);
					// .. and release the queue:
					while (tmp = queue.shift()) {
						callPlayer(frame_id, tmp[0], tmp[1]);
					}
				}
			}, false);
		}
	} else if (iframe && iframe.contentWindow) {
		// When a function is supplied, just call it (like "onYouTubePlayerReady")
		if (func.call) return func();
		// Frame exists, send message
		iframe.contentWindow.postMessage(JSON.stringify({
			"event": "command",
			"func": func,
			"args": args || [],
			"id": frame_id
		}), "*");
	}
	/* IE8 does not support addEventListener... */
	function messageEvent(add, listener) {
		var w3 = add ? window.addEventListener : window.removeEventListener;	
		w3 ?
			w3('message', listener, !1)
		:
			(add ? window.attachEvent : window.detachEvent)('onmessage', listener);
	}
}
jQuery(window).load(function() {
	var vimeoPlayers = jQuery('.flexslider').find('iframe'), player;	
	for (var i = 0, length = vimeoPlayers.length; i < length; i++) { 		    
		player = vimeoPlayers[i]; 		    
		$f(player).addEvent('ready', ready); 		
	}	
	function addEvent(element, eventName, callback) { 	    	
		if (element.addEventListener) { 		    	
			element.addEventListener(eventName, callback, false) 		    
		} else { 	      		
			element.attachEvent(eventName, callback, false); 	      	
		} 	    
	}	
	function ready(player_id) { 	    	
		var froogaloop = $f(player_id); 	    	
	}
	jQuery('.clone').find('iframe').each(function(i, e){
		jQuery(e).attr('id', jQuery(e).attr('id') + '_clone');
	});
});