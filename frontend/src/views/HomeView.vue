<template>
  <div class="home">

   <AulasHome/>
   <v-container> <calendario/>
    <almanaque/>
    </v-container>
  </div>
</template>

<script>
// @ is an alias to /src
import AulasHome from '@/components/AulasHome.vue'
import Calendario from '@/components/CalendarioComponent.vue'
import Almanaque from '@/components/auxiliares/PickerCalendar.vue'

export default {
  name: 'HomeView',
  components: {
    AulasHome,
    Calendario,
    Almanaque,
  }
}
</script>
