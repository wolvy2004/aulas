<template>
<v-container>
  <v-row class="fill-height">
    <v-col>
      <v-sheet height="64">
        <v-toolbar
          elevation="4"
        ><v-btn
             class="white--text mr-4"
            color="blue darken-2"
            ><v-icon class="mr-4" >mdi-calendar-edit</v-icon>
            NUEVA RESERVA
          </v-btn>
          <v-btn
            outlined
            class="mr-4"
            color="grey darken-2"
            @click="setToday"
          >
            HOY
          </v-btn>
          <v-btn
            fab
            text
            small
            color="grey darken-2"
            @click="prev"
          >
            <v-icon small>
              mdi-chevron-left
            </v-icon>
          </v-btn>
          <v-btn
            fab
            text
            small
            color="grey darken-2"
            @click="next"
          >
            <v-icon small>
              mdi-chevron-right
            </v-icon>
          </v-btn>
          <v-toolbar-title v-if="$refs.calendar">
            {{ $refs.calendar.title }}
          </v-toolbar-title>
          <v-spacer></v-spacer>
        </v-toolbar>
      </v-sheet>
      <v-sheet height="600" >
        <v-calendar 
          ref="calendar"
          v-model="focus"
          color="primary"
          type="category"
          first-interval =8
          interval-count =14
          :categories="categories"
          :events="events"
          :event-color="getEventColor"
        
        ></v-calendar>
      </v-sheet>
    </v-col>
  </v-row>
  </v-container>
</template>

<script>
  export default {
    data: () => ({
      focus: '',
      events: [],
      colors: ['blue', 'indigo', 'deep-purple', 'cyan', 'green', 'orange', 'grey darken-1'],
      names: [],
      categories: ['aula01', 'aula02', 'aula01', 'aula02', 'aula01', 'aula02', 'aula01', 'aula02'],
    }),
    mounted () {
      this.$refs.calendar.checkChange()
    },
    methods: {
      getEventColor (event) {
        return event.color
      },
      setToday () {
        this.focus = ''
      },
      prev () {
        this.$refs.calendar.prev()
      },
      next () {
        this.$refs.calendar.next()
      },
      fetchEvents ({ start, end }) {
        const events = []

        const min = new Date(`${start.date}T00:00:00`)
        const max = new Date(`${end.date}T23:59:59`)
        const days = (max.getTime() - min.getTime()) / 86400000
        const eventCount = this.rnd(days, days + 20)

        for (let i = 0; i < eventCount; i++) {
          const allDay = this.rnd(0, 3) === 0
          const firstTimestamp = this.rnd(min.getTime(), max.getTime())
          const first = new Date(firstTimestamp - (firstTimestamp % 900000))
          const secondTimestamp = this.rnd(2, allDay ? 288 : 8) * 900000
          const second = new Date(first.getTime() + secondTimestamp)

          events.push({
            name: this.names[this.rnd(0, this.names.length - 1)],
            start: first,
            end: second,
            color: this.colors[this.rnd(0, this.colors.length - 1)],
            timed: !allDay,
            category: this.categories[this.rnd(0, this.categories.length - 1)],
          })
        }

        this.events = events
      },
      rnd (a, b) {
        return Math.floor((b - a + 1) * Math.random()) + a
      },
    },
  }
</script>