<template>
  <PageTitle title="Certificates" />
  <!-- 
  <div class="flex-grow-1 w-100">
    <nav class="breadcrumbs">
      <a class="breadcrumb-item" data-bind="text: name, click: $parent.jumpToContainer"></a>
      <a class="breadcrumb-item is-active" data-bind="text: name"></a>
    </nav>
  </div> -->
  <div class="flex-grow-1 w-100">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Name</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody v-for="certificate in certificates">
        <tr>
          <td><span data-bind="text: name"></span></td>
          <td>
            <button data-bind="click: $parent.openChildContainer" v-if="container">
              <span data-feather="book-open"></span>
            </button>
            <button><span data-feather="delete"></span></button>
            <button><span data-feather="refresh-cw"></span></button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<!-- <script>
export default {
  name: 'Certificates',
  metaInfo: {
    title: 'Certificates',
    titleTemplate: null,
  },
}
</script> -->
<script>
const { certificates } = []

function deleteContainer() {}
</script>
