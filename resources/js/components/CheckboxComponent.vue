<template>
<div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck2" v-model="checked">
    <label class="form-check-label" for="exampleCheck2">By Registering You Confirm That You Accept <a class="text-thm" href="page-terms-and-policies.html">Terms & Conditions</a> And <a class="text-thm" href="page-terms-and-policies.html">Privacy Policy</a></label>
    <br>
    <br>
    <button :disabled="!checked" class="btn btn-log btn-block btn-dark">Register</button>
</div>
</template>

<script>
export default {
  mounted() {
    console.log("Component mounted.");
  },
  data() {
    return {
      checked: ""
    };
  }
};
</script>
