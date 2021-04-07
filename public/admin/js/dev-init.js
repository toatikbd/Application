$(function () {
    //Widgets count
    $('.count-to').countTo();

    //Sales count to
    $('.sales-count-to').countTo({
        formatter: function (value, options) {
            return '$' + value.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, ' ').replace('.', ',');
        }
    });

    initRealTimeChart();
    initDonutChart();
    initSparkline();
});

// image preview
function previewFiles() {
    var preview = document.querySelector('.preview');
    var files   = document.querySelector('input[type=file]').files;
    function readAndPreview(file) {
        // Make sure `file.name` matches our extensions criteria
        if ( /\.(jpe?g|png|gif)$/i.test(file.name) ) {
            var reader = new FileReader();

            reader.addEventListener("load", function () {
                var image = new Image();
                image.height = 100;
                image.title = file.name;
                image.src = this.result;
                preview.appendChild( image );
            }, false);

            reader.readAsDataURL(file);
        }
    }
    if (files) {
        [].forEach.call(files, readAndPreview);
    }
}
// end image preview

$('#bs_datepicker_range_container').datepicker({
    autoclose: true,
    container: '#bs_datepicker_range_container'
});


//noUISlider
var sliderBasic = document.getElementById('nouislider_basic_example');
noUiSlider.create(sliderBasic, {
    start: [0],
    connect: 'lower',
    step: 1,
    range: {
        'min': [0],
        'max': [100]
    }
});
getNoUISliderValue(sliderBasic, true);
//Get noUISlider Value and write on
function getNoUISliderValue(slider, percentage) {
    slider.noUiSlider.on('update', function () {
        var val = slider.noUiSlider.get();
        if (percentage) {
            val = parseInt(val);
            val += '%';
        }
        $(slider).parent().find('span.js-nouislider-value').text(val);
    });
}
//end noUISlider
