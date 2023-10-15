<script>
  export let currentLanguage, countries, hundleLanguage;
</script>

<div class="auth-foot">
  <div class="language">
    <div class="dropdown">
      <button
        class="dropdown-toggle"
        type="button"
        id="language-dropdown-button"
        data-bs-toggle="dropdown"
        aria-expanded="false"
      >
        {currentLanguage}
        <span class="icon">
          <img src="/images/icon-arrow-down.svg" alt="" />
        </span>
      </button>
      <ul class="dropdown-menu" aria-labelledby="language-dropdown-button">
        {#each countries as countrie}
          <li
            class="item"
            on:click|once={(e) => hundleLanguage(e.target.innerText)}
          >
            {countrie.name}
          </li>
        {/each}
      </ul>
    </div>
  </div>
  <ul class="bottom-links">
    <li>Yardım</li>
    <li>Gizlilik</li>
    <li>Şartlar</li>
  </ul>
</div>

<style lang="scss">
  .auth-foot {
    width: 100%;
    max-width: 775px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    font-size: 14px;
    margin-top: 1.5rem;
    padding: 0 5px;
    .language {
      user-select: none;
      .dropdown {
        button {
          background-color: transparent;
          display: flex;
          align-items: center;
          justify-content: center;
          &::after {
            display: none;
          }
          .icon {
            img {
              width: 19px;
            }
          }
        }
        .dropdown-menu {
          width: 190px;
          max-height: 600px;
          overflow: auto;
          .item {
            width: 100%;
            height: 40px;
            line-height: 39px;
            padding: 0 1rem;
            font-size: 14px;
            cursor: pointer;
            &:hover {
              background-color: #eeeeee;
              color: #202124;
            }
            &:active {
              background-color: #dddddd;
            }
          }
        }
      }
    }
    .bottom-links {
      display: flex;
      align-items: center;
      margin-bottom: 0;
      gap: 1.5rem;
      li {
        color: #757575;
        transition: 250ms color;
        cursor: pointer;
        &:hover {
          color: darken($color: #757575, $amount: 10);
        }
      }
    }
  }
</style>
