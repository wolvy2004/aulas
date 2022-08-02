<template>
  <div id="app">
  <v-app>
    <Menu></Menu>
    <v-main>
      
      <router-view></router-view>
    </v-main>
  </v-app>
  </div>
</template>

<script>
import Menu from "@/components/MenuNavComponent";

export default {
  components: { Menu },
};
</script>
