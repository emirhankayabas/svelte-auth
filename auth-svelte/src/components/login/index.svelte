<script>
  // Component for login page.
  import Header from "./Header.svelte";
  import Form from "./Form.svelte";
  import Image from "./Image.svelte";
  import Foot from "./Foot.svelte";

  // UI component for login page.
  import Alert from "../ui/Alert.svelte";
  import Loader from "../ui/Loader.svelte";

  let show = false,
    loader = false,
    alertMessage = "",
    currentLanguage = "Türkçe",
    setTimeoutMs = 1500,
    user = "";

  // Data for login page.
  let data = {
    email: "emirhankayabas@gmail.com",
    password: "123456789asd",
  };

  // Countries list
  const countries = [
    { name: "Turkey", code: "TR" },
    { name: "United Kingdom", code: "GB" },
    { name: "United States", code: "US" },
    { name: "Canada", code: "CA" },
    { name: "Australia", code: "AU" },
    { name: "New Zealand", code: "NZ" },
    { name: "Italy", code: "IT" },
    { name: "Switzerland", code: "CH" },
    { name: "Spain", code: "ES" },
    { name: "Portugal", code: "PT" },
    { name: "Austria", code: "AT" },
    { name: "Belgium", code: "BE" },
    { name: "Bulgaria", code: "BG" },
    { name: "Croatia", code: "HR" },
    { name: "Cyprus", code: "CY" },
    { name: "Denmark", code: "DK" },
    { name: "Finland", code: "FI" },
    { name: "Hungary", code: "HU" },
    { name: "Ireland", code: "IE" },
    { name: "Luxembourg", code: "LU" },
    { name: "Malta", code: "MT" },
    { name: "Netherlands", code: "NL" },
    { name: "Poland", code: "PL" },
    { name: "Romania", code: "RO" },
    { name: "Slovakia", code: "SK" },
    { name: "Slovenia", code: "SI" },
    { name: "Sweden", code: "SE" },
  ];

  // Language change event.
  const hundleLanguage = (event) => {
    currentLanguage = event;
  };

  // Handle form submit.
  const hundleInput = async () => {
    loader = true;
    const endpoint = "http://localhost/api/v1/auth/login/";
    const formData = new FormData();
    formData.append("email", data.email);
    formData.append("password", data.password);
    let res = await fetch(endpoint, {
      method: "POST",
      body: formData,
    });
    res = await res.json();
    if (res.success) {
      alertMessage = res.success.message;
      // res.success.user is the user object.
      console.log(res.success.user);
      user = res.success.user;
      setTimeout(() => {
        alertMessage = "";
        loader = false;
      }, setTimeoutMs);
    } else if (res.error) {
      alertMessage = res.error;
      setTimeout(() => {
        alertMessage = "";
        loader = false;
      }, setTimeoutMs);
    } else {
      alertMessage = "Bilinmeyen bir hata";
      setTimeout(() => {
        alertMessage = "";
        loader = false;
      }, setTimeoutMs);
    }
  };

  //type={show ? "text" : "password"}
</script>

<svelte:head>
  <title>Oturum açın</title>
</svelte:head>

<main class="auth">
  <div class="auth-area">
    <div class="auth-container container login">
      <Loader {loader} />
      <div class="row">
        <div class="col-md-6">
          <Header />
          <Form {data} {show} {hundleInput} />
        </div>
        <div class="col-md-6">
          <Image />
        </div>
      </div>
    </div>
    <Foot {currentLanguage} {countries} {hundleLanguage} />
  </div>
</main>

{#if alertMessage !== ""}
  <Alert text={alertMessage} />
{/if}

<style lang="scss">
  .auth {
    .auth-area {
      width: 100%;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      .auth-container {
        width: 100%;
        max-width: 775px;
        height: auto;
        border-radius: 8px;
        border: 1px solid #dadce0;
        padding: 3rem 2.5rem 2.25rem;
        position: relative;
      }
    }
  }
</style>
