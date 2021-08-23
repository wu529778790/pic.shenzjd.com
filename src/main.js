import { createApp } from 'vue'
import Antd from 'ant-design-vue'
import App from './App.vue'
import router from './router'
import 'ant-design-vue/dist/antd.css'
import '@/style/index.css'
import store from './store'

const app = createApp(App)

app
  .use(store)
  .use(router)
  .use(Antd)
  .mount('#app')
