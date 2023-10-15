<script>
  export let show;
</script>

<div class="auth-footer">
  <div class="show-password" on:click={() => (show = !show)}>
    <span class="icon">
      <input
        type="checkbox"
        class="show-password-input"
        id="show-password-input"
      />
    </span>
    <label for="show-password-input">Şifreyi göster</label>
  </div>
  <div class="submit mt-3">
    <div class="sign-in-instead">
      <a href="../login/">Hesap oluşturun</a>
    </div>
    <div class="buttons">
      <button type="submit" class="button">İleri</button>
    </div>
  </div>
</div>

<style lang="scss">
  .auth-footer {
    .show-password {
      display: none; //Flex
      align-items: center;
      span {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer !important;
        margin-left: -7.5px;
        &:hover {
          background-color: #e8f1fa;
        }
        input {
          appearance: none;
          width: 18px;
          height: 18px;
          border: 2px solid #5f6368;
          border-radius: 2px;
          cursor: pointer !important;
          transition: 250ms opacity;
          &:checked {
            background-color: #1a73e8;
            border-color: #1a73e8;
            background-image: url(/images/icon-check.svg);
            background-repeat: no-repeat;
            background-size: 18px;
            background-position: center;
          }
        }
      }
      label {
        cursor: pointer;
        margin-top: 2px;
        margin-left: 3px;
      }
    }
    .submit {
      display: flex;
      align-items: center;
      justify-content: space-between;
      .sign-in-instead {
        cursor: pointer;
        letter-spacing: 0.0107142857em;
        font-weight: 500;
        position: relative;
        border-radius: 4px;
        max-width: 200px;
        margin-left: -5.5px;
        &:hover {
          background-color: #e8f1fa;
        }
        a {
          font-size: 14px;
          padding: 10px 10px 10px;
          width: 100%;
          max-height: 36px;
          color: #1a73e8;
          text-decoration: none;
          display: inline-flex;
          align-items: center;
          justify-content: center;
        }
      }
    }
  }
</style>
