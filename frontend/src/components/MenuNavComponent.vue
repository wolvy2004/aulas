<template>
  <div>
    <v-app-bar class="blue darken-4" height="150" elevation="8">
      <v-img
        src="../assets/logo_blanco100x100.png"
        height="100"
        max-width="100"
      ></v-img>
      <v-spacer></v-spacer>
      <v-toolbar-title class="white--text" 
        ><h2>Gestión de Reservas de Aulas</h2></v-toolbar-title
      >
      <v-spacer></v-spacer>
      <ul class="d-flex flex-row mb">
        <v-list-item
          class="white--text"
          v-for="item in items"
          :key="item.title"
          :to="item.to"
          link
        >
          <v-list-item-icon >
            <v-icon color="white">
              {{ item.icon }}
            </v-icon>
          </v-list-item-icon>
          <v-list-item-content>
            <v-list-item-title>
              {{ item.title }}
            </v-list-item-title>
          </v-list-item-content>
        </v-list-item>
      </ul>
    </v-app-bar>
  </div>
</template>


<script>
export default {
  data() {
    return {
      items: [
        { title: "inicio", icon: "mdi-view-dashboard", to: "/" },
        { title: "aulas", icon: "mdi-google-classroom", to: "/aulas" },
        { title: "reservas", icon: "mdi-calendar-edit", to: "/reservas" },
        { title: "materias", icon: "mdi-bookshelf", to: "/materias" },
        { title: "profesores", icon: "mdi-human-male-board", to: "/profesores" },
      ],
      right: null,
    };
  },
};
</script>