<template>
    <app-layout>
        <template #header>
            <h2 v-if="$page.props.user.is_super" class="h4 font-weight-bold">
                Superior Administrator's Dashboard
            </h2>
            <h2 v-else class="h4 font-weight-bold">
                Administrator's Dashboard
            </h2>
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
                <h3>{{ units.length }}<sup style="font-size: 20px">%</sup></h3>

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
              <a href="#" class="small-box-footer  bg-dark">More info <i class="fas fa-arrow-circle-right"></i></a>
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
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import Welcome from '@/Jetstream/Welcome'

    export default {
        components: {
            AppLayout,
            Welcome,
        },

        props:{
            students:Array,
            units:Array,
            courses:Array,
            lecturers:Array,
        },

        mounted(){
            console.log(this.lecturers)
        }
    }
</script>
