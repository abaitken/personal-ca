<template>
  <div class="alert alert-danger" role="alert">{{ errorText }}</div>
</template>

<script>
export default {
  props: {
    errorText: String,
  },
}
</script>
