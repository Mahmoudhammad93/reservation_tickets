<template>
    <div id="products">
        <div class="row mb-2">
            <div class="col-md-3 align-self-end">
                <a href="products/create" class="btn btn-outline-success btn-icon-text" v-if="auth_type == 'admin'">
                    <i class="mdi mdi-ticket-account"></i>
                    Add Product +
                </a>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props:['auth_type']
}
</script>
