<template>
    <div class="languages">
        <div class="cv">
            <div class="card card-primary card-outline">
                <div class="card-body">
                    <h3 class="title m-0 p-3">Languages</h3>
                    <div class="edu_card languages mb-2" v-for="language in languages" :key="language.id">
                        <div class="options">
                            <span class="edit" @click="editLanguage(language)">
                                <i class="mdi mdi-pencil"></i> Edit
                            </span>
                            <span class="delete" @click="removeLanguage(language)">
                                <i class="mdi mdi-delete"></i> Delete
                            </span>
                        </div>
                        <div class="edu_title">
                            <h4>
                                {{language.name}}
                            </h4>
                        </div>
                        <ul class="list-unstyled m-0 list-arrow">
                            <li>
                                <p>{{language.speak}} in speaking</p>
                            </li>
                            <li>
                                <p>{{language.read}} in reading</p>
                            </li>
                            <li>
                                <p>{{language.write}} writing</p>
                            </li>
                        </ul>
                    </div>
                    <form class="forms-sample" v-if="show" @submit.prevent="addLanguage(languages)">
                        <div class="form-group mb-1">
                            <label for="name">Language</label>
                            <input
                                type="text"
                                class="form-control"
                                id="name"
                                name="name"
                                placeholder="Put Your Language"
                                v-model="languages.name"
                            />
                        </div>
                        <div class="form-group">
                            <label for="speaking">Select Speaking Level</label>
                            <select class="form-control" v-model="languages.speaking" name="speaking" id="speaking">
                                <option selected="selected" disabled="disabled" hidden="hidden" value="">Select Speaking Level</option>
                                <option value="beginner">Beginner</option>
                                <option value="intermediate">Intermediate</option>
                                <option value="advanced">Advanced</option>
                                <option value="fluent">Fluent</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="reading">Select Reading Level</label>
                            <select class="form-control" v-model="languages.reading" name="reading" id="reading">
                                <option selected="selected" disabled="disabled" hidden="hidden" value="">Select Reading Level</option>
                                <option value="beginner">Beginner</option>
                                <option value="intermediate">Intermediate</option>
                                <option value="advanced">Advanced</option>
                                <option value="fluent">Fluent</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="writing">Select Writing Level</label>
                            <select class="form-control" v-model="languages.writing" name="writing" id="writing">
                                <option selected="selected" disabled="disabled" hidden="hidden" value="">Select Writing Level</option>
                                <option value="beginner">Beginner</option>
                                <option value="intermediate">Intermediate</option>
                                <option value="advanced">Advanced</option>
                                <option value="fluent">Fluent</option>
                            </select>
                        </div>
                        <button
                            @click.prevent="updatelanguage(obj_id, languages)"
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
                        <a href="" @click.prevent="show =! show; addNew()" v-else>+ Add language</a>
                    </div>
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
            languages:[],
            show: false,
            update: false,
            obj_id:null,
        }
    },
    created(){

    },
    mounted(){
        this.get_languages()
    },
    methods:{
        addLanguage(obj){
            console.log(obj)
            if (obj.name != null && obj.speaking != null, obj.reading != null, obj.writing != null){
                axios.post(`/admin/add_language`,{name: obj.name, speaking: obj.speaking, reading: obj.reading, writing: obj.writing}).then((res) => {
                    console.log(res.data)
                    Vue.$toast.success('language Added Successfully.', {})
                    this.languages.push(res.data)
                    this.languages.name = null;
                    this.languages.speaking = null;
                    this.languages.reading = null;
                    this.languages.writing = null;
                })
            }else{
                Vue.$toast.error('Complete your info.', {})
            }
        },
        get_languages(){
            axios.get(`/admin/get_languages`).then((res) => {
                this.languages = res.data
            })
        },
        removeLanguage(obj) {
            axios.post(`/admin/delete_language/${obj.id}`).then((res)=>{
                this.languages.splice(this.languages.indexOf(obj), 1)
                Vue.$toast.success('language Deleted Successfully.', {})
            })
        },
        editLanguage(obj) {
            this.show = false
            this.update = true
            this.obj_id = obj.id
            axios.get(`/admin/get_language/${obj.id}`).then((res)=>{
                console.log(res.data)
                this.languages.name = res.data.name;
                this.languages.speaking = res.data.speak;
                this.languages.reading = res.data.read;
                this.languages.writing = res.data.write;
                this.show = true
            })
        },
        updatelanguage(obj_id, obj){
            const object = this.languages.find( ({ id }) => id === obj_id );
            console.log(object)
            if (obj.name != null && obj.speaking != null, obj.reading != null, obj.writing != null){
                axios.post(`/admin/update_language/${object.id}`,{name: obj.name, speaking: obj.speaking, reading: obj.reading, writing: obj.writing}).then((res) => {
                    Vue.$toast.success('language Updated Successfully.', {})
                    object.name = res.data.name;
                    object.speaking = res.data.speak;
                    object.reading = res.data.read;
                    object.writing = res.data.write;
                })
            }else{
                Vue.$toast.error('Complete your info.', {})
            }
        },
        addNew(){
            this.languages.name = null;
            this.languages.speaking = null;
            this.languages.reading = null;
            this.languages.writing = null;
        }
    }
}
</script>
