<template>
  <app-layout>
      <div class="row">
        <div class="col-md-8 col-12">
          <div class="card bg-dark">
              <video-player :lesson="lesson" />
            <div
              v-if="
                $page.props.user.id === this.lesson.lecturer_id
              "
              class="card-footer bg-warning"
            >
              <div class="input-group">
                <input
                  id="streamKey"
                  type="password"
                  :value="this.lesson.stream_key"
                  class="form-control bg-dark"
                />
                <span class="input-group-append">
                  <button
                    id="copy_button"
                    type="button"
                    @click="copy()"
                    class="btn btn-primary"
                  >
                    Copy
                  </button>
                </span>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-12">
          <div class="card direct-chat direct-chat-warning" style="height: 75vh;">
            <div class="card-header bg-primary">
              <h3 class="card-title">Direct Chat</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus text-white"></i>
                </button>
                <button
                  type="button"
                  class="btn btn-tool"
                  title="Contacts"
                  data-widget="chat-pane-toggle"
                >
                  <i class="fas fa-comments text-white"></i>
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body bg-dark">
              <!-- Conversations are loaded here -->
              <div class="mx-3">
                <!-- Message. Default to the left -->
                <div
                  class="direct-chat-msg"
                  v-for="message in messages"
                  :key="message.id"
                  :class="message.user.id === $page.props.user.id ? 'right' : ''"
                >
                  <div class="direct-chat-infos clearfix">
                    <span
                      class="direct-chat-name float-left"
                      v-if="message.user.id === $page.props.user.id"
                    >
                      Me
                    </span>
                    <span v-else class="direct-chat-name float-left">{{
                      message.user.name
                    }}</span>
                    <span class="direct-chat-timestamp float-right">
                      {{ new Date(message.created_at).toDateString() }}
                    </span>
                  </div>
                  <!-- /.direct-chat-infos -->
                  <img
                    class="direct-chat-img"
                    :src="message.user.profile_photo_url"
                    alt="message user image"
                  />
                  <!-- /.direct-chat-img -->
                  <div class="direct-chat-text">
                    {{ message.message }}
                  </div>
                  <!-- /.direct-chat-text -->
                </div>
                <!-- /.contacts-list -->
              </div>
              <!-- /.direct-chat-pane -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer bg-warning">
              <form action="#" method="post">
                <div class="input-group">
                  <input
                    type="text"
                    name="message"
                    v-model="message"
                    placeholder="Type Message ..."
                    class="form-control bg-dark"
                  />
                  <span class="input-group-append">
                    <button
                      type="button"
                      @click="sendMessage()"
                      v-on:sent="getMessages"
                      class="btn btn-primary"
                    >
                      Send
                    </button>
                  </span>
                </div>
              </form>
            </div>
            <!-- /.card-footer-->
          </div>
        </div>
      </div>
  </app-layout>
</template>
<script>
import AppLayout from "@/Layouts/AppLayout";
import VideoPlayer from "@/Jetstream/Special/Player";
export default {
  props: {
    lesson: Object,
  },
  components: {
    AppLayout,
    VideoPlayer,
  },
  data() {
    return {
      message: "",
      messages: [],
    };
  },
  watch: {
    lesson() {
      console.log('lesson changed')
    },
  },
  methods: {
    copy() {
      navigator.clipboard.writeText(document.getElementById("streamKey").value);
      document.getElementById("copy_button").value = "Copied";
    },
    sendMessage() {
      if (this.message == "") {
        Toast.fire({
          icon: "warning",
          text: "You can't send an empty message",
        });
        return;
      }

      axios
        .post(`/chat/lesson/${this.lesson.id}/message`, {
          message: this.message,
        })
        .then((res) => {
          if (res.status == 200) {
            this.message = "";
            this.$emit("sent");
          }
        })
        .catch((err) => {
          console.log(err);
        });
    },
    getMessages() {
      axios
        .get(`/chat/messages/${this.lesson.id}`)
        .then((res) => {
          if (res.status == 200) this.messages = res.data;
        })
        .catch((err) => {
          console.log(err);
        });
    },
  },

    mounted() {
      this.getMessages();
      Echo.private(`chat.${this.lesson.id}`).listen(".message", (e) => {
        this.$inertia.reload({
            preserveState:false
        })
      });
    },
};
</script>
