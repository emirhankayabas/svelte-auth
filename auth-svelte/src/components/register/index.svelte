<script>
  // Component for register page.
  import Header from "./Header.svelte";
  import Form from "./Form.svelte";
  import Image from "./Image.svelte";
  import Foot from "./Foot.svelte";

  // UI component for register page.
  import Alert from "../ui/Alert.svelte";
  import Loader from "../ui/Loader.svelte";

  let show = false,
    loader = false,
    alertMessage = "",
    currentLanguage = "Türkçe";

  // Data for register page.
  let data = {
    fistName: "",
    lastName: "",
    email: "",
    password: "",
    confirmPassword: "",
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
    const endpoint = "http://localhost/api/v1/auth/register/";
    const formData = new FormData();
    formData.append("firstName", data.fistName);
    formData.append("lastName", data.lastName);
    formData.append("email", data.email);
    formData.append("password", data.password);
    let res = await fetch(endpoint, {
      method: "POST",
      body: formData,
    });
    res = await res.json();
    if (res.success) {
      alertMessage = res.success;
      setTimeout(() => {
        alertMessage = "";
        loader = false;
      }, 2000);
    } else if (res.error) {
      alertMessage = res.error;
      setTimeout(() => {
        alertMessage = "";
        loader = false;
      }, 2000);
    } else {
      alertMessage = "Bilinmeyen bir hata";
      setTimeout(() => {
        alertMessage = "";
        loader = false;
      }, 2000);
    }
  };

  //type={show ? "text" : "password"}
</script>

<svelte:head>
  <title>Hesabınızı oluşturun</title>
</svelte:head>

<main class="auth">
  <div class="auth-area">
    <div class="auth-container container register">
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
        &.register {
          min-height: 500px;
        }
      }
    }
  }
</style>