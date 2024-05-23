<div class="silder">
    <div class="grid wide overflow">
        <div class="silder-img-animation">
            <img src="image/slider1.jpg" alt="" class="slider-img">
            <img src="image/slider2.jpg" alt="" class="slider-img">
            <img src="image/slider3.jpg" alt="" class="slider-img">
            <img src="image/slider4.jpg" alt="" class="slider-img">
            <img src="image/slider5.jpg" alt="" class="slider-img">
            <img src="image/slider6.jpg" alt="" class="slider-img">
        </div>
    </div>
</div>

<script>

// Slider hình ảnh
const imgSlider = document.querySelectorAll('.slider-img')
const slider = document.querySelector('.silder-img-animation')
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

</script>