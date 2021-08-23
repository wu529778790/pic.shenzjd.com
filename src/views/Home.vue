<template>
  <div class="home">
    <div class="upload">
      <a-upload-dragger
        v-model:fileList="fileList"
        list-type="picture-card"
        :multiple="true"
        :showUploadList="false"
        action="https://sm.ms/api/v2/upload"
        @change="handleChange"
      >
        <p class="ant-upload-drag-icon">
          <InboxOutlined />
        </p>
        <p class="ant-upload-text">点击或者拖拽文件到这里</p>
        <p class="ant-upload-hint">
          高速外链，全球CDN加速,支持单个或者批量上传
        </p>
      </a-upload-dragger>
    </div>
    {{ fileList }}
    <a-image-preview-group class="fileList">
      <a-image
        v-for="item in fileList"
        :key="item.id"
        :width="200"
        :src="item.url"
      />
    </a-image-preview-group>
  </div>
</template>
<script>
import { InboxOutlined } from '@ant-design/icons-vue'
import { message } from 'ant-design-vue'
import { defineComponent, ref } from 'vue'
import { getUser } from '@/api/home.js'
import store from '@/store'

export default defineComponent({
  components: {
    InboxOutlined
  },

  setup () {
    const fileList = ref([])

    const handleChange = info => {
      const status = info.file.status
      if (status !== 'uploading') {
        console.log(info.file, info.fileList)
      }
      if (status === 'done') {
        message.success(`${info.file.name} file uploaded successfully.`)
      } else if (status === 'error') {
        message.error(`${info.file.name} file upload failed.`)
      }
    }
    if (!store.getters.user.userinfo.name) {
      getUser().then(res => {
        store.dispatch('user/change', { key: 'userinfo', value: res.data })
      })
    }
    return {
      fileList,
      handleChange
    }
  }
})
</script>

<style lang="scss" scoped>
.home {
  .upload {
    margin: 50px;
  }
}
::v-deep {
  .ant-upload {
    background-color: rgba(255, 255, 255, 0.2);
    border: none;
    box-shadow: 0 0 15px 0 rgb(156 156 156 / 20%);
  }
}
</style>
