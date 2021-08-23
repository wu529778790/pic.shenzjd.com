import { createStore } from 'vuex'
import createPersistedState from 'vuex-persistedstate'
import user from './module/user.js'
import getters from './getters.js'

export default createStore({
  getters,
  modules: {
    user
  },
  plugins: [
    createPersistedState()
    // {
    //   getState: (key) => Cookies.getJSON(key),
    //   setState: (key, state) =>
    //     Cookies.set(key, state, { expires: 3, secure: true }),
    // }
  ]
})
