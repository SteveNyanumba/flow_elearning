<template>
  <app-layout>
    <template #header>
      <h2 v-if="$page.props.user.is_super" class="h4 font-weight-bold">
        Superior Administrator's Dashboard
      </h2>
      <h2 v-else class="h4 font-weight-bold">Administrator's Dashboard</h2>
    </template>
    <div class="row justify-content-center">
      <div class="col-md-10 col-12">
        <div class="card shadow">
          <div class="card-header">
            <h2 class="card-title">Lecturers' List</h2>
            <inertia-link
              :href="route('lecturers.create')"
              class="btn btn-warning btn-lg float-right"
            >
              <i class="fas fa-plus"></i>
            </inertia-link>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0" style="height: 600px">
            <table
              id="example1"
              class="table table-hover table-striped table-head-fixed text-nowrap"
              role="grid"
              aria-describedby="example1_info"
            >
              <thead class="text-danger">
                <tr role="row">
                  <th
                    class=""
                    tabindex="0"
                    aria-controls="example1"
                    rowspan="1"
                    colspan="1"
                    aria-sort="ascending"
                    aria-label="Rendering engine: activate to sort column descending"
                  >
                    ID
                  </th>
                  <th
                    class=""
                    tabindex="0"
                    aria-controls="example1"
                    rowspan="1"
                    colspan="1"
                    aria-label="Browser: activate to sort column ascending"
                  >
                    Name
                  </th>
                  <th
                    class=""
                    tabindex="0"
                    aria-controls="example1"
                    rowspan="1"
                    colspan="1"
                    aria-label="Platform(s): activate to sort column ascending"
                  >
                    Email
                  </th>
                  <th
                    class="text-center"
                    tabindex="0"
                    aria-controls="example1"
                    rowspan="1"
                    colspan="1"
                    aria-label="Platform(s): activate to sort column ascending"
                  >
                    Actions
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="lecturer in lecturers" :key="lecturer.id" class="odd">
                  <td class="">{{ lecturer.id }}</td>
                  <td>{{ lecturer.name }}</td>
                  <td>{{ lecturer.email }}</td>
                  <td>
                    <div class="row justify-content-center">
                      <div class="col-4 m-1">
                        <inertia-link
                          :href="route('lecturers.edit', lecturer.id)"
                          class="btn-secondary btn"
                        >
                          <i class="fas fa-edit"></i>
                        </inertia-link>
                      </div>
                      <div class="col-4 m-1">
                        <button
                          class="btn-secondary btn"
                          @click="deleteLecturer(lecturer.id)"
                        >
                          <i class="fas fa-trash"></i>
                        </button>
                      </div>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
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
    lecturers: Array,
  },
  methods: {
    deleteLecturer(id) {
      this.$inertia.delete("/admin/lecturers/" + id);
    },
  },
  mounted() {
    if (this.$attrs.flash.success) {
      Toast.fire({
        icon: "success",
        text: this.$attrs.flash.success,
      });
    }
  },
};
</script>
