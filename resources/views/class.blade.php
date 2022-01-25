<!DOCTYPE html>
<html lang="en">
    <head>
        <link href="https://vjs.zencdn.net/7.15.4/video-js.css" rel="stylesheet" />

        <!-- If you'd like to support IE8 (for Video.js versions prior to v7) -->
        <!-- <script src="https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script> -->
        <script src="https://cdn.bootcss.com/flv.js/1.5.0/flv.min.js"></script>
      </head>

      <body>
        <video
          id="videoElement"
          class="video-js"
          controls
          preload="auto"
          width="1024"
          height="576"
          poster="MY_VIDEO_POSTER.jpg"
          data-setup="{}"
        >

        </video>

        <video id="videoElement"></video>
        <script>
            if (flvjs.isSupported()) {
                var videoElement = document.getElementById('videoElement');
                var flvPlayer = flvjs.createPlayer({
                    type: 'flv',
                    url: 'ws://localhost:8080/live/tested.flv'
                });
                flvPlayer.attachMediaElement(videoElement);
                flvPlayer.load();
                flvPlayer.play();
            }
        </script>

      </body>
