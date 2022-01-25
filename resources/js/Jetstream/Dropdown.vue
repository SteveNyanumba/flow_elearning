<template>
  <li class="nav-item dropdown">
    <a
      :id="id"
      class="nav-link"
      role="button"
      data-bs-toggle="dropdown"
      aria-expanded="false"
    >
      <slot name="trigger"></slot>
    </a>

    <div
      class="dropdown-menu dropdown-menu-left animate slideIn m-auto"
      :aria-labelledby="id"
    >
      <slot name="content"></slot>
    </div>
  </li>
</template>

<script>
export default {
  props: {
    id: {
      type: String,
      required: true,
    },
  },
};
</script>
