<script>
  import { onMount } from "svelte";

  export let data;
  let ref;

  onMount(() => {
    ref.focus();
  });
</script>

<div class="auth-content">
  <div class="row g-2 mb-3">
    <div class="form-floating mb-1">
      <input
        type="email"
        name="auth-email"
        id="auth-email"
        class="form-control"
        placeholder="Email"
        bind:value={data.email}
        bind:this={ref}
      />
      <label for="auth-email">E-posta</label>
    </div>
    <div class="form-floating">
      <input
        type="password"
        name="auth-password"
        id="auth-password"
        class="form-control"
        placeholder="Password"
        bind:value={data.password}
      />
      <label for="auth-password">Şifre</label>
    </div>
  </div>
</div>

<style lang="scss">
  .auth-content {
    .form-floating {
      input:not(.show-password-input) {
        transition: 250ms border-color;
        &[type="email"],
        &[type="password"] {
          + label {
            left: 3px !important;
          }
        }
        &:hover {
          border-color: darken($color: #ced4da, $amount: 5);
          border-width: 2px;
        }
        &:focus {
          border-color: #1a73e8;
          border-width: 2px;
          + label {
            color: #1a73e8 !important;
            opacity: 1 !important;
            font-weight: 500;
          }
        }
      }
      label {
        display: flex;
        align-items: center;
        margin-top: 1px;
      }
    }
  }
</style>
