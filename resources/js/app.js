import './bootstrap';
import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import { addIcons } from 'oh-vue-icons';
import { OiCheck, FaUser, MdLogout, FaUsers, FaList, IoSend, FaTrash } from "oh-vue-icons/icons";

addIcons(OiCheck, FaUser, MdLogout, FaUsers, FaList, IoSend, FaTrash);

createInertiaApp({
  resolve: name => {
    const pages = import.meta.glob('./pages/**/*.vue', { eager: true })
    return pages[`./pages/${name}.vue`]
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .mount(el)
  },
})
