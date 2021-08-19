<template>
  <div class="nav">
    <div class="nav_left">
      <a
        href="https://shenzjd.com"
        target="_blank"
        rel="noopener noreferrer"
        class="logo"
      >
        <img src="@/assets/logo.jpg" alt="" srcset="" />
      </a>
    </div>
    <div class="nav_center"></div>
    <div class="nav_right">
      <a-menu v-model:selectedKeys="current" mode="horizontal">
        <a-menu-item key="home">
          <HomeOutlined />
          首页
        </a-menu-item>
        <a-menu-item key="explore">
          <PictureOutlined />
          探索
        </a-menu-item>
        <a-menu-item key="login">
          <LoginOutlined />
          登录
        </a-menu-item>
      </a-menu>
    </div>
  </div>
</template>
<script>
import { defineComponent, ref } from 'vue'
import {
  HomeOutlined,
  PictureOutlined,
  LoginOutlined
} from '@ant-design/icons-vue'
export default defineComponent({
  setup () {
    const current = ref(['home'])
    return {
      current
    }
  },

  components: {
    HomeOutlined,
    PictureOutlined,
    LoginOutlined
  }
})
</script>

<style lang="scss" scoped>
.nav {
  display: flex;
  justify-content: space-between;
  .nav_left {
    display: flex;
    .logo {
      display: block;
      width: 40px;
      height: 40px;
      img {
        width: 100%;
        height: 100%;
      }
    }
  }
  a {
    color: black;
    text-decoration: none;
  }
}
.ant-layout-header .ant-menu {
  background-color: inherit;
}
</style>
