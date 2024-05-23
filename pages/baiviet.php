<div class="grid wide">
    <section class="detail4">
        <h2>TIN TỨC MY SHOE</h2>
        <p>#BLOG</p>
        <i id="left" class="fa-solid fa-angle-left detail4-img-i1"></i>
        <i id="right" class="fa-solid fa-angle-right detail4-img-i2"></i>
        <div class="detail4-img">
            <div class="detail4-img-feedback">
                <img src="image/FEEDBACK/anh1.jpg" alt="">
                <p>Tôi đã mua giày của Myshoes.vn và thật sự nó vô cùng chất lượng. Hàng đảm bảo chính hãng 100% và chính sách bảo hành rất yên tâm ạ. Cảm ơn Myshoes.vn!</p>
                <h4>- Anh Phi -</h4>
            </div>
            <div class="detail4-img-feedback">
                <img src="image/FEEDBACK/anh2.jpg" alt="">
                <p>Myshoes.vn bán hàng chính hãng, giá rất ok, tôi đã mua một đôi giày chạy bộ của Nike đi rất êm và thích.</p>
                <h4>- Anh Viết Phi -</h4>
            </div>
            <div class="detail4-img-feedback">
                <img src="image/FEEDBACK/anh3.jpg" alt="">
                <p>Mua hàng của Myshoes.vn thì rất yên tâm rồi, mình mua luôn 2 đôi vì nhiều mẫu đẹp quá! Sẽ ủng hộ shop thường xuyên.</p>
                <h4>- Anh Phạm Viết Phi -</h4>
            </div>
            <div class="detail4-img-feedback">
                <img src="image/FEEDBACK/anh4.jpg" alt="">
                <p>Tìm một đôi giày ưng ý không hề dễ dàng, nhưng từ khi biết đến Myshoes.vn thì hoàn toàn tin tưởng, nhiều mẫu đẹp và đã chọn được một em Adidas ưng ý!</p>
                <h4>- Anh Phi RORÉ -</h4>
            </div>
            <div class="detail4-img-feedback">
                <img src="image/FEEDBACK/anh5.jpg" alt="">
                <p>Mới mua combo chăm sóc giày của Myshoes sử dụng rất tốt, vệ sinh giày siêu sạch, xịt nano rất hiệu quả khi đi trời mưa.</p>
                <h4>- Anh Phi CODER -</h4>
            </div>
        </div>
    </section>
</div>

<script>
    var carousel = document.querySelector('.detail4-img')
    firstImg = document.querySelectorAll('.detail4-img-feedback')[0];

    var arrowIcons = document.querySelectorAll('.detail4 i')
    let firstImgWidth = firstImg.clientWidth + 16;
    let scrollWidth = carousel.scrollWidth - carousel.clientWidth;

    const showHideIcons = () => {
        arrowIcons[0].style.display = carousel.scrollLeft == 0 ? "none" : "block";
        arrowIcons[1].style.display = carousel.scrollLeft == scrollWidth ? "none" : "block";
    }

    arrowIcons.forEach(function(icon) {
        icon.addEventListener('click', function() {
            carousel.scrollLeft += icon.id == "left" ? -firstImgWidth : firstImgWidth;
            setTimeout(() => showHideIcons(), 60)
        })
    })

    let isDragStart = false,
        prevPageX, prevScrollLeft;
    const dragStart = function(e) {
        isDragStart = true;
        prevPageX = e.pageX;
        prevScrollLeft = carousel.scrollLeft;
    }

    const dragging = function(e) {
        if (!isDragStart) return;
        e.preventDefault();
        carousel.classList.add('dragging')
        let positionDriff = e.pageX - prevPageX;
        carousel.scrollLeft = prevScrollLeft - positionDriff;
        showHideIcons();
    }

    const dragStop = function() {
        isDragStart = false;
        carousel.classList.remove('dragging')
    }


    carousel.addEventListener('mousedown', dragStart);
    carousel.addEventListener('mousemove', dragging);
    carousel.addEventListener('mouseup', dragStop);
</script>