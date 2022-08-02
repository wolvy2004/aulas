import Vue from 'vue'
import VueRouter from 'vue-router'
import HomeView from '../views/HomeView.vue'
import AboutView from '../views/AboutView.vue'
// Rutas Aulas
import AulasListar from '../components/aulas/AulasListar.vue'
import AulaCrear from '../components/aulas/AulaCrear.vue'
import AulaModificar from '../components/aulas/AulaModificar.vue'
// Rutas Profesores
import ListarProfesores from '../components/profesores/ListarProfesores.vue'
import CrearProfesor from '../components/profesores/CrearProfesor.vue'
import ModificarProfesor from '../components/profesores/ModificarProfesor.vue'
// Rutas Materias
import ListarMaterias from '@/components/materias/ListarMaterias.vue'
import CrearMateria from '@/components/materias/CrearMateria.vue'
import ModificarMateria from '@/components/materias/ModificarMateria.vue'
// Rutas Reservas
import CrearReserva from '@/components/reservas/CrearReserva.vue'
import ModificarReserva from '@/components/reservas/ModificarReserva.vue'


Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView
  },
  {
    path: '/about',
    name: 'About',
    component: AboutView
  },
  {
    path: '/aulas',
    name: 'AulaListar',
    component: AulasListar
  },
  {
    path: '/crear_aula',
    name: 'CrearAula',
    component: AulaCrear
  },
  {
    path: '/modificar_aula/:id',
    name: 'ModificarAula',
    component: AulaModificar
  },
  {
    path: '/materias',
    name: 'ListarMaterias',
    component: ListarMaterias
  },
  {
    path: '/crear_materia',
    name: 'CrearMateria',
    component: CrearMateria
  },
  {
    path: '/modificar_materia/:id',
    name: 'ModificarMateria',
    component: ModificarMateria
  }
  ,
  {
    path: '/profesores',
    name: 'ListarProfesores',
    component: ListarProfesores
  },
  {
    path: '/crear_profesores',
    name: 'CrearProfesores',
    component: CrearProfesor
  },
  {
    path: '/modificar_profesor/:id',
    name: 'ModificarProfesor',
    component: ModificarProfesor
  }
  ,
  {
    path: '/crear_reservas',
    name: 'CrearReservas',
    component: CrearReserva
  },
  {
    path: '/modificar_reserva/:id',
    name: 'ModificarReserva',
    component: ModificarReserva
  }
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
