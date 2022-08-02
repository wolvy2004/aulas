<template>
  <v-container>
    <router-link to="/aulas">
      <v-btn>
        <v-icon>mdi-arrow-left</v-icon>volver
      </v-btn>
    </router-link>
    <h1>
      <v-icon color="blue darken-4">mdi-plus-circle</v-icon> Crear nueva Aula
    </h1>

    <v-form v-model="valid" lazy-validation>
      <v-text-field label="Descripcion" v-model="aulaNueva.descripcion" :rules="Rules" required></v-text-field>
      <v-select v-model='aulaNueva.Location_id' :items="items" item-value="id" label="Edificio"></v-select>
      <v-text-field :rules="Rules" required label="Cantidad de pcs" v-model="aulaNueva.cant_pcs"></v-text-field>
      <v-checkbox v-model="aulaNueva.es_climatizada" label="Es climatizada">
      </v-checkbox>
      <v-btn color="blue white--text" class="mr-4" @click="agregarAula">
        Agregar Aula
      </v-btn>
    </v-form>
  </v-container>
</template>

<script>
import axios from 'axios';
export default {
  name: "CrearAula",
  data() {
    return {
      Rules: [(v) => !!v || "Campo requerido"],
      items: [{ text: 'CURZA', id: 1 }, { text: 'PAULO VI', id: 2 }],
      valid: true,
      aulaNueva: {
        descripcion: "",
        cant_pcs: "0",
        Location_id: '',
        es_climatizada: false,
        aforo: false,
      },
    };
  },
  created: function () {
    this.listarUbicaciones();
  },
  methods: {
    async listarUbicaciones() {
      await axios
        .get("ap1v1/location")
        .then((response) => {
        for (let i = 0; i < response.data.length; i++) {
            this.items.text = response.data[i].descripcion,
            this.items.id = response.data[i].id
          
          } 
          console.log(this.items)
        })
        .catch((error) => {
          console.log(error);
        });
    },
    async agregarAula() {
      console.log(this.aulaNueva);
      await axios
        .post("ap1v1/aula", this.aulaNueva)
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