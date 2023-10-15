<div class="auth-header">
  <div class="animate">
    <lottie-player
      src="https://assets10.lottiefiles.com/packages/lf20_n5icqxkw.json"
      class="animation"
      speed="0.45"
      autoplay
    />
  </div>
  <div class="heading">
    <div class="heading-text">Hesabınızı oluşturun</div>
    <div class="heading-subtext">
      Hesabım devam et <!-- Dinamik -->
    </div>
  </div>
</div>

<style lang="scss">
  .auth-header {
    display: flex;
    align-items: center;
    gap: 5px;
    .animate {
      .animation {
        width: 4.5rem;
        height: 4.5rem;
        display: inline-block;
        background-color: transparent;
      }
    }
    .heading {
      .heading-text {
        font-size: 1.375rem;
        line-height: 1.3333;
        font-weight: normal;
        color: #202124;
      }
      .heading-subtext {
        font-size: 1rem;
        font-weight: normal;
        color: #202124;
        letter-spacing: 0.1px;
      }
    }
  }
</style>
