<!-- <section id="banner">
    <div class="banner_main">
        <div class="item">
            <img id="imgs" src="./Image/Banner/anh_banner.jpg" alt="">
        </div> 
    </div>
</section> -->

<section id="banner">
    <div class="banner_main">
        <div class="item">
            <img id="imgs" src="./Image/Banner/anh_banner1.jpg" alt="">
        </div>
    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Danh sách các đường dẫn ảnh
        var imageSources = [
            "./Image/Banner/anh_banner1.jpg",
            "./Image/Banner/anh_banner.jpg",
            // "./Image/Banner/anh_banner3.jpg"
        ];

        var imgElement = document.getElementById("imgs");
        var currentImageIndex = 0;

        // Hàm chuyển đổi ảnh
        function changeImage() {
            imgElement.src = imageSources[currentImageIndex];

            // Tăng chỉ số ảnh, quay lại ảnh đầu nếu đã đến ảnh cuối
            currentImageIndex = (currentImageIndex + 1) % imageSources.length;
        }

        // Thiết lập chuyển đổi tự động sau mỗi khoảng thời gian 
        setInterval(changeImage, 2000);
    });
</script>