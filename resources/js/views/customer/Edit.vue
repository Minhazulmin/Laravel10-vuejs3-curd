<template>
  <div>
    <form
      class="row g-3"
      @submit.prevent="submit"
      id="form"
      enctype="multipart/form-data"
    >
      <div class="col-md-6">
        <label class="form-label">Name</label>
        <input
          type="text"
          v-model="customer.name"
          name="name"
          class="form-control"
        />
      </div>
      <div class="col-md-6">
        <label class="form-label">Email</label>
        <input
          type="text"
          v-model="customer.email"
          name="email"
          class="form-control"
        />
      </div>
      <div class="col-md-6">
        <label class="form-label">Image</label>
        <input type="file" name="image" class="form-control" />
      </div>
      <div class="col-12">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
</template>
<script>
export default {
  data() {
    return {
      customer: {},
    };
  },
  methods: {
    submit: function () {
      var form = document.getElementById("form");
      var formData = new FormData(form);
      formData.append("_method", "put");
      axios.post(`customer/${this.$route.params.id}`, formData).then((res) => {
        if (res.status == 200) {
          this.$router.push({ name: "customer.index" });
        }
      });
    },
  },
  created() {
    axios.get(`customer/${this.$route.params.id}`).then((res) => {
      this.customer = res.data;
    });
  },
};
</script>