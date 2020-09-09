// Does not work (Invalid VNode type: Symbol(Text) (symbol))
//import Widget from './Widget.vue';
//voyager.component('user-widget', Widget);

// Does work:
voyager.component('user-widget', {
    template: '<card>Hello World</card>'
});