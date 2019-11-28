<template>
  <div>
    <div class="container">
      <div class="row justify-content-around">
        <div class="col-md-10">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Add Post</h3>
            </div>
            <form role="form" @submit.prevent="addPost()" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <label for="postId">Add New Post</label>
                  <input
                    type="text"
                    class="form-control"
                    id="postId"
                    placeholder="Post Title"
                    v-model="form.title"
                    name="title"
                    :class="{ 'is-invalid': form.errors.has('title') }"
                  />
                  <has-error :form="form" field="title"></has-error>
                </div>
                <div class="form-group">
                  <label for="descriptionId">Description</label>
                  <markdown-editor
                    v-model="form.description"
                   
                  ></markdown-editor>
                  <has-error :form="form" field="description"></has-error>
                </div>
                <div class="form-group">
                  <label>Select Category</label>
                  <select
                    class="form-control"
                    v-model="form.cat_id"
                    :class="{ 'is-invalid': form.errors.has('cat_id') }"
                  >
                    <option disabled value>Select Category</option>
                    <option
                      :value="category.id"
                      v-for="category in getallCategory"
                      :key="category.id"
                    >option {{category.cat_name}}</option>
                  </select>
                  <has-error :form="form" field="cat_id"></has-error>
                </div>
                <div class="form-group">
                  <label for="photoId">Photo</label>
                  <input
                    type="file"
                    @change="changePhoto($event)"
                    id="photoId"
                    name="photo"
                     class="form-control"
                    :class="{ 'is-invalid': form.errors.has('photo') }"
                  />
                  <br/>
                  <img :src="form.photo" alt="" width="150" height="150" />
                  <has-error :form="form" field="photo"></has-error>
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
        title: "",
        description: "",
        cat_id: "",
        photo: ""
      })
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
    addPost() {
      this.form
        .post("/savepost")
        .then(response => {
          this.$router.push("/post-list");
          Toast.fire({
            icon: "success",
            title: "Post added successfully"
          });
        })
        .catch(() => {});
    },
    changePhoto(event) {
      var file = event.target.files[0];
      var reader = new FileReader();
      reader.onload = event => {
        this.form.photo = event.target.result
      };
      reader.readAsDataURL(file);
    }
  }
};
</script>
<style scoped>
</style>