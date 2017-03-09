// import Vue from 'vue'
import Router from 'vue-router'
import IndexView from './views/IndexView.vue'
//import ArticleView from './views/ArticleView.vue'
//import CommentView from './views/CommentView.vue'
//import UserView from './views/UserView.vue'

Vue.use(Router)

// Story view factory
function createIndexView (type) {
  return {
    name: `${type}-index-view`,
    render (createElement) {
      return createElement(IndexView, { props: { type }})
    }
  }
}

export default new Router({
  // mode: 'abstract',
  routes: [
    { path: '/index', component: createIndexView('index')},
    { path: '/', redirect: '/index' }
    /*{ path: '/new', component: createStoriesView('new') },
    { path: '/show', component: createStoriesView('show') },
    { path: '/ask', component: createStoriesView('ask') },
    { path: '/job', component: createStoriesView('job') },
    { path: '/article/:url(.*)?', component: ArticleView },
    { path: '/item/:id(\\d+)', component: CommentView },
    { path: '/user/:id', component: UserView },*/
  ]
})
