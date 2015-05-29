jQuery(function($) {

    if (piroboxSlider !== undefined || piroboxSlider !== null) {
        $.each(piroboxSlider, function(index, value) {
            console.log(index);
            console.log(value);
        });
    }
    if (piroboxCarousel !== undefined || piroboxCarousel !== null) {
        $.each(piroboxCarousel, function(index, value) {
            console.log(index);
            console.log(value);
        });
    }
    if (piroboxGallery !== undefined || piroboxGallery !== null) {
        $.each(piroboxGallery, function(index, value) {
            console.log(index);
            console.log(value);
        });
    }

});
