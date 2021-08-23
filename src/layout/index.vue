<template>
  <a-layout>
    <a-layout-header><Nav /></a-layout-header>
    <a-layout-content><router-view /></a-layout-content>
    <a-layout-footer><Footer /></a-layout-footer>
  </a-layout>
</template>

<script>
import Nav from './Nav.vue'
import Footer from './Footer.vue'

export default {
  name: 'Home',
  components: {
    Nav,
    Footer
  }
}
</script>
<style lang="scss" scoped>
.ant-layout {
  background-image: -moz-linear-gradient(
    45deg,
    rgb(255, 168, 252),
    rgb(194, 252, 255)
  );

  background-image: -webkit-linear-gradient(
    45deg,
    rgb(255, 168, 252),
    rgb(194, 252, 255)
  );

  background-image: linear-gradient(
    45deg,
    rgb(255, 168, 252),
    rgb(194, 252, 255)
  );
  background-attachment: fixed;
  background-repeat: no-repeat;
  background-size: 100% 100%;
  .ant-layout-header,
  .ant-layout-footer {
    background-color: rgba(255, 255, 255, 0.55);
    box-shadow: 0 0 15px 0 rgb(156 156 156 / 20%);
  }
  .ant-layout-content {
    height: calc(100vh - 64px - 70px);
    overflow: auto;
  }
}
</style>
