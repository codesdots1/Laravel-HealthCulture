@extends('coach.layouts.app')

@section('style')
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/multi-form.css') }}">

    <style>
        .btn-outline-secondary {
            font-size: 16px;
        }
        .btn-outline-secondary {
            color: #ffffff;
            border-color: #2c3a4a;
            background: #2c3a4a;
            width: 100%;
        }
        .create-meal-delete-btn{
             border-radius: 3px;
             background-color: #2c3a4a !important;
              box-shadow: none !important;
              padding: 7px !important;
               border: 0 !important;
                height: 49.5px;
         }
        .allscreen-custom-height{
            height: 90vh;
            margin-top: 7%;
        }
        .sc13-border-custom-height {
            height: 42%;
        }
        .custom-Muscles-btn .mb-3 {
            margin-bottom: 0.7rem !important;
        }
        input[type="checkbox"] {
            width: 0px !important;
        }
        .btn-outline-secondary:hover,
        .btn-secondary.valid:checked+.btn-outline-secondary,
        .btn-check:active+.btn-outline-secondary,
        .btn-check:checked+.btn-outline-secondary,
        .btn-outline-secondary.active,
        .btn-outline-secondary.dropdown-toggle.show,
        .redBackground {
            color: #fff;
            background-color: #acbaca;
            border-color: #acbaca;
        }
        textarea {
            background: #2c3a4a !important;
            border: none !important;
            color: #fff !important;
        }
input {
    height: 51.5px;
}
        #the-count {
            position: absolute;
            bottom: 2px;
            float: left;
            padding: 0.1rem 0 0 0;
            font-size: 0.875rem;
            right: 10px;
        }
        @media screen and (max-width:991px) {
            button.btn.btn-danger.mt-2.submit {
                margin-left: 30px;
            }
        }
        @media screen and (max-width:767px) {
            .sc13-border-custom-height {
                height: 0%;
            }
            .allscreen-custom-height {
                height: auto;
            }
        }

    </style>

@endsection

@section('content')
    <section class="custom-padding blocktext" style="height:100%;">
        <div class="container">
            <div class="">
                <div class="row allscreen-custom-height">

                    <div class="col-md-6 col-12 m-auto pt-md-0 pt-5 pr-custom">
                        <div class="pt-0 p-3">
                            <form id="thumbnail_image-form" class="uploader">
                                <input id="thumbnail_image" type="file" name="thumbnail_image" accept="image/*" />
                                <span class="heavy badge custom-badge bg-success text-capitalize text-white">RECIPE</span>

                                <label for="thumbnail_image" id="file-drag">

                                    <img id="file-image" src="#" alt="Preview" class="hidden">

                                    <div id="start">
                                        <i class="bi bi-cloud-upload" style="font-size: 58px;"></i>
                                        <div>Upload Thumbnail for Recipe</div>
                                        <div id="notimage" class="hidden">Please select an image</div>
                                    </div>

                                    <div id="response" class="hidden">
                                        <div id="messages"></div>
                                    </div>

                                </label>
                            </form>
                        </div>
                    </div>


                    <div class="col-md-1 col-0  custom-buttom-right sc13-border-custom-height m-auto custom-h-50">
	    <img src="{{ asset('assets/images/red-border.png') }}" style=" height: 100%;" />
	</div>


                    <div class="col-md-5 col-12 m-auto pt-md-0 pt-5 custom-buttom">

                        <form id="myForm" class="screen5-form" action="#" method="POST">

                            <!-- ------------------- screen-11 ------------------- -->
                            <div class="tab">
	<div class="input-group has-feedback" style="margin-bottom: 14px !important;">
                        <div class="input-group has-validation">
                                <input type="text" name="title" class="form-control " id="title" placeholder='Edit Recipe Title…' required>
	</div>
	</div>

	<div class="input-group has-feedback" style="margin-bottom: 14px !important;">
                        <div class="input-group has-validation">
                                <input type="text" name="sub_title" class="form-control " id="sub_title" placeholder='Edit Recipe Subtitle…' required>
</div>
</div>

	<div class="input-group has-feedback" style="margin-bottom: 14px !important;">
                        <div class="input-group has-validation">
                                <input type="number" name="duration" step="5" min="0" max="150" class="form-control  " id="inputMDEx2" placeholder='Recipe Preparation Duration' required>
	</div>
	</div>

                                <div class="row custom-Muscles-btn  ">
                                    @foreach ($meal_type as $single)
                                        <div class="col-sm-4 col-6 text-center  ">
		<div class="input-group has-feedback" style="margin-bottom: 14px !important;">
                        	<div class="input-group has-validation">
                                            <input type="checkbox" class="btn-check btn-secondary" name="meal_type_id[]" autocomplete="off" value="{{ $single->id }}" id="danger-outlined-{{ $single->id }}">
                                            <label class="btn btn-outline-secondary" for="danger-outlined-{{ $single->id }}" style=" border-radius: 5px;height: 49.5px;   line-height: 38px;">
                                               {{ $single->meal_type_name }}
                                            </label>
                                        </div>
                                        </div>
                                        </div>
                                    @endforeach
                                </div>

                                <h4 class=" text-white mt-3 mb-3 bold">Recipe Steps</h4>
                                <div class="row">
                                    <div class="col-12 text-center" id="style-4" style="height: 190px; overflow-x: hidden; overflow-y:auto !important;">

                                        {{-- <div id="custom-form">
                                            <div class="form-floating mb-2" id="custom-textarea-add">
                                                <textarea class="form-control py-4" name="recipe_step[]"
                                                    placeholder="Edit Step by Step Recipe…" rows="7" maxlength="2000"
                                                    id="customTextarea1" style="height:100px; resize: none;"
                                                    onkeyup="javascript:countChar(1);" required></textarea>
                                                <label for="customTextarea1" class="text-white" required>Edit Step by Step Recipe…</label>
                                                <a class="btn custom-trash text-white" onclick="javascript:eraseText(1);"><i
                                                        class="bi bi-trash-fill"></i></a>
                                                <div id="the-count">
                                                    <span id="current1" style="color: #fff;">2000</span>
                                                    <span id="maximum1" style="color: #fff;">/ 2000</span>
                                                </div>
                                            </div>
                                        </div> --}}

                                        <div id="custom-form">
                                            <div class="form-floating" id="custom-textarea-add" style="    margin-bottom: 14px !important;">

                                                <textarea class="form-control py-4" name="recipe_step[]" placeholder="Edit Step by Step Recipe…" rows="7" maxlength="2000" id="customTextarea1" style="height:120px; resize: none;" onkeyup="javascript:countChar(1);" required></textarea>
                                                <label for="customTextarea1" class="text-white custom-textarealable" required>Edit Step by Step Recipe…</label>

                                                <a class="btn custom-trash text-white" onclick="javascript:eraseText(1);">
                                                    <i class="bi bi-trash-fill"></i>
                                                </a>

                                                <div id="the-count">
                                                    <span id="current1" style="color: #fff;">2000</span>
                                                    <span id="maximum1" style="color: #fff;">/ 2000</span>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="panel-body">
                                            <div class="after-add-more w-100">
                                                <div class="input-group-btn">
                                                    <div class="row">
                                                        <div class="col-12 mb-4">
                                                            <button class="btn add-more w-100" id="after-add-more" type="button" style=" border-radius: 6px; background-color: #526070 !important; color:#fff;    padding: 10px 15px;">
			  <i class="bi bi-plus-circle" style="padding-right: 10px;"></i>
                                                            Add another Step</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>

                            <!-- ------------------- screen-12 ------------------- -->
                            <div class="tab">
                                <h4 class="text-white mb-3 heavy">Dietary Restrictions</h4>

                                <div class="row">
                                    <div class="col-12" id="style-4" style="height:380px;overflow-x: hidden; overflow-y: auto;">

                                        <div class="row custom-Muscles-btn mb-2 ">
                                            @foreach ($dietary_restriction as $single)
                                                <div class="col-md-6 col-lg-4 col-6 text-center ">
		<div class="input-group has-feedback" style="margin-bottom: 14px !important;">
                        	<div class="input-group has-validation">
                                                    <input type="checkbox" class="btn-check btn-secondary" name="dietary_restriction_id[]" autocomplete="off" value="{{ $single->id }}" id="dietary-restriction-outlined-{{ $single->id }}">
                                                    <label class="btn btn-outline-secondary" for="dietary-restriction-outlined-{{ $single->id }}" style="border-radius: 5px; height: 49.5px;   line-height: 38px;">{{ $single->dietary_restriction_name }}</label>
                                                </div>
                                                </div>
                                                </div>
                                            @endforeach
                                        </div>

                                        <h4 class=" text-white mb-3 bold"> Ingredients </h4>
                                        <div class="p-0 ">
                                            <div class="control-group2 input-group d-block">
                                                <div class="row" style="padding-right: 5px !important;">
                                                    <div class="col-lg-3 col-md-3 col-3" style="  padding-left: 8px;   padding-right:0px;">
		<div class="input-group has-feedback" style="margin-bottom: 14px !important;">
                        	<div class="input-group has-validation">
                                                        <input type="number" min="0" max="99999" maxlength="5" name="qty[]" class="form-control mb-2 form-select zipcode-number" placeholder="Quantity…" id="inputMDEx3" style="border-radius: 3px !important;" required>
                                                    </div>
                                                    </div>
                                                    </div>

                                                    <div class="col-lg-2 col-md-2 col-2" style="   padding-left: 8px; padding-right: 0px;">
		<div class="input-group has-feedback" style="margin-bottom: 14px !important;">
                        	<div class="input-group has-validation">
                                                        <select class="form-select mb-2" name="addmore[]" aria-label="Default select example" style="height: 51.5px; border-radius:3px !important" required>
                                                            <option value="g">Gram</option>
                                                            <option value="kg">Kilograms</option>
                                                            <option value="l">liter</option>
                                                            <option value="ml">Milliliters</option>
                                                        </select>
                                                    </div>
                                                    </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-6" style="padding-left: 8px;padding-right: 0px;">
                                                        {{--<select class="form-select mb-2"name="ingredient[]" aria-label="Default select example" required>
                                                            <option value="">Ingredient…</option>
                                                            <option value="Chicken, raw, no skin">Chicken, raw, no skin
                                                            </option>
                                                            <option value="Green Pepper, sliced, spicy">Green Pepper,
                                                                sliced, spicy</option>
                                                            <option value="Green Pepper, sliced, spicy">Green Pepper,
                                                                sliced, spicy</option>
                                                            <option value="Green Pepper, sliced, spicy">Green Pepper,
                                                                sliced, spicy</option>
                                                        </select> --}}
		<div class="input-group has-feedback" style="margin-bottom: 14px !important;">
                        	<div class="input-group has-validation">
                                                        <input type="text" list="browsers" name="ingredient[]" class="form-control" placeholder="Ingredient…" style="border-radius:3px !important;" /></label>
                                                        <datalist id="browsers">
                                                            <option value="Chicken, raw, no skin"></option>
                                                            <option value="Green Pepper, sliced, spicy"></option>
                                                            <option value="Green Pepper, sliced, spicy"></option>
                                                            <option value="Green Pepper, sliced, spicy"></option>
                                                        </datalist>
                                                    </div>
                                                    </div>
                                                    </div>
                                                    <div class="col-lg-1 col-md-1 col-1 text-center" style=" padding-left: 8px;   padding-right: 8px;">
                                                        <button class="btn text-white remove p-0 create-meal-delete-btn" type="submit">
                                                            <i class="bi bi-trash-fill"></i>
                                                        </button>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="p-0 copy2 hide d-none">
                                            <div class="control-group2 input-group d-block">
                                                <div class="row" style="padding-right: 5px !important;">
                                                    <div class="col-lg-3 col-md-3 col-3" style="padding-left: 8px;padding-right: 0px;">
                                                        <input type="number" min="0" max="99999" maxlength="5" name="qty[]" class="form-control mb-2 form-select zipcode-number" placeholder="Quantity…" id="inputMDEx3"  style="border-radius: 3px !important;" required>
                                                    </div>

                                                    <div class="col-lg-2 col-md-2 col-2" style="padding-left: 8px; padding-right: 0px;">
                                                        <select class="form-select mb-2" name="addmore[]" aria-label="Default select example"style="height: 51.5px; border-radius:3px !important"  required>
                                                            <option value="g">Gram</option>
                                                            <option value="kg">Kilograms</option>
                                                            <option value="l">liter</option>
                                                            <option value="ml">Milliliters</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-6" style="padding-left: 8px;padding-right: 0px;">

                                                        {{--<select class="form-select mb-2"name="ingredient[]" aria-label="Default select example" required>
                                                            <option value="">Ingredient…</option>
                                                            <option value="Chicken, raw, no skin">Chicken, raw, no skin </option>
                                                            <option value="Green Pepper, sliced, spicy">Green Pepper, sliced, spicy</option>
                                                            <option value="Green Pepper, sliced, spicy">Green Pepper, sliced, spicy</option>
                                                            <option value="Green Pepper, sliced, spicy">Green Pepper, sliced, spicy</option>
                                                        </select> --}}

                                                        <input type="text" list="browsers" name="ingredient[]" class="form-control" placeholder="Ingredient…" style="   border-radius: 3px !important;" /></label>
                                                        <datalist id="browsers">
                                                            <option value="Chicken, raw, no skin"></option>
                                                            <option value="Green Pepper, sliced, spicy"></option>
                                                            <option value="Green Pepper, sliced, spicy"></option>
                                                            <option value="Green Pepper, sliced, spicy"></option>
                                                        </datalist>
                                                    </div>
                                                    <div class="col-lg-1 col-md-1 col-1 text-center"  style=" padding-left: 8px;   padding-right: 8px;">
                                                        <button class="btn text-white remove  p-0 create-meal-delete-btn" type="submit">
                                                            <i class="bi bi-trash-fill"></i>			
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="panel-body">
                                            <div class="after-add-more2 w-100">
                                                <div class="input-group-btn">
                                                    <div class="row">
                                                        <div class="col-12 mb-4">
                                                            <button class="btn add-more2 w-100" id="after-add-more2" type="button" style=" border-radius: 6px;background-color: #526070 !important; color:#fff;    padding: 10px 15px;">
			  <i class="bi bi-plus-circle" style="padding-right: 10px;"></i>
                                                            Add </button>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div style="overflow:auto;">
                                <div style=" margin-top: 5px;">
                                    <button type="button" class="previous">
                                        <i class="bi bi-chevron-left"></i>
                                    </button>
                                    <div class="text-center">
                                        <button type="button" class="btn btn-danger next mt-2" style=" padding: 1.5% 24%;">
                                            <b>Next</b>
                                        </button>
                                    </div>
                                    <div class="text-center">
                                        <button type="button" class="btn btn-danger mt-2 submit" style=" padding: 1.5% 24%;">
                                            <b>Save</b>
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </form>

                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection

@section('script')
    <script type="text/javascript" src="{{ asset('assets/js/multi-form.js') }}"></script>

    <script>
        $("input[type='checkbox']").change(function() {
            if ($("input[id='danger-outlined-1']").is(":checked")) {
                $('label[for="danger-outlined-1"]').addClass("redBackground");
            } else {
                $('label[for="danger-outlined-1"]').removeClass("redBackground");
            }
        });
        $("input[type='checkbox']").change(function() {
            if ($("input[id='dietary-restriction-outlined-1']").is(":checked")) {
                $('label[for="dietary-restriction-outlined-1"]').addClass("redBackground");
            } else {
                $('label[for="dietary-restriction-outlined-1"]').removeClass("redBackground");
            }
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {


            var val = {
                rules: {
                    'title': "required",
                    'sub_title': "required",
                    'duration': {
                        "required": true,
                        "step": 5
                    },
                    'meal_type_id[]': "required",
                    'dietary_restriction_id[]': "required",
                    'qty[]': "required",
                    'ingredient[]': "required",

                },
                // Specify validation error messages
                messages: {
                    'title': "Please enter a recipe title",
                    'sub_title': "Please enter sub title",
                    'duration': {
                        "required": "Please enter recipe duration time",
                        "step": "Please enter valid recipe duration time"
                    },
                    'meal_type_id[]': "Please select meal type",
                    'dietary_restriction_id[]': "Please select dietary restriction",
                    'qty[]': "Please select quantity",
                    'ingredient[]': "Please select ingredient",
                }
            }
            $("#myForm").multiStepForm({
                // defaultStep:0,
                beforeSubmit: function(form, submit) {
                    console.log("called before submiting the form");
                    console.log(form);
                    console.log(submit);
                },
                validations: val,
            }).navigateTo(0);



            $("#myForm").submit(function(event) {
                event.preventDefault();

                if ($('#thumbnail_image-form #thumbnail_image').val().length === 0) {
                    toastr.error("Please upload thumbnail image");
                } else {

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    var formData = new FormData($("#thumbnail_image-form")[0]);
                    var poData = jQuery(document.forms['myForm']).serializeArray();
                    for (var i = 0; i < poData.length; i++)
                        formData.append(poData[i].name, poData[i].value);

                    $.ajax({
                        url: "{{ route('saveMealRecipe') }}",
                        method: 'POST',
                        // dataType: "json",
                        contentType: false,
                        processData: false,
                        data: formData,
                        success: function(response) {
                            var response = JSON.parse(response);
                            if (response.error) {
                                toastr.error(response.error);
                            } else {
                                $('#myForm').trigger('reset');
                                toastr.success(response.success);
                                window.location.href = "{{ route('uploadsuccess') }}";
                            }
                        }
                    });
                }
            });


        });
    </script>

    <!-- ------------------ script screen11 ------------------  -->
    <script>
        var scntDiv = $("#custom-form");
        var i = $("#custom-textarea-add").length + 1;

        $(function() {
            $("#after-add-more").click(function() {

                var current = 'current' + i;
                var maximum = 'maximum' + i;

                $(
                    '<div class="form-floating mb-2" ><textarea class="form-control py-4" id="customTextarea' +
                    i +
                    '"  name="recipe_step[]' +
                    i + '" onkeyup="javascript:countChar(' +
                    i +
                    ');" placeholder="Edit Step by Step Recipe…" rows="7" maxlength="2000" id="recipe_step' +
                    i +
                    '" style="height:100px; resize: none;" required></textarea><label for="recipe_step' +
                    i +
                    '" class="text-white" required>Edit Step by Step Recipe…</label><a class="btn custom-trash text-white" onclick="javascript:eraseText(' +
                    i + ');"><i class="bi bi-trash-fill"></i></a><div id="the-count"><span id="' +
                    current + '" style="color: #fff;">2000</span><span id="' + maximum +
                    '" style="color: #fff;">/ 2000</span></div></div>'
                ).appendTo(scntDiv);
                i++;
                return false;

            });
        });
    </script>

    <script>
        var maxLength = 2000;

        function countChar(id) {
            var textlen = maxLength - jQuery('textarea#customTextarea' + id).val().length;
            $('#current' + id).text(textlen);
        }
    </script>

    <script>
        function eraseText(id) {
            jQuery('textarea#recipe_step' + id).parent().remove();
        }
    </script>

    <script>
        function eraseText(id) {
            jQuery('textarea#customTextarea' + id).parent().remove();
        }
    </script>

    <script type="text/javascript">
        $(document).ready(function() {

            $(".add-more").click(function() {
                var html = $(".copy").html();
                $(".after-add-more").before(html);
            });

            $("body").on("click", ".remove", function() {
                $(this).parents(".control-group").remove();
            });

        });
    </script>

    <script>
        // File Upload//
        function ekUpload() {
            function Init() {

                console.log("Upload Initialised");

                var fileSelect = document.getElementById('thumbnail_image'),
                    fileDrag = document.getElementById('file-drag'),
                    submitButton = document.getElementById('submit-button');

                fileSelect.addEventListener('change', fileSelectHandler, false);

                // Is XHR2 available?
                var xhr = new XMLHttpRequest();
                if (xhr.upload) {
                    // File Drop
                    fileDrag.addEventListener('dragover', fileDragHover, false);
                    fileDrag.addEventListener('dragleave', fileDragHover, false);
                    fileDrag.addEventListener('drop', fileSelectHandler, false);
                }
            }

            function fileDragHover(e) {
                var fileDrag = document.getElementById('file-drag');

                e.stopPropagation();
                e.preventDefault();

                fileDrag.className = (e.type === 'dragover' ? 'hover' : 'modal-body thumbnail_image');
            }

            function fileSelectHandler(e) {
                // Fetch FileList object
                var files = e.target.files || e.dataTransfer.files;

                // Cancel event and hover styling
                fileDragHover(e);

                // Process all File objects
                for (var i = 0, f; f = files[i]; i++) {
                    parseFile(f);
                    uploadFile(f);
                }
            }

            // Output
            function output(msg) {
                // Response
                var m = document.getElementById('messages');
                m.innerHTML = msg;
            }

            function parseFile(file) {

                console.log(file.name);
                output(
                    '<strong>' + encodeURI(file.name) + '</strong>'
                );

                // var fileType = file.type;
                // console.log(fileType);
                var imageName = file.name;

                var isGood = (/\.(?=gif|jpg|png|jpeg)/gi).test(imageName);
                if (isGood) {
                    document.getElementById('start').classList.add("hidden");
                    document.getElementById('response').classList.remove("hidden");
                    document.getElementById('notimage').classList.add("hidden");
                    // Thumbnail Preview
                    document.getElementById('file-image').classList.remove("hidden");
                    document.getElementById('file-image').src = URL.createObjectURL(file);
                } else {
                    document.getElementById('file-image').classList.add("hidden");
                    document.getElementById('notimage').classList.remove("hidden");
                    document.getElementById('start').classList.remove("hidden");
                    document.getElementById('response').classList.add("hidden");
                    document.getElementById("thumbnail_image-form").reset();
                }
            }

            function setProgressMaxValue(e) {
                var pBar = document.getElementById('file-progress');

                if (e.lengthComputable) {
                    // pBar.max = e.total;
                }
            }

            function updateFileProgress(e) {
                var pBar = document.getElementById('file-progress');

                if (e.lengthComputable) {
                    // pBar.value = e.loaded;
                }
            }

            function uploadFile(file) {

                var xhr = new XMLHttpRequest(),
                    fileInput = document.getElementById('class-roster-file'),
                    pBar = document.getElementById('file-progress'),
                    fileSizeLimit = 1024; // In MB
                if (xhr.upload) {
                    // Check if file is less than x MB
                    if (file.size <= fileSizeLimit * 1024 * 1024) {
                        xhr.upload.addEventListener('loadstart', setProgressMaxValue, false);
                        xhr.upload.addEventListener('progress', updateFileProgress, false);

                        // File received / failed
                        xhr.onreadystatechange = function(e) {
                            if (xhr.readyState == 4) {
                            }
                        };

                        // Start upload
                        xhr.open('POST', document.getElementById('thumbnail_image-form').action, true);
                        xhr.setRequestHeader('X-File-Name', file.name);
                        xhr.setRequestHeader('X-File-Size', file.size);
                        xhr.setRequestHeader('Content-Type', 'multipart/form-data');
                        // xhr.send(file);
                    } else {
                        output('Please upload a smaller file (< ' + fileSizeLimit + ' MB).');
                    }
                }
            }
            // Check for the various File API support.
            if (window.File && window.FileList && window.FileReader) {
                Init();
            } else {
                document.getElementById('file-drag').style.display = 'none';
            }
        }
        ekUpload();
    </script>

    <!-- ------------------ script screen12 ------------------  -->

    <script type="text/javascript">
        $(document).ready(function() {

            $(".add-more2").click(function() {
                var html = $(".copy2").html();
                $(".after-add-more2").before(html);
            });

            $("body").on("click", ".remove", function() {
                $(this).parents(".control-group2").remove();
            });

        });
    </script>
@endsection
