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
        :href="route('lecturer.dashboard')"
        class="nav-link"
        :class="route().current('lecturer.dashboard*') ? 'active' : ''"
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
        :href="route('lecturer.timetable')"
        class="nav-link"
        :class="route().current('lecturer.timetable*') ? 'active' : ''"
      >
        <i class="nav-icon bi bi-calendar"></i>
        <p>
          My Timetable
          <!-- <i class="right" :class="!shownav1?'bi bi-caret-left': 'bi bi-caret-down'"></i> -->
        </p>
      </inertia-link>
    </li>
  </ul>
</template>
