export default {
  namespaced: true,

  state: {
    userinfo: {}
  },

  mutations: {
    CHANGE: (state, { key, value }) => {
      // eslint-disable-next-line no-prototype-builtins
      if (state.hasOwnProperty(key)) {
        state[key] = value
      }
    }
  },

  actions: {
    change ({ commit }, data) {
      commit('CHANGE', data)
    }
  }
}
