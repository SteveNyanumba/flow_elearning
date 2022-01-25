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
        :href="route('student.dashboard')"
        class="nav-link"
        :class="route().current('student.dashboard') ? 'active' : ''"
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
        :href="route('student.enrollment')"
        class="nav-link"
        :class="route().current('student.enrollment*') ? 'active' : ''"
      >
        <i class="nav-icon bi bi-bar-chart-steps"></i>
        <p>
          Unit Enrollment
          <!-- <i class="right" :class="!shownav1?'bi bi-caret-left': 'bi bi-caret-down'"></i> -->
        </p>
      </inertia-link>
    </li>
    <li class="nav-item">
      <inertia-link
        :href="route('student.timetable')"
        class="nav-link"
        :class="route().current('student.timetable') ? 'active' : ''"
      >
        <i class="nav-icon bi bi-calendar"></i>
        <p>
          Timetable
          <!-- <i class="right" :class="!shownav1?'bi bi-caret-left': 'bi bi-caret-down'"></i> -->
        </p>
      </inertia-link>
    </li>
  </ul>
</template>
