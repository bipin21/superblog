<template>
  <div>
    <div class="container">
      <div class="row justify-content-around">
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Add Category</h3>
            </div>
            <form role="form" @submit.prevent="addCategory()">
              <div class="card-body">
                <div class="form-group">
                  <label for="categoryId">Add New Category</label>
                  <input
                    type="text"
                    class="form-control"
                    id="categoryId"
                    placeholder="Category Name"
                    v-model="form.cat_name"
                    name="cat_name"
                    :class="{ 'is-invalid': form.errors.has('cat_name') }"
                  />
                  <has-error :form="form" field="cat_name"></has-error>
                </div>
              </div>

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: "New",
  data() {
    return {
      form: new Form({
        cat_name: ""
      })
    };
  },
  methods: {
    addCategory() {
      this.form
        .post("/add-category")
        .then(response => {
          this.$router.push("/category-list");
          Toast.fire({
            icon: "success",
            title: "Category added successfully"
          });
        })
        .catch(() => {});
    }
  }
};
</script>
<style scoped>
</style>