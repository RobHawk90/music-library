export default class Resource {
    constructor() {
        const locale = window.localStorage.getItem('locale') || 'en';
        this.baseUrl = `/api/${locale}/`;
    }

    get(url) {
        return axios.get(this.baseUrl + url);
    }

    post(url, data) {
        return axios.post(this.baseUrl + url, data);
    }

    put(url, data) {
        return axios.put(this.baseUrl + url, data);
    }

    delete(url) {
        return axios.delete(this.baseUrl + url);
    }
}
