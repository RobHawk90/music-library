<template>
  <v-app>
    <v-navigation-drawer dark persistent :mini-variant="miniVariant" :clipped="true" v-model="drawer" enable-resize-watcher app>
      <v-list>
        <v-list-tile v-for="(route, index) in routes" :key="index" @click="" :to="{name: route.name, params: {locale}}">
          <v-list-tile-action>
            <v-icon>{{ route.meta.icon }}</v-icon>
          </v-list-tile-action>
          <v-list-tile-content>
            <v-list-tile-title>{{ $t(route.meta.title) }}</v-list-tile-title>
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
      <v-btn icon :to="{name: 'home'}"><v-icon>search</v-icon></v-btn>
      <v-menu>
        <v-btn slot="activator" icon><v-icon>language</v-icon></v-btn>
        <v-list>
          <v-list-tile v-for="lang in languages" :key="lang" @click="changeLanguage(lang)">
            {{ lang }}
          </v-list-tile>
        </v-list>
      </v-menu>
      <form action="/logout" method="GET">
        <v-btn type="submit" icon><v-icon>exit_to_app</v-icon></v-btn>
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
    created() {
        this.checkUserAccess();
    },
    data () {
      return {
        routes: [],
        languages: ['en', 'pt-BR'],
        locale: window.localStorage.getItem('locale'),
        drawer: true,
        fixed: false,
        miniVariant: false,
        searchText: '',
        searchData: {},
      };
    },
    methods: {
      changeLanguage(locale) {
        let currentRoute = this.$router.currentRoute.name || 'home';
        this.$router.push({name: currentRoute, params: {locale}});
        this.$router.go();
      },
      search() {
        const search = this.searchText;
        axios.post('/search', { search }).then(res => this.searchData = res.data);
      },
      checkUserAccess() {
        axios.get('/user').then(res => {
            const user = res.data;
            const visibleRoutes = routes.children.filter(route => {
                const meta = route.meta;
                const hasAccess = user.access === 'Admin' || meta.access === user.access || !meta.access;
                return meta.title && hasAccess;
            });
            this.routes = visibleRoutes;
        });
      },
    },
  }
</script>


<style lang="scss"></style>
