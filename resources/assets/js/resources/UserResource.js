import Resource from './Resource';

export default class UserResource extends Resource {
    listAll() {
        return this.get('users').then(res => res.data);
    }

    save(user) {
        if(user.id)
            return this.put(`users/${user.id}`, user).then(res => res.data);
        else
            return this.post('users', user).then(res => res.data);
    }

    findById(id) {
        return this.get(`users/${id}`).then(res => res.data);
    }

    remove(id) {
        return this.delete(`users/${id}`).then(res => res.data.msg);
    }
}
