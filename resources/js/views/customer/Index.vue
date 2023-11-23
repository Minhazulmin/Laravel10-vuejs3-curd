<template>
  <div class="row">
    <div class="col-xl-9"></div>
    <div class="col-xl-3">
      <router-link
        class="btn btn-info float-end mb-3"
        :to="{ name: 'customer.create' }"
        >Add Customer</router-link
      >
    </div>
  </div>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Image</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="(customer, index) in customers" :key="index">
        <th scope="row">{{ index + 1 }}</th>
        <td><img :src="customer.image" alt="" width="100" /></td>
        <td>{{ customer.name }}</td>
        <td>{{ customer.email }}</td>
        <td>
          <router-link
            :to="{
              name: 'customer.edit',
              params: { id: customer.id },
            }"
            >Edit</router-link
          >
        </td>
      </tr>
    </tbody>
  </table>
</template>
<script>
export default {
  data() {
    return {
      customers: [],
    };
  },
  methods: {
    getdata() {
      axios.get("/customer").then((res) => {
        console.log(res.data);
        this.customers = res.data;
      });
    },
  },

  created() {
    this.getdata();
  },
};
</script>