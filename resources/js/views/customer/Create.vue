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
        <input type="text" name="name" class="form-control" />
      </div>
      <div class="col-md-6">
        <label class="form-label">Email</label>
        <input type="text" name="email" class="form-control" />
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
      data: {},
    };
  },
  methods: {
    submit: function () {
      var form = document.getElementById("form");
      var formData = new FormData(form);
      axios.post("customer", formData).then((res) => {
        if (res.status == 200) {
          this.$router.push({ name: "customer.index" });
        }
      });
    },
  },
};
</script>