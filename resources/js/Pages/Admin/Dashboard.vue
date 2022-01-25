<template>
<app-layout>
    <template #header>
        <h2 v-if="$page.props.user.is_super" class="h4 font-weight-bold">
            Superior Administrator's Dashboard
        </h2>
        <h2 v-else class="h4 font-weight-bold">Administrator's Dashboard</h2>
    </template>
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-black">
                <div class="inner">
                    <h3>{{ students.length }}</h3>

                    <p>Total Students</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer bg-dark">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-black">
                <div class="inner">
                    <h3>{{ units.length }}</h3>

                    <p>Units Offered</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer bg-dark">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-black">
                <div class="inner">
                    <h3>{{ courses.length }}</h3>

                    <p>Courses Offered</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer bg-dark">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-black">
                <div class="inner">
                    <h3>{{ lecturers.length }}</h3>

                    <p>Active Lecturers</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer bg-dark">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8 col-12">
            <div class="my-4 text-center">
                <h2 class="text-flow">
                    Most Recent logins
                </h2>
            </div>
            <div class="card-body shadow table-responsive p-0" style="height: 600px">
                <table id="example1" class="table table-hover table-striped table-head-fixed text-nowrap" role="grid" aria-describedby="example1_info">
                    <thead class="text-danger">
                        <tr role="row">
                            <th class="" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                                ID
                            </th>
                            <th class="" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">
                                Name
                            </th>
                            <th class="" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">
                                Role
                            </th>
                            <th class="" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                Email
                            </th>
                            <th class="text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                Last Active
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <template v-for="session in sessions " :key="session.id">
                            <tr class="odd" v-if="session.user">
                                <td class="">{{ session.user_id }}</td>
                                <td>{{ session.user.name }}</td>
                                <td>{{ session.user.role }}</td>
                                <td>{{ session.user.email }}</td>
                                <td>{{ session.last_activity_dt }} </td>
                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-4 col-12 mt-5">
            <div class="card bg-dark" style="height:80vh">
                <div class="card-header bg-black">
                    <h4 class="text-center">Notifications</h4>
                </div>
                <div class="card-body">
                    <!-- Code For Notifications -->
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
        students: Array,
        units: Array,
        courses: Array,
        lecturers: Array,
        sessions: Array
    },

    mounted() {
        // setInterval(()=>{
        //     this.$inertia.reload({
        //         preserveState:false
        //     })
        // }, 5000)
    },
};
</script>
