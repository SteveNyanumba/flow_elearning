<template>
  <app-layout>
    <template #header>
      <h2 v-if="$page.props.user.is_super" class="h4 font-weight-bold">
        Superior Administrator's Dashboard
      </h2>
      <h2 v-else class="h4 font-weight-bold">Administrator's Dashboard</h2>
    </template>
    <div class="row justify-content-center my-5">
      <div class="col-4">
        <div class="card shadow">
          <div class="card-title">
            <h3 class="text-center m-2">Create Lesson</h3>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-10">
                <!-- UNIT -->

                <div class="mb-3">
                  <label for="unit" class="form-label">Unit</label>
                  <select
                    v-model="lesson.unit"
                    class="form-control"
                    name="unit"
                    id="unit"
                  >
                    <option selected disabled>Choose Your Unit</option>
                    <template v-if="units">
                      <option v-for="unit in units" :key="unit.id" :value="unit.id">
                        {{ unit.title }}
                      </option>
                    </template>
                  </select>
                </div>

                <!-- LECTURER -->

                <div class="mb-3">
                  <label for="lecturer" class="form-label">Lecturer</label>
                  <select
                    v-model="lesson.lecturer"
                    class="form-control"
                    name="lecturer"
                    id="lecturer"
                  >
                    <option selected disabled>Choose Your Lecturer</option>
                    <template v-if="this.lesson.unit">
                      <option
                        v-for="lecturer in units[this.lesson.unit - 1].lecturers"
                        :key="lecturer.id"
                        :value="lecturer.id"
                      >
                        {{ lecturer.name }}
                      </option>
                    </template>
                  </select>
                </div>

                <!-- SEMESTER -->

                <div class="mb-3">
                  <label for="lecturer" class="form-label">Semester</label>
                  <select
                    v-model="lesson.semester"
                    class="form-control"
                    name="lecturer"
                    id="lecturer"
                  >
                    <option selected disabled>Choose the Semester</option>
                    <option
                      v-for="semester in semesters"
                      :key="semester.id"
                      :value="semester.id"
                    >
                      {{ semester.title }}
                    </option>
                  </select>
                </div>

                <!-- DAY -->
                <div class="mb-3">
                  <label for="day" class="form-label">Day</label>
                  <select v-model="lesson.day" class="form-control" name="day" id="day">
                    <option v-for="day in days" :key="day.id" :value="day.id">
                      {{ day.day }}
                    </option>
                  </select>
                </div>

                <!-- Start Time -->
                <div class="mb-3">
                  <label for="StartTime" class="form-label">Start Time</label>
                  <input
                    v-model="lesson.start_time"
                    class="form-control"
                    name="StartTime"
                    id="StartTime"
                    type="time"
                    min="08:30"
                    max="20:30"
                    step="1800"
                  />
                </div>

                <!-- End Time -->
                <div class="mb-3">
                  <label for="EndTime" class="form-label">End Time</label>
                  <input
                    v-model="lesson.end_time"
                    class="form-control"
                    name="EndTime"
                    id="EndTime"
                    type="time"
                    min="08:30"
                    max="20:30"
                    step="1800"
                  />
                </div>

                <div class="d-grid gap-2">
                  <button
                    type="button"
                    name="save"
                    id="save"
                    class="btn btn-warning"
                    @click="createLesson"
                  >
                    SAVE
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </app-layout>
</template>
<script>
import AppLayout from "@/Layouts/AppLayout";

export default {
  components: {
    AppLayout,
  },
  props: {
    units: Array,
    lecturers: Array,
    semesters: Array,
    days: Array,
  },
  data() {
    return {
      lesson: {
        lecturer: "",
        unit: "",
        semester: "",
        day: "",
        start_time: "",
        end_time: "",
      },
    };
  },

  methods: {
    createLesson() {
      console.log("clicked");
      this.$inertia.post("/admin/timetable", this.lesson);
    },
  },
};
</script>
