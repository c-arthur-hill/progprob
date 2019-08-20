$(document).keydown(function(e) {
    // https://stackoverflow.com/questions/1402698/binding-arrow-keys-in-js-jquery
    switch(e.which) {
    case 37:
        let prevUrl = $('.js-prev').attr('href');
        $(location).attr('href', prevUrl);
        break;
    case 39:
        let nextUrl = $('.js-next').attr('href');
        $(location).attr('href', nextUrl);
        break;
    }
});

