<template>
  <v-container>
    <router-link to="/aulas"
      ><v-btn> <v-icon>mdi-arrow-left</v-icon>volver</v-btn></router-link
    >
    <h1>
      <v-icon color="blue darken-4">mdi-plus-circle</v-icon> Crear nueva Aula
    </h1>

    <v-form v-model="valid" lazy-validation>
      <v-text-field
        label="Descripcion"
        v-model="aulaNueva.descripcion"
        :rules="Rules"
        required
      ></v-text-field>
      <v-text-field
        label="Ubicacion"
        :rules="Rules"
        required
        v-model="aulaNueva.ubicacion"
      ></v-text-field>
      <v-text-field
        :rules="Rules"
        required
        label="Cantidad de pcs"
        v-model="aulaNueva.cant_pcs"
      ></v-text-field>
      <v-text-field
        label="Edificio"
        v-model="aulaNueva.location_id"
      ></v-text-field>
      <v-checkbox v-model="aulaNueva.es_climatizada" label="Es climatizada">
      </v-checkbox>
      <v-btn color="blue white--text" class="mr-4" @click="agregarAula">
        Agregar Aula
      </v-btn>
    </v-form>
  </v-container>
</template>

<script>
import axios from "axios";
export default {
  name: "CrearAula",
  data() {
    return {
      Rules: [(v) => !!v || "Campo requerido"],
      aulaNueva: {
        valid: true,
        descripcion: "",
        ubicacion: "",
        cant_pcs: "0",
        location_id: "",
        es_climatizada: false,
      },
    };
  },
  methods: {
    async agregarAula() {
      console.log(this.aulaNueva);
      await axios
        .post("/aula", this.aulaNueva)
        .then((response) => {
          this.$router.push("aulas");
          console.log(response);
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
};
</script>