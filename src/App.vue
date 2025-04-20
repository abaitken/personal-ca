<script setup lang="ts">
import { RouterLink, RouterView } from 'vue-router'
import Navigation from './views/Navigation.vue'

// export default {
//   name: 'App',
//   metaInfo: {
//     // if no subcomponents specify a metaInfo.title, this title will be used
//     title: 'Certificate Authority',
//     // all titles will be injected into this template
//     titleTemplate: '%s | Certificate Authority',
//   },
// }
</script>

<template>
  <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <RouterLink to="/" class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6"
      >Certificate Authority</RouterLink
    >
    <button
      class="navbar-toggler position-absolute d-md-none collapsed"
      type="button"
      data-bs-toggle="collapse"
      data-bs-target="#sidebarMenu"
      aria-controls="sidebarMenu"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <span class="navbar-toggler-icon"></span>
    </button>
  </header>

  <div class="container-fluid">
    <div class="row">
      <Navigation />

      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" id="content">
        <RouterView />
      </main>
    </div>
  </div>
</template>
