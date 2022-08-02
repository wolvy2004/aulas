<template>
  <v-app class="pa-md-15">
    <h1>Materias</h1>
    <router-link to="crear_materia"
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
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="materia in materiaslista" :key="materia.id">
            <td>{{ materia.id }}</td>
            <td>{{ materia.nombre }}</td>
            
            <td>
              <v-btn tile color="error" @click="borrar(materia.id)">
                <v-icon left> mdi-eraser </v-icon>
                Borrar
              </v-btn>
              <router-link :to ='{name:"ModificarMateria", params:{id:materia.id}}' ><v-btn tile color="success">
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
      materiaslista: [],
      id: "",
      nombre:""
    };
  },
  created: function () {
    this.getmaterias();
  },
  methods: {
    getmaterias: function () {
      console.log("exito");
      axios.get("/materia").then((response) => {
        this.materiaslista = response.data;
        console.log(response);
      });
    },
    borrar: function (id) {
      if (confirm("¿Desea eliminar el materia seleccionada?")) {
        axios.delete("/materia/"+ id).then(() => {
          this.getmaterias();
          
        });
      }
    },
  
  },
};
</script>