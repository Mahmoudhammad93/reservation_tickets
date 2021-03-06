<template>
    <div class="university">
        <div class="card card-primary card-outline mt-4">
            <div class="card-body">
                <h4 class="title p-3">
                    Add Your University
                </h4>
                <div class="edu_card masters mb-2" v-for="university in universites" :key="university.id">
                    <div class="options">
                        <span class="edit" @click="editUniversity(university)">
                            <i class="mdi mdi-pencil"></i> Edit
                        </span>
                        <span class="delete" @click="removeUniversity(university)">
                            <i class="mdi mdi-delete"></i> Delete
                        </span>
                    </div>
                    <div class="edu_title">
                        <h4>
                            {{university.name}}
                        </h4>
                    </div>
                    <ul class="list-unstyled m-0 list-arrow">
                        <li>
                            <p>{{university.faculty}}</p>
                        </li>
                        <li>
                            <p class="m-0">
                                {{university.from}} - {{university.to}}
                            </p>
                        </li>
                    </ul>
                </div>
                <form class="forms-sample" v-if="show" @submit.prevent="add_university(universites)">
                    <div class="form-group">
                        <label for="university">University Name</label>
                        <input
                            type="text"
                            class="form-control"
                            id="university"
                            name="university"
                            placeholder="University Name"
                            v-model="universites.name"
                        />
                    </div>
                    <div class="form-group">
                        <label for="name">Faculty Of</label>
                        <input
                            type="text"
                            class="form-control"
                            id="name"
                            name="name"
                            placeholder="University Name"
                            v-model="universites.faculty"
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
                            v-model="universites.from"
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
                            v-model="universites.to"
                        />
                    </div>
                    <button
                        @click.prevent="updateUniversity(obj_id, universites)"
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
                    <a href="" @click.prevent="show =! show; addNew()" v-else>+ Add Universty</a>
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
            universites:[],
            show: false,
            update: false,
            obj_id:null
        }
    },
    created(){

    },
    mounted(){
        this.get_universites()
    },
    methods:{
        add_university(obj){
            if (obj.name != null && obj.faculty != null && obj.from != null && obj.to != null){
                axios.post(`/admin/add_university`,{name: obj.name, faculty: obj.faculty, from: obj.from, to: obj.to}).then((res) => {
                    Vue.$toast.success('university Added Successfully.', {})
                    this.universites.push(res.data)
                    this.universites.name = null;
                    this.universites.faculty = null;
                    this.universites.from = null;
                    this.universites.to = null;
                })
            }else{
                Vue.$toast.error('Complete your info.', {})
            }
        },
        get_universites(){
            axios.get(`/admin/get_universites`).then((res) => {
                this.universites = res.data
            })
        },
        removeUniversity(obj) {
            axios.post(`/admin/delete_university/${obj.id}`).then((res)=>{
                this.universites.splice(this.universites.indexOf(obj), 1)
                // console.log(res.data)
            })
        },
        editUniversity(obj) {
            this.show = false
            this.update = true
            this.obj_id = obj.id
            axios.get(`/admin/get_university/${obj.id}`).then((res)=>{
                this.universites.name = res.data.name
                this.universites.faculty = res.data.faculty
                this.universites.from = res.data.from
                this.universites.to = res.data.to
                this.show = true
            })
        },
        updateUniversity(obj_id, obj){
            const object = this.universites.find( ({ id }) => id === obj_id );
            if (obj.name != null && obj.faculty != null && obj.from != null && obj.to != null){
                axios.post(`/admin/update_university/${object.id}`,{name: obj.name, faculty: obj.faculty, from: obj.from, to: obj.to}).then((res) => {
                    Vue.$toast.success('university Updated Successfully.', {})
                    object.name = res.data.name
                    object.faculty = res.data.faculty
                    object.from = res.data.from
                    object.to = res.data.to
                })
            }else{
                Vue.$toast.error('Complete your info.', {})
            }
        },
        addNew(){
            this.universites.name = null;
            this.universites.faculty = null;
            this.universites.from = null;
            this.universites.to = null;
        }
    }
}
</script>
