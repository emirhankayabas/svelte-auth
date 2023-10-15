<script>
  export let text;
  let close = true;
</script>

<div class="toast-container position-absolute top-0 end-0 p-3">
  <div
    class="toast align-items-center text-white bg-dark border-0 d-block transition-opacity"
    role="alert"
    aria-live="assertive"
    aria-atomic="true"
    style={close ? " opacity: 1" : "opacity: 0"}
  >
    <div class="d-flex">
      <div class="toast-body">{text}</div>
      <button
        type="button"
        class="btn-close btn-close-white me-2 m-auto"
        data-bs-dismiss="toast"
        aria-label="Close"
        on:click={() => (close = !close)}
      />
    </div>
  </div>
</div>

<style>
  .toast-container {
    font-family: "Roboto", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto,
      Oxygen, Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;
  }
  .toast {
    padding: 0.25rem 0;
    padding-right: 0.25rem;
  }
</style>
