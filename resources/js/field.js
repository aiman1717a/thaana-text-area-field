Nova.booting((Vue, router, store) => {
  Vue.component('index-thaana-text-area-field', require('./components/IndexField'))
  Vue.component('detail-thaana-text-area-field', require('./components/DetailField'))
  Vue.component('form-thaana-text-area-field', require('./components/FormField'))
})
