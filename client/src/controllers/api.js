const API_BASE = "http://127.0.0.1:8000/api";

export default {
    FetchUsers: () => {
        return fetch(API_BASE + "/users/all")
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                return data.response.users;
            } else {
                throw data.response.error;
            }
        })
        .catch(err => {
            alert(err);
        });
    }
}