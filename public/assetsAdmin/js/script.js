$(document).ready(function() {
    $('#summernote').summernote({
        height: 200
    });
});

$(document).ready(function () {
    $('#checkAllBoxes').click(function (event) {
        if(this.checked) {
            $('.checkBoxes').each(function () {
                this.checked = true;
            });
        } else {
            $('.checkBoxes').each(function () {
                this.checked = false;
            });
        }
    });
});
