import Resource from './Resource';

export default class ArtistResource extends Resource {
    save(artist) {
        const options = { headers: {'Content-Type': 'multipart/form-data'} };
        const data = new FormData();
        data.append('image', artist.image);
        data.append('name', artist.name);
        data.append('description', artist.description);
        data.append('genre', artist.genre);

        if(artist.id)
            return this.put(`artists/${artist.id}`, artist).then(res => res.data);
        else
            return axios.post(this.baseUrl + 'artists', data, options).then(res => res.data);
    }
}
