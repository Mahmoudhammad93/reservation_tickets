<template>
    <div class="master">
        <div class="card card-primary card-outline mt-4">
            <div class="card-body">
                <h4 class="title p-3 m-0">
                    Add Your Master
                </h4>
                <div class="edu_card masters mb-2" v-for="master in masters" :key="master.id">
                    <div class="options">
                        <span class="edit" @click="editMaster(master)">
                            <i class="mdi mdi-pencil"></i> Edit
                        </span>
                        <span class="delete" @click="removeMaster(master)">
                            <i class="mdi mdi-delete"></i> Delete
                        </span>
                    </div>
                    <div class="edu_title">
                        <h4>
                            {{master.name}}
                        </h4>
                    </div>
                    <ul class="list-unstyled m-0 list-arrow">
                        <li>
                            <p>
                                {{master.university}}
                            </p>
                        </li>
                        <li>
                            <p class="m-0">
                                {{master.from}} - {{master.to}}
                            </p>
                        </li>
                    </ul>
                </div>
                <form class="forms-sample" v-if="show" @submit.prevent="add_master(masters)">
                    <div class="form-group">
                        <label for="name">Master</label>
                        <input
                            type="text"
                            class="form-control"
                            id="name"
                            name="name"
                            placeholder="Master Name"
                            v-model="masters.name"
                        />
                    </div>
                    <div class="form-group">
                        <label for="university">University Name</label>
                        <input
                            type="text"
                            class="form-control"
                            id="university"
                            name="university"
                            placeholder="University Name"
                            v-model="masters.university"
                        />
                    </div>
                    <div class="form-group">
                        <label for="from">From</label>
                        <input
                            type="date"
                            class="form-control"
                            id="from"
                            name="from"
                            placeholder="From"
                            v-model="masters.from"
                        />
                    </div>
                    <div class="form-group">
                        <label for="to">To</label>
                        <input
                            type="date"
                            class="form-control"
                            id="to"
                            name="to"
                            placeholder="To"
                            v-model="masters.to"
                        />
                    </div>
                    <button
                        @click.prevent="updateMaster(obj_id, masters)"
                        v-if="update"
                        class="btn btn-success btn-block mr-2"
                    >
                        Update
                    </button>
                    <button
                        type="submit"
                        class="btn btn-primary btn-block mr-2"
                        v-else
                    >
                        Save
                    </button>
                </form>
                <div class="mt-4">
                    <a href="" @click.prevent="show =! show; update =! update" v-if="show">- Cancel</a>
                    <a href="" @click.prevent="show =! show; addNew()" v-else>+ Add Master</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props:[],
    data(){
        return{
            masters:[],
            show: false,
            update: false,
            obj_id:null
        }
    },
    created(){

    },
    mounted(){
        this.get_masters()
    },
    methods:{
        add_master(obj){
            if (obj.name != null && obj.university != null && obj.from != null && obj.to != null){
                axios.post(`/admin/add_master`,{name: obj.name, university: obj.university, from: obj.from, to: obj.to})
                .then((res) => {
                    Vue.$toast.success('Master Added Successfully.', {})
                    this.masters.push(res.data)
                    this.masters.name = null;
                    this.masters.university = null;
                    this.masters.from = null;
                    this.masters.to = null;
                })
                .catch((err) => {
                    Vue.$toast.error(err, {
                        position: "bottom-right"
                    });
                });
            }else{
                Vue.$toast.error('Complete your info.', {})
            }
        },
        get_masters(){
            axios.get(`/admin/get_masters`)
            .then((res) => {
                this.masters = res.data
            })
            .catch((err) => {
                    Vue.$toast.error(err, {
                        position: "bottom-right"
                    });
                });
        },
        removeMaster(obj) {
            axios.post(`/admin/delete_master/${obj.id}`)
            .then((res)=>{
                this.masters.splice(this.masters.indexOf(obj), 1)
                // console.log(res.data)
            })
            .catch((err) => {
                    Vue.$toast.error(err, {
                        position: "bottom-right"
                    });
                });
        },
        editMaster(obj) {
            this.show = false
            this.update = true
            this.obj_id = obj.id
            axios.get(`/admin/get_master/${obj.id}`)
            .then((res)=>{
                this.masters.name = res.data.name
                this.masters.university = res.data.university
                this.masters.from = res.data.from
                this.masters.to = res.data.to
                this.show = true
            })
            .catch((err) => {
                    Vue.$toast.error(err, {
                        position: "bottom-right"
                    });
                });
        },
        updateMaster(obj_id, obj){
            const object = this.masters.find( ({ id }) => id === obj_id );
            if (obj.name != null && obj.university != null && obj.from != null && obj.to != null){
                axios.post(`/admin/update_master/${object.id}`,{name: obj.name, university: obj.university, from: obj.from, to: obj.to})
                .then((res) => {
                    Vue.$toast.success('master Updated Successfully.', {})
                    object.name = res.data.name
                    object.university = res.data.university
                    object.from = res.data.from
                    object.to = res.data.to
                })
                .catch((err) => {
                    Vue.$toast.error(err, {
                        position: "bottom-right"
                    });
                });
            }else{
                Vue.$toast.error('Complete your info.', {})
            }
        },
        addNew(){
            this.masters.name = null;
            this.masters.university = null;
            this.masters.from = null;
            this.masters.to = null;
        }
    }
}
</script>
