<?php require_once "partials/header.php" ?>

<body class="mx-[8%]">
    <style>
        body {
            font-family: "Montserrat", sans-serif;
        }
        .double-slider-box {
            background-color: #fff;
            border-radius: 10px;
            padding: 5px 40px 0px 40px;
        }

        .range-slider {
            position: relative;
            width: 100%;
            height: 4px;
            margin: 30px 0;
            background-color: gray;
            border-radius: 3px;
        }

        .slider-track {
            height: 100%;
            position: absolute;
            background-color: #000;
        }

        .range-slider input {
            position: absolute;
            width: 100%;
            background: none;
            pointer-events: none;
            top: 50%;
            transform: translateY(-50%);
            appearance: none;
        }

        input[type="range"]::-webkit-slider-thumb {
            height: 25px;
            width: 25px;
            border-radius: 50%;
            border: 2px solid #fff;
            background: #000;
            pointer-events: auto;
            appearance: none;
            cursor: pointer;
            box-shadow: 0 .125rem .5625rem -0.125rem rgba(0, 0, 0, .25);
        }

        input[type="range"]::-moz-range-thumb {
            height: 25px;
            width: 25px;
            border-radius: 50%;
            border: 3px solid #FFF;
            background: #FFF;
            pointer-events: auto;
            -moz-appearance: none;
            cursor: pointer;
            box-shadow: 0 .125rem .5625rem -0.125rem rgba(0, 0, 0, .25);
        }

        .tooltip {
            padding: .25rem .5rem;
            border: 0;
            border-radius: 10px;
            background: #000;
            color: #fff;
            font-size: .75rem;
            line-height: 1.2;
            border: .25rem;
            bottom: 120%;
            display: block;
            position: absolute;
            text-align: center;
            white-space: nowrap;
        }

        .min-tooltip {
            left: 50%;
            transform: translateX(-50%) translateY(-100%);
            z-index: 5;
        }

        .max-tooltip {
            right: 50%;
            transform: translateX(50%) translateY(-100%);
            z-index: 5;
        }

        .input-box {
            display: flex;
        }

        .min-box,
        .max-box {
            width: 50%;
        }

        .min-box {
            padding-right: .5rem;
            margin-right: .5rem;
        }

        .input-wrap {
            position: relative;
            display: flex;
            flex-wrap: wrap;
            align-items: stretch;
            width: 100%;
        }

        button {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
        }

        .color-item {
            position: relative;
            display: inline-block;
        }

        .color-item::after {
            content: attr(textcolor);
            position: absolute;
            top: 150%;
            left: 50%;
            transform: translateX(-50%) translateY(10px);
            background-color: rgba(0, 0, 0, 0.8);
            color: white;
            font-size: 12px;
            padding: 4px 8px;
            border-radius: 4px;
            white-space: nowrap;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease-in-out, transform 0.3s ease-in-out;
            z-index: 10;
        }

        .color-item:hover::after {
            opacity: 1;
            visibility: visible;
            transform: translateX(-50%) translateY(0);
        }
    </style>
    <?php require_once "partials/menu.php" ?>
    <hr class="mb-8">
    <article class="grid grid-cols-[0.5fr_2.5fr] gap-16 mt-[90px]">
        <div class="">
            <div class="text-left">
                <button type="button" id="menu-button"
                    class="inline-flex  w-full rounded-md  bg-white px-2 py-2 text-[16px] text-gray-700  gap-[230px]">
                    Size
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 "
                        viewBox="0 0 448 512">
                        <path
                            d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 144L48 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l144 0 0 144c0 17.7 14.3 32 32 32s32-14.3 32-32l0-144 144 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-144 0 0-144z" />
                    </svg>
                </button>
                <div class="dropdown-menu focus:outline-none hidden" role="menu" aria-orientation="vertical"
                    aria-labelledby="menu-button" id="dropdown-menu">
                    <div class="py-1 w-full gap-4 grid grid-cols-[1fr_1fr_1fr_1fr] justify-center" role="none">
                        <a href="#"
                            class="flex justify-center items-center text-gray-700 w-[47px] h-[32px] text-xs border border-[1px]-[#7d8699] rounded-tl-[10px] rounded-br-[10px]"
                            role="menuitem">S</a>
                        <a href="#"
                            class="flex justify-center items-center text-gray-700 w-[47px] h-[32px] text-xs border border-[1px]-[#7d8699] rounded-tl-[10px] rounded-br-[10px]"
                            role="menuitem">M</a>
                        <a href="#"
                            class="flex justify-center items-center text-gray-700 w-[47px] h-[32px] text-xs border border-[1px]-[#7d8699] rounded-tl-[10px] rounded-br-[10px]"
                            role="menuitem">L</a>
                        <a href="#"
                            class="flex justify-center items-center text-gray-700 w-[47px] h-[32px] text-xs border border-[1px]-[#7d8699] rounded-tl-[10px] rounded-br-[10px]"
                            role="menuitem">XL</a>
                        <a href="#"
                            class="flex justify-center items-center text-gray-700 w-[47px] h-[32px] text-xs border border-[1px]-[#7d8699] rounded-tl-[10px] rounded-br-[10px]"
                            role="menuitem">XXL</a>
                    </div>
                </div>
            </div>
            <hr class="my-4 w-[300px]">
            <div class="text-left">
                <button type="button" id="menu-button1"
                    class="inline-flex rounded-md bg-white px-2 py-2 text-[16px] text-gray-700 gap-[230px]">
                    <div>Màu</div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5"
                        viewBox="0 0 448 512">
                        <path
                            d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 144L48 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l144 0 0 144c0 17.7 14.3 32 32 32s32-14.3 32-32l0-144 144 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-144 0 0-144z" />
                    </svg>
                </button>
                <div class="dropdown-menu focus:outline-none hidden" role="menu" aria-orientation="vertical"
                    aria-labelledby="menu-button" id="dropdown-menu1">
                    <div class="py-1 w-full grid grid-cols-7 gap-4 justify-center" role="none">
                        <div class="color-item" data-color="black" textcolor="Đen">
                            <a href="#" class="block w-[18px] h-[18px] bg-black border border-gray-300 rounded-full"></a>
                        </div>
                        <div class="color-item" data-color="white" textcolor="Trắng">
                            <a href="#" class="block w-[18px] h-[18px] bg-white border border-gray-300 rounded-full"></a>
                        </div>
                        <div class="color-item" data-color="blue" textcolor="Xanh dương">
                            <a href="#" class="block w-[18px] h-[18px] bg-blue-500 border border-gray-300 rounded-full"></a>
                        </div>
                        <div class="color-item" data-color="yellow" textcolor="Vàng">
                            <a href="#" class="block w-[18px] h-[18px] bg-yellow-200 border border-gray-300 rounded-full"></a>
                        </div>
                        <div class="color-item" data-color="pink" textcolor="Hồng">
                            <a href="#" class="block w-[18px] h-[18px] bg-pink-500 border border-gray-300 rounded-full"></a>
                        </div>
                        <div class="color-item" data-color="red" textcolor="Đỏ">
                            <a href="#" class="block w-[18px] h-[18px] bg-red-500 border border-gray-300 rounded-full"></a>
                        </div>
                        <div class="color-item" data-color="gray" textcolor="Xám">
                            <a href="#" class="block w-[18px] h-[18px] bg-gray-500 border border-gray-300 rounded-full"></a>
                        </div>
                        <div class="color-item" data-color="beige" textcolor="Be">
                            <a href="#" class="block w-[18px] h-[18px] bg-[#fefec1] border border-gray-300 rounded-full"></a>
                        </div>
                        <div class="color-item" data-color="brown" textcolor="Nâu">
                            <a href="#" class="block w-[18px] h-[18px] bg-[#964B00] border border-gray-300 rounded-full"></a>
                        </div>
                        <div class="color-item" data-color="green" textcolor="Xanh lá">
                            <a href="#" class="block w-[18px] h-[18px] bg-green-500 border border-gray-300 rounded-full"></a>
                        </div>
                        <div class="color-item" data-color="orange" textcolor="Cam">
                            <a href="#" class="block w-[18px] h-[18px] bg-orange-500 border border-gray-300 rounded-full"></a>
                        </div>
                        <div class="color-item" data-color="purple" textcolor="Tím">
                            <a href="#" class="block w-[18px] h-[18px] bg-purple-500 border border-gray-300 rounded-full"></a>
                        </div>
                    </div>

                </div>
            </div>
            <hr class="my-4 w-[300px]">
            <div class="text-left">
                <button onclick="toggleSlider()"
                    class="inline-flex w-full rounded-md bg-white px-2 py-2 text-[16px] text-gray-700 gap-[230px]">
                    <div>Giá</div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 448 512">
                        <path
                            d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 144L48 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l144 0 0 144c0 17.7 14.3 32 32 32s32-14.3 32-32l0-144 144 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-144 0 0-144z" />
                    </svg>
                </button>
                <div class="slider-container mt-8 hidden relative max-w-xl w-full" id="slider-container">
                    <div class="double-slider-box">
                        <div class="range-slider">
                            <span class="slider-track"></span>
                            <input type="range" name="min_val" class="min-val" min="0" max="10000000" value="0" oninput="slideMin()">
                            <input type="range" name="max_val" class="max-val" min="0" max="10000000" value="10000000" oninput="slideMax()">
                            <div class="flex justify-between">
                                <div class="tooltip min-tooltip"></div>
                                <div class="tooltip max-tooltip"></div>
                            </div>
                        </div>
                        <input type="text" name="min_input" class="input-field min-input" onchange="setMinInput()" hidden>
                        <input type="text" name="max_input" class="input-field max-input" onchange="setMaxInput()" hidden>
                    </div>
                </div>
            </div>
            <hr class="my-4 w-[300px]">
            <div class="grid grid-cols-2 gap-12">
                <div>
                    <a class="border border-black rounded-tl-[15px] rounded-br-[15px] w-68 h-[50px] flex justify-center items-center hover:bg-black hover:text-white font-semibold text-base transition duration-300" href="#">
                        <button id="clear-filter-button">BỎ LỌC</button>
                    </a>
                </div>
                <div>
                    <p id="apply-filter-button" class="bg-black w-68 h-[50px] rounded-tl-2xl rounded-br-2xl flex items-center justify-center text-white text-base font-semibold hover:bg-white hover:text-black hover:border hover:border-black cursor-pointer transition duration-300">
                        LỌC
                    </p>
                </div>

            </div>
        </div>
        </div>
        <div>
            <div class="font-semibold text-2xl">
                Kết quả tìm kiếm
            </div>
            <?php
            unset($products);
            $products = $productFilterPrice;
            $grid = 5;
            include 'partials/product_list.php';
            ?>
        </div>
    </article>
    <hr class="mt-8">
</body>
<?php require_once "partials/footer.php" ?>

</html>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
<script>
    const button = document.getElementById('menu-button');
    const dropdownMenu = document.getElementById('dropdown-menu');
    button.addEventListener('click', () => {
        dropdownMenu.classList.toggle('hidden');
    });
    const button1 = document.getElementById('menu-button1');
    const dropdownMenu1 = document.getElementById('dropdown-menu1');
    button1.addEventListener('click', () => {
        dropdownMenu1.classList.toggle('hidden');
    });

    function toggleSlider() {
        const sliderContainer = document.getElementById('slider-container');
        sliderContainer.classList.toggle('hidden');
    }

    window.onload = function() {
        slideMin();
        slideMax();
    };

    const minVal = document.querySelector(".min-val");
    const maxVal = document.querySelector(".max-val");
    const priceInputMin = document.querySelector(".min-input");
    const priceInputMax = document.querySelector(".max-input");
    const minTooltip = document.querySelector(".min-tooltip");
    const maxTooltip = document.querySelector(".max-tooltip");
    const minGap = 1500;
    const range = document.querySelector(".slider-track");
    const sliderMinValue = parseInt(minVal.min);
    const sliderMaxValue = parseInt(maxVal.max);

    function slideMin() {
        let gap = parseInt(maxVal.value) - parseInt(minVal.value);
        if (gap < minGap) {
            minVal.value = parseInt(maxVal.value) - minGap;
        }
        const formatter = new Intl.NumberFormat('vi-VN', {
            style: 'currency',
            currency: 'VND'
        });
        minTooltip.innerHTML = formatter.format(minVal.value);
        priceInputMin.value = minVal.value;
        setArea();
        updateURL();
    }

    function slideMax() {
        let gap = parseInt(maxVal.value) - parseInt(minVal.value);
        if (gap < minGap) {
            maxVal.value = parseInt(minVal.value) + minGap;
        }
        const formatter = new Intl.NumberFormat('vi-VN', {
            style: 'currency',
            currency: 'VND'
        });
        maxTooltip.innerHTML = formatter.format(maxVal.value);
        priceInputMax.value = maxVal.value;
        setArea();
        updateURL();
    }


    function setArea() {
        range.style.left = `${
    ((minVal.value - sliderMinValue) / (sliderMaxValue - sliderMinValue)) * 100
  }%`;

        range.style.left = (minVal.value / sliderMaxValue) * 100 + "%";
        minTooltip.style.left = (minVal.value / sliderMaxValue) * 100 + "%";
        range.style.right = `${
    100 -
    ((maxVal.value - sliderMinValue) / (sliderMaxValue - sliderMinValue)) * 100
  }%`;
        maxTooltip.style.right = 100 - (maxVal.value / sliderMaxValue) * 100 + "%";
    }

    function setMinInput() {
        let minPrice = parseInt(priceInputMin.value);
        if (minPrice < sliderMinValue) {
            priceInputMin.value = sliderMinValue;
        }
        minVal.value = priceInputMin.value;
        slideMin();
    }


    function setMaxInput() {
        let maxPrice = parseInt(priceInputMax.value);
        if (maxPrice > sliderMaxValue) {
            priceInputMax.value = sliderMaxValue
        }
        maxVal.value = priceInputMax.value
        slideMax();

    }
    let selectedSizes = [];
    let selectedColors = [];
    let selectedMinPrice = 0;
    let selectedMaxPrice = 10000000;
    document.querySelectorAll('#dropdown-menu a').forEach(item => {
        item.addEventListener('click', function(event) {
            const size = event.target.innerText;

            if (selectedSizes.includes(size)) {
                selectedSizes = selectedSizes.filter(s => s !== size); // Bỏ chọn
                event.target.classList.remove('border-black', 'font-semibold');
            } else {
                selectedSizes.push(size); // Thêm vào mảng
                event.target.classList.add('border-black', 'font-semibold');
            }

            updateURL();
        });
    });

    document.querySelectorAll('#dropdown-menu1 a').forEach(item => {
        item.addEventListener('click', function(event) {
            const color = event.target.parentElement.getAttribute('data-color');

            if (selectedColors.includes(color)) {
                selectedColors = selectedColors.filter(c => c !== color); // Bỏ chọn
                event.target.classList.remove('border-2', 'border-blue-500');
            } else {
                selectedColors.push(color); // Thêm vào mảng
                event.target.classList.add('border-2', 'border-blue-500');
            }

            updateURL();
        });
    });

    document.getElementById('apply-filter-button').addEventListener('click', function() {
        // Gọi hàm updateURL khi bấm "LỌC"
        updateURL();
    });

    document.getElementById('clear-filter-button').addEventListener('click', function() {
        // Reset các filter, nếu cần
        selectedSizes = [];
        selectedColors = [];
        selectedMinPrice = 0;
        selectedMaxPrice = 10000000;

        // Cập nhật lại URL
        updateURL();
    });

    function updateURL() {
        const urlParams = new URLSearchParams();

        // Thêm action=search vào URL
        urlParams.set('action', 'search');

        // Thêm các tham số lọc size và color với dấu []
        selectedSizes.forEach(size => urlParams.append('size[]', size));
        selectedColors.forEach(color => urlParams.append('color[]', color));

        // Thêm min và max price vào URL
        const minPrice = document.querySelector(".min-input").value;
        const maxPrice = document.querySelector(".max-input").value;

        if (minPrice) urlParams.set('minPrice', minPrice);
        if (maxPrice) urlParams.set('maxPrice', maxPrice);

        // Cập nhật URL mà không reload trang
        history.pushState(null, '', '?' + urlParams.toString());
    }
</script>