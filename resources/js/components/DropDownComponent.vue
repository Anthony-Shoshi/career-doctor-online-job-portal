<template>
<div class="form-row">
    <div class="form-group col-md-6">
    <select v-model='company_default_country_id' name="company_default_country_id" @change='getStates()' class="form-control">
        <option value='' selected>Select Country</option>
        <option v-for='data in countries' :value='data.id' v-bind:key="data.id">{{ data.name }}</option>
    </select>
    
    </div>
    <div class="form-group col-md-6">
    <select v-model="company_default_city_id" name="company_default_city_id" class="form-control">
        <option value='' selected>Select City</option>
        <option v-for="data in cities" :value='data.id' v-bind:key="data.id">{{ data.name }}</option>
    </select>
    </div>
</div>
</template>

<script>
export default {
  mounted() {
    console.log("Component mounted.");
  },
  data() {
    return {
      company_default_country_id: 0,
      countries: [],
      company_default_city_id: 0,
      cities: []
    };
  },
  methods: {
    getCountries: function() {
      axios.get("/CareerDoctor/public/api/getCountries").then(
        function(response) {
          this.countries = response.data;
        }.bind(this)
      );
    },
    getStates: function() {
      axios
        .get("/CareerDoctor/public/api/getStates", {
          params: {
            country_id: this.company_default_country_id
          }
        })
        .then(
          function(response) {
            this.cities = response.data;
          }.bind(this)
        );
    }
  },
  created: function() {
    this.getCountries();
  }
};
</script>

