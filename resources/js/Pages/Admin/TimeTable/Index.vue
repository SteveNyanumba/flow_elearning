<template>
<app-layout>
    <div class="content">
        <div class="row">
            <div class="col-md-8 col-sm-12 m-auto">
                <div class="card">
                    <div class="card-header">
                        <div class="row justify-content-center">
                            <div class="col-12 text-center">
                                <h1>Timetable</h1>
                            </div>
                            <div class="col-6">
                                <div class="mb-3 ">
                                    <label for="" class="form-label">Lecturer</label>
                                    <select class="form-control" v-model="selection" @change="fetchTT()">
                                        <option v-for="lecturer in lecturers" :key="lecturer.id" :value="lecturer.id">{{ lecturer.name }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6 text-center">
                                <label for="" class="form-label">Add Lesson</label>
                                <button class="btn btn-primary text-white form-control" @click="this.$inertia.get(route('timetable.create'))">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>

                    </div>

                    <div class="card-body table-responsive p-0 min-w-full">

                        <table class="table table-dark text-center">
                            <thead>
                                <tr>
                                    <th width="125" class="text-uppercase bg-black"><strong>Time</strong></th>

                                    <th width="100" class="text-uppercase bg-black" v-for="day in timetable.days" :key="day.id">
                                        {{ day.day }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(weekdays, time) in timetable.calendarData" :key="time" data-widget="expandable-table">
                                    <td class="align-middle bg-black " scope="row">{{ time }}</td>
                                    <template v-for="(value, index) in weekdays" :key="index">
                                        <td v-if="isNaN(value)" :rowspan="value.rowspan" class="align-middle text-center border-primary bg-primary border-2 shadow">

                                            <h4>{{ value.unit }}</h4>
                                            <span class="bg-dark py-1 px-4 border-radius-5 my-5 text-white">{{ value.lecturer }}</span>
                                            <div class="row ">
                                                <div class="col-lg-6 col-12">

                                                    <button class=" w-100 mt-lg-0 mt-sm-3 btn btn-success" data-bs-toggle="tooltip" data-bs-placement="top" title="Join Class" @click="this.$inertia.get(route('timetable.show', value.id))">
                                                        <i class="fas fa-door-open"></i>
                                                    </button>
                                                </div>
                                                <div class="col-lg-6 col-12">
                                                    <button class="btn btn-danger w-100" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Lesson" @click="deleteLesson(value.id)">
                                                        <i class="fas fa-trash"></i>
                                                    </button>

                                                </div>
                                            </div>

                                        </td>
                                        <td v-else-if="value === 1"></td>
                                    </template>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import axios from 'axios';
export default {
    components: {
        AppLayout,
    },
    data() {
        return {
            selection: this.lecturers[0].id,
            timetable: "",
        }
    },
    watch: {
        timetable() {
            console.log('changed')
        }
    },
    props: {
        lecturers: Array
    },

    methods: {
        openClass(id) {
            this.$inertia.get(`admin/timetable/${id}`);
        },
        getTimetable(id) {
            axios.get(`timetable-data/${id}`)

                .then((res) => {
                    this.timetable = res.data
                }).catch((err) => {
                    console.log(err)
                });
        },

        deleteLesson(id) {
            axios.delete(route('timetable.destroy', id))
                .then((res) => {
                    if (res.status === 200) {
                        Toast.fire({
                            icon: "success",
                            text: res.data,
                        });
                        this.fetchTT()
                    }
                }).catch((err) => {
                    console.log(err)
                });

        },

        fetchTT() {
            this.getTimetable(this.selection)
            this.$inertia.reload({
                preserveState: false
            })
        }
    },

    created() {
        this.getTimetable(this.selection)
    },
};
</script>
