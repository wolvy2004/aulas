<template>
  <v-app class="pa-md-15">
    <h1>AULAS</h1>
    <router-link to="crear_aula"
      ><v-btn tile color="primary">
        <v-icon left> mdi-plus-circle </v-icon>
        Crear
      </v-btn></router-link
    >

    <v-simple-table>
      <template>
        <thead>
          <tr>
            <th>id</th>
            <th>Descripcion</th>
            <th>Ubicacion</th>
            <th>Edificio</th>
            <th>Cantidad de pcs</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="aula in aulaslista" :key="aula.id">
            <td>{{ aula.id }}</td>
            <td>{{ aula.descripcion }}</td>
            <td>{{ aula.ubicacion }}</td>
            <td>{{ aula.location_id }}</td>
            <td>{{ aula.cant_pcs }}</td>
            <td>
              <v-btn tile color="error" @click="borrar(aula.id)">
                <v-icon left> mdi-eraser </v-icon>
                Borrar
              </v-btn>
              <router-link :to ='{name:"ModificarAula", params:{id:aula.id}}' ><v-btn tile color="success">
                <v-icon left> mdi-pencil </v-icon>
                Editar
              </v-btn>
              </router-link>
            </td>
          </tr>
        </tbody>
      </template>
    </v-simple-table>
  </v-app>
</template>

<script>
import axios from "axios";
export default {
  data() {
    return {
      aulaslista: [],
      id: "",
    };
  },
  created: function () {
    this.getAulas();
  },
  methods: {
    getAulas: function () {
      console.log("exito");
      axios.get("/aula").then((response) => {
        this.aulaslista = response.data;
        console.log(response);
      });
    },
    borrar: function (id) {
      if (confirm("¿Desea eliminar el aula seleccionada?")) {
        axios.delete("/aula/"+ id).then(() => {
          this.getAulas();
          
        });
      }
    },
  
  },
};
</script>