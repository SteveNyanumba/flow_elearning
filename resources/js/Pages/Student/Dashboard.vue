<template>
  <app-layout>
    <template #header>
      <h2 class="h4 font-weight-bold">Student's Dashboard</h2>

    </template>
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
};
</script>
