voyager.component('UserWidget', {
    props: ['count', 'timestamps', 'thisYear', 'lastYear', 'thisMonth', 'lastMonth'],
    template: require('./Widget.html').default,
});