<template>
<app-layout>
    <template #header>
        <h2 class="h4 font-weight-bold">{{$page.props.user.name}}'s Dashboard</h2>
    </template>
</app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import Welcome from "@/Jetstream/Welcome";

export default {
    props: {
        days: Array,
        calendarData: Array,
    },
    components: {
        AppLayout,
        Welcome,
    },
};
</script>
