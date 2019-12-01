export default {
    state: {
        category:[],
        post:[],
        blogpost:[],
        singlepost:[],
        allcategories:[],
        
    },
    getters: {
        getCategory(state){
            return state.category
        },
        getAllPost(state){
            return state.post
        },
        getblogPost(state){
            return state.blogpost
        },
        singlepost(state){
            return state.singlepost
        },
        allcategories(state){
            return state.allcategories
        },
    },
    actions: {
        allCategory(context){
            axios.get('/category')
                .then((response)=>{
                    context.commit('categoreis',response.data.categories)
                })
        },
        getAllPost(context){
            axios.get('/post')
                .then((response)=>{
                    context.commit('allpost',response.data.posts)
                })
        },
        getblogPost(context){
            axios.get('/blogpost')
                .then((response)=>{
                    context.commit('getblogpost',response.data.blogpost)
                })
        },
        getPostById(context,payload){
            axios.get('/singlepost/'+payload)
                .then((response)=>{
                    context.commit('singlepost',response.data.post)
                })
        },
        allcategories(context){
            axios.get('/categories')
                .then((response)=>{
                    context.commit('allcategories',response.data.categories)
                })
        },
    },
    mutations: {
        categoreis(state,data){
            return state.category = data
        },
        allpost(state,data){
            return state.post = data
        },
        getblogpost(state,data){
            return state.blogpost = data
        },
        singlepost(state,payload){
            return state.singlepost = payload
        },
        allcategories(state,data){
            return state.allcategories = data
        },
    }
}