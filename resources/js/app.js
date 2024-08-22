import './bootstrap';
import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import { addIcons } from 'oh-vue-icons';
import { OiCheck } from "oh-vue-icons/icons";

addIcons(OiCheck);

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
