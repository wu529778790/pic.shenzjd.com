import axios from '@/utils/axios'

// 利用token拿到个人信息
export const getUser = () => {
  return axios({
    method: 'GET',
    url: '/user'
  })
}
// 请求仓库
export const getRepos = (login) => {
  return axios({
    method: 'GET',
    url: `/users/${login}/repos`
  })
}
