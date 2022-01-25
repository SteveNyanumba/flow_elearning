<style scoped>
body {
padding-top: 3rem;
padding-bottom: 3rem;
color: #5a5a5a;
}

.carousel-item {
height: 32rem;
background-color: #777;
}
.carousel-item > img {
position: absolute;
bottom: -250px;
left: 0;
min-width: 100%;
}
</style>
<template>
  <div>
    <!-- ======= Header ======= -->
    <header>
      <nav
        class="navbar navbar-expand-md navbar-dark fixed-top"
        style="background-color: #ffffff77"
      >
        <div class="container d-flex align-items-center justify-content-lg-between">
          <h1 class="logo me-auto me-lg-0">
            <inertia-link :href="route('home')"
              ><jet-application-mark class="m-3" height="40px"></jet-application-mark
            ></inertia-link>
          </h1>
          <!-- Uncomment below if you prefer to use an image logo -->
          <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="../../img/logo.png" alt="" class="img-fluid"></a>-->

          <div v-if="canLogin">
            <inertia-link href="/login" v-if="!$page.props.user" class="get-started-btn"
              >Login</inertia-link
            >
            <div v-else>
              <inertia-link
                href="/admin/dashboard"
                v-if="$page.props.user.is_admin"
                class="get-started-btn"
                >Dashboard</inertia-link
              >
              <inertia-link
                href="/student/dashboard"
                v-if="$page.props.user.is_student"
                class="get-started-btn"
                >Dashboard</inertia-link
              >
              <inertia-link
                href="/lecturer/dashboard"
                v-if="$page.props.user.is_lecturer"
                class="get-started-btn"
                >Dashboard</inertia-link
              >
            </div>
          </div>
        </div>
      </nav>
    </header>

    <main role="main" class="my-5">
      <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button
            type="button"
            data-bs-target="#carouselExampleIndicators"
            data-bs-slide-to="0"
            class="active"
            aria-current="true"
            aria-label="Slide 1"
          ></button>
          <button
            type="button"
            data-bs-target="#carouselExampleIndicators"
            data-bs-slide-to="1"
            aria-label="Slide 2"
          ></button>
          <button
            type="button"
            data-bs-target="#carouselExampleIndicators"
            data-bs-slide-to="2"
            aria-label="Slide 3"
          ></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="../../img/homepage/image1.jpg" class="d-block w-100" alt="..." />
          </div>
          <div class="carousel-item">
            <img src="../../img/homepage/image3.jpg" class="d-block w-100" alt="..." />
          </div>
          <div class="carousel-item">
            <img src="../../img/homepage/image2.jpg" class="d-block w-100" alt="..." />
          </div>
        </div>
        <button
          class="carousel-control-prev"
          type="button"
          data-bs-target="#carouselExampleIndicators"
          data-bs-slide="prev"
        >
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button
          class="carousel-control-next"
          type="button"
          data-bs-target="#carouselExampleIndicators"
          data-bs-slide="next"
        >
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </main>
    <div class="mt-3 container">
      <div class="row">
        <div class="col-md-9 col-12">
          <div class="card shadow-lg">
            <div class="accordion" id="accordionExample">
              <template v-for="faculty in faculties" :key="faculty.id">
                <div class="accordion-item shadow-sm" v-if="faculty.courses.length > 0">
                  <h2 class="accordion-header" id="headingOne">
                    <button
                      class="accordion-button"
                      type="button"
                      data-bs-toggle="collapse"
                      :data-bs-target="'#collapse' + faculty.id"
                      aria-expanded="true"
                      style="background-color: #fb9921"
                      aria-controls="collapseOne"
                    >
                      <h4 class="text-uppercase text-center text-black">
                        School of {{ faculty.title }}
                      </h4>
                    </button>
                  </h2>
                  <div
                    :id="'collapse' + faculty.id"
                    class="accordion-collapse collapse"
                    aria-labelledby="headingOne"
                    data-bs-parent="#accordionExample"
                  >
                    <div class="accordion-body">
                      <div class="row">
                        <div
                          v-for="course in faculty.courses"
                          :key="course.id"
                          class="col-6 card"
                        >
                          <div class="card-header text-center bg-black text-white">
                            <h4>{{ course.title }}</h4>
                          </div>
                          <div class="card-body">
                            <ul>
                              <li v-for="unit in course.units" :key="unit.id">
                                {{ unit.title }}
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </template>
            </div>
          </div>
        </div>

      </div>
    </div>
    <!-- End #main -->
  </div>
</template>

<script>
import JetApplicationMark from "@/Jetstream/ApplicationLogo";
export default {
  components: {
    JetApplicationMark,
  },
  props: {
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
    faculties: Array,
  },
  methods: {
    handleScroll() {
      let selectHeader = document.querySelector("#header");
      if (selectHeader) {
        const headerScrolled = () => {
          if (window.scrollY > 100) {
            selectHeader.classList.add("header-scrolled");
          } else {
            selectHeader.classList.remove("header-scrolled");
          }
        };
        window.addEventListener("load", headerScrolled);
        document.addEventListener("scroll", headerScrolled);
      }
    },
  },
  created() {
    window.addEventListener("scroll", this.handleScroll);
  },
};
</script>
