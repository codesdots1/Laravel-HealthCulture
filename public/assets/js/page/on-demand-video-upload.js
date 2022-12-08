$(document).ready(function() {

    var val = {
        rules: {
            'class_type_id': "required",
            'class_subtitle': "required",
            'class_difficulty_id': "required",
            'duration': "required",
            'subscriber_fee': "required",
            'non_subscriber_fee': "required",
            'description': "required",
            'muscle_group_id[]': "required",
            'equipment[]': "required",
            'burn_calories': {
                required: true,
                minlength: 0,
                maxlength: 4,
                digits: true
            },
        },
        // Specify validation error messages
        messages: {
            'class_type_id': "Please select class type",
            'class_subtitle': "Please enter a class subtitle",
            'class_difficulty_id': "Please select class type",
            'duration': "Please enter class duration time",
            'subscriber_fee': "Please enter Subscribers Fee",
            'non_subscriber_fee': "Please enter Nonsubscribers Fee",
            'muscle_group_id[]': "Please select muscle group",
            'equipment[]': "Please select equipment",
            'burn_calories': {
                required: "kcal is required",
                digits: "kcal should be a number"
            }
        }
    }

    $("#myForm").multiStepForm({
        // defaultStep: 0,
        beforeSubmit: function(form, submit) {
            alert();
            console.log("called before submiting the form");
            console.log(form);
            console.log(submit);
        },
        validations: val,
    }).navigateTo(0);


    $("#myForm").submit(function(event) {
        event.preventDefault();
        
        if ($('#file-upload-form #thumbnail_video').val().length === 0) {
            toastr.error("Please upload on demand video");
        } else {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "{{ route('saveOnDemandVideoUpload') }}",
                method: 'POST',
                dataType: "json",
                data: $("#myForm").serializeArray(),
                success: function(response) {
                    if (response.error) {
                        toastr.error(response.error);
                    } else {
                        $('#myForm').trigger('reset');
                        toastr.success(response.success);
                    }
                }
            });
        }
    });

    $("#videoSourceWrapper").hide();

    $(".add-more").click(function() {
        var html = $(".copy").html();
        $(".after-add-more").before(html);
    });

    $("body").on("click", ".remove", function() {
        $(this).parents(".control-group").remove();
    });

    $("body").on("click", ".remove", function(e) {
        $(".next-referral").last().remove();
    });


    //1 Neck
    $('[id*=Neck]').click(function() {
        if ($(this).is(":checked")) {
            $(".Neck").css("fill", "#CC2936");
        } else {
            $(".Neck").css("fill", "#fff");
        }
    });

    //2 Shoulder
    $('[id*=Shoulder]').click(function() {
        if ($(this).is(":checked")) {
            $(".Shoulder").css("fill", "#CC2936");
        } else {
            $(".Shoulder").css("fill", "#fff");
        }
    });

    //3 Chest
    $('[id*=Chest]').click(function() {
        if ($(this).is(":checked")) {
            $(".Chest").css("fill", "#CC2936");
        } else {
            $(".Chest").css("fill", "#fff");
        }
    });

    //4 Biceps
    $('[id*= Biceps]').click(function() {
        if ($(this).is(":checked")) {
            $(".Biceps").css("fill", "#CC2936");
        } else {
            $(".Biceps").css("fill", "#fff");
        }
    });

    //5 Forearm
    $('[id*= Forearm]').click(function() {

        if ($(this).is(":checked")) {
            $(".Forearm").css("fill", "#CC2936");
        } else {
            $(".Forearm").css("fill", "#fff");
        }
    });

    //6 Abdominals
    $('[id*= Abdominals]').click(function() {
        if ($(this).is(":checked")) {
            $(".Abdominals").css("fill", "#CC2936");
        } else {
            $(".Abdominals").css("fill", "#fff");
        }
    });
    //7 Oblique
    $('[id*=Oblique]').click(function() {
        if ($(this).is(":checked")) {
            $(".Oblique").css("fill", "#CC2936");
        } else {
            $(".Oblique").css("fill", "#fff");
        }
    });
    //8 Upper Back
    $('[id*=UpperBack]').click(function() {
        if ($(this).is(":checked")) {
            $(".UpperBack").css("fill", "#CC2936");
        } else {
            $(".UpperBack").css("fill", "#fff");
        }
    });
    //9 LowerBack
    $('[id*=LowerBack]').click(function() {
        if ($(this).is(":checked")) {
            $(".LowerBack").css("fill", "#CC2936");
        } else {
            $(".LowerBack").css("fill", "#fff");
        }
    });

    //10 Quadriceps
    $('[id*=Quadriceps]').click(function() {
        if ($(this).is(":checked")) {
            $(".Quadriceps").css("fill", "#CC2936");
        } else {
            $(".Quadriceps").css("fill", "#fff");
        }
    });

    //11 Hamstrings
    $('[id*=Hamstrings]').click(function() {
        if ($(this).is(":checked")) {
            $(".Hamstrings").css("fill", "#CC2936");
        } else {
            $(".Hamstrings").css("fill", "#fff");
        }
    });

    // 12 Calfs
    $('[id*=Calfs]').click(function() {
        if ($(this).is(":checked")) {
            $(".Calfs").css("fill", "#CC2936");
        } else {
            $(".Calfs").css("fill", "#fff");
        }
    });

    //13 Glutes
    $('[id*=Glutes]').click(function() {
        if ($(this).is(":checked")) {
            $(".Glutes").css("fill", "#CC2936");
        } else {
            $(".Glutes").css("fill", "#fff");
        }
    });


});


$('#thumbnail_video').on('change',
    function() {
        var fileInput = document.getElementById("thumbnail_video");
        console.log('Trying to upload the video file: %O', fileInput);

        if ('files' in fileInput) {
            if (fileInput.files.length === 0) {
                alert("Select a file to upload");
            } else {
                var $source = $('#videoSource');
                $source[0].src = URL.createObjectURL(this.files[0]);
                $source.parent()[0].load();
                $("#videoSourceWrapper").show();
                UploadVideo(fileInput.files[0]);
                if (UploadVideo) {
                    document.getElementById('custom-ProgressBar').classList.remove("d-none");
                    document.getElementById('file-image').classList.remove("hidden");
                    document.getElementById('start').classList.add("hidden");
                    document.getElementById('maincustom-ProgressBar').classList.add("mb-7");
                } else {
                    document.getElementById('file-image').classList.add("hidden");
                }
            }
        } else {
            console.log('No found "files" property');
        }
    }
);

function UploadVideo(file) {
    var loaded = 0;
    var chunkSize = 500000;
    var total = file.size;
    var reader = new FileReader();
    var slice = file.slice(0, chunkSize);

    // Reading a chunk to invoke the 'onload' event
    reader.readAsBinaryString(slice);
    console.log('Started uploading file "' + file.name + '"');
    $('#uploadVideoProgressBar').show();

    upload_thumbnail_video();
    reader.onload = function(e) {
        //Just simulate API
        setTimeout(function() {
            loaded += chunkSize;
            var percentLoaded = Math.min((loaded / total) * 100, 100);
            //console.log('Uploaded ' + Math.floor(percentLoaded) + '% of file "' + file.name + '"');
            $('#uploadVideoProgressBar').width(percentLoaded + "%");
            $('#ProgressBarPercentage').html(Math.floor(percentLoaded) + "%");

            //Read the next chunk and call 'onload' event again
            if (loaded <= total) {
                slice = file.slice(loaded, loaded + chunkSize);
                reader.readAsBinaryString(slice);
            } else {
                loaded = total;
                $('#uploadVideoProgressBar').width("100%");
                $('#ProgressBarPercentage').html("100%");
                console.log('File "' + file.name + '" uploaded successfully!');
                $('#uploadVideoProgressBar').html("Video Upload Complete.");
            }
        }, 250);
    }
}


function upload_thumbnail_video() {
    $.ajax({
        url: "{{ route('uploadCoachClassVideo') }}",
        method: 'POST',
        contentType: false,
        processData: false,
        data: new FormData($("#file-upload-form")[0]),
        success: function(response) {
            console.log(response.success);
            var response = JSON.parse(response);
            var thumbnail_video = response.data.thumbnail_video;
            console.log(thumbnail_video);
            $('#myForm input#thumbnail_video').val(thumbnail_video);
            // if (response.error) {
            //     toastr.error(response.error);
            // } else {
            //     toastr.success(response.success);
            // }
        }
    });
}

function PostChunk() {
    //Send the sliced chunk to the REST API
    $.ajax({
        url: "http://api/url/etc",
        type: "POST",
        data: slice,
        processData: false,
        contentType: false,
        error: (function(errorData) {
            console.log(errorData);
            alert("Video Upload Failed");
        })
    }).done(function(e) {
        //The chunk is successfully uploaded!
        loaded += chunkSize;
        var percentLoaded = Math.min((loaded / total) * 100, 100);
        console.log('Uploaded ' + Math.floor(percentLoaded) + '% of file "' + file.name + '"');
        $('#uploadVideoProgressBar').width(percentLoaded + "%");
        //Read the next chunk and call 'onload' event again
        if (loaded <= total) {
            slice = file.slice(loaded, loaded + chunkSize);
            isFirstChunk = false;
            reader.readAsBinaryString(slice);
        } else {
            percentLoaded = 100;
            console.log('File "' + file.name + '"uploaded successfully!');
            $('#uploadVideoProgressBar').hide();
        }
    });
}

var maxLength = 500;
$('textarea').keyup(function() {
    var textlen = maxLength - $(this).val().length;
    $('#current').text(textlen);
});
var inputQuantity = [];
$(function() {
    $(".burn_calories").on("keyup", function(e) {
        var $field = $(this),
            val = this.value,
            $thisIndex = parseInt($field.data("idx"), 10);
        if (this.validity && this.validity.badInput || isNaN(val) || $field.is(":invalid")) {
            this.value = inputQuantity[$thisIndex];
            return;
        }
        if (val.length > Number($field.attr("maxlength"))) {
            val = val.slice(0, 4);
            $field.val(val);
        }
        inputQuantity[$thisIndex] = val;
    });
});