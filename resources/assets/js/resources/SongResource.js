import Resource from './Resource'

export default class SongResource extends Resource {
  save (song) {
    if (song.id) {
      return this.put(`songs/${song.id}`, song)
        .then(res => res.data)
    } else {
      return this.post('songs', song)
        .then(res => res.data)
    }
  }

  remove (id) {
    return this.delete(`songs/${id}`)
  }
}
