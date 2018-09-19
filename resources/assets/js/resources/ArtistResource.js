import Resource from './Resource'

export default class ArtistResource extends Resource {
  listAll () {
    return this.get('artists')
      .then(res => res.data)
  }

  remove (id) {
    return this.delete(`artists/${id}`)
      .then(res => res.data.msg)
  }

  findById (id) {
    return this.get(`artists/${id}`)
      .then(res => res.data)
  }

  save (artist) {
    const boundary = 'boundary=' + Math.random().toString().substr(2)
    const options = { headers: { 'Content-Type': `multipart/form-data;${boundary}` } }
    const body = this._formData(artist)

    if (artist.id) {
      body.append('_method', 'PUT')
      return window.axios
        .post(`${this.baseUrl}artists/${artist.id}`, body, options)
        .then(res => res.data)
    } else {
      return window.axios
        .post(this.baseUrl + 'artists', body, options)
        .then(res => res.data)
    }
  }

  _formData (artist) {
    const data = new window.FormData()
    data.append('image', artist.image || '')
    data.append('name', artist.name || '')
    data.append('description', artist.description || '')
    data.append('genre', artist.genre || '')
    return data
  }
}
