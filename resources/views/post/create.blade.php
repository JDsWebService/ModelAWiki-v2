@extends('layouts.admin')

@section('title', 'Create Post')

@section('stylesheets')

	<style>
        /* The switch - the box around the slider */
        .switch {
            position: relative;
            display: block;
            width: 60px;
            height: 34px;
        }

        /* Hide default HTML checkbox */
        .switch input {display:none;}

        /* The slider */
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked + .slider {
            background-color: #2196F3;
        }

        input:focus + .slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked + .slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
    </style>

@endsection

@section('content')
    <div class="row mb-3">
        <div class="col-sm-12">
            <a href="{{ route('post.index') }}"><< Go Back</a>
        </div>
    </div>
    
	{{ Form::postForm($categories, 'store', 'POST', 'Create Post') }}

@endsection

@section('scripts')
	
	{{-- Tiny MCE --}}
	<script src="/js/tinymce/tinymce.min.js"></script>
	<script>
		tinymce.init({
			selector:'textarea',
			plugins: 'link',
			menubar: false,
			branding: false,
			resize: false,
			statusbar: false,
			force_br_newlines : false,
			force_p_newlines : false,
			forced_root_block : '',
			toolbar: 	['undo redo | cut copy paste | removeformat',
						'bold italic underline | link | outdent indent | alignleft aligncenter alignright alignjustify alignnone',],
		});
	</script>

	{{-- Image Javascript --}}
	<script type="text/javascript">
	    $(function() {

	        // We can attach the `fileselect` event to all file inputs on the page
	        $(document).on('change', ':file', function() {
	            var input = $(this),
	            numFiles = input.get(0).files ? input.get(0).files.length : 1,
	            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
	            input.trigger('fileselect', [numFiles, label]);
	        });

	        // We can watch for our custom `fileselect` event like this
	        $(document).ready( function() {
	            $(':file').on('fileselect', function(event, numFiles, label) {

	            var input = $(this).parents('.input-group').find(':text'),
	            log = numFiles > 1 ? numFiles + ' files selected' : label;

	            if( input.length ) {
	                input.val(log);
	            } else {
	                if( log ) alert(log);
	            }

	            });
	        });

	    });
	</script>

@endsection