<template>
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"
            ><h4 class="bi bi-list"></h4
          ></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <inertia-link href="/" class="nav-link">Home</inertia-link>
        </li>
      </ul>
     <div class="container">
          <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <jet-dropdown
          id="teamManagementDropdown"
          v-if="$page.props.jetstream.hasTeamFeatures"
        >
          <template #trigger>
            {{ $page.props.user.current_team.name }}

            <svg
              width="18"
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 20 20"
              fill="currentColor"
            >
              <path
                fill-rule="evenodd"
                d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                clip-rule="evenodd"
              />
            </svg>
          </template>

          <template #content>
            <!-- Team Management -->
            <template v-if="$page.props.jetstream.hasTeamFeatures">
              <h6 class="dropdown-header">Manage Team</h6>

              <!-- Team Settings -->
              <jet-dropdown-link
                :href="route('teams.show', $page.props.user.current_team)"
              >
                Team Settings
              </jet-dropdown-link>

              <jet-dropdown-link
                :href="route('teams.create')"
                v-if="$page.props.jetstream.canCreateTeams"
              >
                Create New Team
              </jet-dropdown-link>

              <hr class="dropdown-divider" />

              <!-- Team Switcher -->
              <h6 class="dropdown-header">Switch Teams</h6>

              <template v-for="team in $page.props.user.all_teams" :key="team.id">
                <form @submit.prevent="switchToTeam(team)">
                  <jet-dropdown-link as="button">
                    <div class="d-flex">
                      <svg
                        v-if="team.id == $page.props.user.current_team_id"
                        class="me-1 text-success"
                        width="20"
                        fill="none"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                      >
                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                      </svg>
                      <span>{{ team.name }}</span>
                    </div>
                  </jet-dropdown-link>
                </form>
              </template>
            </template>
          </template>
        </jet-dropdown>

        <!-- Authentication Links -->
        <jet-dropdown id="settingsDropdown">
          <template #trigger>
            <img
              v-if="$page.props.jetstream.managesProfilePhotos"
              class="rounded-circle"
              width="32"
              height="32"
              :src="$page.props.user.profile_photo_url"
              :alt="$page.props.user.name"
            />

            <span v-else>
              {{ $page.props.user.name }}

              <svg
                class="ms-2"
                width="18"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20"
                fill="currentColor"
              >
                <path
                  fill-rule="evenodd"
                  d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                  clip-rule="evenodd"
                />
              </svg>
            </span>
          </template>

          <template #content>
            <!-- Account Management -->
            <h6 class="dropdown-header small text-muted">Manage Account</h6>

            <jet-dropdown-link :href="route('profile.show')"> Profile </jet-dropdown-link>

            <jet-dropdown-link
              :href="route('api-tokens.index')"
              v-if="$page.props.jetstream.hasApiFeatures"
            >
              API Tokens
            </jet-dropdown-link>

            <hr class="dropdown-divider" />

            <!-- Authentication -->
            <form @submit.prevent="logout">
              <jet-dropdown-link as="button"> Log out </jet-dropdown-link>
            </form>
          </template>
        </jet-dropdown>
        <li class="nav-item">
          <a class="nav-link" data-widget="navbar-search" href="#" role="button">
            <i class="fas fa-search"></i>
          </a>
          <div class="navbar-search-block">
            <form class="form-inline container">
              <div class="input-group input-group-sm">
                <input
                  class="form-control form-control-navbar"
                  type="search"
                  placeholder="Search for a user"
                  aria-label="Search"
                />
                <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                  <button
                    class="btn btn-navbar"
                    type="button"
                    data-widget="navbar-search"
                  >
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
      </ul>
     </div>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside
      class="main-sidebar elevation-4"
      :class="
        $page.props.user.is_admin
          ? 'sidebar-dark-primary'
          : $page.props.user.is_lecturer
          ? 'sidebar-dark-primary-lec'
          : 'sidebar-dark-primary-stud'
      "
    >
      <!-- Brand Logo -->
      <a :href="route('home')" class="brand-link">
        <img src="/flow-logo2.svg" height="75" />
        <span class="brand-text font-weight-bold"> FLOW </span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img
              :src="$page.props.user.profile_photo_url"
              class="img-circle elevation-2"
              alt="User Image"
            />
          </div>
          <div class="info">
            <a href="#" class="d-block">{{ $page.props.user.name }}</a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <admin-links v-if="$page.props.user.is_admin"></admin-links>
          <!-- LECTURER LINKS -->
          <lecturer-links v-if="$page.props.user.is_lecturer"></lecturer-links>
          <!-- STUDENT LINKS -->
          <student-links v-if="$page.props.user.is_student"></student-links>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <slot name="header"></slot>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard v1</li>
              </ol>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </div>
      <section class="content">
        <div class="container-fluid">
          <slot></slot>
        </div>
      </section>
    </div>
  </div>
</template>

<script>
import JetApplicationLogo from "@/Jetstream/ApplicationLogo";
import JetBanner from "@/Jetstream/Banner";
import JetApplicationMark from "@/Jetstream/ApplicationMark";
import JetDropdown from "@/Jetstream/Dropdown";
import JetDropdownLink from "@/Jetstream/DropdownLink";
import JetNavLink from "@/Jetstream/NavLink";
import AdminLinks from "@/Jetstream/AdminLinks";
import LecturerLinks from "@/Jetstream/LecturerLinks";
import StudentLinks from "@/Jetstream/StudentLinks";

export default {
  components: {
    JetApplicationLogo,
    JetBanner,
    JetApplicationMark,
    JetDropdown,
    JetDropdownLink,
    JetNavLink,
    AdminLinks,
    LecturerLinks,
    StudentLinks,
  },

  data() {
    return {
      showingNavigationDropdown: false,
      shownav1: false,
    };
  },

  methods: {
    switchToTeam(team) {
      this.$inertia.put(
        route("current-team.update"),
        {
          team_id: team.id,
        },
        {
          preserveState: false,
        }
      );
    },

    logout() {
      this.$inertia.post(route("logout"));
    },
  },

  computed: {
    path() {
      return window.location.pathname;
    },
  },
};
</script>
