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
  background-image: linear-gradient(
    102.7deg,
    #caf8d0 8.2%,
    #adfcf4 19.6%,
    #adcdfc 36.8%,
    #dfadfc 73.2%,
    #fddaff 90.9%
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
  }
}
</style>
