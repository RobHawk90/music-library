import ArtistList from './components/artists/ArtistList';
import ArtistForm from './components/artists/ArtistForm';
import AlbumList from './components/albums/AlbumList';
import AlbumForm from './components/albums/AlbumForm';
import Login from './components/Login';

export default {
    path: '/:lang',
    component: { template: '<router-view></router-view>' },
    icon: 'home',
    title: 'Home',
    children: [

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

    ],
};