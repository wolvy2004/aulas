<template>
  <v-container>
    <router-link to="/aulas"
      ><v-btn> <v-icon>mdi-arrow-left</v-icon>volver</v-btn></router-link
    >
    <h1>
      <v-icon color="blue darken-4">mdi-plus-circle</v-icon> Modificar Datos Aula
    </h1>

    <v-form>
      <v-text-field
        label="Descripcion"
        v-model="aulaModificar.descripcion"
      ></v-text-field>
      <v-text-field
        label="Ubicacion"
        v-model="aulaModificar.ubicacion"
      ></v-text-field>
      <v-text-field
        label="Cantidad de pcs"
        v-model="aulaModificar.cant_pcs"
      ></v-text-field>
      <v-text-field
        label="Edificio"
        v-model="aulaModificar.location_id"
      ></v-text-field>
      <v-checkbox v-model="aulaModificar.es_climatizada" label="Es climatizada">
      </v-checkbox>
      <v-btn color="green white--text" class="mr-4" @click="Modificar">
        Modificar
      </v-btn>
    </v-form>
  </v-container>
</template>

<script>
import axios from "axios";
export default {
  name: "ModificarAula",
  data() {
    return {
      aulaModificar: {
        descripcion: "",
        ubicacion: "",
        cant_pcs: "0",
        location_id: "",
        es_climatizada: false,
      },
    };
  },
  mounted() {
    this.buscar();
  },
  methods: {
    async buscar() {
      console.log(this.$route.params.id);
      await axios.get("/aula/" + this.$route.params.id).then((response) => {
        const {
          descripcion,
          ubicacion,
          cant_pcs,
          es_climatizada,
          location_id,
        } = response.data;
        (this.aulaModificar.descripcion = descripcion),
          (this.aulaModificar.ubicacion = ubicacion),
          (this.aulaModificar.cant_pcs = cant_pcs);
        (this.aulaModificar.es_climatizada = es_climatizada),
          (this.aulaModificar.location_id = location_id);
      });
    },
    async Modificar() {
      console.log(this.aulaModificar);
      await axios
        .put("/aula/" + this.$route.params.id, this.aulaModificar)
        .then(() => {
          this.$router.push("/aulas");
        });
    },
  },
};
</script>