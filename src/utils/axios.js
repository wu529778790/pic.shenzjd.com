import Axios from 'axios'
import { message } from 'ant-design-vue'

const axios = Axios.create({
  baseUrl: 'https://api.github.com'
})

axios.interceptors.request.use(
  config => {
    config.headers.Authorization =
      'token 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'
    return config
  },
  error => {
    return Promise.reject(error)
  }
)

axios.interceptors.response.use(
  response => {
    return response
  },
  error => {
    if (error.response && error.response.data) {
      const code = error.response.status
      const msg = error.response.data.message
      message.error(`Code: ${code}, Message: ${msg}`)
      console.error(error.response)
    } else {
      message.error(`${error}`)
    }

    return error.response
  }
)

export default axios
