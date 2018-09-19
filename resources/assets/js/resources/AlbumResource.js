import Resource from './Resource'

export default class AlbumResource extends Resource {
  listAll () {
    return this.get('albums')
      .then(res => res.data)
  }

  remove (id) {
    return this.delete(`albums/${id}`)
      .then(res => res.data.msg)
  }

  findById (id) {
    return this.get(`albums/${id}`)
      .then(res => res.data)
  }

  listAllArtists () {
    return this.get('artists')
      .then(res => res.data)
  }

  save (album) {
    const boundary = 'boundary=' + Math.random().toString().substr(2)
    const options = { headers: { 'Content-Type': `multipart/form-data;${boundary}` } }
    const body = this._formData(album)

    if (album.id) {
      body.append('_method', 'PUT')
      return window.axios
        .post(`${this.baseUrl}albums/${album.id}`, body, options)
        .then(res => res.data)
    } else {
      return window.axios
        .post(this.baseUrl + 'albums', body, options)
        .then(res => res.data)
    }
  }

  _formData (album) {
    const data = new window.FormData()
    data.append('image', album.image || '')
    data.append('name', album.name || '')
    data.append('year', album.year || '')
    data.append('artist_id', album.artist_id || '')
    return data
  }
}
