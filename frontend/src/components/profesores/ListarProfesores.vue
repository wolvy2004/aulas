<template>
  <v-app class="pa-md-15">
    <h1>Profesores</h1>
    <router-link to="crear_Profesor"
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
          <tr v-for="Profesor in Profesoreslista" :key="Profesor.id">
            <td>{{ Profesor.id }}</td>
            <td>{{ Profesor.nombre }}</td>
            
            <td>
              <v-btn tile color="error" @click="borrar(Profesor.id)">
                <v-icon left> mdi-eraser </v-icon>
                Borrar
              </v-btn>
              <router-link :to ='{name:"ModificarProfesor", params:{id:Profesor.id}}' ><v-btn tile color="success">
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
      Profesoreslista: [],
      id: "",
      nombre:""
    };
  },
  created: function () {
    this.getProfesors();
  },
  methods: {
    getProfesors: function () {
      console.log("exito");
      axios.get("/Profesor").then((response) => {
        this.Profesoreslista = response.data;
        console.log(response);
      });
    },
    borrar: function (id) {
      if (confirm("¿Desea eliminar el Profesor seleccionada?")) {
        axios.delete("/Profesor/"+ id).then(() => {
          this.getProfesors();
          
        });
      }
    },
  
  },
};
</script>