<template>
  <v-app>
    <v-navigation-drawer dark persistent :mini-variant="miniVariant" :clipped="true" v-model="drawer" enable-resize-watcher app>
      <v-list>
        <v-list-tile v-for="(route, index) in routes" :key="index" @click="" :to="{name: route.name, params: {lang}}">
          <v-list-tile-action>
            <v-icon>{{ route.icon }}</v-icon>
          </v-list-tile-action>
          <v-list-tile-content>
            <v-list-tile-title>{{ $t(route.title) }}</v-list-tile-title>
          </v-list-tile-content>
        </v-list-tile>
      </v-list>
    </v-navigation-drawer>

    <v-toolbar dark fixed app :clipped-left="true">
      <v-toolbar-side-icon @click.stop="drawer = !drawer"></v-toolbar-side-icon>
      <v-btn icon @click.stop="miniVariant = !miniVariant">
        <v-icon v-html="miniVariant ? 'chevron_right' : 'chevron_left'"></v-icon>
      </v-btn>
      <v-toolbar-title>Music Library</v-toolbar-title>
      <v-spacer></v-spacer>
      <form action="/logout" method="GET">
        <v-btn type="submit">Logout</v-btn>
      </form>
    </v-toolbar>

    <main>
      <v-content>
        <v-container fluid>
          <v-slide-y-transition mode="out-in">
            <router-view/>
          </v-slide-y-transition>
        </v-container>
      </v-content>
    </main>

    <v-footer dark :fixed="fixed" app>
      <v-layout justify-center row>
        <span>&copy; 2018 RunWeb - by Robhawk</span>
      </v-layout>
    </v-footer>
  </v-app>
</template>


<script>
  import routes from '../routes';

  export default {
    data () {
      return {
        routes: routes.children,
        lang: window.localStorage.getItem('lang'),
        drawer: true,
        fixed: false,
        miniVariant: false,
      }
    }
  }
</script>


<style lang="scss"></style>
