<template>
  <ul
    class="nav nav-pills nav-sidebar flex-column"
    data-widget="treeview"
    role="menu"
    data-accordion="false"
  >
    <!-- ADMIN LINKS -->
    <li class="nav-item">
      <inertia-link
        :href="route('admin.dashboard')"
        class="nav-link"
        :class="route().current('admin.dashboard') ? 'active' : ''"
      >
        <i class="nav-icon bi bi-speedometer"></i>
        <p>
          Dashboard
          <!-- <i class="right" :class="!shownav1?'bi bi-caret-left': 'bi bi-caret-down'"></i> -->
        </p>
      </inertia-link>
    </li>
    <li class="nav-item">
      <inertia-link
        :href="route('admins.index')"
        class="nav-link"
        :class="route().current('admins.*') ? 'active' : ''"
      >
        <i class="nav-icon bi bi-people-fill"></i>
        <p>
          Administrators List
          <!-- <i class="right" :class="!shownav1?'bi bi-caret-left': 'bi bi-caret-down'"></i> -->
        </p>
      </inertia-link>
    </li>
    <li class="nav-item">
      <inertia-link
        :href="route('lecturers.index')"
        class="nav-link"
        :class="route().current('lecturers.*') ? 'active' : ''"
      >
        <i class="nav-icon bi bi-person-lines-fill"></i>
        <p>
          Lecturers List
          <!-- <i class="right" :class="!shownav1?'bi bi-caret-left': 'bi bi-caret-down'"></i> -->
        </p>
      </inertia-link>
    </li>
    <li class="nav-item">
      <inertia-link
        :href="route('students.index')"
        class="nav-link"
        :class="route().current('students.*') ? 'active' : ''"
      >
        <i class="nav-icon bi bi-person-circle"></i>
        <p>
          Students List
          <!-- <i class="right" :class="!shownav1?'bi bi-caret-left': 'bi bi-caret-down'"></i> -->
        </p>
      </inertia-link>
    </li>
    <li class="nav-item">
      <inertia-link
        :href="route('courses.index')"
        class="nav-link"
        :class="route().current('courses.*') ? 'active' : ''"
      >
        <i class="nav-icon bi bi-book"></i>
        <p>
          Courses List
          <!-- <i class="right" :class="!shownav1?'bi bi-caret-left': 'bi bi-caret-down'"></i> -->
        </p>
      </inertia-link>
    </li>
    <li class="nav-item">
      <inertia-link
        :href="route('units.index')"
        class="nav-link"
        :class="route().current('units.*') ? 'active' : ''"
      >
        <i class="nav-icon bi bi-journals"></i>
        <p>
          Existing Units
          <!-- <i class="right" :class="!shownav1?'bi bi-caret-left': 'bi bi-caret-down'"></i> -->
        </p>
      </inertia-link>
    </li>
    <li class="nav-item">
      <inertia-link
        :href="route('timetable.index')"
        class="nav-link"
        :class="route().current('timetable.*') ? 'active' : ''"
      >
        <i class="nav-icon bi bi-calendar-event"></i>
        <p>
          TimeTable
          <!-- <i class="right" :class="!shownav1?'bi bi-caret-left': 'bi bi-caret-down'"></i> -->
        </p>
      </inertia-link>
    </li>
  </ul>
</template>
