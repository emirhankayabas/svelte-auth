<script>
  export let loader;
</script>

{#if loader}
  <div class="loader position-absolute top-50 start-50 translate-middle">
    <div class="d-flex justify-content-center">
      <div class="spinner-border" role="status">
        <span class="visually-hidden">Loading...</span>
      </div>
    </div>
  </div>
{/if}

<style lang="scss">
  .loader {
    z-index: 2;
    width: 100%;
    height: 100%;
    background-color: rgba(255, 255, 255, 0.5);
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 8px;
    color: #1a73e8 !important;
    .spinner-border {
      width: 3rem;
      height: 3rem;
    }
  }
</style>
