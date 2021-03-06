<template>
    <div id="data">
        <div class="row">
            <div class="col-2">
            {{data.name}}
                <input
                    type="hidden"
                    name="name"
                />
            </div>
            <div class="col-2">
                <p class="mb-2">Create</p>
                <label class="toggle-switch toggle-switch-success">
                    <input
                        type="checkbox"
                        @change="createPermission($event)"
                        :checked="(data.create == 1)?'checked':''"
                    />
                    <span class="toggle-slider round"></span>
                </label>
            </div>
            <div class="col-2">
                <p class="mb-2">Edit</p>
                <label class="toggle-switch toggle-switch-success">
                    <input
                        type="checkbox"
                        @change="editPermission($event)"
                        :checked="(data.edit == 1)?'checked':''"
                    />
                    <span class="toggle-slider round"></span>
                </label>
            </div>
            <div class="col-2">
                <p class="mb-2">Delete</p>
                <label class="toggle-switch toggle-switch-success">
                    <input
                        type="checkbox"
                        @change="deletePermission($event)"
                        :checked="(data.delete == 1)?'checked':''"
                    />
                    <span class="toggle-slider round"></span>
                </label>
            </div>
            <div class="col-2">
                <p class="mb-2">Close</p>
                <label class="toggle-switch toggle-switch-success">
                    <input
                        type="checkbox"
                        @change="closePermission($event)"
                        :checked="(data.close == 1)?'checked':''"
                    />
                    <span class="toggle-slider round"></span>
                </label>
            </div>
            <div class="col-2">
                <p class="mb-2">Open</p>
                <label class="toggle-switch toggle-switch-success">
                    <input
                        type="checkbox"
                        @change="openPermission($event)"
                        :checked="(data.open == 1)?'checked':''"
                    />
                    <span class="toggle-slider round"></span>
                </label>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props:[
        'data',
        'user_id'
    ],
    data(){
        return{
            checked:false
        }
    },
    mounted(){
    },
    created(){
    },
    methods:{
        createPermission(e){
            (e.target.checked == true)?this.data.create = 1:this.data.create = 0;
        },
        editPermission(e){
            (e.target.checked == true)?this.data.edit = 1:this.data.edit = 0;
        },
        deletePermission(e){
            (e.target.checked == true)?this.data.delete = 1:this.data.delete = 0;
        },
        closePermission(e){
            (e.target.checked == true)?this.data.close = 1:this.data.close = 0;
        },
        openPermission(e){
            (e.target.checked == true)?this.data.open = 1:this.data.open = 0;
        }
    }
}
</script>
