<template>
  <span id="singleblog">
    <section id="content">
      <div class="container">
        <div class="row">
          <div class="span8">
            <article>
              <div class="row">
                <div class="span8">
                  <div class="post-image">
                    <div class="post-heading">
                      <h3>
                        <a href="#">{{singlepost.title}}</a>
                      </h3>
                    </div>
                    <img :src="`uploadImage/${singlepost.photo}`" alt="" width="600" />
                  </div>
                  <p>
                      {{singlepost.description}}
                  </p>
                  <div class="bottom-article">
                    <ul class="meta-post">
                      <li v-if="singlepost.user">
                        <i class="icon-user"></i>
                        <a href="#">{{singlepost.user.name}}</a>
                      </li>
                      <li v-if="singlepost.category">
                        <i class="icon-folder-open"></i>
                        <a href="#">{{singlepost.category.cat_name}}</a>
                      </li>
                      <li>
                        <i class="icon-tags"></i>
                        <a href="#">Web design</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </article>
            <!-- author info -->
            <div class="about-author">
              <a href="#" class="thumbnail align-left">
                <img src="img/avatar.png" alt />
              </a>
              <h5>
                <strong>
                  <a href="#">John doe</a>
                </strong>
              </h5>
              <p>Qui ut ceteros comprehensam. Cu eos sale sanctus eligendi, id ius elitr saperet, ocurreret pertinacia pri an. No mei nibh consectetuer, semper ad qui, est rebum nulla argumentum ei.</p>
            </div>
            <div class="comment-area">
              <h4>4 Comments</h4>
              <div class="media">
                <a href="#" class="thumbnail pull-left">
                  <img src="img/avatar.png" alt />
                </a>
                <div class="media-body">
                  <div class="media-content">
                    <h6>
                      <span>March 12, 2013</span> Karen medisson
                    </h6>
                    <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
                    <a href="#" class="align-right">Reply comment</a>
                  </div>
                </div>
              </div>
              <div class="media">
                <a href="#" class="thumbnail pull-left">
                  <img src="img/avatar.png" alt />
                </a>
                <div class="media-body">
                  <div class="media-content">
                    <h6>
                      <span>March 12, 2013</span> Smith sanderson
                    </h6>
                    <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
                    <a href="#" class="align-right">Reply comment</a>
                  </div>
                  <div class="media">
                    <a href="#" class="thumbnail pull-left">
                      <img src="img/avatar.png" alt />
                    </a>
                    <div class="media-body">
                      <div class="media-content">
                        <h6>
                          <span>March 12, 2013</span> Thomas guttenberg
                        </h6>
                        <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
                        <a href="#" class="align-right">Reply comment</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="media">
                <a href="#" class="thumbnail pull-left">
                  <img src="img/avatar.png" alt />
                </a>
                <div class="media-body">
                  <div class="media-content">
                    <h6>
                      <span>March 12, 2013</span> Vicky lumora
                    </h6>
                    <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
                    <a href="#" class="align-right">Reply comment</a>
                  </div>
                </div>
              </div>
              <h4>Leave your comment</h4>
              <form id="commentform" action="#" method="post" name="comment-form">
                <div class="row">
                  <div class="span4">
                    <input type="text" placeholder="* Enter your full name" />
                  </div>
                  <div class="span4">
                    <input type="text" placeholder="* Enter your email address" />
                  </div>
                  <div class="span4 margintop10">
                    <input type="text" placeholder="Enter your website" />
                  </div>
                  <div class="span8 margintop10">
                    <p>
                      <textarea
                        rows="12"
                        class="input-block-level"
                        placeholder="*Your comment here"
                      ></textarea>
                    </p>
                    <p>
                      <button class="btn btn-theme margintop10" type="submit">Submit comment</button>
                    </p>
                  </div>
                </div>
              </form>
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
  name: "SingleBlog",
        components:{
            BlogSidebar
        },
        computed:{
            singlepost(){
                return this.$store.getters.singlepost
            }
        },
        methods:{
            singlePost(){
                this.$store.dispatch('getPostById',this.$route.params.id);
            }
        },
        mounted(){
            this.singlePost();
        },
        watch:{
            $route(to,from){
                this.singlePost();
            }
        }
};
</script>
<style scoped>
</style>