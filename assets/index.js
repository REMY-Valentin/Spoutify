// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';

// start the Stimulus application
import './bootstrap';
import Vue from 'vue';
import {VueConfig} from './VueConfig';
import Main from './components/main/Main';


new Vue({
    components: { 
        Main,
    },
    template: "<Main />",
    
}).$mount('#app')

