<template>
  <div class="search-field">
    <label>Søk</label>
    <TypeAhead src="/static/data.json?keyword=:keyword" :getResponse="getResponse" placeholder="Søk"></TypeAhead>
  </div>
</template>

 <script>
//https://www.npmjs.com/package/vue2-typeahead
import TypeAhead  from 'vue2-typeahead';
export default {
  components: {
      TypeAhead
  },
}
</script>
