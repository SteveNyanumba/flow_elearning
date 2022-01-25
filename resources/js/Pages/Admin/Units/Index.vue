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
            <h2 class="card-title">List of Existing Units</h2>
            <inertia-link
              :href="route('courses.create')"
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
                    Title
                  </th>
                  <th
                    class=""
                    tabindex="0"
                    aria-controls="example1"
                    rowspan="1"
                    colspan="1"
                    aria-label="Browser: activate to sort column ascending"
                  >
                    Lecturers
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
                <tr v-for="unit in units" :key="unit.id" class="odd">
                  <td class="">{{ unit.id }}</td>
                  <td>
                    <strong>{{ unit.title }}</strong>
                  </td>
                  <td>
                    <div class="d-flex align-items-start">
                      <div
                        v-for="lecturer in unit.lecturers"
                        :key="lecturer.id"
                        style="margin-left: -20px"

                      >
                        <a
                          id="lecturer_image"
                          href="#"
                          @click.prevent="detachLec(unit.id, lecturer.id)"
                        >
                          <img
                            :src="lecturer.profile_photo_url"
                            alt="{{ lecturer.name }}"
                            class="rounded-circle shadow"
                            data-bs-toggle="tooltip" data-bs-placement="top" :title="lecturer.name"
                          />
                          <div class="middle text-danger">
                            <i class="fas fa-trash"></i>
                          </div>
                        </a>
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="row justify-content-center">
                      <div class="col-3 m-1">
                        <inertia-link
                          :href="route('units.edit', unit.id)"
                          class="btn-secondary btn"
                        >
                          <i class="fas fa-edit"></i>
                        </inertia-link>
                      </div>
                      <div class="col-3 m-1">
                        <button class="btn-secondary btn" @click="deleteUnit(unit.id)">
                          <i class="fas fa-trash"></i>
                        </button>
                      </div>
                      <div class="col-3 m-1">
                        <button
                          class="btn-secondary btn"
                          data-bs-toggle="modal"
                          :data-bs-target="'#modal' + unit.id"
                        >
                          <i class="fas fa-users"></i>
                        </button>
                        <!-- Modal Start-->
                        <jet-modal :id="'modal' + unit.id">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">
                                Assign Lecturers to Unit:
                                <strong>{{ unit.title }}</strong>
                              </h5>
                              <button
                                type="button"
                                class="btn-close"
                                data-bs-dismiss="modal"
                                aria-label="Close"
                              ></button>
                            </div>
                            <div class="modal-body">
                              <div class="container-fluid">
                                <div class="mb-3">
                                  <label for="lecturers" class="form-label"
                                    >Lecturers</label
                                  >
                                  <select
                                    multiple
                                    class="form-control form-control"
                                    name="lecturers"
                                    id="lecturers"
                                    v-model="selection"
                                  >
                                    <option selected disabled>Select One or many</option>
                                    <template v-for="lec in lecturers" :key="lec.id">
                                      <option
                                        :disabled="
                                          unit.lecturers.some((e) => e.id == lec.id)
                                        "
                                        :value="lec.id"
                                      >
                                        {{ lec.name }}
                                      </option>
                                    </template>
                                  </select>
                                </div>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button
                                type="button"
                                class="btn btn-secondary"
                                data-bs-dismiss="modal"
                              >
                                Close
                              </button>
                              <button
                                type="button"
                                @click="this.selection?assignLec(unit.id):''"
                                class="btn btn-primary"
                              >
                                Save
                              </button>
                            </div>
                          </div>
                        </jet-modal>
                        <!-- Modal End -->
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
import JetModal from "@/Jetstream/Modal";

export default {
  components: {
    AppLayout,
    JetModal,
  },

  props: {
    units: Array,
    lecturers: Array,
  },
  data() {
    return {
      selection: null,
    };
  },
  watch: {
    units:(newVal, oldVal)=>{
      console.log("Units Changed")
    },
    lecturers:(newVal, oldVal)=>{
      console.log("Lecturers Changed")
    }
  },
  methods: {
    deleteUnit(id) {
      axios
        .delete("/admin/units/" + id)
        .then((res) => {
          if (this.$attrs.flash.success) {
            Toast.fire({
              icon: "success",
              text: this.$attrs.flash.success,
            });
          }
        })
        .catch((err) => {
          console.log(err);
        });
    },
    assignLec(id) {
      axios
        .post(`/admin/assign-lecturer/${id}`, {
          id_array: this.selection,
        })
        .then((res) => {
          if (res.status === 200) {
            this.selection = null;
            Toast.fire({
              icon: "success",
              text: res.data,
            });
            this.$inertia.reload({
              preserveState:false
            })


          }
        })
        .catch((err) => {});
    },
    detachLec(unit_id, lec_id) {
      axios
        .post(`/admin/detatch-lecturer/${unit_id}/${lec_id}`)
        .then((res) => {
            if (res.status === 200) {
              this.$inertia.reload({
                preserveState:false
              })
            this.selection = null;
            // const modal = document.getElementById("modelId");
            // modal.hide();
            Toast.fire({
              icon: "success",
              text: res.data,
            });
          }
        })
        .catch((err) => {});
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
<style>
.middle {
  transition: 0.5s ease;
  opacity: 0;
  position: relative;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  text-align: center;
}
#lecturer_image:hover img {
  opacity: 0.3;
}

#lecturer_image:hover .middle {
  opacity: 1;
}
</style>
