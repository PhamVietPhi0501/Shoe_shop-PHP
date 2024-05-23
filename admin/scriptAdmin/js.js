const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);

const sideBar = $$('.sidebar-span');
console.log(sideBar)

sideBar.forEach(function(tab,index) {
    tab.onclick = function(){
        $('.sidebar-span.active').classList.remove('active')       
        this.classList.add('active')
    }
})