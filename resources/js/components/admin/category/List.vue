<template>
  <div>
    <section class="content">
      <div class="row justify-content-around">
        <div class="col-8">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Category List</h3>
              <div class="card-tools">
                <button class="btn btn-primary">
                  <router-link to="/add-category" style="color:#fff;">Add Category</router-link>
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>SN</th>
                    <th>Category Name</th>
                    <th>Created at</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(category,index) in getallCategory" :key="category.id">
                    <td>{{index+1}}</td>
                    <td>{{category.cat_name}}</td>
                    <td>{{category.created_at | timeformat}}</td>
                    <td>
                    <router-link :to="`/edit-category/${category.id}`">Edit</router-link>
                      <a href @click.prevent="deleteCategory(category.id)">Delete</a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
    </section>
  </div>
</template>
<script>
export default {
  name: "List",
  data() {
    return {
      categoryItem: [],
      select: "",
      all_select: false
    };
  },
  mounted() {
    this.$store.dispatch("allCategory");
  },
  computed: {
    getallCategory() {
      return this.$store.getters.getCategory;
    }
  },
  methods: {
    deleteCategory(id) {
      axios
        .get("/category/" + id)
        .then(res => {
          this.$store.dispatch("allCategory");
          Toast.fire({
            icon: "success",
            title: "Category Deleted successfully"
          })
        })
        .catch(() => {})
    }
  }
};
</script>
<style scoped>
</style>