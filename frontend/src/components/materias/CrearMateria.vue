<template>
  <v-container>
    <router-link to="/Materias"><v-btn> <v-icon>mdi-arrow-left</v-icon>volver</v-btn></router-link>
    <h1>
      <v-icon color="blue darken-4">mdi-plus-circle</v-icon> Crear nueva Materia
    </h1>

    <v-form>
      <v-text-field
        label="Descripcion"
        v-model="materiaNueva.nombre"
      ></v-text-field>
      
      <v-btn color="blue white--text" class="mr-4" @click="agregarMateria">
        Agregar Materia
      </v-btn>
    </v-form>
  </v-container>
</template>

<script>
import axios from "axios";
export default {
  name: "CrearMateria",
  data() {
    return {
      materiaNueva: {
        nombre: "",
    },
    };
  },
  methods: {
    async agregarMateria() {
      console.log(this.materiaNueva)
      await axios.post('/materia',this.materiaNueva)
        .then((response) => {
          this.$router.push("materias");
          console.log(response)
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
};
</script>