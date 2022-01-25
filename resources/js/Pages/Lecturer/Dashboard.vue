<template>
<app-layout>
    <template #header>
        <h2 class="h4 font-weight-bold">Lecturer's Dashboard</h2>
    </template>

        <div class="row justify-content-center">
            <div class="col-md-9 col-12">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item" v-for="lesson in lessons" :key="lesson.id">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" :data-bs-target="'#collapse'+lesson.id " aria-expanded="true" aria-controls="collapseOne">
                                <div class="row">
                                    <div class="col-12">
                                        <h5>{{ lesson.unit.title }} </h5>
                                    </div>
                                    <div class="col-12">

                                        {{ lesson.day }} - {{ lesson.start_time }} to {{ lesson.end_time }}
                                    </div>
                                </div>
                            </button>
                        </h2>
                        <div :id="'collapse'+lesson.id" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <h4 class="text-center">List of Students</h4>
                                <div class="row">
                                    <ul>
                                        <div class="col-4" v-for="student in lesson.students" :key="student.id">
                                            <li>{{ student.name }}</li>
                                        </div>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="card bg-dark shadow" style="height:80vh">
                    <div class="card-header bg-black">
                        <h2 class="text-center">
                            Notifications
                        </h2>
                    </div>
                    <div class="card-body">

                    </div>
                </div>
            </div>
        </div>

</app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import Welcome from "@/Jetstream/Welcome";

export default {
    components: {
        AppLayout,
        Welcome,
    },
    props: {
        lessons: Array,
    },
    methods: {

    }

};
</script>
