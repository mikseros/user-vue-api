<template>
  <div class="user-form">
      <div class="form-overlay" @click="() => toggleForm()"></div>
      <form class="form" @submit.prevent="(userId == false) ? AddNewUser() : UpdateUser();">
          <h3>User form</h3>
          <div class="form-group">
              <label for="name">Name</label>
              <input type="text" name="name" id="name" class="form-control" v-model="user.name" />
          </div>

          <div class="form-group">
              <label for="email">Email</label>
              <input type="email" name="email" id="email" class="form-control" v-model="user.email" />
          </div>

          <div class="form-group" v-if="userId == false">
              <label for="password">Password</label>
              <input type="password" name="password" id="password" class="form-control" v-model="user.password" />
          </div>

          <input type="submit" :value="(userId != false) ? 'Update' : 'Add'" class="button" />
      </form>
  </div>
</template>

<script>
import { ref } from 'vue';
import APIController from '@/controllers/api';

export default {
    props: ["toggleForm", "fetchUsers", "userId"],
    setup (props) {
        const user = ref({});

        const GetUser = async () => {
            user.value = await APIController.FetchUser(props.userId);

        }

        const AddNewUser = async () => {
            let tempUser = await APIController.CreateUser(user.value.name, user.value.email, user.value.password);
            if (tempUser) {
                props.fetchUsers();
                props.toggleForm();
            }
        }

        const UpdateUser = async () => {
            let tempUser = await APIController.UpdateUser(user.value.name, user.value.email, props.userId);
            if (tempUser) {
                props.fetchUsers();
                props.toggleForm();
            }
        }

        return {
            user,
            GetUser,
            AddNewUser,
            UpdateUser
        }
    },
    mounted () {
        if (this.userId != false) {
            this.GetUser();
        }
        
    }
}
</script>

<style>
.user-form {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    z-index: 99;

    display: flex;
    align-items: center;
    justify-content: center;
}

.user-form .form-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    z-index: 0;
    background-color: rgba(0, 0, 0, 0.6);
}

.user-form .form {
    position: relative;
    z-index: 1;
    background-color: #FFF;
    padding: 16px;
    border-radius: 8px;
    width: 100%;
    max-width: 480px;
}

.user-form .form h3 {
    color: var(--dark);
    font-size: 28px;
    margin-bottom: 16px;
}

.form-group {
    display: block;
    margin-bottom: 16px;
}

.form-group label {
    display:block;
    margin-bottom: 4px;
}

.form-group .form-control {
    display: block;
    width: 100%;
    border: 1px solid var(--light);
    padding: 12px 16px;
    border-radius: 4px;
    transition: 0.4s;
    font-size: 18px;
    color: var(--grey);
}

.form-group .form-control:focus {
    box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.15);
    border-color: transparent;
}
</style>