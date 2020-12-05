<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Add services</div>
                    <div class="card-body">
                        <form @submit.prevent="createService">
                            <div class="form-group">
                                <label>Service Name</label>
                                <input type="text" v-model="serviceName" class="form-control">
                            </div>
                             <div class="form-group">
                                <button class="btn btn-primary" type="submit">Save</button>
                             </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Add service data</div>
                    <div class="card-body">
                        <form  @submit.prevent="createServiceMeta">
                            <div class="form-group">
                                <select v-model="serviceId" class="form-control">
                                <option value="">Select a service</option>
                                <option v-for="service in services" :value="service.id">{{ service.name }}</option>
                            </select>
                            </div>
                            <div class="form-group">
                                <label>Service Data</label>
                                <input type="text" v-model="serviceMetaName" class="form-control">
                            </div>
                             <div class="form-group">
                                <button class="btn btn-primary" type="submit">Save</button>
                             </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Delete service data</div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Service</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="serviceMeta in serviceMetas">
                                    <td>{{ serviceMeta.name }}</td>
                                    <td>{{ serviceMeta.service.name }}</td>
                                    <td @click="deleteServiceMeta(serviceMeta)" class="btn btn-sm btn-danger">Delete</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <br>
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Add Customers</div>
                    <div class="card-body">
                        <form @submit.prevent="createCustomer">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" v-model="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" v-model="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <textarea v-model="address" class="form-control" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" v-model="phone" class="form-control">
                            </div>
                             <div class="form-group">
                                <button class="btn btn-primary" type="submit">Save</button>
                             </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Customers data</div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Phone</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="customer in customers">
                                    <td>{{ customer.name }}</td>
                                    <td>{{ customer.email }}</td>
                                    <td>{{ customer.address }}</td>
                                    <td>{{ customer.phone }}</td>
                                    <td>
                                        <a :href="/customer-service/ +  customer.id">Service</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                name: '',
                email: '',
                address: '',
                phone: '',
                serviceName: '',
                serviceMetaName: '',
                serviceId: '',
                services: {},
                serviceMetas: {},
                customers: {},
            }
        },

         mounted() {
            this.getServices();
            this.getServiceMetas();
            this.getCustomers();
        },

        methods: {
            /**
             * Delete service metas
             * 
             * @param serviceMeta
             */
            deleteServiceMeta(serviceMeta) {
                axios.delete("/service-meta/" + serviceMeta.id)
                .then((response) => {
                    this.getServiceMetas();
                    console.log(response.data);
                })
                .catch((error) => {
                    console.log(error);
                });
            }, 
            
            /**
             * Create services
             */
            createService() {
                 axios.post('/service', {
                    name: this.serviceName,
                })
                .then((response) => {
                    this.serviceName = '';
                    this.getServices();
                    console.log(response.data);
                })
                .catch((error) => {
                    console.log(error);
                });
            }, 

            /**
             * Create customers
             */
            createCustomer() {
                 axios.post('/customer', {
                    name: this.name,
                    email: this.email,
                    address: this.address,
                    phone: this.phone,
                })
                .then((response) => {
                    this.name = '';
                    this.email = '';
                    this.address = '';
                    this.phone = '';
                    this.getCustomers();
                    console.log(response.data);
                })
                .catch((error) => {
                    console.log(error);
                });
            }, 

            /**
             * Fetch customers
             */
            getCustomers() {
                axios.get('/customer')
                .then((response)=>{
                    this.customers = response.data
                })
                .catch((error) => {
                    console.log(error);
                });
            },

            /**
             * Fetch services
             */
            getServices() {
                axios.get('/service')
                .then((response)=>{
                    this.services = response.data
                })
                .catch((error) => {
                    console.log(error);
                });
            },

            /**
             * Fetch service metas
             */
            getServiceMetas() {
                axios.get('/service-meta')
                .then((response)=>{
                    this.serviceMetas = response.data
                })
                .catch((error) => {
                    console.log(error);
                });
            },

            /**
             * Create service metas
             */
            createServiceMeta() {
                 axios.post('/service-meta', {
                    name: this.serviceMetaName,
                    service_id: this.serviceId,
                })
                .then((response) => {
                    this.serviceMetaName = '';
                    this.getServiceMetas();
                    console.log(response.data);
                })
                .catch((error) => {
                    console.log(error);
                });
            }
        }
    }
</script> 

