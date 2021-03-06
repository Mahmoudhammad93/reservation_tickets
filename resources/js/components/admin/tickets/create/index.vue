<template>
    <div id="create_ticket">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Default form</h4>
                        <p class="card-description">
                            Basic form layout
                        </p>
                        <form class="forms-sample" @submit.prevent="submitForm()">
                            <div class="form-group">
                                <label for="ticket_name"
                                    >Ticket Name</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id="ticket_name"
                                    placeholder="Ticket Name"
                                    v-model="ticket.name"
                                />
                            </div>
                            <div class="form-group">
                                <label for="user">Large select</label>
                                <select class="form-control form-control-lg" id="user" v-model="ticket.user_id">
                                    <option v-for="user in JSON.parse(users)" :key="user.id" :value="user.id">{{user.first_name+' '+user.last_name}}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="end_date"
                                    >End of date</label
                                >
                                <input
                                    type="date"
                                    class="form-control"
                                    id="end_date"
                                    placeholder="End Date"
                                    v-model="ticket.end_date"
                                />
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">
                                Save
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props:[
        'users'
    ],
    data(){
        return{
            ticket:{}
        }
    },
    methods:{
        submitForm(){
            axios.post('/admin/tickets/store',this.ticket)
            .then((res) => {
                console.log(res.data)
                Vue.$toast.success("Ticket created successfuly.", {
                    position: "bottom-right"
                });
            })
        }
    }
}
</script>
