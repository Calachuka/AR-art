<script src="https://cdn.jsdelivr.net/gh/aframevr/aframe@1c2407b26c61958baa93967b5412487cd94b290b/dist/aframe-master.min.js"></script>

<script src='https://raw.githack.com/AR-js-org/AR.js/master/aframe/build/aframe-ar-nft.js'></script>
<script>
    window.onload = function() {
        AFRAME.registerComponent('videohandler', {
            init: function () {
                var marker = this.el;

                this.vid = document.querySelector("#vid");

                marker.addEventListener('markerFound', function () {
                    this.vid.play();
                }.bind(this));
    
		marker.addEventListener('markerLost', function() {
			this.vid.pause();
			this.vid.currentTime = 0;
		}.bind(this));
            }
        });
    };
</script>

<style>
    .arjs-loader {
        height: 100%;
        width: 100%;
        position: absolute;
        top: 0;
        left: 0;
        background-color: rgba(0, 0, 0, 0.8);
        z-index: 9999;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .arjs-loader div {
        text-align: center;
        font-size: 1.25em;
        color: white;
    }
</style>

	<body style='margin : 0px; overflow: hidden;'>
		<div class="arjs-loader">
			<div>Loading, please wait...</div>
		</div>
		<a-scene
			vr-mode-ui="enabled: false;"
			renderer='antialias: true; alpha: true; precision: mediump;'
			embedded arjs='trackingMethod: best; sourceType: webcam; debugUIEnabled: false;'>

			<a-assets>
				<!-- 
				<video src="https://labanane.ninja/AR/test-traking-image-gif-github/gif/Sans-titre---1.gif"
					preload="auto" id="vid" response-type="arraybuffer" loop
					crossorigin webkit-playsinline autoplay muted playsinline>
				</video>
				-->
				<img src="https://labanane.ninja/AR/test-traking-image-gif-github/gif/Sans-titre---1.gif"
				id="vid"/>
			</a-assets>

			<a-nft
				videohandler
				type='nft' url='https://labanane.ninja/AR/test-traking-image-gif-github/image/Total-trex'
				smooth="true" smoothCount="10" smoothTolerance="0.01" smoothThreshold="5"
			>
				<!--
				<a-video
					src="#vid"
					rotation='-90 0 0'
					position='50 150 -100'
					width='320'
					height='176'
					>
				</a-video>
				-->
				<a-image
					src="#vid"
					rotation='-90 0 0'
					position='50 150 -100'
					width='320'
					height='176'
					>
				</a-image>
			</a-nft>
			<a-entity camera></a-entity>
		</a-scene>
	</body>