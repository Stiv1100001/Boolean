<template>
  <div class="d-flex justify-content-center flex-column m-0">
    <h2 class="mb-3">Ordina online dai tuoi ristoranti preferiti</h2>
    <multiselect
      v-model="value"
      :options="options"
      :multiple="true"
      :close-on-select="false"
      :clear-on-select="false"
      placeholder="Scegli la tipologia"
      label="name_type"
      track-by="name_type"
      :searchable="false"
      class="col-md-10"
      :taggable="true"
      @tag="addTag"
      @select="search"
      @remove="remove">
    </multiselect>
  </div>
</template>

<script>
  import Multiselect from "vue-multiselect";
  export default {
    name: "SearchBar",
    components: {
      Multiselect,
    },
    props: ["types"],
    data: function () {
      return {
        typesList: [],
        value: [],
        options: [],
      };
    },
    methods: {
      getTypes() {
        axios
          .get("/api/types")
          .then((response) => {
            this.typesList = response.data;
            this.typesList.forEach((types) => {
              this.options.push(types);
            });
          })
          .catch((error) => {
            console.warn(error);
          });
      },
      addTag(newTag) {
        const tag = {
          name: newTag,
          code: newTag.substring(0, 2) + Math.floor(Math.random() * 10000000),
        };
        this.options.push(tag);
        this.value.push(tag);
      },

      search(selectedOption, _id) {
        const toSearch = this.value.map((val) => {
          return val.id;
        });

        toSearch.push(selectedOption.id);

        axios
          .post("api/restaurant/search", {
            types: toSearch,
          })
          .then((res) => {
            console.log(res.data);
            this.$emit("restaurant", res.data);
          });
      },

      remove(removedOption, _id) {
        const newValue = this.value.filter((val) => val.id !== removedOption.id);

        const toSearch = newValue.map((val) => {
          return val.id;
        });

        axios
          .post("api/restaurant/search", {
            types: toSearch,
          })
          .then((res) => {
            console.log(res.data);
            this.$emit("restaurant", res.data);
          });
      },
    },
    created() {
      this.getTypes();
    },
  };
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
