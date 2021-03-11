<template>
    <div id="categories">
        <div class="row mb-2">
            <div class="col-md-3 align-self-end">
                <a href="categories/create" class="btn btn-outline-success btn-icon-text" v-if="auth_type == 'admin'">
                    <i class="mdi mdi-ticket-account"></i>
                    Add Category +
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Categories</h4>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>
                                            Category Name
                                        </th>
                                        <th>
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="category in JSON.parse(categories)" :key="category.id">
                                        <td>{{category.name}}</td>
                                        <td>
                                            <p v-for="perm in JSON.parse(permissions)" :key="perm.id">
                                                <a v-if="auth_type == 'admin' || perm.open == 1" :href="`/admin/category/${category.id}`" class="btn btn-primary">View</a>
                                                <a v-if="auth_type == 'admin' || perm.edit == 1" :href="`/admin/category/${category.id}/edit`" class="btn btn-success">Edit</a>
                                                <a v-if="auth_type == 'admin' || perm.delete == 1" :href="`/admin/category/${category.id}/delete`" class="btn btn-danger" @click.prevent="delete_category(category)">Delete</a>
                                                <a v-if="auth_type == 'admin' || perm.close == 1" :href="`/admin/category/${category.id}/close`" class="btn btn-secondary">Close</a>
                                            </p>

                                        </td>
                                    </tr>
                                </tbody>
                            </table>
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
        'categories',
        'auth_type',
        'permissions'
    ]
}
</script>