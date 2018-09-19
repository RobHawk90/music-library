export default class Resource {
  constructor () {
    const locale = window.localStorage.getItem('locale') || 'en'
    this.baseUrl = `/api/${locale}/`
  }

  get (url) {
    return window.axios.get(this.baseUrl + url)
  }

  post (url, data) {
    return window.axios.post(this.baseUrl + url, data)
  }

  put (url, data) {
    return window.axios.put(this.baseUrl + url, data)
  }

  delete (url) {
    return window.axios.delete(this.baseUrl + url)
  }
}
