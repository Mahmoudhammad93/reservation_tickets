<template>
    <div id="products">
        <div class="row mb-2">
            <div class="col-md-3 align-self-end">
                <a href="products/create" class="btn btn-outline-success btn-icon-text" v-if="auth_type == 'admin'">
                    <i class="mdi mdi-file-powerpoint-box"></i>
                    Add Product +
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Products</h4>
                        <div class="table-responsive">
                            <table class="table table-striped" v-if="products.length > 0">
                                <thead>
                                    <tr>
                                        <th>
                                            Product Name
                                        </th>
                                        <th>
                                            User
                                        </th>
                                        <th>
                                            Email
                                        </th>
                                        <th>
                                            Product CR
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="product in products" :key="product.id">
                                        <td>{{product.brand_name}}</td>
                                        <td>{{product.name}}</td>
                                        <td>{{product.email}}</td>
                                        <td>{{product.brand_cr}}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="alert alert-danger mt-4 mb-0" v-else>
                                No Data Found
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props:['auth_type','data'],
    data(){
        return{
            products: JSON.parse(this.data)
        }
    }
}
</script>
