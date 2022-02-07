<template>
  <div class="flex flex-row max-w-full justify-center mb-10 mt-5">
    <div
      v-for="link in navLinks"
      :key="link.code"
      :class="{
        'bg-orange-500': link.code == currentRouteName,
        'bg-gray-300 hover:bg-orange-200': link.code !== currentRouteName
      }"
      @click="goToLink(link)"
      class="mr-8 cursor-pointer px-3 py-1 rounded-lg"
    >
      {{ link.label }}
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      navLinks: [
        {
          label: "condomini",
          code: "buildings_list",
        },
        {
          label: "aggiungi condominio",
          code: "new_building",
        },
      ]
    };
  },
  computed: {
    currentRouteName() {
      return this.$route.matched[0].name;
    }
  },
  methods: {
    goToLink(link) {
      this.$router.push({
        name: link.code
      });
    }
  }
};
</script>