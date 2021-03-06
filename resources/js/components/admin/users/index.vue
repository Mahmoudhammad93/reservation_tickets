<template>
    <div class="users">
        <div class="row mb-2">
            <div class="col-md-3 align-self-end">
                <a href="users/create" class="btn btn-outline-success btn-icon-text">
                    <i class="mdi mdi-account-plus"></i>
                    Add User
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4" v-for="user in users_data" :key="user.id">
                <div class="card card-primary card-outline">
                    <div class="card-body">
                        <div class="user">
                            <div class="image">
                                <img :src="`${default_path}/${user.image}`" v-if="user.image != null" alt="">
                                <img :src="`${default_path}/default.png`" v-else alt="">
                            </div>
                            <div class="info">
                                <p class="name">
                                    <a :href="`/admin/user/${user.id}`">
                                        {{user.first_name +' '+ user.last_name}}
                                    </a>
                                </p>
                                <p class="email">{{user.email}}</p>
                            </div>
                        </div>
                        <div class="action mt-2" v-if="auth_type == 'admin'">
                            <a :href="`/admin/user/${user.id}/edit`" class="btn btn-info btn-block"><i class="mdi mdi-pencil"></i> Edit</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props:[
        'users',
        'default_path',
        'auth_type'
    ],
    data(){
        return{
            users_data:JSON.parse(this.users)
        }
    },
    created(){
        console.log(this.auth_type)
    },
    methods:{

    }
}
</script>
