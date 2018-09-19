import Home from './components/Home'
import ArtistList from './components/artists/ArtistList'
import ArtistForm from './components/artists/ArtistForm'
import AlbumList from './components/albums/AlbumList'
import AlbumForm from './components/albums/AlbumForm'
import UserList from './components/users/UserList'
import UserForm from './components/users/UserForm'

export default {
  path: '/:locale',
  component: { template: '<router-view></router-view>' },
  children: [

    {
      path: 'home',
      component: Home,
      name: 'home',
      meta: { title: 'Home', icon: 'home' }
    },
    {
      path: 'list/artists',
      component: ArtistList,
      name: 'artists',
      meta: { title: 'Artists', icon: 'person' }
    },
    {
      path: 'create/artists',
      component: ArtistForm,
      name: 'new_artist',
      meta: { title: 'New Artist', icon: 'person_add', access: 'User' }
    },
    {
      path: 'edit/artists/:id',
      component: ArtistForm,
      name: 'edit_artist',
      meta: { access: 'User' }
    },
    {
      path: 'list/albums',
      component: AlbumList,
      name: 'albums',
      meta: { title: 'Albums', icon: 'album' }
    },
    {
      path: 'edit/albums/:id',
      component: AlbumForm,
      name: 'edit_album',
      meta: { access: 'User' }
    },
    {
      path: 'create/albums',
      component: AlbumForm,
      name: 'new_album',
      meta: { title: 'New Album', icon: 'create_new_folder', access: 'User' }
    },
    {
      path: 'list/users',
      component: UserList,
      name: 'users',
      meta: { title: 'Users', icon: 'person', access: 'Admin' }
    },
    {
      path: 'create/users',
      component: UserForm,
      name: 'new_user',
      meta: { title: 'New User', icon: 'person_add', access: 'Admin' }
    },
    {
      path: 'edit/users/:id',
      component: UserForm,
      name: 'edit_user',
      meta: { access: 'Admin' }
    }

  ]
}
