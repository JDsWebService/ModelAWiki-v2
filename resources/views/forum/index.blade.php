@extends('layouts.forum')

@section('title', 'Forum Home')

@section('stylesheets')

	<style type="text/css">

		.profile-image {
			width: 100px;
		}
		.badge-category {
			color: white;
		}
		.discussion-preview-link div[class^="col-"] {
			color: black;
		}
		.discussion-preview-link:hover div[class^="col-"] {
			background: #eee;
		}
		
	</style>

@endsection

@section('content')

	

	<a href="#" class="discussion-preview-link">
	    <div class="row">
	        <div class="col-sm-2 text-center p-2">
	            <img src="/images/users/placeholder.png" alt="Profile Picture" class="profile-image rounded-circle border border-secondary">
	        </div>
	        <div class="col-sm-10 p-2">
	            <h4>
	                Discussion Title&nbsp;
	                <small>
	                    <span class="badge badge-pill badge-category" style="background-color: #558B2F;">
	                        Category
	                    </span>
	                </small>
	            </h4>
	            <p><small>Posted By Jonathan Robinson 14 hours ago</small></p>
	            <p>
	                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur nemo magnam eum inventore ducimus, atque totam, non, repellat officia porro minima nostrum magni. Voluptas consectetur, dignissimos, alias placeat eos inventore...
	            </p>
	        </div>
	    </div>
	</a>

@endsection