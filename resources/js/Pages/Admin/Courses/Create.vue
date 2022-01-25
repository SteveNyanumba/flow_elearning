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
            <h3 class="text-center m-2">Add New Course</h3>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-10">
                <!-- TITLE -->
                <div class="mb-3">
                  <label for="name" class="form-label">Course Title</label>
                  <input
                    type="text"
                    v-model="course.title"
                    class="form-control"
                    name="title"
                    id="title"
                    aria-describedby="title"
                    placeholder="Enter the Title of the New Course"
                  />
                  <small id="name" class="form-text text-muted"
                    >Title of the new Course</small
                  >
                  <div
                    v-if="$page.props.errors.title"
                    class="text-danger text-center text-uppercase"
                  >
                    {{ $page.props.errors.title }}
                  </div>
                </div>

                <!-- ABBR -->
                <div class="mb-3">
                  <label for="abbreviation" class="form-label"
                    >Course's abbreviation</label
                  >
                  <input
                    type="text"
                    v-model="course.abbreviation"
                    class="form-control"
                    abbreviation="abbreviation"
                    id="abbreviation"
                    aria-describedby="abbreviation"
                    placeholder="Enter the abbreviation of the Course"
                  />
                  <small id="name" class="form-text text-muted"
                    >Abbreviation of the Course</small
                  >
                  <div
                    v-if="$page.props.errors.abbreviation"
                    class="text-danger text-center text-uppercase"
                  >
                    {{ $page.props.errors.abbreviation }}
                  </div>
                </div>

                <!-- DESCRIPTION -->
                <div class="mb-3">
                  <label for="name" class="form-label">Course Description</label>
                  <textarea
                    type="text"
                    v-model="course.description"
                    class="form-control"
                    name="name"
                    id="name"
                    aria-describedby="name"
                    placeholder="Enter the description here"
                  >
                  </textarea>
                  <small id="name" class="form-text text-muted"
                    >Description of the course</small
                  >
                  <div
                    v-if="$page.props.errors.description"
                    class="text-danger text-center text-uppercase"
                  >
                    {{ $page.props.errors.description }}
                  </div>
                </div>

                <!-- TYPE OF COURSE -->
                <div class="mb-3">
                  <label for="name" class="form-label">Type/Level of Study</label>
                  <select v-model="course.course_type" class="form-control">
                    <option value="">Choose Your Level</option>
                    <option v-for="type in types" :key="type.id" :value="type.id">
                      {{ type.title }}
                    </option>
                  </select>
                  <small id="name" class="form-text text-muted"
                    >The Level that the Course falls into</small
                  >
                  <div
                    v-if="$page.props.errors.course_type"
                    class="text-danger text-center text-uppercase"
                  >
                    {{ $page.props.errors.course_type }}
                  </div>
                </div>

                <!-- FACULTY-->
                <div class="mb-3">
                  <label for="name" class="form-label">Faculty</label>
                  <select v-model="course.faculty" class="form-control">
                    <option value="">Choose Your Faculty</option>
                    <option
                      v-for="faculty in faculties"
                      :key="faculty.id"
                      :value="faculty.id"
                    >
                      {{ faculty.title }}
                    </option>
                  </select>
                  <small id="name" class="form-text text-muted"
                    >The Faculty that the Course falls into</small
                  >
                  <div
                    v-if="$page.props.errors.faculty"
                    class="text-danger text-center text-uppercase"
                  >
                    {{ $page.props.errors.faculty }}
                  </div>
                </div>
                <input
                  type="button"
                  value="Save"
                  class="btn btn-danger"
                  @click="newCourse"
                />
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
    types: Array,
    faculties: Array,
  },
  data() {
    return {
      course: {
        title: "",
        abbreviation: "",
        description: "",
        course_type: "",
        faculty: "",
      },
    };
  },

  methods: {
    newCourse() {
      console.log("clicked");
      this.$inertia.post("/admin/courses", this.course);
    },
  },
};
</script>
