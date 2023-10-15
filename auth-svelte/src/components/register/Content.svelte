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
    <div class="col-md">
      <div class="form-floating">
        <input
          type="text"
          name="auth-firt-name"
          id="auth-firt-name"
          class="form-control"
          placeholder="First Name"
          bind:value={data.fistName}
          bind:this={ref}
        />
        <label for="auth-firt-name">Ad</label>
      </div>
    </div>
    <div class="col-md">
      <div class="form-floating">
        <input
          type="text"
          name="auth-last-name"
          id="auth-last-name"
          class="form-control"
          bind:value={data.lastName}
          placeholder="Last Name"
        />
        <label for="auth-last-name">Soyad</label>
      </div>
    </div>
    <div class="form-floating mb-1">
      <input
        type="email"
        name="auth-email"
        id="auth-email"
        class="form-control"
        placeholder="Email"
        bind:value={data.email}
      />
      <label for="auth-email">Kullanıcı adı</label>
      <span class="domainSuffix"><!-- Dinamik --></span>
    </div>
    <small class="proposal mb-2">
      Harf, rakam ve nokta işaretini kullanabilirsiniz.
    </small>
    <div class="col-md">
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
    <div class="col-md">
      <div class="form-floating">
        <input
          type="password"
          name="auth-password-confirm"
          id="auth-password-confirm"
          class="form-control"
          placeholder="Password Confirm"
          bind:value={data.confirmPassword}
        />
        <label for="auth-password-confirm">Onayla</label>
      </div>
    </div>
    <small class="proposal">
      8 veya daha fazla harf, rakam ve sembolü karışık olarak kullanın
    </small>
  </div>
</div>

<style lang="scss">
  .auth-content {
    .form-floating {
      input:not(.show-password-input) {
        transition: 250ms border-color;
        &[type="email"] {
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
    .proposal {
      margin-top: 0.5rem;
      margin-left: 0.15rem;
      display: block;
      font-size: 12px;
      color: #5f6368;
    }
  }
</style>
