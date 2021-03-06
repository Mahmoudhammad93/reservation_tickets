<template>
    <div class="master">
        <div class="card card-primary card-outline mt-4">
            <div class="card-body">
                <h4 class="title p-3">
                    Add Your Doctorate
                </h4>
                <div class="edu_card doctorates mb-2" v-for="doctorate in doctorates" :key="doctorate.id">
                    <div class="options">
                        <span class="edit" @click="editDoctorate(doctorate)">
                            <i class="mdi mdi-pencil"></i> Edit
                        </span>
                        <span class="delete" @click="removeDoctorate(doctorate)">
                            <i class="mdi mdi-delete"></i> Delete
                        </span>
                    </div>
                    <div class="edu_title">
                        <h4>
                            {{doctorate.name}}
                        </h4>
                    </div>
                    <ul class="list-unstyled m-0 list-arrow">
                        <li>
                            <p>{{doctorate.university}}</p>
                        </li>
                        <li v-if="doctorate.description !== null">
                            <p>{{doctorate.description}}</p>
                        </li>
                        <li>
                            <p class="m-0">
                                {{doctorate.from}} - {{doctorate.to}}
                            </p>
                        </li>
                    </ul>
                </div>
                <form class="forms-sample" v-if="show" @submit.prevent="add_doctorate(doctorates)">
                    <div class="form-group">
                        <label for="name">Doctorate</label>
                        <input
                            type="text"
                            class="form-control"
                            id="name"
                            name="name"
                            placeholder="Doctorate Name"
                            v-model="doctorates.name"
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
                            v-model="doctorates.university"
                        />
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea
                            class="form-control"
                            id="description"
                            name="description"
                            placeholder="Description"
                            v-model="doctorates.description"
                        ></textarea>
                    </div>
                    <div class="form-group">
                        <label for="from">From</label>
                        <input
                            type="date"
                            class="form-control"
                            id="from"
                            name="from"
                            placeholder="From"
                            v-model="doctorates.from"
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
                            v-model="doctorates.to"
                        />
                    </div>
                    <button
                        @click.prevent="updateDoctorate(obj_id, doctorates)"
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
                    <a href="" @click.prevent="show =! show; addNew()" v-else>+ Add Doctorate</a>
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
            doctorates:[],
            show: false,
            update: false,
            obj_id:null
        }
    },
    created(){

    },
    mounted(){
        this.get_doctorates()
    },
    methods:{
        add_doctorate(obj){
            if (obj.name != null && obj.university != null && obj.from != null && obj.to != null){
                axios.post(`/admin/add_doctorate`,{name: obj.name, university: obj.university, description: obj.description, from: obj.from, to: obj.to})
                .then((res) => {
                    Vue.$toast.success('doctorate Added Successfully.', {})
                    this.doctorates.push(res.data)
                    this.doctorates.name = null;
                    this.doctorates.university = null;
                    this.doctorates.description = null;
                    this.doctorates.from = null;
                    this.doctorates.to = null;
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
        get_doctorates(){
            axios.get(`/admin/get_doctorates`)
            .then((res) => {
                this.doctorates = res.data
            })
            .catch((err) => {
                    Vue.$toast.error(err, {
                        position: "bottom-right"
                    });
                });
        },
        removeDoctorate(obj) {
            axios.post(`/admin/delete_doctorate/${obj.id}`)
            .then((res)=>{
                this.doctorates.splice(this.doctorates.indexOf(obj), 1)
                // console.log(res.data)
            })
            .catch((err) => {
                    Vue.$toast.error(err, {
                        position: "bottom-right"
                    });
                });
        },
        editDoctorate(obj) {
            this.show = false
            this.update = true
            this.obj_id = obj.id
            axios.get(`/admin/get_doctorate/${obj.id}`)
            .then((res)=>{
                this.doctorates.name = res.data.name
                this.doctorates.university = res.data.university
                this.doctorates.description = res.data.description
                this.doctorates.from = res.data.from
                this.doctorates.to = res.data.to
                this.show = true
            })
            .catch((err) => {
                    Vue.$toast.error(err, {
                        position: "bottom-right"
                    });
                });
        },
        updateDoctorate(obj_id, obj){
            const object = this.doctorates.find( ({ id }) => id === obj_id );
            if (obj.name != null && obj.university != null && obj.from != null && obj.to != null){
                axios.post(`/admin/update_doctorate/${object.id}`,{name: obj.name, university: obj.university, description: obj.description, from: obj.from, to: obj.to})
                .then((res) => {
                    Vue.$toast.success('doctorate Updated Successfully.', {})
                    object.name = res.data.name
                    object.university = res.data.university
                    object.description = res.data.description
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
            this.doctorates.name = null;
            this.doctorates.university = null;
            this.doctorates.description = null;
            this.doctorates.from = null;
            this.doctorates.to = null;
        }
    }
}
</script>
