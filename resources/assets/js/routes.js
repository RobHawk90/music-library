import Home from './components/Home';
import ArtistList from './components/artists/ArtistList';
import ArtistForm from './components/artists/ArtistForm';
import AlbumList from './components/albums/AlbumList';
import AlbumForm from './components/albums/AlbumForm';
import UserList from './components/users/UserList';
import UserForm from './components/users/UserForm';

export default {
    path: '/:locale',
    component: { template: '<router-view></router-view>' },
    children: [

    {
        path: 'home',
        component: Home,
        icon: 'home',
        title: 'Home',
        name: 'home',
    },
    {
        path: 'list/artists',
        component: ArtistList,
        icon: 'person',
        title: 'Artists',
        name: 'artists',
    },
    {
        path: 'create/artists',
        component: ArtistForm,
        icon: 'person_add',
        title: 'New Artist',
        name: 'new_artist',
    },
    {
        path: 'list/albums',
        component: AlbumList,
        icon: 'album',
        title: 'Albums',
        name: 'albums',
    },
    {
        path: 'create/albums',
        component: AlbumForm,
        icon: 'create_new_folder',
        title: 'New Album',
        name: 'new_album',
    },
    {
        path: 'list/users',
        component: UserList,
        icon: 'person',
        title: 'Users',
        name: 'users',
    },
    {
        path: 'create/users',
        component: UserForm,
        icon: 'person_add',
        title: 'New User',
        name: 'new_user',
    },
    {
        path: 'edit/users/:id',
        component: UserForm,
        name: 'edit_user',
    },

    ],
};