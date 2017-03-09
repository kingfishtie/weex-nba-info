// import Vue from 'vue'
import Vuex from 'vuex'
import * as actions from './actions'
import * as mutations from './mutations'

// Vuex is auto installed on the web
if (WXEnvironment.platform !== 'Web') {
  Vue.use(Vuex)
}

const store = new Vuex.Store({
  actions,
  mutations,
  state: {
    items: {},
    users: {},
    counts: {
      top: 20,
      job: 15
    },
    lists: {
      index: [],
      job: []
    }
  }
})

export default store
