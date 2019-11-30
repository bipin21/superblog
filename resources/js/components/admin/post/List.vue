<template>
  <div>
    <section class="content">
      <div class="row justify-content-around">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Post List</h3>
              <div class="card-tools">
                <button class="btn btn-primary">
                  <router-link to="/add-post" style="color:#fff;">Add Post</router-link>
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>SN</th>
                    <th>User</th>
                    <th>Category</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Photo</th>
                    <th>Created at</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(post,index) in getallPost" :key="post.id">
                    <td>{{index+1}}</td>
                    <td v-if="post.user">{{post.user.name}}</td>
                    <td v-else>--</td>
                    <td v-if="post.category">{{post.category.cat_name}}</td>
                    <td v-else>--</td>
                    <td>{{post.title | sortlength(20,"---")}}</td>
                    <td>{{post.description | sortlength(40,"...")}}</td>
                    <td>
                      <img :src="'../../uploadImage/'+post.photo" alt width="80" height="80" />
                    </td>
                    <td>{{post.created_at | timeformat}}</td>
                    <td>
                      <router-link :to="`/edit-post/${post.id}`">Edit</router-link>
                      <a href @click.prevent="deletePost(post.id)">Delete</a>
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
      postItem: [],
      select: "",
      all_select: false
    };
  },
  mounted() {
    this.$store.dispatch("getAllPost");
  },
  computed: {
    getallPost() {
      return this.$store.getters.getAllPost;
    }
  },
  methods: {
    ourImage(img) {
      return "/uploadimage/" + img;
    },
    deletePost(id) {
      axios
        .get("/delete/" + id)
        .then(response => {
          this.$store.dispatch("getAllPost");
          Toast.fire({
            icon: "success",
            title: "Post Deleted successfully"
          });
        })
        .catch(() => {});
    }
  }
};
</script>
<style scoped>
</style>