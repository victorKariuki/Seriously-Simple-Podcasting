/**
 * Podcast app – UI interactions (tooltips, toasts, player bar state).
 */
(function () {
	'use strict';

	function ready(fn) {
		if (document.readyState !== 'loading') {
			fn();
		} else {
			document.addEventListener('DOMContentLoaded', fn);
		}
	}

	ready(function () {
		var app = document.querySelector('.ssp-app-layout');
		if (!app) return;

		// Optional: wire player bar play button to first Castos player on page
		var playerBar = document.getElementById('ssp-player-bar');
		if (playerBar) {
			var playBtn = playerBar.querySelector('.ssp-player-bar__play');
			if (playBtn) {
				playBtn.addEventListener('click', function () {
					var castosPlay = document.querySelector('.castos-player .play-btn');
					if (castosPlay) castosPlay.click();
				});
			}
		}
	});
})();
