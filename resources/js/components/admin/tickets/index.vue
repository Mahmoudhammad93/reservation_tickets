<template>
    <div id="tickets">
        <div class="row mb-2">
            <div class="col-md-3 align-self-end">
                <a href="tickets/create" class="btn btn-outline-success btn-icon-text" v-if="auth_type == 'admin'">
                    <i class="mdi mdi-ticket-account"></i>
                    Add Ticket +
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Tickets</h4>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>
                                            Ticket Name
                                        </th>
                                        <th>
                                            User
                                        </th>
                                        <th>
                                            Deadline
                                        </th>
                                        <th>
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="ticket in tickets" :key="ticket.id">
                                        <td>{{ticket.name}}</td>
                                        <td>{{ticket.f_name +" "+ ticket.l_name}}</td>
                                        <td>{{ticket.deadline}}</td>
                                        <td>
                                            <p v-for="perm in JSON.parse(permissions)" :key="perm.id">
                                                <a v-if="auth_type == 'admin' || perm.open == 1" :href="`/admin/ticket/${ticket.id}`" class="btn btn-primary">View</a>
                                                <a v-if="auth_type == 'admin' || perm.edit == 1" :href="`/admin/ticket/${ticket.id}/edit`" class="btn btn-success">Edit</a>
                                                <a v-if="auth_type == 'admin' || perm.delete == 1" :href="`/admin/ticket/${ticket.id}/delete`" class="btn btn-danger" @click.prevent="delete_ticket(ticket)">Delete</a>
                                                <a v-if="auth_type == 'admin' || perm.close == 1" :href="`/admin/ticket/${ticket.id}/close`" class="btn btn-secondary">Close</a>
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
        'data',
        'auth_type',
        'permissions'
    ],
    data(){
        return{
            tickets:[],
            perms:[]
        }
    },
    created(){
        console.log(JSON.parse(this.permissions));
        console.log(JSON.parse(this.permissions).map(item => item));
        this.perms = JSON.parse(this.permissions).map(item => item.user_id)
        this.tickets = JSON.parse(this.data)
    },
    methods:{
        delete_ticket(obj){
            axios.post(`/admin/ticket/${obj.id}/delete/`)
            .then((res) => {
                this.tickets.splice(this.tickets.indexOf(obj), 1)
                Vue.$toast.success("Ticket deleted successfuly.", {
                    position: "bottom-right"
                });
            })
            .catch((err) => {
                    Vue.$toast.error(err, {
                        position: "bottom-right"
                    });
                });
        }
    }
}
</script>
