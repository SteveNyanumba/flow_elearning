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
            <h3 class="text-center m-2">Add New Administrator</h3>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-10">
                <div class="mb-3">
                  <label for="name" class="form-label">Administrator's Name</label>
                  <input
                    type="text"
                    v-model="admin.name"
                    class="form-control"
                    name="name"
                    id="name"
                    aria-describedby="name"
                    placeholder="Enter the full name of the administrator"
                  />
                  <small id="name" class="form-text text-muted"
                    >Full Name of the administrator</small
                  >
                  <div
                    v-if="$page.props.errors.name"
                    class="text-danger text-center text-uppercase"
                  >
                    {{ $page.props.errors.name }}
                  </div>
                </div>
                <input
                  name="submit"
                  id="submit"
                  class="btn btn-warning"
                  type="button"
                  value="Save"
                  @click="newAdmin"
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
  data() {
    return {
      admin: {
        name: "",
      },
    };
  },

  methods: {
    newAdmin() {
      console.log("clicked");
      this.$inertia.post("/admin/admins", this.admin);
    },
  },
};
</script>
