<script>
  import Content from "./Content.svelte";
  import Footer from "./Footer.svelte";

  export let data, show, hundleInput;
</script>

<form class="mt-3" on:submit|preventDefault={hundleInput}>
  <Content {data} />
  <Footer {show} />
</form>
