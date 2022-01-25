<template>
  <div class="embed-responsive embed-responsive-16by9">
    <video
      id="videoElement"
      class="video-js"
      controls
      preload="auto"
      poster="../../../img/flow-logo2.svg"
    ></video>
  </div>
</template>

<script>
import flvjs from "flv.js";

import { vueVimeoPlayer } from 'vue-vimeo-player'

export default {
  name: "VideoPlayer",
  props: {
    lesson: Object,
    options: {
      type: Object,
      default() {
        return {};
      },
    },
  },
  data() {
    return {};
  },
  mounted() {
    console.log(process.env);
    if (flvjs.isSupported()) {
      var videoElement = document.getElementById("videoElement");
      var flvPlayer = flvjs.createPlayer({
        type: "flv",
        url: this.lesson.stream_url,
      });
      flvPlayer.attachMediaElement(videoElement);
      flvPlayer.load();
      flvPlayer.play();
    }
  },
};
</script>
<style>
@import url("https://vjs.zencdn.net/7.15.4/video-js.css");
</style>
