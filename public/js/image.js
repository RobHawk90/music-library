$('document').ready(function() {
    var $inputImage = $('#image');
    var $img = $('img.image');

    function setImageOrFake(url) {
        var src = url || 'https://fakeimg.pl/350x200/?text=Insert a photo URL';
        $img.attr('src', src);
    }

    setImageOrFake($img.attr('src'));

    $inputImage.change(function() {
        var url = $inputImage.val();
        setImageOrFake($inputImage.val());
    });
});
