const sao = document.querySelector.bind(document)
const saosao = document.querySelectorAll.bind(document)

// Slider hình ảnh
const imgSlider = saosao('.slider-img')
const slider = sao('.silder-img-animation')
let isNumber = imgSlider.length;
let index = 0;

imgSlider.forEach(function(img,index) {
    img.style.left = index*100+ "%";
})

function run() {
    index++
    if(index >= isNumber){
        index = 0
    }
    slider.style.left = "-"+ index*100 +"%";
}
setInterval(run,3000)


$("#loadNike").click(function(e) {
e.preventDefault();
$("#test").load("pages/content/hienthisanpham.php?id=2");
})
$("#loadAdidas").click(function(e) {
    e.preventDefault();
    $("#test").load("pages/content/hienthisanpham.php?id=6");
})
