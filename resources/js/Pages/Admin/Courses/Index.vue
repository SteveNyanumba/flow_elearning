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
                    <h2 class="card-title">Courses' List</h2>
                    <inertia-link :href="route('courses.create')" class="btn btn-warning btn-lg float-right">
                        <i class="fas fa-plus"></i>
                    </inertia-link>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0" style="height: 600px">
                    <table id="example1" class="table table-hover table-striped table-head-fixed text-nowrap" role="grid" aria-describedby="example1_info">
                        <thead class="text-danger">
                            <tr role="row">
                                <th class="" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                                    ID
                                </th>
                                <th class="" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">
                                    Title
                                </th>
                                <th class="text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="course in courses" :key="course.id" class="odd">

                                <td class="">{{ course.id }}</td>
                                <td>{{ course.title }}</td>
                                <td>
                                    <div class="row justify-content-center">
                                        <div class="col-3 m-1">
                                            <inertia-link :href="route('courses.edit', course.id)" class="btn-secondary btn">
                                                <i class="fas fa-edit"></i>
                                            </inertia-link>
                                        </div>
                                        <div class="col-3 m-1">
                                            <button class="btn-secondary btn" @click="deleteCourse(course.id)">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                        <div class="col-3 m-1">
                                            <button class="btn-secondary btn" data-bs-toggle="modal" :data-bs-target="`#modal`+course.id">
                                                <i class="fas fa-list"></i>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                                <jet-modal :id="`modal`+course.id">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-center">List of Units</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container-fluid">
                                                <ul class="list-unstyled">
                                                    <li v-for="unit in course.units" :key="unit.id">{{unit.title}}</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save</button>
                                        </div>
                                    </div>
                                </jet-modal>
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
import JetModal from "@/Jetstream/Modal"

export default {
    components: {
        AppLayout,
        JetModal,
    },

    props: {
        courses: Array,
    },
    methods: {
        deleteCourse(id) {
            this.$inertia.delete("/admin/courses/" + id);
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
