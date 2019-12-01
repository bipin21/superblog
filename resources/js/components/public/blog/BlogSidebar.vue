<template>
  <span id="sidebar">
    <div class="span4">
      <aside class="right-sidebar">
        <div class="widget">
          <form class="form-search">
            <input placeholder="Type something" @keyup="RealSearch" v-model="keyword" type="text" class="input-medium search-query" />
            <button type="submit" class="btn btn-square btn-theme" @click.prevent="RealSearch">Search</button>
          </form>
        </div>
        <div class="widget">
          <h5 class="widgetheading">Categories</h5>
          <ul class="cat">
            <li v-for="category in allcategories" v-bind:key="category.id">
              <i class="icon-angle-right"></i>
              <router-link :to="`/categories/${category.id}`">{{category.cat_name}}</router-link>
              <span>(20)</span>
            </li>
          </ul>
        </div>
        <div class="widget">
          <h5 class="widgetheading">Latest posts</h5>
          <ul class="recent">
            <li v-for="(post,index) in blogpost" v-bind:key="index" >
              <img
                      :src="`uploadImage/${post.photo}`"
                      class="pull-left"
                      alt="" width="100" height="100"
              />
              <h6>
                <router-link :to="`/blog/${post.id}`">{{post.title}}</router-link>
              </h6>
              <p>{{post.description | sortlength(100,"...")}}</p>
            </li>
          </ul>
        </div>
        <div class="widget">
          <h5 class="widgetheading">Popular tags</h5>
          <ul class="tags">
            <li>
              <a href="#">Web design</a>
            </li>
            <li>
              <a href="#">Trends</a>
            </li>
            <li>
              <a href="#">Technology</a>
            </li>
            <li>
              <a href="#">Internet</a>
            </li>
            <li>
              <a href="#">Tutorial</a>
            </li>
            <li>
              <a href="#">Development</a>
            </li>
          </ul>
        </div>
      </aside>
    </div>
  </span>
</template>
<script>
import _ from 'lodash';
export default {
  name: "BlogSidebar",
  components: {
    
  },
  data() {
    return {
      keyword: ""
    };
  },
  computed: {
    blogpost() {
      return this.$store.getters.latestPost;
    },
    allcategories() {
      return this.$store.getters.allcategories;
    }
  },
  mounted() {
    this.$store.dispatch("latestPost");
    this.$store.dispatch("allcategories");
  },
  methods: {
      RealSearch:_.debounce(function(){
          this.$store.dispatch('SearchPost',this.keyword);
      },1000)
  }
};
</script>
<style scoped>
</style>