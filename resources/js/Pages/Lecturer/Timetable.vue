<template>
<app-layout>
    <div class="content">
        <div class="row">
            <div class="col-11 m-auto ">
                <div class="card h-100">
                    <div class="card-header">
                        <div class="row justify-content-center">
                            <div class="col-12 text-center">
                                <h1>Timetable</h1>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0 min-w-full">

                            <table class="table table-dark text-center">
                                <thead>
                                    <tr>
                                        <th width="125" class="text-uppercase bg-black"><strong>Time</strong></th>

                                        <th width="100" class="text-uppercase bg-black" v-for="day in days" :key="day.id">
                                            {{ day.day }}
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(weekdays, time) in calendarData" :key="time" data-widget="expandable-table">
                                        <td class="align-middle bg-black " scope="row">{{ time }}</td>
                                        <template v-for="(value, index) in weekdays" :key="index">
                                            <td v-if="isNaN(value)" :rowspan="value.rowspan" class="align-middle text-center border-primary bg-primary border-2 shadow">

                                                <h4>{{ value.unit }}</h4>
                                                <div class="row ">
                                                    <div class="col-12">

                                                        <inertia-link :href="route('lecturer.class', value.id)" class=" w-100 mt-lg-0 mt-sm-3 btn btn-success" data-bs-toggle="tooltip" data-bs-placement="top" title="Join Class">
                                                            <i class="fas fa-door-open"></i>
                                                        </inertia-link>
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
    props: {
        days:Array,
        calendarData:Object
    },

};
</script>
