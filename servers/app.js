const server = require('node-media-server')
const path = require('path')
const config = {
  rtmp: {
    port: 1935,
    chunk_size: 60000,
    gop_cache: true,
    ping: 30,
    ping_timeout: 60,
  },

  http: {
    port: 5000,
    mediaroot:'./public/media',
    allow_origin: '*',
  },
  trans: {
    ffmpeg: './servers/bin/ffmpeg.exe',
    tasks: [
      {
        app: 'live',
        mp4: true,
        mp4Flags: '[movflags=frag_keyframe+empty_moov]',
      }
    ]
  }
}

let media = new server(config)

media.run()
