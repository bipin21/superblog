<template>
  <span id="blogpost">
    <section id="inner-headline">
      <div class="container">
        <div class="row">
          <div class="span4">
            <div class="inner-heading">
              <h2>Blog left sidebar</h2>
            </div>
          </div>
          <div class="span8">
            <ul class="breadcrumb">
              <li>
                <a href="#">
                  <i class="icon-home"></i>
                </a>
                <i class="icon-angle-right"></i>
              </li>
              <li>
                <a href="#">Blog</a>
                <i class="icon-angle-right"></i>
              </li>
              <li class="active">Blog with left sidebar</li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <section id="content">
      <div class="container">
        <div class="row">
          <div class="span8">
            <article v-for="post in blogpost" v-bind:key="post.id" >
              <div class="row">
                <div class="span8">
                  <div class="post-video">
                    <div class="post-heading">
                      <h3>
                        <a href="#">{{post.title}}</a>
                      </h3>
                    </div>
                    <img :src="`uploadImage/${post.photo}`" alt="" width="600" />
                  </div>
                  <p>
                    {{post.description | sortlength(100,"...")}}
                  </p>
                  <div class="bottom-article">
                    <ul class="meta-post">
                      <li>
                        <i class="icon-calendar"></i>
                        <a href="#">{{post.created_at | timeformat }}</a>
                      </li>
                      <li v-if="post.user">
                        <i class="icon-user"></i>
                        <a href="#">{{post.user.name}}</a>
                      </li>
                      <li v-if="post.category">
                        <i class="icon-folder-open"></i>
                        <a href="#">{{post.category.cat_name}}</a>
                      </li>
                      <li>
                        <i class="icon-comments"></i>
                        <a href="#">4 Comments</a>
                      </li>
                    </ul>
                    <router-link :to="`blog/${post.id}`" class="pull-right">
                      Continue reading
                      <i class="icon-angle-right"></i>
                    </router-link>
                  </div>
                </div>
              </div>
            </article>
            <div id="pagination">
              <span class="all">Page 1 of 3</span>
              <span class="current">1</span>
              <a href="#" class="inactive">2</a>
              <a href="#" class="inactive">3</a>
            </div>
          </div>
          <BlogSidebar />
        </div>
      </div>
    </section>
  </span>
</template>
<script>
import BlogSidebar from "./BlogSidebar.vue";
export default {
  name: "BlogPost",
  components: {
    BlogSidebar
  },
  data() {
    return {
      id: ""
    };
  },
  mounted() {
      this.$store.dispatch('getblogPost');
  },
  computed: {
    blogpost() {
      return this.$store.getters.getblogPost;
    }
  },
  methods: {}
};
</script>
<style scoped>
</style>